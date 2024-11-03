<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use App\Models\User;

class UserStats extends BaseWidget
{
    protected function getCards(): array
    {
        // $totalUsers = User::count();
        // $activeUsers = User::where('status', 'active')->count();

        // return [
        //     Card::make('Total Users', $totalUsers)
        //         ->description('Total number of users')
        //         ->color('primary'),

        //     Card::make('Active Users', $activeUsers)
        //         ->description('Number of active users')
        //         ->color('info'),
        // ];
        return [];
    }
} 