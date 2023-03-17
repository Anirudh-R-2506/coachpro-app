<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use App\Models\User;

class MobileVerify extends Model
{
    use HasFactory, Uuid;

    protected $fillable = [
        'user_id',
        'otp',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
