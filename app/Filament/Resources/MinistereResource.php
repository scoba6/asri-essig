<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Ministere;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\MinistereResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MinistereResource\RelationManagers;

class MinistereResource extends Resource
{
    protected static ?string $model = Ministere::class;
    protected ?string $maxContentWidth = 'full';
    protected static ?string $navigationGroup = 'PARAMETRES';
    protected static ?string $navigationLabel = 'Ministères';
    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'heroicon-o-home';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('libmin')->label('Libellé')
                    ->required()
                    //->columnSpanFull()
                    ->placeholder('Libellé du ministère'),
            TextInput::make('sihmin')->label('Libellé court')
    
                    ->placeholder('Libellé du ministère'),
                
                Textarea::make('desmin')->label('Description')
                    ->columnSpanFull()
                    ->placeholder('Description du ministère'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
               TextColumn::make('libmin')->label('Libellé long')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('sihmin')->label('Libellé court')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('desmin')->label('Description')
                    ->searchable()
                    ->sortable(),
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
            'index' => Pages\ManageMinisteres::route('/'),
        ];
    }
}
