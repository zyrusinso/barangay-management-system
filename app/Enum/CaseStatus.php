<?php

namespace App\Enum;

class CaseStatus
{
    const PENDING = 'Pending';
    const RESOLVED = 'Resolved';
    const ESCALATED = 'Escalated';
    const IN_PROGRESS = 'In Progress';

    public static function values(): array
    {
        return [
            self::PENDING,
            self::RESOLVED,
            self::ESCALATED,
            self::IN_PROGRESS,
        ];
    }
} 