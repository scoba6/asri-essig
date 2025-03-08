<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Projet;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Fonctionnaire;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProjetResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProjetResource\RelationManagers;

class ProjetResource extends Resource
{
    protected static ?string $model = Projet::class;
    protected ?string $maxContentWidth = 'full';
    protected static ?string $navigationGroup = 'PERSONNEL';
    protected static ?string $navigationLabel = 'Projets';
    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('libprj')->label('INTITULE')
                    ->required()
                    ->placeholder('Intitulé du projet')
                    ->columnSpanFull(),
                RichEditor::make('desprj')->label('DESCRIPTION')
                    ->required()
                    ->placeholder('Description du projet')
                    ->columnSpanFull(),
                Select::make('fonctionnaire_id')->label('FONCTIONNAIRE')
                    ->options(Fonctionnaire::all()->pluck('matricule', 'id'))
                    ->searchable()
                    ->required()
                    ->placeholder('Fonctionnaire responsable du projet')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('libprj')
                    ->label('INTITULE')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('desprj')
                    ->label('DESCRIPTION')
                    ->searchable()
                    ->sortable(),
               TextColumn::make('fonctionnaire.matricule')
                    ->label('MATRICULE')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('fonctionnaire.nom')
                    ->label('NOM')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('fonctionnaire.prenom')
                    ->label('PRENOM')
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
            'index' => Pages\ManageProjets::route('/'),
        ];
    }
}
