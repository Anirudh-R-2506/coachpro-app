<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Faculties;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Traits\Uuid;
use App\Traits\Enum;

class Institutes extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Uuid, Enum, HasMediaTrait;

    protected $fillable = [
        'name',
        'city_id',
        'locality_id',
        'address',
        'phone',
        'email',        
        'leads_status',
        'bookings_status',
        'status'
    ];

    public function enums()
    {
        return [
            'leads_status' => [
                'ACTIVE' => [
                    'value' => '0',
                    'color' => 'success',
                    'icon' => 'check',
                    'label' => 'Active',
                ],
                'INACTIVE' => [
                    'value' => '1',
                    'color' => 'danger',
                    'icon' => 'times',
                    'label' => 'Inactive',
                ],
            ],
            'bookings_status' => [
                'ACTIVE' => [
                    'value' => '0',
                    'color' => 'success',
                    'icon' => 'check',
                    'label' => 'Active',
                ],
                'INACTIVE' => [
                    'value' => '1',
                    'color' => 'danger',
                    'icon' => 'times',
                    'label' => 'Inactive',
                ],
            ],
        ];
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('institute_images');
    }

    public function faculties()
    {
        return $this->hasMany(Faculties::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function locality()
    {
        return $this->belongsTo(Locality::class);
    }
    
}
