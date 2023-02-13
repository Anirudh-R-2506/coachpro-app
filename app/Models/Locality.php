<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\City;
use App\Traits\Uuid;

class Locality extends Model
{
    use HasFactory, Uuid;

    protected $table = 'localities';

    protected $fillable = [
        'city_id',
        'name'
    ];

    public function city()
    {
        return $this->hasMany(Locality::class);
    }
}
