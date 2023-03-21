<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MitSurvey;

class MitStudents extends Model
{
    use HasFactory;

    protected $table = 'mit_students';

    protected $fillable = [
        'name',
        'reg_no',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function getSurveys()
    {
        return MitSurvey::where('student_id', $this->id)->get();
    }
    
}
