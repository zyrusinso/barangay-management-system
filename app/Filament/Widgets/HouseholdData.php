<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use App\Models\Household;

class HouseholdData extends BaseWidget
{
    protected function getCards(): array
    {
        // $totalHouseholds = Household::count();
        // $averageMembers = Household::avg('members_count');

        // return [
        //     Card::make('Total Households', $totalHouseholds)
        //         ->description('Total number of households')
        //         ->color('primary'),

        //     Card::make('Average Members per Household', round($averageMembers, 2))
        //         ->description('Average number of members per household')
        //         ->color('info'),
        // ];
        return [];
    }
} 