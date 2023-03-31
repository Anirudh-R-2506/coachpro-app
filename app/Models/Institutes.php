<?php

namespace App\Models;

use App\Traits\Enum;
use App\Traits\Uuid;
use App\Models\Leads;
use App\Models\Bookings;
use App\Models\Faculties;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class Institutes extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Uuid, Enum;

    protected $fillable = [
        'name',
        'city_id',
        'locality_id',
        'address',
        'phone',
        'email',        
        'leads_status',
        'bookings_status',
        'status',
        'video_url'
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
        $this->addMediaCollection('institute_cover');
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

    public function courses()
    {
        return $this->hasMany(Courses::class);
    }

    public function leads()
    {
        return $this->hasMany(Leads::class);
    }

    public function bookings()
    {
        return $this->hasMany(Bookings::class);
    }
    
    public static function boot()
    {
        parent::boot();

        self::created(function ($inst){
            if (!User::where('institute_id', $inst->id)->first()){
                User::create([
                    [
                        'name' => $inst->name,
                        'email' => $inst->email,
                        'password' => bcrypt('password'),
                        'role' => UserRole::INSTITUTE,
                        'phone' => $inst->phone,
                        'account_status' => AccountStatus::VERIFIED,
                        'admin_remarks' => 'Created from admin panel after creating an institute.',
                        'institute_id' => $inst->id,
                        'city' => $inst->city_id,
                        'locality' => $inst->locality_id,
                    ]
                ]);
            }
        });
    }
}
