<?php

namespace App\Filament\Resources\FonctionnaireResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class ProjetsRelationManager extends RelationManager
{
    protected static string $relationship = 'projets';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
            TextInput::make('libprj')->label('LIBELLE DU PROJET')
                ->required()
                ->columnSpanFull()
                ->maxLength(255),
            RichEditor::make('desprj')->label('DESCRIPTION DU PROJET')
                ->required()
                ->columnSpanFull()
                ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('libprj')
            ->columns([
                TextColumn::make('libprj')->label('LIBELLE DU PROJET'),
                TextColumn::make('desprj')->label('DESCRIPTION DU PROJET')
              
                
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
