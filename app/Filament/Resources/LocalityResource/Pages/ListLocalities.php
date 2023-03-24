<?php

namespace App\Filament\Resources\LocalityResource\Pages;

use App\Filament\Resources\LocalityResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLocalities extends ListRecords
{
    protected static string $resource = LocalityResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
