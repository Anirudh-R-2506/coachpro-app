<?php


namespace App\Enums;

use App\Traits\EnumConstant;

class Timing
{

    use EnumConstant;

    const FORENOON = '0';
    const AFTERNOON = '1';
    const EVENING = '2';

    public static function getValues(): array
    {
        return [
            self::FORENOON,
            self::AFTERNOON,
            self::EVENING,
        ];
    }

    public static function getLabels(): array
    {
        return [
            self::FORENOON => 'Forenoon',
            self::AFTERNOON => 'Afternoon',
            self::EVENING => 'Evening',
        ];
    }

    
}