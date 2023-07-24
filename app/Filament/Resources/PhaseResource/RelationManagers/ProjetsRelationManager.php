<?php

namespace App\Filament\Resources\PhaseResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Resources\RelationManagers\RelationManager;

class ProjetsRelationManager extends RelationManager
{
    protected static string $relationship = 'projets';

    protected static ?string $recordTitleAttribute = 'Title';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 0])->schema([
                TextInput::make('Title')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Title')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Title_ar')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Title Ar')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                RichEditor::make('Detail')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Detail')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                RichEditor::make('Detail_ar')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Detail Ar')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Cout')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Cout')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Apport')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Apport')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Subvention')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Subvention')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Emprunt')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Emprunt')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Select::make('porteur_id')
                    ->rules(['exists:porteurs,id'])
                    ->relationship('porteur', 'Name')
                    ->searchable()
                    ->placeholder('Porteur')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Select::make('programme_id')
                    ->rules(['exists:programmes,id'])
                    ->relationship('programme', 'Title')
                    ->searchable()
                    ->placeholder('Programme')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Toggle::make('Selected')
                    ->rules(['boolean'])
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Note_comit')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Note Comit')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Toggle::make('Valide')
                    ->rules(['boolean'])
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Toggle::make('Open_plis')
                    ->rules(['boolean'])
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                DatePicker::make('Reception')
                    ->rules(['date'])
                    ->placeholder('Reception')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Sort_recption')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Sort Recption')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Toggle::make('Finance')
                    ->rules(['boolean'])
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Toggle::make('Actif')
                    ->rules(['boolean'])
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Subv')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Subv')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Apport')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Apport')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Emprunt')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Emprunt')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Invest')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Total Invest')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Tresor_depart')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Tresor Depart')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_CA_N1')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Ca N1')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_CA_N2')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Ca N2')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_CA_N3')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Ca N3')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_CA_N4')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Ca N4')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_CA_N5')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Ca N5')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_CA_N6')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Ca N6')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_CA_N7')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Ca N7')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_CH_N1')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Ch N1')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_CH_N2')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Ch N2')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_CH_N3')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Ch N3')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_CH_N4')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Ch N4')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_CH_N5')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Ch N5')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_CH_N6')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Ch N6')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_CH_N7')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Ch N7')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Dot_N1')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Dot N1')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Dot_N2')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Dot N2')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Dot_N3')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Dot N3')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Dot_N4')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Dot N4')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Dot_N5')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Dot N5')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Dot_N6')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Dot N6')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Dot_N7')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Dot N7')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_CHVar_N1')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Ch Var N1')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_CHVar_N2')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Ch Var N2')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_CHVar_N3')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Ch Var N3')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_CHVar_N4')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Ch Var N4')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_CHVar_N5')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Ch Var N5')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_CHVar_N6')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Ch Var N6')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_CHVar_N7')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Ch Var N7')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Int_N1')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Int N1')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Int_N2')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Int N2')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Int_N3')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Int N3')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Int_N4')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Int N4')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Int_N5')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Int N5')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Int_N6')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Int N6')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Int_N7')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Int N7')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Amort_N1')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Amort N1')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Amort_N2')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Amort N2')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Amort_N3')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Amort N3')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Amort_N4')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Amort N4')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Amort_N5')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Amort N5')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Amort_N6')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Amort N6')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Amort_N7')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Amort N7')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Salaire_N1')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Salaire N1')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Salaire_N2')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Salaire N2')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Salaire_N3')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Salaire N3')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Salaire_N4')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Salaire N4')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Salaire_N5')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Salaire N5')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Salaire_N6')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Salaire N6')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_Salaire_N7')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Salaire N7')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_ChSociale_N1')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Ch Sociale N1')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_ChSociale_N2')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Ch Sociale N2')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_ChSociale_N3')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Ch Sociale N3')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_ChSociale_N4')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Ch Sociale N4')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_ChSociale_N5')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Ch Sociale N5')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_ChSociale_N6')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Ch Sociale N6')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Total_ChSociale_N7')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Total Ch Sociale N7')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Resultat_N1')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Resultat N1')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Resultat_N2')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Resultat N2')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Resultat_N3')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Resultat N3')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Resultat_N4')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Resultat N4')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Resultat_N5')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Resultat N5')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Resultat_N6')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Resultat N6')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Resultat_N7')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Resultat N7')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Impot_N1')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Impot N1')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Impot_N2')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Impot N2')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Impot_N3')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Impot N3')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Impot_N4')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Impot N4')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Impot_N5')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Impot N5')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Impot_N6')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Impot N6')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Impot_N7')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Impot N7')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Toggle::make('dispo_local')
                    ->rules(['boolean'])
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Toggle::make('dispo_apport')
                    ->rules(['boolean'])
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Select::make('commune_id')
                    ->rules(['exists:communes,id'])
                    ->relationship('commune', 'Title')
                    ->searchable()
                    ->placeholder('Commune')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('adresse')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Adresse')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Select::make('secteur_actvite_id')
                    ->rules(['exists:secteur_actvites,id'])
                    ->relationship('secteurActvite', 'Title')
                    ->searchable()
                    ->placeholder('Secteur Actvite')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('composante')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Composante')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Toggle::make('innov')
                    ->rules(['boolean'])
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                RichEditor::make('motiv_obj')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Motiv Obj')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                RichEditor::make('moti_obj_ar')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Moti Obj Ar')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('poste')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Poste')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Title')->limit(50),
                Tables\Columns\TextColumn::make('Title_ar')->limit(50),
                Tables\Columns\TextColumn::make('Detail')->limit(50),
                Tables\Columns\TextColumn::make('Detail_ar')->limit(50),
                Tables\Columns\TextColumn::make('Cout'),
                Tables\Columns\TextColumn::make('Apport'),
                Tables\Columns\TextColumn::make('Subvention'),
                Tables\Columns\TextColumn::make('Emprunt'),
                Tables\Columns\TextColumn::make('porteur.Name')->limit(50),
                Tables\Columns\TextColumn::make('programme.Title')->limit(50),
                Tables\Columns\TextColumn::make('phase.Title')->limit(50),
                Tables\Columns\IconColumn::make('Selected'),
                Tables\Columns\TextColumn::make('Note_comit')->limit(50),
                Tables\Columns\IconColumn::make('Valide'),
                Tables\Columns\IconColumn::make('Open_plis'),
                Tables\Columns\TextColumn::make('Reception')->date(),
                Tables\Columns\TextColumn::make('Sort_recption')->limit(50),
                Tables\Columns\IconColumn::make('Finance'),
                Tables\Columns\IconColumn::make('Actif'),
                Tables\Columns\TextColumn::make('Total_Subv'),
                Tables\Columns\TextColumn::make('Total_Apport'),
                Tables\Columns\TextColumn::make('Total_Emprunt'),
                Tables\Columns\TextColumn::make('Total_Invest')->limit(50),
                Tables\Columns\TextColumn::make('Tresor_depart'),
                Tables\Columns\TextColumn::make('Total_CA_N1'),
                Tables\Columns\TextColumn::make('Total_CA_N2'),
                Tables\Columns\TextColumn::make('Total_CA_N3'),
                Tables\Columns\TextColumn::make('Total_CA_N4'),
                Tables\Columns\TextColumn::make('Total_CA_N5'),
                Tables\Columns\TextColumn::make('Total_CA_N6'),
                Tables\Columns\TextColumn::make('Total_CA_N7'),
                Tables\Columns\TextColumn::make('Total_CH_N1'),
                Tables\Columns\TextColumn::make('Total_CH_N2'),
                Tables\Columns\TextColumn::make('Total_CH_N3'),
                Tables\Columns\TextColumn::make('Total_CH_N4'),
                Tables\Columns\TextColumn::make('Total_CH_N5'),
                Tables\Columns\TextColumn::make('Total_CH_N6'),
                Tables\Columns\TextColumn::make('Total_CH_N7'),
                Tables\Columns\TextColumn::make('Total_Dot_N1'),
                Tables\Columns\TextColumn::make('Total_Dot_N2'),
                Tables\Columns\TextColumn::make('Total_Dot_N3'),
                Tables\Columns\TextColumn::make('Total_Dot_N4'),
                Tables\Columns\TextColumn::make('Total_Dot_N5'),
                Tables\Columns\TextColumn::make('Total_Dot_N6'),
                Tables\Columns\TextColumn::make('Total_Dot_N7'),
                Tables\Columns\TextColumn::make('Total_CHVar_N1'),
                Tables\Columns\TextColumn::make('Total_CHVar_N2'),
                Tables\Columns\TextColumn::make('Total_CHVar_N3'),
                Tables\Columns\TextColumn::make('Total_CHVar_N4'),
                Tables\Columns\TextColumn::make('Total_CHVar_N5'),
                Tables\Columns\TextColumn::make('Total_CHVar_N6'),
                Tables\Columns\TextColumn::make('Total_CHVar_N7'),
                Tables\Columns\TextColumn::make('Total_Int_N1'),
                Tables\Columns\TextColumn::make('Total_Int_N2'),
                Tables\Columns\TextColumn::make('Total_Int_N3'),
                Tables\Columns\TextColumn::make('Total_Int_N4'),
                Tables\Columns\TextColumn::make('Total_Int_N5'),
                Tables\Columns\TextColumn::make('Total_Int_N6'),
                Tables\Columns\TextColumn::make('Total_Int_N7'),
                Tables\Columns\TextColumn::make('Total_Amort_N1'),
                Tables\Columns\TextColumn::make('Total_Amort_N2'),
                Tables\Columns\TextColumn::make('Total_Amort_N3'),
                Tables\Columns\TextColumn::make('Total_Amort_N4'),
                Tables\Columns\TextColumn::make('Total_Amort_N5'),
                Tables\Columns\TextColumn::make('Total_Amort_N6'),
                Tables\Columns\TextColumn::make('Total_Amort_N7'),
                Tables\Columns\TextColumn::make('Total_Salaire_N1'),
                Tables\Columns\TextColumn::make('Total_Salaire_N2'),
                Tables\Columns\TextColumn::make('Total_Salaire_N3'),
                Tables\Columns\TextColumn::make('Total_Salaire_N4'),
                Tables\Columns\TextColumn::make('Total_Salaire_N5'),
                Tables\Columns\TextColumn::make('Total_Salaire_N6'),
                Tables\Columns\TextColumn::make('Total_Salaire_N7'),
                Tables\Columns\TextColumn::make('Total_ChSociale_N1'),
                Tables\Columns\TextColumn::make('Total_ChSociale_N2'),
                Tables\Columns\TextColumn::make('Total_ChSociale_N3'),
                Tables\Columns\TextColumn::make('Total_ChSociale_N4'),
                Tables\Columns\TextColumn::make('Total_ChSociale_N5'),
                Tables\Columns\TextColumn::make('Total_ChSociale_N6'),
                Tables\Columns\TextColumn::make('Total_ChSociale_N7'),
                Tables\Columns\TextColumn::make('Resultat_N1'),
                Tables\Columns\TextColumn::make('Resultat_N2'),
                Tables\Columns\TextColumn::make('Resultat_N3'),
                Tables\Columns\TextColumn::make('Resultat_N4'),
                Tables\Columns\TextColumn::make('Resultat_N5'),
                Tables\Columns\TextColumn::make('Resultat_N6'),
                Tables\Columns\TextColumn::make('Resultat_N7'),
                Tables\Columns\TextColumn::make('Impot_N1'),
                Tables\Columns\TextColumn::make('Impot_N2'),
                Tables\Columns\TextColumn::make('Impot_N3'),
                Tables\Columns\TextColumn::make('Impot_N4'),
                Tables\Columns\TextColumn::make('Impot_N5'),
                Tables\Columns\TextColumn::make('Impot_N6'),
                Tables\Columns\TextColumn::make('Impot_N7'),
                Tables\Columns\IconColumn::make('dispo_local'),
                Tables\Columns\IconColumn::make('dispo_apport'),
                Tables\Columns\TextColumn::make('commune.Title')->limit(50),
                Tables\Columns\TextColumn::make('adresse')->limit(50),
                Tables\Columns\TextColumn::make('secteurActvite.Title')->limit(
                    50
                ),
                Tables\Columns\TextColumn::make('composante')->limit(50),
                Tables\Columns\IconColumn::make('innov'),
                Tables\Columns\TextColumn::make('motiv_obj')->limit(50),
                Tables\Columns\TextColumn::make('moti_obj_ar')->limit(50),
                Tables\Columns\TextColumn::make('poste'),
            ])
            ->filters([
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from'),
                        Forms\Components\DatePicker::make('created_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn(
                                    Builder $query,
                                    $date
                                ): Builder => $query->whereDate(
                                    'created_at',
                                    '>=',
                                    $date
                                )
                            )
                            ->when(
                                $data['created_until'],
                                fn(
                                    Builder $query,
                                    $date
                                ): Builder => $query->whereDate(
                                    'created_at',
                                    '<=',
                                    $date
                                )
                            );
                    }),

                MultiSelectFilter::make('porteur_id')->relationship(
                    'porteur',
                    'Name'
                ),

                MultiSelectFilter::make('programme_id')->relationship(
                    'programme',
                    'Title'
                ),

                MultiSelectFilter::make('phase_id')->relationship(
                    'phase',
                    'Title'
                ),

                MultiSelectFilter::make('commune_id')->relationship(
                    'commune',
                    'Title'
                ),

                MultiSelectFilter::make('secteur_actvite_id')->relationship(
                    'secteurActvite',
                    'Title'
                ),
            ])
            ->headerActions([Tables\Actions\CreateAction::make()])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }
}
