<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Enum;
use App\Models\MitStudents;
use App\Models\MitTeachers;

class MitSurvey extends Model
{
    use HasFactory, Enum;

    protected $table = 'mit_surveys';

    protected $fillable = [
        'student_id',
        'teacher_id',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function getStudent()
    {
        return MitStudents::find($this->student_id);
    }

    public function getTeacher()
    {
        return MitTeachers::find($this->teacher_id);
    }
}
