<?php

namespace App\Enums;

class ContactStatusEnum
{
    const PENDING = 0;
    const ACTION_TAKEN = 1;

    public static function getContactStatus()
    {
        return [
            self::PENDING => 'Pending',
            self::ACTION_TAKEN => 'Action Taken',
        ];
    }

    public static function getContactStatusColor()
    {
        return [
            self::PENDING => 'warning',
            self::ACTION_TAKEN => 'success',
        ];
    }

    public static function getContactStatusIcon()
    {
        return [
            self::PENDING => 'fa fa-clock',
            self::ACTION_TAKEN => 'fa fa-check',
        ];
    }

    public static function getContactStatusClass()
    {
        return [
            self::PENDING => 'badge badge-warning',
            self::ACTION_TAKEN => 'badge badge-success',
        ];
    }
}