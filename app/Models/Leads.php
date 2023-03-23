<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use App\Traits\Enum;

class Leads extends Model
{
    use HasFactory, Uuid, Enum;

    protected $fillable = [
        'course_id',
        'user_id',
        'status'
    ];

    public function enums()
    {
        return [
            'status' => [
                'NEW' => [
                    'label' => 'New',
                    'value' => '0',
                    'color' => 'primary',
                    'icon' => 'check-circle',
                ],
                'VERIFIED' => [
                    'label' => 'Verified',
                    'value' => '1',
                    'color' => 'warning',
                    'icon' => 'check-circle',
                ],
                'CONVERTED' => [
                    'label' => 'Converted',
                    'value' => '2',
                    'color' => 'success',
                    'icon' => 'check-circle',
                ],
                'REJECTED' => [
                    'label' => 'Rejected',
                    'value' => '3',
                    'color' => 'danger',
                    'icon' => 'times-circle',
                ]                
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
