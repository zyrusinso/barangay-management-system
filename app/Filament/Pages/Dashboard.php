<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\DocumentStats;
use App\Filament\Widgets\EscalatedCaseStats;
use App\Filament\Widgets\LuponCaseStats;
use App\Filament\Widgets\MedicalReferralStats;
use App\Filament\Widgets\ResidentStats;
use App\Filament\Widgets\UserStats;
use App\Filament\Widgets\DashboardStats;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        return [
            DashboardStats::class,
            EscalatedCaseStats::class,
            LuponCaseStats::class,
            MedicalReferralStats::class,
            // ResidentStats::class,
            // UserStats::class,
            // Add other widgets as needed
        ];
    }
}
