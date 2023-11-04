<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Institutes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Traits\Enum;
use App\Traits\Uuid;
use App\Models\Faqs;

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
        return $this->belongsTo(Institutes::class);
    }

    public function eduHuntScore()
    {
        return $this->hasOne(EduHuntScore::class);
    }

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

    public function ratings()
    {
        return $this->hasMany(Ratings::class);
    }

    public function faqs()
    {
        return $this->hasMany(Faqs::class);
    }
    
}
