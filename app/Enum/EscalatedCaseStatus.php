<?php

namespace App\Enum;

enum EscalatedCaseStatus: string
{
    case ESCALATED = 'Escalated';
    case RESOLVED = 'Resolved';
    case PENDING = 'Pending';

    public static function values(): array
    {
        return [
            self::ESCALATED,
            self::RESOLVED,
            self::PENDING,
        ];
    }
}

