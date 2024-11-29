<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use App\Models\StokBahanBaku;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class LowStockAlertWidget extends BaseWidget
{
    protected static ?string $heading = 'Stok Menipis';

    protected function getTableQuery(): Builder
    {
        return StokBahanBaku::query()
            ->select('KodeBahanBaku', 'NamaBahanBaku', 'JumlahBahanBaku')
            ->where('JumlahBahanBaku', '<', 100) // Adjust the threshold as needed
            ->orderBy('JumlahBahanBaku', 'asc');
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('KodeBahanBaku')->label('Stock Code'),
            TextColumn::make('NamaBahanBaku')->label('Stock Name'),
            TextColumn::make('JumlahBahanBaku')->label('Quantity'),
        ];
    }
}