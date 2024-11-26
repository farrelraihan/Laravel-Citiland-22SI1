<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PemakaianResource\Pages;
use App\Imports\PemakaianImport;
use App\Models\Pemakaian;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Jenis;

class PemakaianResource extends Resource
{
    protected static ?string $model = Pemakaian::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-trending-down';

    protected static ?string $navigationGroup = 'Transaction Management';

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
                ->required(),
            
            Forms\Components\TextInput::make('lastPrimaryId')
                ->label('Last Primary ID')
                ->default(Pemakaian::getLastPrimaryId())
                ->disabled(),

            Forms\Components\Select::make('KodeJenisBahanBaku')
                ->label('Jenis Bahan Baku')
                ->options(function () {
                    return Jenis::all()->pluck('full_label', 'KodeJenisBahanBaku');
                })
                ->reactive()
                ->searchable()
                ->required()
                ->afterStateUpdated(function ($state, callable $set) {
                    if ($state) {
                        $currentStock = \App\Models\StokBahanBaku::where('KodeJenisBahanBaku', $state)
                            ->sum('JumlahBahanBaku');
                        $set('current_stock', $currentStock);
                    }
            }),

            Forms\Components\TextInput::make('current_stock')
            ->label('Current Stock')
            ->disabled()
            ->default(0), // Set default to 0

            Forms\Components\TextInput::make('JumlahPemakaian')
                ->label('Jumlah Pemakaian')
                ->numeric()
                ->required(),

            Forms\Components\DateTimePicker::make('TanggalPemakaian')
                ->label('Tanggal Pemakaian')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            Tables\Columns\TextColumn::make('KodePemakaian')
                ->label('Kode Pemakaian')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('KodeJenisBahanBaku')
                ->label('Kode Jenis Bahan Baku')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('JumlahPemakaian')
                ->label('Jumlah Pemakaian')
                ->sortable(),

            Tables\Columns\TextColumn::make('TanggalPemakaian')
                ->label('Tanggal Pemakaian')
                ->dateTime()
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
                        Excel::import(new PemakaianImport, $filePath);
                        
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
                    ->modalHeading('Import Data Pemakaian')
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
            'index' => Pages\ListPemakaians::route('/'),
            'create' => Pages\CreatePemakaian::route('/create'),
            'edit' => Pages\EditPemakaian::route('/{record}/edit'),
        ];
    }
}
