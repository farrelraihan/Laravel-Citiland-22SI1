<?php

namespace App\Filament\Admin\Resources\PemakaianResource\Pages;

use App\Filament\Admin\Resources\PemakaianResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPemakaians extends ListRecords
{
    protected static string $resource = PemakaianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
