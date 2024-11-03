<?php

namespace App\Enum;

class CasePriority
{
    const LOW = 'Low';
    const MEDIUM = 'Medium';
    const HIGH = 'High';

    public static function values(): array
    {
        return [
            self::LOW,
            self::MEDIUM,
            self::HIGH,
        ];
    }
} 