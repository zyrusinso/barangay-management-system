<?php

namespace App\Enum;

enum ScheduleStatus: string
{
    case SCHEDULED = 'Scheduled';
    case COMPLETED = 'Completed';
    case CANCELLED = 'Cancelled';

    public static function values(): array
    {
        return [
            self::SCHEDULED,
            self::COMPLETED,
            self::CANCELLED,
        ];
    }
}

