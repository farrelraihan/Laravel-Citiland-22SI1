<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PemakaianResource\Pages;
use App\Filament\Admin\Resources\PemakaianResource\RelationManagers;
use App\Models\Pemakaian;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PemakaianResource extends Resource
{
    protected static ?string $model = Pemakaian::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel(): string
    {
        return 'Pemakaian';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Pemakaian';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('KodePemakaian')
                    ->label('Kode Pemakaian')
                    ->required()
                    ->placeholder('Kode Pemakaian'),
             

                Forms\Components\TextInput::make('KodeJenisBahanBaku')
                    ->label('Kode Jenis Bahan Baku')
                    ->required()
                    ->placeholder('Kode Jenis Bahan Baku'),

                Forms\Components\TextInput::make('JumlahPemakaian')
                    ->label('Jumlah Pemakaian')
                    ->required()
                    ->placeholder('Jumlah Pemakaian'),

                Forms\Components\TextInput::make('UnitBahanBaku')
                    ->label('Unit Bahan Baku')
                    ->required()
                    ->placeholder('Unit Bahan Baku'),

                Forms\Components\DateTimePicker::make('TanggalPemakaian')
                    ->label('Tanggal Pemakaian')
                    ->required()
                    ->placeholder('Tanggal Pemakaian'),
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
                
                                Tables\Columns\TextColumn::make('UnitBahanBaku')
                                    ->label('Unit Bahan Baku')
                                    ->searchable()
                                    ->sortable(),
                
                                Tables\Columns\TextColumn::make('JumlahPemakaian')
                                    ->label('Jumlah Pemakaian')
                                    ->searchable()
                                    ->sortable(),
                
                                Tables\Columns\TextColumn::make('SaldoAwalBulan')
                                    ->label('Saldo Awal Bulan')
                                    ->searchable()
                                    ->sortable(),
                
                                Tables\Columns\TextColumn::make('SaldoAkhirBulan')
                                    ->label('Saldo Akhir Bulan')
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
            'index' => Pages\ListPemakaians::route('/'),
            'create' => Pages\CreatePemakaian::route('/create'),
            'edit' => Pages\EditPemakaian::route('/{record}/edit'),
        ];
    }
}
