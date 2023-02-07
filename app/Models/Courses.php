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

class Courses extends Model
{
    use HasFactory;

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
        'fees'
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
