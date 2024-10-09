<?php

namespace App\Filament\Admin\Resources\ProduksiResource\Pages;

use App\Filament\Admin\Resources\ProduksiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProduksis extends ListRecords
{
    protected static string $resource = ProduksiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
