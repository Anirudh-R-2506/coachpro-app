<?php

namespace App\Enums;


use App\Traits\EnumConstant;

class UserRole
{

    use EnumConstant;

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

    public static function colors(): array
    {
        return [
            'primary' => self::STUDENT,
            'success' => self::INSTITUTE,
            'warning' => self::ADMIN,
            'danger' => self::SUPER_ADMIN,
        ];
    }

    public static function icons(): array
    {
        return [
            'heroicon-o-user' => self::STUDENT,
            'heroicon-o-users' => self::INSTITUTE,
            'heroicon-o-user-group' => self::ADMIN,
            'heroicon-o-user-circle' => self::SUPER_ADMIN,
        ];
    }


}