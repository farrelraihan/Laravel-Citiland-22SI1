<?php

namespace App\Filament\Admin\Resources\StokBahanBakuResource\Pages;

use App\Filament\Admin\Resources\StokBahanBakuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStokBahanBaku extends EditRecord
{
    protected static string $resource = StokBahanBakuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
