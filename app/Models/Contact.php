<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'subject',
        'message',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $table = 'contacts';
}
