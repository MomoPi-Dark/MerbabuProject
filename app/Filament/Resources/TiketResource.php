<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TiketResource\Pages;
use App\Filament\Resources\TiketResource\RelationManagers;
use App\Models\Tiket;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TiketResource extends Resource
{
    protected static ?string $model = Tiket::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
            ->relationship('user', 'name')
            ->required(),

        Forms\Components\Select::make('destinasi_id')
            ->relationship('destinasi', 'nama')
            ->required(),

        Forms\Components\DatePicker::make('tanggal')->required(),

        Forms\Components\TextInput::make('jumlah')->numeric()->required(),

        Forms\Components\TextInput::make('harga')->numeric()->required(),

        Forms\Components\Select::make('status')
            ->options([
                'menunggu' => 'Menunggu',
                'dibayar' => 'Dibayar',
                'dibatalkan' => 'Dibatalkan',
            ])
            ->default('menunggu'),

        Forms\Components\FileUpload::make('qr_code')
            ->image()
            ->directory('qr_codes'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListTikets::route('/'),
            'create' => Pages\CreateTiket::route('/create'),
            'edit' => Pages\EditTiket::route('/{record}/edit'),
        ];
    }
}
