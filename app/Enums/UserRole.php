<?php

namespace App\Enums;

class UserRole
{
    public const ADMINISTRATOR = 'administrator';
    public const DM = 'dm';
    public const USER = 'user';

    public static function all(): array
    {
        return [
            self::ADMINISTRATOR,
            self::DM,
            self::USER,
        ];
    }
}
