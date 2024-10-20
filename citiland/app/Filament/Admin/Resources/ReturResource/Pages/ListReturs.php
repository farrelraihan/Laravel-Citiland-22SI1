<?php

namespace App\Filament\Admin\Resources\ReturResource\Pages;

use App\Filament\Admin\Resources\ReturResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReturs extends ListRecords
{
    protected static string $resource = ReturResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
