<?php

namespace App\Filament\Widgets;

use Filament\Widgets\BarChartWidget;

class BarangayChart extends BarChartWidget
{
    protected static ?string $heading = 'Barangay Statistics';

    protected static ?int $sort = 5;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Residents',
                    'data' => [100, 200, 300, 400, 500], // Example data
                ],
            ],
            'labels' => ['January', 'February', 'March', 'April', 'May'], // Example labels
        ];
    }
} 