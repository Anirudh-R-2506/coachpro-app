<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Institutes;
use App\Models\Leads;
use App\Models\EduHuntScore;
use App\Models\Comments;
use App\Models\Bookings;
use App\Models\Ratings;
use App\Traits\Enum;
use App\Traits\Uuid;

class Courses extends Model
{
    use HasFactory, Enum, Uuid;

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
            'leads_status' => [
                'ENABLED' => [
                    'value' => '0',
                    'color' => 'success',
                    'icon' => 'check',
                    'label' => 'Enabled'
                ],
                'DISABLED' => [
                    'value' => '1',
                    'color' => 'danger',
                    'icon' => 'times',
                    'label' => 'Disabled'
                ]
            ],
            'bookings_status' => [
                'ENABLED' => [
                    'value' => '0',
                    'color' => 'success',
                    'icon' => 'check',
                    'label' => 'Enabled'
                ],
                'DISABLED' => [
                    'value' => '1',
                    'color' => 'danger',
                    'icon' => 'times',
                    'label' => 'Disabled'
                ]
            ]
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
        'subjects',
        'course_timings',
        'start_date',
        'end_date',
        'fees',
        'status',
        'availability',
        'leads_status',
        'category_id',
        'slug'
    ];

    protected $casts = [
        'faculties' => 'array',
        'subjects' => 'array',
        'course_timings' => 'array',
        'start_date' => 'date',
        'end_date' => 'date',
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
}
