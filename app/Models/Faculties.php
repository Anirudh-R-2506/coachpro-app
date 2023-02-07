<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculties extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'institute_id',
        'qualification',
        'experience',
    ];

    public function institute()
    {
        return $this->belongsTo(Institutes::class);
    }
}
