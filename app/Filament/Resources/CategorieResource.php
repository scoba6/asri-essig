<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategorieResource\Pages;
use App\Filament\Resources\CategorieResource\RelationManagers;
use App\Models\Categorie;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategorieResource extends Resource
{
    protected static ?string $model = Categorie::class;
    protected ?string $maxContentWidth = 'full';
    protected static ?string $navigationGroup = 'PARAMETRES';
    protected static ?string $navigationLabel = 'Catégories';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-tag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('libcat')
                    ->label('Libellé')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('descat')
                    ->label('Description')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
              TextColumn::make('libcat')
                    ->label('Libellé')
                    ->searchable()
                    ->sortable(),
              TextColumn::make('libcat')
                    ::make('descat')
                    ->label('Description'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCategories::route('/'),
        ];
    }
}
