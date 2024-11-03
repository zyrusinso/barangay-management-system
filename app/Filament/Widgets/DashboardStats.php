<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use App\Models\Document;
use App\Models\EscalatedCase;
use App\Models\LuponCase;
use App\Enum\CaseStatus;
use App\Models\MedicalReferral;

class DashboardStats extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected function getColumns(): int
    {
        return 4;
    }

    protected function getCards(): array
    {
        $totalDocuments = Document::count();
        $recentDocuments = Document::where('created_at', '>=', now()->subMonth())->count();

        $totalEscalatedCases = EscalatedCase::count();
        $resolvedCases = EscalatedCase::where('status', 'resolved')->count();

        $totalLuponCases = LuponCase::count();
        $pendingCases = LuponCase::where('case_status', CaseStatus::PENDING)->count();

        $totalReferrals = MedicalReferral::count();
        $completedReferrals = MedicalReferral::where('status', 'completed')->count();

        return [
            Card::make('Total Documents', $totalDocuments)
                ->description('Total number of documents')
                ->color('primary'),

            Card::make('Recent Documents', $recentDocuments)
                ->description('Documents added in the last month')
                ->color('info'),
            Card::make('Total Escalated Cases', $totalEscalatedCases)
                ->description('Total number of escalated cases')
                ->color('danger'),

            Card::make('Resolved Cases', $resolvedCases)
                ->description('Number of resolved cases')
                ->color('success'),
            Card::make('Total Lupon Cases', $totalLuponCases)
                ->description('Total number of Lupon cases')
                ->color('primary'),

            Card::make('Pending Cases', $pendingCases)
                ->description('Number of pending cases')
                ->color('warning'),
            Card::make('Total Medical Referrals', $totalReferrals)
                ->description('Total number of medical referrals')
                ->color('primary'),

            Card::make('Completed Referrals', $completedReferrals)
                ->description('Number of completed referrals')
                ->color('success'),
        ];
    }
} 