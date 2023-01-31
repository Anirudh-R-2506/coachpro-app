<?php


namespace App\Enums;


class Session
{
    const WEEKDAY = 0;
    const WEEKEND = 1;
    const BOTH = 2;
    const FLEXIBLE = 3;

    public static function getValues(): array
    {
        return [
            self::WEEKDAY,
            self::WEEKEND,
            self::BOTH,
            self::FLEXIBLE,
        ];
    }

    public static function getLabels(): array
    {
        return [
            self::WEEKDAY => 'Weekday',
            self::WEEKEND => 'Weekend',
            self::BOTH => 'Both',
            self::FLEXIBLE => 'Flexible',
        ];
    }
}