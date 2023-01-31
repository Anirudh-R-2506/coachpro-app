<?php

namespace App\Enums;


class Education
{
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

    public static function getLabels(): array
    {
        return [
            self::SCHOOL => 'School',
            self::UG => 'Undergraduate',
            self::PG => 'Postgraduate',
        ];
    }
    
}