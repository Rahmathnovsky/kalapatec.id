<?php

namespace App\Enums;

class Emails
{
    public const RECRUITMENT = 'recruitment@kalapatec.id';

    public static function all(): array
    {
        return [
            self::RECRUITMENT
        ];
    }
}
