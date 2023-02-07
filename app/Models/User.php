<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Filament\Models\Contracts\FilamentUser;
use App\Enums\UserRole;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable, LogsActivity, HasRoles;


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

}
