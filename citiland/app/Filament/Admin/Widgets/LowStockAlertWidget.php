<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use App\Models\StokBahanBaku;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class LowStockAlertWidget extends BaseWidget
{
    protected static ?string $heading = 'Low Stock Alert';

    protected function getTableQuery(): Builder
    {
        return StokBahanBaku::query()
            ->select('KodebahanBaku', 'NamaBahanBaku', 'JumlahBahanBaku')
            ->where('JumlahBahanBaku', '<', 10) // Adjust the threshold as needed
            ->orderBy('JumlahBahanBaku', 'asc');
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('KodebahanBaku')->label('Stock Code'),
            TextColumn::make('NamaBahanBaku')->label('Stock Name'),
            TextColumn::make('JumlahBahanBaku')->label('Quantity'),
        ];
    }
}