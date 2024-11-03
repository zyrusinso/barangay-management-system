<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use App\Models\Resident;

class PopulationStats extends BaseWidget
{
    protected function getCards(): array
    {
        // $totalResidents = Resident::count();
        // $maleResidents = Resident::where('gender', 'male')->count();
        // $femaleResidents = Resident::where('gender', 'female')->count();

        // return [
        //     Card::make('Total Residents', $totalResidents)
        //         ->description('Total number of residents')
        //         ->color('primary'),

        //     Card::make('Male Residents', $maleResidents)
        //         ->description('Number of male residents')
        //         ->color('info'),

        //     Card::make('Female Residents', $femaleResidents)
        //         ->description('Number of female residents')
        //         ->color('success'),
        // ];

        return [];
    }
} 