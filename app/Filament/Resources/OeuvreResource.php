<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OeuvreResource\Pages;
use App\Filament\Resources\OeuvreResource\RelationManagers;
use App\Models\Oeuvre;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OeuvreResource extends Resource
{
    protected static ?string $model = Oeuvre::class;
    protected ?string $maxContentWidth = 'full';
    protected static ?string $navigationGroup = 'CULTURE';
    protected static ?string $navigationLabel = 'Oeuvres';
    protected static ?int $navigationSort =2;

    protected static ?string $navigationIcon = 'heroicon-o-square-3-stack-3d';

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
            'index' => Pages\ListOeuvres::route('/'),
            'create' => Pages\CreateOeuvre::route('/create'),
            'edit' => Pages\EditOeuvre::route('/{record}/edit'),
        ];
    }
}
