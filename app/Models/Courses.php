<?php

namespace App\Models;

use App\Models\Faqs;
use App\Traits\Enum;
use App\Traits\Uuid;
use App\Enums\Education;
use App\Models\Institutes;
use App\Models\Examinations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Courses extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Uuid, Enum;

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
        ];
    }

    protected $fillable = [
        'name',
        'institute_id',
        'description',
        'duration',
        'fees',
        'status',
        'availability',
        'exams_accepted',
        'specialisations',
        'rank',
        'pre_education',
        'gradify_score',
    ];  

    protected $casts = [
        'exams_accepted' => 'array',
        'specialisations' => 'array',
    ];

    public function institute()
    {
        return $this->belongsTo(Institutes::class, 'institute_id');
    }

    public function examinations(): string
    {
        $r = '';
        foreach ($this->exams_accepted as $exam_id) {
            $exam = Examinations::find($exam_id);
            $r .= $exam->name . ' ';
        }
        return $r;
    }
    
    public function prerequisite(){
        return Education::getLabels()[$this->pre_education];
    }
}
