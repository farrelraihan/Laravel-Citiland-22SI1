<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SupplierResource\Pages;
use App\Filament\Admin\Resources\SupplierResource\RelationManagers;
use App\Models\Supplier;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SupplierResource extends Resource
{
    protected static ?string $model = Supplier::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kode_Supplier')
                    ->label('Kode Supplier')
                    ->required(),

                Forms\Components\TextInput::make('nama_supplier')
                    ->label('Nama Supplier')
                    ->required(),
                Forms\Components\TextInput::make('noHP_supplier')
                    ->label('No HP Supplier')
                    ->required(),
                Forms\Components\TextInput::make('email_supplier')
                    ->label('Email Supplier')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode_Supplier')
                    ->primary()
                    ->searchable()
                    ->label('Kode Supplier'),
                    
                Tables\Columns\TextColumn::make('nama_supplier')
                    ->primary()
                    ->searchable()
                    ->label('Nama Supplier'),
                Tables\Columns\TextColumn::make('noHP_supplier')
                    ->searchable()
                    ->label('No HP Supplier'),
                Tables\Columns\TextColumn::make('email_supplier')
                    ->searchable()
                    ->label('Email Supplier'),
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
            'index' => Pages\ListSuppliers::route('/'),
            'create' => Pages\CreateSupplier::route('/create'),
            'edit' => Pages\EditSupplier::route('/{record}/edit'),
        ];
    }
}
