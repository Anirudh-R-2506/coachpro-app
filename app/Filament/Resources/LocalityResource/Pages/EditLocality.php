<?php

namespace App\Filament\Resources\LocalityResource\Pages;

use App\Filament\Resources\LocalityResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLocality extends EditRecord
{
    protected static string $resource = LocalityResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
