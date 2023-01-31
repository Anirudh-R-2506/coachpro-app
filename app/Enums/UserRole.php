<?php

namespace App\Enums;


class UserRole
{


    const STUDENT = 0;
    const INSTITUTE = 1;
    const ADMIN = 2;
    const SUPER_ADMIN = 3;

    public static function getValues(): array
    {
        return [
            self::STUDENT,
            self::INSTITUTE,
            self::ADMIN,
            self::SUPER_ADMIN,
        ];
    }

    public static function getLabels(): array
    {
        return [
            self::STUDENT => 'Student',
            self::INSTITUTE => 'Institute',
            self::ADMIN => 'Admin',
            self::SUPER_ADMIN => 'Super Admin',
        ];
    }

}