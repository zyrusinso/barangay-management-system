<?php

namespace App\Filament\Resources\MedicalReferralResource\Pages;

use App\Filament\Resources\MedicalReferralResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMedicalReferrals extends ListRecords
{
    protected static string $resource = MedicalReferralResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
