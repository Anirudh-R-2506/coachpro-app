<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Faculties;

class Institutes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city_id',
        'locality_id',
        'photos',
        'address',
        'phone',
        'email',        
    ];

    protected $casts = [
        'photos' => 'array',
    ];

    public function faculties()
    {
        return $this->hasMany(Faculties::class);
    }
    
}
