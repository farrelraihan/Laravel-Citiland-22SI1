<?php

namespace App\Filament\Admin\Resources\ProduksiResource\Pages;

use App\Filament\Admin\Resources\ProduksiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProduksi extends EditRecord
{
    protected static string $resource = ProduksiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
