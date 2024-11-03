<?php

namespace App\Enum;

class ScheduleStatus
{
    const SCHEDULED = 'scheduled';
    const COMPLETED = 'completed';
    const CANCELLED = 'cancelled';

    public static function values(): array
    {
        return [
            self::SCHEDULED,
            self::COMPLETED,
            self::CANCELLED,
        ];
    }
}

