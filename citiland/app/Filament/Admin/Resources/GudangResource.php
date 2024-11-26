<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\GudangResource\Pages;
use App\Imports\GudangImport;
use App\Models\Gudang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;
use Maatwebsite\Excel\Facades\Excel;

class GudangResource extends Resource
{
    protected static ?string $model = Gudang::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationGroup = 'Admin Management';

    public static function getModelLabel(): string
    {
        return 'Gudang';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Gudang';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kodeGudang')
                    ->label('Kode Gudang')
                    ->required(),

                Forms\Components\TextInput::make('lastPrimaryId')
                    ->label('Last Primary ID')
                    ->default(Gudang::getLastPrimaryId())
                    ->disabled(),

                Forms\Components\TextInput::make('nama_Gudang')
                    ->label('Nama Gudang')
                    ->required(),
                Forms\Components\TextInput::make('noHP_Gudang')
                    ->label('No HP Gudang')
                    ->required(),
                Forms\Components\TextInput::make('email_Gudang')
                    ->label('Email Gudang')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kodeGudang')
                    ->searchable()
                    ->label('Kode Gudang'),
                    
                Tables\Columns\TextColumn::make('nama_Gudang')
                    ->searchable()
                    ->label('Nama Gudang'),
                Tables\Columns\TextColumn::make('noHP_Gudang')
                    ->searchable()
                    ->label('No HP Gudang'),
                Tables\Columns\TextColumn::make('email_Gudang')
                    ->searchable()
                    ->label('Email Gudang'),
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
                        Excel::import(new GudangImport, $filePath);
                        
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
                    ->modalHeading('Import Data Gudang')
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
            'index' => Pages\ListGudangs::route('/'),
            'create' => Pages\CreateGudang::route('/create'),
            'edit' => Pages\EditGudang::route('/{record}/edit'),
        ];
    }
}
