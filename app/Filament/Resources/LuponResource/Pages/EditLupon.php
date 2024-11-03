<?php

namespace App\Filament\Resources\LuponResource\Pages;

use App\Filament\Resources\LuponResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLupon extends EditRecord
{
    protected static string $resource = LuponResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
