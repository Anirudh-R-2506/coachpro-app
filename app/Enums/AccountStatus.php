<?php

namespace App\Enums;

use App\Traits\EnumConstant;

class AccountStatus
{

    use EnumConstant;

    
    public CONST UNVERIFIED = '0';
    public CONST VERIFIED = '1';
    public CONST FLAGGED = '2';
    public CONST BANNED = '3';
    public CONST INACTIVE = '4';
    public const MOBILE_UNVERIFIED = '5';

    /**
     * colors
     *
     * @return array
     */
    public static function colors() : array {

        // Filament's color structure is the following.

        // [
        //     'muted' => fn ($state): bool => $state === '1',
        //     'success' => fn ($state): bool => $state === '1',
        //     'warning' => fn ($state): bool => $state === '2',
        //     'danger' => fn ($state): bool => $state === '3',
        // ]

        return [
            'bg-gray-200 text-gray-900' => self::UNVERIFIED,
            'success' => self::VERIFIED,
            'warning' => self::FLAGGED,
            'danger' => self::BANNED,
            'muted' => self::INACTIVE,
            'bg-gray-200 text-gray-900' => self::MOBILE_UNVERIFIED,
        ];
    }

    /**
     * icons
     *
     * @return array
     */
    public static function icons() {
        return [
            'heroicon-o-question-mark-circle' => self::UNVERIFIED, // First value, we just leave it blank.
            'heroicon-o-check-circle' => self::VERIFIED,
            'heroicon-o-exclamation' => self::FLAGGED,
            'heroicon-o-x-circle' => self::BANNED,
            'heroicon-o-user-remove' => self::INACTIVE,
            'heroicon-o-question-mark-circle' => self::MOBILE_UNVERIFIED,
        ];
    }

    public static function getUserAccountType(): array
    {
        return [
            self::UNVERIFIED => 'Unverified',
            self::VERIFIED => 'Verified',
            self::FLAGGED => 'Flagged',
            self::BANNED => 'Banned',
            self::INACTIVE => 'Inactive',
            self::MOBILE_UNVERIFIED => 'Mobile Unverified',
        ];
    }

    public static function getValues(): array
    {
        return [
            self::UNVERIFIED,
            self::VERIFIED,
            self::FLAGGED,
            self::BANNED,
            self::INACTIVE,
            self::MOBILE_UNVERIFIED,
        ];
    }
}