<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\City;
use App\Traits\Uuid;
use App\Enums\UserRole;
use App\Models\Locality;
use App\Models\Institutes;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable, LogsActivity, HasRoles, Uuid;


    /**
     * canAccessFilament - this is the logic for permitting login into Filament
     *
     * @return bool
     */
    public function canAccessFilament(): bool
    {
        if($this->role == UserRole::ADMIN || $this->role == UserRole::SUPER_ADMIN) {
            return true;
        } else {
            return false;
        }
    }

    public function canCreate(): bool
    {
        if($this->role == UserRole::SUPER_ADMIN) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'education',
        'class',
        'year_of_passing',
        'session',
        'timing',
        'city',
        'locality',       
        'account_status',
        'admin_remarks', 
        'role',   
        'institute_id',   
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name', 'email', 'phone', 'session', 'timing', 'locality']);
    }

    public function institute()
    {
        return $this->belongsTo(Institutes::class, 'institute_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function locality()
    {
        return $this->belongsTo(Locality::class, 'locality_id');
    }
}
