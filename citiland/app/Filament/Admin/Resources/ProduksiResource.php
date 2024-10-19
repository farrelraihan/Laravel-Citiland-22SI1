<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProduksiResource\Pages;
use App\Filament\Admin\Resources\ProduksiResource\RelationManagers;
use App\Models\Produksi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use function Laravel\Prompts\form;

class ProduksiResource extends Resource
{
    protected static ?string $model = Produksi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel(): string
    {
        return 'Produksi';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Produksi';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                forms\Components\TextInput::make('KodeProduksi')
                    ->label('Kode Produksi')
                    ->required()
                    ->placeholder('Kode Produksi'),

                Forms\Components\TextInput::make('KodeBarang')
                    ->label('Kode Barang')
                    ->required()
                    ->placeholder('Kode Barang'),

                Forms\Components\TextInput::make('NamaBarang')
                    ->label('Nama Barang')
                    ->required()
                    ->placeholder('Nama Barang'),

               
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('KodeProduksi')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('KodeBarang')
    
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('NamaBarang')
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
            'index' => Pages\ListProduksis::route('/'),
            'create' => Pages\CreateProduksi::route('/create'),
            'edit' => Pages\EditProduksi::route('/{record}/edit'),
        ];
    }
}
