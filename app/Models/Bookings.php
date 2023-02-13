<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use App\Traits\Enum;

class Bookings extends Model
{
    use HasFactory, Uuid, Enum;

    protected $fillable = [
        'course_id',
        'user_id',
        'lead_id',
        'status',
        'payment_id'
    ];

    public function enums()
    {
        return [
            'status' => [
                'PENDING' => [
                    'value' => '0',
                    'color' => 'info',
                    'icon' => 'check',
                    'label' => 'Pending'
                ],
                'CONFIRMED' => [
                    'value' => '1',
                    'color' => 'success',
                    'icon' => 'check',
                    'label' => 'Confirmed'
                ],
                'CANCELLED' => [
                    'value' => '2',
                    'color' => 'danger',
                    'icon' => 'times',
                    'label' => 'Cancelled'
                ],
                'REFUNDED' => [
                    'value' => '3',
                    'color' => 'warning',
                    'icon' => 'exclamation',
                    'label' => 'Refunded'
                ],
            ],
        ];
    }

    public function course()
    {
        return $this->belongsTo(Courses::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
