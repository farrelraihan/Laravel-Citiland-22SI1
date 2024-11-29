<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\AdminResource\Pages;
use App\Filament\Admin\Resources\AdminResource\RelationManagers;
use App\Models\Admin;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Notifications\Notification;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AdminImport;

class AdminResource extends Resource
{
    protected static ?string $model = Admin::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Pengelolaan Admin';

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
                    ->placeholder('Kode Admin'),
                
                Forms\Components\TextInput::make('lastPrimaryId')
                    ->label('Last Primary ID')
                    ->default(Admin::getLastPrimaryId())
                    ->disabled(),


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
            ])
            ->headerActions([
       
                Tables\Actions\Action::make('importExcel')
                    ->label('Import Excel')
                    ->action(function (array $data) {
                        $filePath = storage_path('app/public/' . $data['file']);
                        Excel::import(new AdminImport, $filePath);
                        
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
                    ->modalHeading('Import Data Admin')
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
            'index' => Pages\ListAdmins::route('/'),
            'create' => Pages\CreateAdmin::route('/create'),
            'edit' => Pages\EditAdmin::route('/{record}/edit'),
        ];
    }

}

