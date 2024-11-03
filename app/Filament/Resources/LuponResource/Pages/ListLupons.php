<?php

namespace App\Filament\Resources\LuponResource\Pages;

use App\Filament\Resources\LuponResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLupons extends ListRecords
{
    protected static string $resource = LuponResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
