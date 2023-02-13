<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Locality;
use App\Traits\Uuid;

class City extends Model
{
    use HasFactory, Uuid;

    protected $table = 'cities';

    protected $fillable = [
        'name'
    ];

    public function localities()
    {
        return $this->hasOne(City::class);
    }
}
