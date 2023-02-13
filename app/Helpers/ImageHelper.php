<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class ImageHelper
{
    public static function getUrl($image)
    {
        return Storage::disk('s3')->response($image->getFirstMedia('institute_images')->id . '/' . $image->getFirstMedia('institute_images')->file_name);
    }
}