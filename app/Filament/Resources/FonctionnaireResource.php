<?php

namespace App\Filament\Resources;

use App\Enums\Sexe;
use App\Enums\StatutMarital;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Fonctionnaire;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FonctionnaireResource\Pages;
use App\Filament\Resources\FonctionnaireResource\RelationManagers;
use App\Models\Categorie;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;

class FonctionnaireResource extends Resource
{
    protected static ?string $model = Fonctionnaire::class;
    protected ?string $maxContentWidth = 'full';
    protected static ?string $navigationGroup = 'PERSONNEL';
    protected static ?string $navigationLabel = 'Fonctionnaires';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nom')->label('NOM')
                    ->required()
                    ->placeholder('Nom du fonctionnaire'),
                TextInput::make('prenom')->label('PRENOM')
                    ->required()
                    ->placeholder('Prénom du fonctionnaire'),
                DatePicker::make('datenaiss')->label('DATE DE NAISSANCE')
                    ->required()
                    ->maxDate(now()),
                TextInput::make('lieunaiss')->label('LIEU DE NAISSANCE')
                    ->required()
                    ->placeholder('Lieu de naissance du fonctionnaire'),
                Select::make('sexe')->label('SEXE')
                    ->required()
                    ->options(Sexe::class),
                Select::make('situation')->label('STATUT MARITAL')
                    ->required()
                    ->options(StatutMarital::class),
                Select::make('categorie')->label('CATEGORIE')
                    ->options(Categorie::all()->pluck('libcat', 'id'))
                    ->searchable()
                    ->required()
                    ->placeholder('Catégorie du fonctionnaire'),
                TextInput::make('matricule')->label('MATRICULE')
                    ->required()
                    ->placeholder('Matricule du fonctionnaire'),
                Textarea::make('adresse')->label('ADRESSE')
                    ->columnSpanFull()
                    ->placeholder('Adresse du fonctionnaire'),
                TextInput::make('tel')->label('TELEPHONE')
                    ->required()
                    ->placeholder('Téléphone du fonctionnaire'),
                TextInput::make('email')->label('EMAIL')
                    ->required()
                    ->placeholder('Email du fonctionnaire'),
                DatePicker::make('dateentree')->label('DATE D\'ENTREE')
                    ->required()
                    ->placeholder('Date d\'entrée du fonctionnaire'),
                DatePicker::make('datefin')->label('DATE DE RETRAITE')
                    ->placeholder('Date de retraite du fonctionnaire'),
                TextInput::make('cnss')->label('CNSS')
                    ->required()
                    ->placeholder('CNSS du fonctionnaire'),
                TextInput::make('cnamgs')->label('CNAMGS')
                    ->required()
                    ->placeholder('CNAMGS du fonctionnaire'),
               
                TextInput::make('rib')->label('RIB')
                    ->required()
                    ->placeholder('RIB du fonctionnaire'),
                TextInput::make('banque')->label('BANQUE')
                    ->required()
                    ->placeholder('Banque du fonctionnaire'), 
                FileUpload::make('cv')->label('CV')
                    ->columnSpanFull()
                    ->placeholder('Curriculum Vitae du fonctionnaire'),
                FileUpload::make('photo')->label('PHOTO')
                    ->columnSpanFull()
                    ->placeholder('Photo du fonctionnaire'),    
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                
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
            'index' => Pages\ListFonctionnaires::route('/'),
            'create' => Pages\CreateFonctionnaire::route('/create'),
            'edit' => Pages\EditFonctionnaire::route('/{record}/edit'),
        ];
    }
}
