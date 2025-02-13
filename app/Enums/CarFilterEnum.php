<?php

namespace App\Enums;

enum CarFilterEnum: string
{
    case LATEST = 'latest';
    case OLDEST = 'oldest';
    case REGISTERED = 'registered';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
