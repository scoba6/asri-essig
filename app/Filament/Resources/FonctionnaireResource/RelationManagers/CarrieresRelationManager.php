<?php

namespace App\Filament\Resources\FonctionnaireResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Ministere;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class CarrieresRelationManager extends RelationManager
{
    protected static string $relationship = 'carrieres';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('ministere_id')->label('MINISTERE')
                    ->options(Ministere::all()->pluck('libmin', 'id'))
                    ->searchable()
                    ->columnSpanFull()
                    ->required(),
                DatePicker::make('date_debut')->label('DATE DE DEBUT')
                    ->required(),
                DatePicker::make('date_fin')->label('DATE DE FIN')
                    ->required()
                    ->maxDate(now()),
                TextInput::make('description')->label('MISSION')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('description')
            ->columns([
                TextColumn::make('ministere.libmin')->label('MINISTERE'),
                TextColumn::make('date_debut')->label('DATE DE DEBUT')
                    ->dateTime('d/m/Y'),
                TextColumn::make('date_fin')->label('DATE DE FIN')
                    ->dateTime('d/m/Y'),
                TextColumn::make('description')->label('MISSION'),
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
