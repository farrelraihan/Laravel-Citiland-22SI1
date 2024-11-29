<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ReturResource\Pages;
use App\Imports\ReturImport;
use App\Models\Retur;
use App\Models\Pembelian;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Jenis;
use App\Models\Supplier;

class ReturResource extends Resource
{
    protected static ?string $model = Retur::class;
    protected static ?string $navigationIcon = 'heroicon-o-arrow-path';
    protected static ?string $navigationGroup = 'Pengelolaan Transaksi';

    public static function getModelLabel(): string
    {
        return 'Retur';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Retur';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('KodeRetur')
                ->label('Kode Retur')
                ->required(),
            
            Forms\Components\TextInput::make('lastPrimaryId')
                ->label('Last Primary ID')
                ->default(Retur::getLastPrimaryId())
                ->disabled(),

            Forms\Components\Select::make('KodePembelian')
                ->label('Kode Pembelian')
                ->options(Pembelian::pluck('KodePembelian', 'KodePembelian'))
                ->reactive()
                ->searchable()
                ->required()
                ->afterStateUpdated(function ($state, callable $set) {
                    $pembelian = Pembelian::find($state);
                    if ($pembelian) {
                        $currentStock = \App\Models\StokBahanBaku::where('KodeJenisBahanBaku', $pembelian->KodeJenisBahanBaku)
                            ->sum('JumlahBahanBaku');
                        $set('current_stock', $currentStock);
                        $set('JumlahBahanBaku', $pembelian->JumlahPembelian);
                        $set('HargaRetur', $pembelian->HargaBahanBaku);
                        
                        $set('supplier_name', $pembelian->supplier->nama_supplier ?? '');
                        $set('jenis_bahan_baku_name', $pembelian->jenisBahanBaku->JenisBahanBaku ?? '');
                    }
                }),

            Forms\Components\TextInput::make('supplier_name')
                ->label('Supplier Name')
                ->disabled(),

            
            Forms\Components\TextInput::make('JumlahBahanBaku')
                ->label('Jumlah Bahan Baku')
                ->numeric()
                ->required(),


            Forms\Components\TextInput::make('current_stock')
                ->label('Current Stock')
                ->disabled()
                ->default(0), // Set default to 0


            Forms\Components\TextInput::make('HargaRetur')
                ->label('Harga Retur')
                ->numeric()
                ->required(),

            Forms\Components\DateTimePicker::make('TanggalRetur')
                ->label('Tanggal Retur')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            Tables\Columns\TextColumn::make('KodeRetur')
                ->label('Kode Retur')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('KodePembelian')
                ->label('Kode Pembelian')
                ->searchable()
                ->sortable(),
            
            
            Tables\Columns\TextColumn::make('pembelian.jenis.JenisBahanBaku') // Change to pembelian.jenisBahanBaku.JenisBahanBaku
                ->label('Jenis Bahan Baku')
                ->searchable()
                ->sortable(),
            
            Tables\Columns\TextColumn::make('pembelian.supplier.nama_supplier') // Change to pembelian.supplier.nama_supplier
                ->label('Supplier')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('JumlahBahanBaku')
                ->label('Jumlah Bahan Baku')
                ->sortable(),

            Tables\Columns\TextColumn::make('HargaRetur')
                ->label('Harga Retur')
                ->money('IDR', true)
                ->sortable(),

            Tables\Columns\TextColumn::make('TanggalRetur')
                ->label('Tanggal Retur')
                ->dateTime()
                ->sortable(),

 
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                Tables\Actions\Action::make('importExcel')
                    ->label('Import Excel')
                    ->action(function (array $data) {
                        $filePath = storage_path('app/public/' . $data['file']);
                        Excel::import(new ReturImport, $filePath);
                        
                        Notification::make()
                            ->title('Data berhasil diimpor!')
                            ->success()
                            ->send();
                    })
                    ->form([
                        FileUpload::make('file')
                            ->label('Pilih File Excel')
                            ->disk('public')
                            ->directory('imports')
                            ->acceptedFileTypes([
                                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                                'application/vnd.ms-excel'
                            ])
                            ->required(),
                    ])
                    ->modalHeading('Import Data Retur')
                    ->modalButton('Import')
                    ->color('success')
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReturs::route('/'),
            'create' => Pages\CreateRetur::route('/create'),
            'edit' => Pages\EditRetur::route('/{record}/edit'),
        ];
    }
}
