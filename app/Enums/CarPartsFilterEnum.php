<?php

namespace App\Enums;

enum CarPartsFilterEnum: string
{
    case LATEST = 'latest';
    case OLDEST = 'oldest';
    case NAME_ASC = 'name_asc';
    case NAME_DESC = 'name_desc';
    case SERIAL_ASC = 'serial_asc';
    case SERIAL_DESC = 'serial_desc';

    // Metóda na získanie všetkých hodnôt ako array (použijeme vo validácii)
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
