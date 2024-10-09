<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ReturResource\Pages;
use App\Filament\Admin\Resources\ReturResource\RelationManagers;
use App\Models\Retur;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReturResource extends Resource
{
    protected static ?string $model = Retur::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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

                Forms\Components\TextInput::make('NomorNota')
                    ->label('Nomor Nota')
                    ->required()
                    ->placeholder('Nomor Nota'),

                Forms\Components\TextInput::make('NamaSupplier')
                    ->label('Nama Supplier')
                    ->required()
                    ->placeholder('Nama Supplier'),

                Forms\Components\TextInput::make('JumlahRetur')
                    ->label('Jumlah Retur')
                    ->required()
                    ->placeholder('Jumlah Retur'),

                Forms\Components\TextInput::make('HargaBahanBaku')
                    ->label('Harga Bahan Baku')
                    ->required()
                    ->placeholder('Harga Bahan Baku'),

                Forms\Components\DateTimePicker::make('TanggalRetur')
                    ->label('Tanggal Retur')
                    ->required()
                    ->placeholder('Tanggal Retur'),
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

                Tables\Columns\TextColumn::make('NomorNota')
                    ->label('Nomor Nota')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('NamaSupplier')
                    ->label('Nama Supplier')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('JumlahRetur')
                    ->label('Jumlah Retur')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('HargaBahanBaku')
                    ->label('Harga Bahan Baku')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('TanggalRetur')
                    ->label('Tanggal Retur')
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
            'index' => Pages\ListReturs::route('/'),
            'create' => Pages\CreateRetur::route('/create'),
            'edit' => Pages\EditRetur::route('/{record}/edit'),
        ];
    }
}
