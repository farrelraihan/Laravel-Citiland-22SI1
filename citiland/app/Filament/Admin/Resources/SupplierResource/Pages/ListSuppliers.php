<?php

namespace App\Filament\Admin\Resources\SupplierResource\Pages;

use App\Filament\Admin\Resources\SupplierResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuppliers extends ListRecords
{
    protected static string $resource = SupplierResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('cetak_laporanSupplier') //nama Fungsi yang dipanggil
            ->label('Cetak Laporan Supplier') //label yang ditampilkan di button
            ->icon('heroicon-o-printer')
            ->action(fn() => static::cetakLaporan()) // A99
            ->requiresConfirmation()
            ->modalHeading('Cetak Laporan Supplier')
            ->modalSubheading('Apakah Anda yakin ingin mencetak laporan Supplier?'),
         


        ];
    }

    public static function cetakLaporan() // A99
    {
        // Ambil data pengguna
        $data = \App\Models\Supplier::all();
        // Load view untuk cetak PDF
        $pdf = \PDF::loadView('laporan.cetakSupplier', ['data' => $data]);
        // Unduh file PDF
        return response()->streamDownload(fn() => print($pdf->output()), 'laporan-supplier.pdf');
    }






}