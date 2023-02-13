<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Ratings extends Model
{
    use HasFactory, Uuid;

    protected $fillable = [
        'course_id',
        'user_id',
        'rating',
    ];

    public function course()
    {
        return $this->belongsTo(Courses::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }    
}
