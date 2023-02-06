<?php

namespace App\Enums;

use App\Traits\EnumConstant;

class ContactStatus
{

    use EnumConstant;

    const PENDING = 0;
    const ACTION_TAKEN = 1;

    public static function getValues()
    {
        return [
            self::PENDING,
            self::ACTION_TAKEN,
        ];
    }

    public static function colors(): array
    {
        return [
            'warning' => self::PENDING,
            'success' => self::ACTION_TAKEN,
        ];
    }

    public static function icons()
    {
        return [
            'heroicon-o-clock' => self::PENDING,
            'heroicon-o-check' => self::ACTION_TAKEN,
        ];
    }

}