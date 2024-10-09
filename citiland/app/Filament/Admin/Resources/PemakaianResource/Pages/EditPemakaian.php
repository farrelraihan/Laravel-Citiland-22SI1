<?php

namespace App\Filament\Admin\Resources\PemakaianResource\Pages;

use App\Filament\Admin\Resources\PemakaianResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPemakaian extends EditRecord
{
    protected static string $resource = PemakaianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
