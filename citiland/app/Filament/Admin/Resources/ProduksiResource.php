<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProduksiResource\Pages;
use App\Imports\ProduksiImport;
use App\Models\Produksi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;
use Maatwebsite\Excel\Facades\Excel;

class ProduksiResource extends Resource
{
    protected static ?string $model = Produksi::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationGroup = 'Transaction Management';

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
            Forms\Components\TextInput::make('KodeProduksi')
                ->label('Kode Produksi')
                ->required(),
            
            Forms\Components\TextInput::make('lastPrimaryId')
                ->label('Last Primary ID')
                ->default(Produksi::getLastPrimaryId())
                ->disabled(),

            Forms\Components\TextInput::make('KodeBarang')
                ->label('Kode Barang')
                ->required(),

            Forms\Components\TextInput::make('NamaBarang')
                ->label('Nama Barang')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            Tables\Columns\TextColumn::make('KodeProduksi')
                ->label('Kode Produksi')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('KodeBarang')
                ->label('Kode Barang')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('NamaBarang')
                ->label('Nama Barang')
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
                        Excel::import(new ProduksiImport, $filePath);
                        
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
                    ->modalHeading('Import Data Produksi')
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
            'index' => Pages\ListProduksis::route('/'),
            'create' => Pages\CreateProduksi::route('/create'),
            'edit' => Pages\EditProduksi::route('/{record}/edit'),
        ];
    }
}
