<?php

namespace App\Filament\Widgets;

use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables;
use App\Models\Activity;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;

class RecentActivities extends BaseWidget
{
    
    public function getTableQuery(): Builder
    {
        return User::query()->latest()->limit(5);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('activity_name')
                ->label('Activity Name'),

            Tables\Columns\TextColumn::make('date')
                ->label('Date'),

            Tables\Columns\TextColumn::make('location')
                ->label('Location'),
        ];
    }
} 