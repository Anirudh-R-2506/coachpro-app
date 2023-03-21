<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MitSurvey;

class MitTeachers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'subject',
        'branch',
        'section',
        'year',
        'semester',
    ];

    public function getSurveys()
    {
        return MitSurvey::where('teacher_id', $this->id)->get();
    }
}
