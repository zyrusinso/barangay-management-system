<?php

namespace App\Enum;

enum CasePriority: string
{
    case LOW = 'Low';
    case MEDIUM = 'Medium';
    case HIGH = 'High';

    public static function values(): array
    {
        return [
            self::LOW,
            self::MEDIUM,
            self::HIGH,
        ];
    }

    public static function colors(): array
    {
        return [
            'Low' => 'Blue',
            'Medium' => 'Yellow',
            'High' => 'Red',
        ];
    }
} 