<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PembelianResource\Pages;
use App\Imports\PembelianImport;
use App\Models\Pembelian;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;
use Livewire\Attributes\Reactive;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Supplier;
use App\Models\Jenis;

class PembelianResource extends Resource
{
    protected static ?string $model = Pembelian::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $navigationGroup = 'Pengelolaan Transaksi';

    public static function getModelLabel(): string
    {
        return 'Pembelian';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Pembelian';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('KodePembelian')
                ->label('Kode Pembelian')
                ->required(),
                
            Forms\Components\TextInput::make('lastPrimaryId')
                ->label('Last Primary ID')
                ->default(Pembelian::getLastPrimaryId())
                ->disabled(),

            Forms\Components\Select::make('KodeJenisBahanBaku')
                ->label('Jenis Bahan Baku')
                ->options(function () {
                    return Jenis::all()->pluck('full_label', 'KodeJenisBahanBaku');
                })
                ->reactive()
                ->searchable()
                ->required()
                ->afterStateUpdated(function ($state, callable $set) {
                    if ($state) {
                        $currentStock = \App\Models\StokBahanBaku::where('KodeJenisBahanBaku', $state)
                            ->sum('JumlahBahanBaku');
                        $set('current_stock', $currentStock);
                    }
            }),
            
            Forms\Components\TextInput::make('current_stock')
            ->label('Current Stock')
            ->disabled()
            ->default(0), // Set default to 0
           

            Forms\Components\TextInput::make('JumlahPembelian')
                ->label('Jumlah Pembelian')
                ->required()
                ->numeric(),

                Forms\Components\Select::make('kode_supplier')
                ->label('Supplier')
                ->options(function () {
                    return Supplier::all()->pluck('full_label', 'kode_supplier');
                })
                ->searchable()
                ->required(),

            Forms\Components\TextInput::make('HargaBahanBaku')
                ->label('Harga Bahan Baku')
                ->required()
                ->numeric(),

            Forms\Components\DateTimePicker::make('TanggalPembelian')
                ->label('Tanggal Pembelian')
                ->required(),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            Tables\Columns\TextColumn::make('KodePembelian')
                ->label('Kode Pembelian')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('jenis.JenisBahanBaku')
                ->label('Jenis Bahan Baku')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('JumlahPembelian')
                ->label('Jumlah Pembelian')
                ->numeric()
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('supplier.nama_supplier')
                ->label('Supplier')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('HargaBahanBaku')
                ->label('Harga Pembelian')
                ->money('IDR', true)
                ->sortable(),

            Tables\Columns\TextColumn::make('TanggalPembelian')
                ->label('Tanggal Pembelian')
                ->dateTime()
                ->searchable()
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
                        Excel::import(new PembelianImport, $filePath);
                        
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
                    ->modalHeading('Import Data Pembelian')
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
            'index' => Pages\ListPembelians::route('/'),
            'create' => Pages\CreatePembelian::route('/create'),
            'edit' => Pages\EditPembelian::route('/{record}/edit'),
        ];
    }
}
