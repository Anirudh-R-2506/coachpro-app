<?php


namespace App\Enums;

use App\Traits\EnumConstant;

class Timing
{

    use EnumConstant;

    const FORENOON = '0';
    const BOTH = '2';
    const EVENING = '1';

    public static function getValues(): array
    {
        return [
            self::FORENOON,
            self::EVENING,
            self::BOTH,
        ];
    }

    public static function getLabels(): array
    {
        return [
            self::FORENOON => 'Forenoon',
            self::EVENING => 'Evening',
            self::BOTH => 'Both',
        ];
    }

    
}