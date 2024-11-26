<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SupplierResource\Pages;
use App\Imports\SupplierImport;
use App\Models\Supplier;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;
use Maatwebsite\Excel\Facades\Excel;

class SupplierResource extends Resource
{
    protected static ?string $model = Supplier::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    protected static ?string $navigationGroup = 'Admin Management';

    public static function getModelLabel(): string
    {
        return 'Supplier';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Supplier';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kode_supplier')
                    ->label('Kode Supplier')
                    ->required(),
                
                Forms\Components\TextInput::make('lastPrimaryId')
                    ->label('Last Primary ID')
                    ->default(Supplier::getLastPrimaryId())
                    ->disabled(),

                Forms\Components\TextInput::make('nama_supplier')
                    ->label('Nama Supplier')
                    ->required(),
                Forms\Components\TextInput::make('noHP_supplier')
                    ->label('No HP Supplier')
                    ->required(),
                Forms\Components\TextInput::make('alamat_supplier')
                    ->label('Alamat Supplier')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode_supplier')
                    ->searchable()
                    ->label('Kode Supplier'),
                    
                Tables\Columns\TextColumn::make('nama_supplier')
                    ->searchable()
                    ->label('Nama Supplier'),
                Tables\Columns\TextColumn::make('noHP_supplier')
                    ->searchable()
                    ->label('No HP Supplier'),
                Tables\Columns\TextColumn::make('alamat_supplier')
                    ->searchable()
                    ->label('Alamat Supplier'),
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
                        Excel::import(new SupplierImport, $filePath);
                        
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
                    ->modalHeading('Import Data Supplier')
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
            'index' => Pages\ListSuppliers::route('/'),
            'create' => Pages\CreateSupplier::route('/create'),
            'edit' => Pages\EditSupplier::route('/{record}/edit'),
        ];
    }
}
