<?php

namespace App\Enums;

class ContactStatusEnum
{
    const PENDING = 0;
    const ACTION_TAKEN = 1;

    public static function getValues()
    {
        return [
            self::PENDING => 'Pending',
            self::ACTION_TAKEN => 'Action Taken',
        ];
    }

    public static function getColors()
    {
        return [
            self::PENDING => 'warning',
            self::ACTION_TAKEN => 'success',
        ];
    }

    public static function getIcons()
    {
        return [
            self::PENDING => 'fa fa-clock',
            self::ACTION_TAKEN => 'fa fa-check',
        ];
    }

    public static function getClasses()
    {
        return [
            self::PENDING => 'badge badge-warning',
            self::ACTION_TAKEN => 'badge badge-success',
        ];
    }
}