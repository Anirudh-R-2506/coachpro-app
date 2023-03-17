<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Faculties extends Model
{
    use HasFactory, Uuid;

    protected $fillable = [
        'name',
        'institute_id',
        'qualification',
        'experience',
        'subjects',
    ];

    protected $casts = [
        'subjects' => 'array',
    ];

    public function institute()
    {
        return $this->belongsTo(Institutes::class);
    }
}
