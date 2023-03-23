<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Institutes;
use App\Models\Leads;
use App\Models\EduHuntScore;
use App\Models\Comments;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\Bookings;
use App\Models\Ratings;
use App\Traits\Enum;
use App\Traits\Uuid;
use App\Models\Faqs;

class Courses extends Model
{
    use HasFactory, InteractsWithMedia, Uuid, Enum;

    public function enums(){ 
        return [
            'status' => [
                'ACTIVE' => [
                    'value' => '0',
                    'color' => 'success',
                    'icon' => 'check',
                    'label' => 'Active'
                ],
                'INACTIVE' => [
                    'value' => '1',
                    'color' => 'danger',
                    'icon' => 'times',
                    'label' => 'Inactive'
                ]
            ],
            'availability' => [
                'AVAILABLE' => [
                    'value' => '0',
                    'color' => 'success',
                    'icon' => 'check',
                    'label' => 'Available'
                ],
                'FILLING FAST' => [
                    'value' => '1',
                    'color' => 'warning',
                    'icon' => 'check',
                    'label' => 'Filling Fast'
                ],
                'UNAVAILABLE' => [
                    'value' => '2',
                    'color' => 'danger',
                    'icon' => 'check',
                    'label' => 'Unavailable'
                ],
            ],
        ];
    }

    protected $fillable = [
        'name',
        'institute_id',
        'description',
        'video_url',
        'faculties',
        'session',
        'timing',
        'course_timings',
        'start_date',
        'end_date',
        'fees',
        'status',
        'availability',
        'examination_id',
        'category_id',
        'slug'
    ];

    protected $casts = [
        'faculties' => 'array',
        'course_timings' => 'array'
    ];

    public function institute()
    {
        return $this->belongsTo(Institutes::class);
    }

    public function leads()
    {
        return $this->hasMany(Leads::class);
    }

    public function eduHuntScore()
    {
        return $this->hasOne(EduHuntScore::class);
    }

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

    public function bookings()
    {
        return $this->hasMany(Bookings::class);
    }

    public function ratings()
    {
        return $this->hasMany(Ratings::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('course_video')
            ->singleFile()
            ->acceptsMimeTypes(['video/mp4', 'video/avi', 'video/mov', 'video/mkv', 'video/3gp', 'video/wmv', 'video/flv', 'video/webm', 'video/ogg', 'video/ogv', 'video/avi', 'video/mpeg', 'video/quicktime', 'video/x-msvideo', 'vide']);
    }

    public function faqs()
    {
        return $this->hasMany(Faqs::class);
    }
    
}
