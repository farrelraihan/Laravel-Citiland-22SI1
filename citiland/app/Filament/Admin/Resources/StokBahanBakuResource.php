<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\StokBahanBakuResource\Pages;
use App\Filament\Admin\Resources\StokBahanBakuResource\RelationManagers;
use App\Models\StokBahanBaku;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StokBahanBakuResource extends Resource
{
    protected static ?string $model = StokBahanBaku::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel(): string
    {
        return 'Stok';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Stok';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('KodebahanBaku')
                    ->label('Kode Stok Bahan Baku')
                    ->required()
                    ->placeholder('Kode Stok Bahan Baku'),

                    Forms\Components\TextInput::make('KodeJenisBahanBaku')
                    ->label('Kode Jenis Bahan Baku')
                    ->required()
                    ->placeholder('Kode Jenis Bahan Baku'),

                Forms\Components\TextInput::make('NamaBahanBaku')
                    ->label('Nama Bahan Baku')
                    ->required()
                    ->placeholder('Nama Bahan Baku'),

                Forms\Components\TextInput::make('UnitBahanBaku')
                    ->label('Unit Bahan Baku')
                    ->required()
                    ->placeholder('Unit Bahan Baku'),

                Forms\Components\TextInput::make('JumlahBBMasuk')
                    ->label('Jumlah BB Masuk')
                    ->required()
                    ->placeholder('Jumlah BB Masuk'),

                Forms\Components\TextInput::make('JumlahBBKeluar')
                    ->label('Jumlah BB Keluar')
                    ->required()
                    ->placeholder('Jumlah BB Keluar'),

                Forms\Components\TextInput::make('Jumlah_Min')
                    ->label('Jumlah Min')
                    ->required()
                    ->placeholder('Jumlah Min'),

                Forms\Components\TextInput::make('HargaBahanBaku')
                    ->label('Harga Bahan Baku')
                    ->required()
                    ->placeholder('Harga Bahan Baku'),

                Forms\Components\TextInput::make('JumlahBahanBaku')
                    ->label('Jumlah Bahan Baku')
                    ->required()
                    ->placeholder('Jumlah Bahan Baku'),

                Forms\Components\TextInput::make('PemakaianRataRata')
                    ->label('Pemakaian Rata Rata')
                    ->required()
                    ->placeholder('Pemakaian Rata Rata'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('KodebahanBaku')
                    ->label('Kode Stok Bahan Baku')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('KodeJenisBahanBaku')
                    ->label('Kode Jenis Bahan Baku')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('NamaBahanBaku')
                    ->label('Nama Bahan Baku')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('UnitBahanBaku')
                    ->label('Unit Bahan Baku')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('JumlahBBMasuk')
                    ->label('Jumlah BB Masuk')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('JumlahBBKeluar')
                    ->label('Jumlah BB Keluar')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('Jumlah_Min')
                    ->label('Jumlah Min')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('HargaBahanBaku')
                    ->label('Harga Bahan Baku')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('JumlahBahanBaku')
                    ->label('Jumlah Bahan Baku')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('PemakaianRataRata')
                    ->label('Pemakaian Rata Rata')
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
            'index' => Pages\ListStokBahanBakus::route('/'),
            'create' => Pages\CreateStokBahanBaku::route('/create'),
            'edit' => Pages\EditStokBahanBaku::route('/{record}/edit'),
        ];
    }
}
