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
}
