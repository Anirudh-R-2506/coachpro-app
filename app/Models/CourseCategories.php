<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use App\Traits\Enum;

class CourseCategories extends Model
{
    use HasFactory, Uuid, Enum;

    protected $table = 'course_categories';

    protected $fillable = [
        'name',
        'description',
        'status'
    ];

    public function enums()
    {
        return [
            'status' => [
                'ACTIVE' => [
                    'label' => 'Active',
                    'value' => '0',
                    'color' => 'success',
                ],
                'INACTIVE' => [
                    'label' => 'Inactive',
                    'value' => '1',
                    'color' => 'warning',
                ],
            ],
        ];
    }
}
