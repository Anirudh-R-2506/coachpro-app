<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use ProtoneMedia\LaravelFFMpeg\Filters\WatermarkFactory;
use FFmpeg;
use FFmpeg\Coordinate\Dimension;


class CompressAndUploadVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $video;
    public $course;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($video, $course)
    {
        $this->video = $video;
        $this->course = $course;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $video = $this->video;
        $course = $this->course;        
        $lowBitrateFormat = (new X264('libmp3lame', 'libx264'))->setKiloBitrate(500);

        try{
            FFMpeg::fromDisk('videos')
                    ->open(storage_path('app' . DIRECTORY_SEPARATOR . 'videos' . DIRECTORY_SEPARATOR . 'tmp') . DIRECTORY_SEPARATOR . $video)
                    ->export()
                    ->addWatermark(function(WatermarkFactory $watermark) {
                        $watermark->fromDisk('public')
                            ->open('images' . DIRECTORY_SEPARATOR . 'logo' . DIRECTORY_SEPARATOR . 'logo.png')
                            ->right(25)
                            ->bottom(25);
                    })
                    ->addFilter(function ($filters) {
                        $filters->resize(new Dimension(960, 540));	
                    })
                    ->inFormat($lowBitrateFormat)
                    ->save(storage_path('app' . DIRECTORY_SEPARATOR . 'videos' . DIRECTORY_SEPARATOR . 'tmp') . DIRECTORY_SEPARATOR . $video);

            $course->addMedia(storage_path('app' . DIRECTORY_SEPARATOR . 'videos' . DIRECTORY_SEPARATOR . 'tmp') . DIRECTORY_SEPARATOR . $video)
                    ->toMediaCollection('course_video');
            Storage::disk('local')->delete(storage_path('videos' . DIRECTORY_SEPARATOR . 'tmp') . DIRECTORY_SEPARATOR . $video);                

        }catch(Exception $e){
            activity()->log('Error while compressing and uploading video')
                ->causedBy(auth()->user())
                ->withProperties([
                    'video' => $video,
                    'course' => $course->id,
                    'error' => $e->getMessage(),
                ]);
        }
    }
}
