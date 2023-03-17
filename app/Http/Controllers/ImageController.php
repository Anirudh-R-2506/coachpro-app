<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InstituteImages;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller;
use Alert;
use App\Models\Institutes;
use App\Jobs\CompressAndUploadVideo;


class ImageController extends Controller
{

    public function __construct()
    {
        $this->middleware('inst');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inst = Institutes::where('id', auth()->user()->institute_id)->first();
        $images = $inst->getMedia('institute_images');

        return view('institute.admin.photos.index', [
            'images' => $images,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
        ]);

        try{
            foreach($request->image as $img){
                $tmp_img = $img;
                $inst = Institutes::where('id', auth()->user()->institute_id)->first();
                $inst->addMedia(storage_path('app' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'tmp') . DIRECTORY_SEPARATOR . $tmp_img)
                    ->withResponsiveImages()
                    ->toMediaCollection('institute_images');

                Storage::disk('local')->delete(storage_path('images' . DIRECTORY_SEPARATOR . 'tmp') . DIRECTORY_SEPARATOR . $tmp_img);                
            }
            Alert::success('Success!', 'Image added successfully!');
            return redirect()->back();
        } catch (\Exception $e){
            Alert::error('Oops!', 'Something went wrong :(');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inst = Institutes::where('id', auth()->user()->institute_id)->first();

        if ($inst == null){
            Alert::error('Oops!', 'Something went wrong :(');
            return redirect()->back()->withInput();
        }

        try{
            $inst->getMedia('institute_images')->where('id', $id)->first()->delete();
            Alert::success('Success!', 'Image deleted successfully!');
            return redirect()->back();
        } catch (\Exception $e){
            Alert::error('Oops!', 'Something went wrong :(');
            return redirect()->back();
        }
    }
    

    /**
     * validate_directory - If path does not exist, create.
     *
     * @param mixed $path
     * @return void
     */
    public function validate_directory($path)
    {
        if (!File::isDirectory($path)) {
            if (File::makeDirectory($path, 0777, true, true)) {
                return true;
            } else {
                # Unable to create directory.
                return false;
            }
        } else {
            return true;
        }
    }

    /**
     * upload - Function to store images temporarily
     *
     * @param  mixed $request
     * @return void
     */
    public function upload(Request $request)
    {
        foreach ($request->image as $img)
            if ($img) {
                $file = $img;
                $extension = $file->getClientOriginalExtension();
                $filename = uniqid() . '_' . now()->timestamp . '.' . $extension;
                $path = storage_path('images' . DIRECTORY_SEPARATOR . 'tmp');
                if ($this->validate_directory($path)) {
                    $folder = $file->storeAs('images' . DIRECTORY_SEPARATOR . 'tmp', $filename);
                    return $filename;
                } else {
                    return false;
                }
            }
        return false;
    }

    /**
     * Saves the file
     *
     * @param UploadedFile $file
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function saveFile(UploadedFile $file)
    {
        $fileName = $this->createFilename($file);
        // Group files by mime type
        $mime = str_replace('/', '-', $file->getMimeType());
        // Group files by the date (week
        $dateFolder = date("Y-m-W");

        // Build the file path
        $filePath = "upload/{$mime}/{$dateFolder}/";
        $finalPath = storage_path("app/".$filePath);

        // move the file name
        $file->move($finalPath, $fileName);

        return response()->json([
            'path' => $filePath,
            'name' => $fileName,
            'mime_type' => $mime
        ]);
    }

    /**
     * Create unique filename for uploaded file
     * @param UploadedFile $file
     * @return string
     */
    protected function createFilename(UploadedFile $file)
    {
        $extension = $file->getClientOriginalExtension();
        $filename = str_replace(".".$extension, "", $file->getClientOriginalName()); // Filename without extension

        // Add timestamp hash to name of the file
        $filename .= "_" . md5(time()) . "." . $extension;

        return $filename;
    }

    public function upload_video(Request $request)
    {
        // create the file receiver
        $receiver = new FileReceiver("file", $request, HandlerFactory::classFromRequest($request));

        // check if the upload is success, throw exception or return response you need
        if ($receiver->isUploaded() === false) {
            throw new UploadMissingFileException();
        }

        // receive the file
        $save = $receiver->receive();

        // check if the upload has finished (in chunk mode it will send smaller files)
        if ($save->isFinished()) {
            // save the file and return any response you need, current example uses `move` function. If you are
            // not using move, you need to manually delete the file by unlink($save->getFile()->getPathname())
            return $this->saveFile($save->getFile());
        }

        // we are in chunk mode, lets send the current progress
        /** @var AbstractHandler $handler */
        $handler = $save->handler();

        return response()->json([
            "done" => $handler->getPercentageDone(),
        ]);
    }

    public function store_video(Request $request)
    {
        $request->validate([
            'video' => 'required',
            'course_id' => 'required|exists:courses,id',
        ]);

        try{
            $course = Courses::where('id', $request->course_id)->first();
            CompressAndUploadVideo::dispatch($request->video, $course);
            
            return response()->json([
                'status' => 'success',
            ]);
        } catch (\Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Unable to upload video :(',
            ]);
        }
    }

    public function destroy_video($id)
    {
        $inst = Courses::where('id', $id)->first();

        if ($inst == null){
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong :(',
            ]);
        }

        try{
            $inst->getMedia('course_video')->first()->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Video deleted successfully!',
            ]);
        } catch (\Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong :(',
            ]);
        }
    }

}
