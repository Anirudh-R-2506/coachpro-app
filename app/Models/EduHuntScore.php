<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EduHuntScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'score',
    ];

    public function course()
    {
        return $this->belongsTo(Courses::class);
    }    
}
