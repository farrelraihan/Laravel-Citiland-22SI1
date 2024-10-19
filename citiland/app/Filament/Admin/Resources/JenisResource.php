<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\JenisResource\Pages;
use App\Filament\Admin\Resources\JenisResource\RelationManagers;
use App\Models\Jenis;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JenisResource extends Resource
{
    protected static ?string $model = Jenis::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('KodeJeisBahanBaku')
                    ->label('Kode Bahan Baku')
                    ->required(),
                Forms\Components\TextInput::make('JenisBahanBaku')
                    ->label('Jenis Bahan Baku')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('KodeJenisBahanBaku')
                    ->primary()
                    ->searchable()
                    ->label('Kode Jenis Bahan Baku'),
                Tables\Columns\TextColumn::make('JenisBahanBaku')
                    ->searchable()
                    ->label('Jenis Bahan Baku'),
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
            'index' => Pages\ListJenis::route('/'),
            'create' => Pages\CreateJenis::route('/create'),
            'edit' => Pages\EditJenis::route('/{record}/edit'),
        ];
    }
}
