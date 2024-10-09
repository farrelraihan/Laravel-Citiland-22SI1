<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PembelianResource\Pages;
use App\Filament\Admin\Resources\PembelianResource\RelationManagers;
use App\Models\Pembelian;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PembelianResource extends Resource
{
    protected static ?string $model = Pembelian::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                Forms\Components\TextInput::make('KodeBahanBaku')
                    ->label('Kode Bahan Baku')
                    ->required()
                    ->placeholder('Kode Bahan Baku'),

                Forms\Components\TextInput::make('NamaBahanBaku')
                    ->label('Nama Bahan Baku')
                    ->required()
                    ->placeholder('Nama Bahan Baku'),

                Forms\Components\TextInput::make('JenisBahanBaku')
                    ->label('Jenis Bahan Baku')
                    ->required()
                    ->placeholder('Jenis Bahan Baku'),

                Forms\Components\TextInput::make('JumlahPembelian')
                    ->label('Jumlah Pembelian')
                    ->required()
                    ->placeholder('Jumlah Pembelian'),

                Forms\Components\TextInput::make('UnitBahanBaku')
                    ->label('Unit Bahan Baku')
                    ->required()
                    ->placeholder('Unit Bahan Baku'),

                Forms\Components\TextInput::make('NamaSupplier')
                    ->label('Nama Supplier')
                    ->required()
                    ->placeholder('Nama Supplier'),

                Forms\Components\TextInput::make('NomorNota')
                    ->label('Nomor Nota')
                    ->required()
                    ->placeholder('Nomor Nota'),

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
                Tables\Columns\TextColumn::make('KodeBahanBaku')
                    ->label('Kode Bahan Baku')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('NamaBahanBaku')
                    ->label('Nama Bahan Baku')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('JenisBahanBaku')
                    ->label('Jenis Bahan Baku')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('JumlahPembelian')
                    ->label('Jumlah Pembelian')
                    ->sortable(),

                Tables\Columns\TextColumn::make('UnitBahanBaku')
                    ->label('Unit Bahan Baku'),

                Tables\Columns\TextColumn::make('NamaSupplier')
                    ->label('Nama Supplier')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('NomorNota')
                    ->label('Nomor Nota')
                    ->searchable(),

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
