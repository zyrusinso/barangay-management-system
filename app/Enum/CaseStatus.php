<?php

namespace App\Enum;

enum CaseStatus: string
{
    case PENDING = 'Pending';
    case RESOLVED = 'Resolved';
    case ESCALATED = 'Escalated';
    case IN_PROGRESS = 'In Progress';

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