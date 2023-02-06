<?php

namespace App\Enums;
use App\Traits\EnumConstant;


class Education
{

    use EnumConstant;

    const SCHOOL = 0;
    const UG = 1;
    const PG = 2;

    public static function getValues(): array
    {
        return [
            self::SCHOOL,
            self::UG,
            self::PG,
        ];
    }

    public static function getEnum($education): ?string
    {
        switch ($education) {
            case 'school':
                return self::SCHOOL;
            case 'ug':
                return self::UG;
            case 'pg':
                return self::PG;
            default:
                return null;
        }
    }

    public static function getLabels(): array
    {
        return [
            self::SCHOOL => 'School',
            self::UG => 'Undergraduate',
            self::PG => 'Postgraduate',
        ];
    }
    
}