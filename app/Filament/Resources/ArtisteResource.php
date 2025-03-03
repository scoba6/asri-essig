<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArtisteResource\Pages;
use App\Filament\Resources\ArtisteResource\RelationManagers;
use App\Models\Artiste;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArtisteResource extends Resource
{
    protected static ?string $model = Artiste::class;
    protected ?string $maxContentWidth = 'full';
    protected static ?string $navigationGroup = 'CULTURE';
    protected static ?string $navigationLabel = 'Artistes';
    protected static ?int $navigationSort =1;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
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
            'index' => Pages\ListArtistes::route('/'),
            'create' => Pages\CreateArtiste::route('/create'),
            'edit' => Pages\EditArtiste::route('/{record}/edit'),
        ];
    }
}
