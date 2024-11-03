<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use App\Models\Resident;

class ResidentStats extends BaseWidget
{
    protected function getCards(): array
    {
        // $totalResidents = Resident::count();
        // $activeResidents = Resident::where('status', 'active')->count();

        // return [
        //     Card::make('Total Residents', $totalResidents)
        //         ->description('Total number of residents')
        //         ->color('primary'),

        //     Card::make('Active Residents', $activeResidents)
        //         ->description('Number of active residents')
        //         ->color('info'),
        // ];
        return [];
    }
} 