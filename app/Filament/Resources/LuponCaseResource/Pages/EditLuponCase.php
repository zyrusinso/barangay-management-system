<?php

namespace App\Filament\Resources\LuponCaseResource\Pages;

use App\Filament\Resources\LuponCaseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLuponCase extends EditRecord
{
    protected static string $resource = LuponCaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
