<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\StokBahanBakuResource\Pages;
use App\Imports\StokImport;
use App\Models\StokBahanBaku;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;
use Maatwebsite\Excel\Facades\Excel;

class StokBahanBakuResource extends Resource
{
    protected static ?string $model = StokBahanBaku::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?string $navigationGroup = 'Pengelolaan Inventaris';

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
            Forms\Components\TextInput::make('KodeBahanBaku')
                ->label('Kode Bahan Baku')
                ->required(),

            Forms\Components\TextInput::make('lastPrimaryId')
            ->label('Last Primary ID')
            ->default(StokBahanBaku::getLastPrimaryId())
            ->disabled(),

            Forms\Components\Select::make('KodeJenisBahanBaku')
                ->label('Jenis Bahan Baku')
                ->relationship('jenis', 'JenisBahanBaku')
                ->required(),

            Forms\Components\TextInput::make('NamaBahanBaku')
                ->label('Nama Bahan Baku')
                ->required(),

            Forms\Components\TextInput::make('JumlahBahanBaku')
                ->label('Jumlah Bahan Baku')
                ->numeric()
                ->required(),
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

            Tables\Columns\TextColumn::make('KodeJenisBahanBaku')
                ->label('Kode Jenis Bahan Baku')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('NamaBahanBaku')
                ->label('Nama Bahan Baku')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('JumlahBahanBaku')
                ->label('Jumlah Bahan Baku')
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
                        Excel::import(new StokImport, $filePath);
                        
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
                    ->modalHeading('Import Data Stok')
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
            'index' => Pages\ListStokBahanBakus::route('/'),
            'create' => Pages\CreateStokBahanBaku::route('/create'),
            'edit' => Pages\EditStokBahanBaku::route('/{record}/edit'),
        ];
    }
}
