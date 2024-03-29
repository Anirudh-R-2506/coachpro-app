<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Comments extends Model
{
    use HasFactory, Uuid;

    protected $fillable = [
        'course_id',
        'user_id',
        'comment',
        'is_approved'
    ];

    protected $casts = [
        'is_approved' => 'boolean'
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
