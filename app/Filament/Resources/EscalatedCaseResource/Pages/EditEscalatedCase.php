<?php

namespace App\Filament\Resources\EscalatedCaseResource\Pages;

use App\Filament\Resources\EscalatedCaseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEscalatedCase extends EditRecord
{
    protected static string $resource = EscalatedCaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
