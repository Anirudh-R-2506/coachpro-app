<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use App\Traits\Enum;

class Examinations extends Model
{
    use HasFactory, Uuid, Enum;


    protected $fillable = [
        'name',
        'status',        
    ];

    public function enums()
    {
        return [
            'status' => [
                'ACTIVE' => [
                    'value' => '0',
                    'label' => 'Active',
                    'color' => 'success',
                    'icon' => 'check'
                ],
                'INACTIVE' => [
                    'value' => '1',
                    'label' => 'Inactive',
                    'color' => 'danger',
                    'icon' => 'times'
                ],
            ],
        ];
    }

}
