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
use Maatwebsite\Excel\Facades\Excel;

class PembelianResource extends Resource
{
    protected static ?string $model = Pembelian::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $navigationGroup = 'Transaction Management';

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
                    ->required()
                    ->placeholder('Kode Pembelian'),

                Forms\Components\TextInput::make('KodeJenisBahanBaku')
                    ->label('Kode Jenis Bahan Baku')
                    ->required()
                    ->placeholder('Kode Jenis Bahan Baku'),

                Forms\Components\TextInput::make('JumlahPembelian')
                    ->label('Jumlah Pembelian')
                    ->required()
                    ->placeholder('Jumlah Pembelian'),

                Forms\Components\TextInput::make('UnitBahanBaku')
                    ->label('Unit Bahan Baku')
                    ->required()
                    ->placeholder('Unit Bahan Baku'),

                Forms\Components\TextInput::make('kode_supplier')
                    ->label('Kode Supplier')
                    ->required()
                    ->placeholder('Kode Supplier'),

                Forms\Components\TextInput::make('HargaBahanBaku')
                    ->label('Harga Bahan Baku')
                    ->required()
                    ->placeholder('Harga Bahan Baku'),

                Forms\Components\DateTimePicker::make('TanggalPembelian')
                    ->label('Tanggal Pembelian')
                    ->required()
                    ->placeholder('Tanggal Pembelian'),
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

                Tables\Columns\TextColumn::make('KodeJenisBahanBaku')
                    ->label('Kode Jenis Bahan Baku')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('JumlahPembelian')
                    ->label('Jumlah Pembelian')
                    ->sortable(),

                Tables\Columns\TextColumn::make('UnitBahanBaku')
                    ->label('Unit Bahan Baku'),

                Tables\Columns\TextColumn::make('kode_supplier')
                    ->label('Kode Supplier')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('HargaBahanBaku')
                    ->label('Harga Bahan Baku')
                    ->sortable(),

                Tables\Columns\TextColumn::make('TanggalPembelian')
                    ->label('Tanggal Pembelian')
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
