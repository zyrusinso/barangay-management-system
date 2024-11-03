<?php

namespace App\Enum;

class EscalatedCaseStatus
{
    const ESCALATED = 'escalated';
    const RESOLVED = 'resolved';
    const PENDING = 'pending';

    public static function values(): array
    {
        return [
            self::ESCALATED,
            self::RESOLVED,
            self::PENDING,
        ];
    }
}

