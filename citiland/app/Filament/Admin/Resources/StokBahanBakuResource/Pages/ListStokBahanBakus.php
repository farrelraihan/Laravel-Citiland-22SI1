<?php

namespace App\Filament\Admin\Resources\StokBahanBakuResource\Pages;

use App\Filament\Admin\Resources\StokBahanBakuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStokBahanBakus extends ListRecords
{
    protected static string $resource = StokBahanBakuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
