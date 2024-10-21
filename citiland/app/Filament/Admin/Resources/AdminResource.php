<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\AdminResource\Pages;
use App\Filament\Admin\Resources\AdminResource\RelationManagers;
use App\Models\Admin;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdminResource extends Resource
{
    protected static ?string $model = Admin::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel(): string
    {
        return 'Admin';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Admin';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kodeAdmin')
                    ->label('Kode Admin')
                    ->required()
                    ->default(function () {
                        // Generate a unique kodeAdmin (e.g., 'ADM00001', 'ADM00002', etc.)
                        $latestAdmin = Admin::latest('kodeAdmin')->first();
                        $latestKodeAdmin = $latestAdmin ? $latestAdmin->kodeAdmin : 'ADM00000';
                        $newKodeAdmin = 'ADM' . str_pad(intval(substr($latestKodeAdmin, 3)) + 1, 5, '0', STR_PAD_LEFT);
                        return $newKodeAdmin; //balikin aja lg ke manual input. error smw
                    })
                  
                    ->placeholder('Kode Admin'),


                Forms\Components\TextInput::make('Nama')
                    ->label('Name')
                    ->required()
                    ->placeholder('Name'),

                Forms\Components\TextInput::make('NoHP')
                    ->label('NoHP')
                    ->required()
                    ->placeholder('NoHP'),

                Forms\Components\TextInput::make('Email')
                    ->label('Email')
                    ->required()
                    ->placeholder('Email'),

       
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kodeAdmin')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('Nama')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('NoHP')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('Email')
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
            'index' => Pages\ListAdmins::route('/'),
            'create' => Pages\CreateAdmin::route('/create'),
            'edit' => Pages\EditAdmin::route('/{record}/edit'),
        ];
    }

    static function create(array $data): Admin 
    {
        $admin = new Admin();
        $latestAdmin = Admin::latest('kodeAdmin')->first();
        $latestKodeAdmin = $latestAdmin ? $latestAdmin->kodeAdmin : 'ADM00000';
        $newKodeAdmin = 'ADM' . str_pad(intval(substr($latestKodeAdmin, 3)) + 1, 5, '0', STR_PAD_LEFT);
        $data['kodeAdmin'] = $newKodeAdmin;
        $admin->create($data);

        return $admin;
    } //hapus all function bangsat ini
}

