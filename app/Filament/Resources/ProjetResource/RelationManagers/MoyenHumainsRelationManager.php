<?php

namespace App\Filament\Resources\ProjetResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use App\Models\Poste;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\PosteResource;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Resources\RelationManagers\RelationManager;

class MoyenHumainsRelationManager extends RelationManager
{
    protected static string $relationship = 'moyenHumains';

    protected static ?string $recordTitleAttribute = 'Contrat';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $title = 'Liste des Ressources Humaines';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 0])->schema([

                Section::make('Designation')->schema([

                        Select::make('poste_id')
                            ->rules(['exists:postes,id'])
                            ->relationship('poste', 'Title')
                            ->searchable()
                            ->preload()
                            ->label('Poste')
                            ->createOptionForm([
                                TextInput::make('Title')
                                    ->required(),
        
                   
                            ])
                            ->createOptionAction(function (Forms\Components\Actions\Action $action) {
                                return $action
                                    ->modalHeading('Create')
                                    ->modalButton('Create')
                                    ->modalWidth('lg')
                                    ->url(PosteResource::getUrl('create'));
                            })
                            ->columnSpan([
                                'default' => 12,
                                'md' => 12,
                                'lg' => 6,
                            ]),

                        Select::make('Contrat')
                            ->rules(['max:255', 'string'])
                            ->placeholder('Contrat')
                            ->options([
                                'cdi' => 'Contrat à Durée Indeterminée',
                                'cdd' => 'Contrat à Durée Determiné',
                                'saisonier' => 'Contrat Saisonier',
                                'anapec' => 'Contrat ANAPEC',

                            ])
                            ->columnSpan([
                                'default' => 12,
                                'md' => 12,
                                'lg' => 6,
                            ]),

                        TextInput::make('Effectif')
                            ->rules(['numeric'])
                            ->numeric()
                            ->default('1')
                            ->label('Nombre')
                            ->columnSpan([
                                'default' => 12,
                                'md' => 12,
                                'lg' => 3,
                            ]),

                        TextInput::make('Salaire')
                            ->rules(['numeric'])
                            ->numeric()
                            ->label('Salaire Mensuelle')
                            ->columnSpan([
                                'default' => 12,
                                'md' => 12,
                                'lg' => 4,
                            ]),

                        TextInput::make('Mois')
                            ->rules(['numeric'])
                            ->numeric()
                            ->label('Nombre de Mois')
                            ->default('12')
                            ->columnSpan([
                                'default' => 12,
                                'md' => 12,
                                'lg' => 3,
                            ]),

                        TextInput::make('Evolution')
                            ->rules(['numeric'])
                            ->numeric()
                            ->suffix('%')
                            ->label('Evolution')
                            ->default('0')
                            ->columnSpan([
                                'default' => 12,
                                'md' => 12,
                                'lg' => 2,
                            ]),

                        
                        TextInput::make('Taux_ch')
                            ->rules(['numeric'])
                            ->numeric()
                            ->label('Taux de Charge')
                            ->default('0')
                            ->suffix('%')
                            ->columnSpan([
                                'default' => 12,
                                'md' => 12,
                                'lg' => 3,
                            ]),

                
            
                ])->columns(12),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('poste.Title')->label('Poste')->limit(50),
                Tables\Columns\TextColumn::make('Contrat')->label('Contrat')->limit(50),
                Tables\Columns\TextColumn::make('Effectif')->label('Nomre'),
                Tables\Columns\TextColumn::make('Salaire')->label('Salaire Mensuelle'),
                
            ])
            
            ->headerActions([Tables\Actions\CreateAction::make()
            ->mutateFormDataUsing(function (array $data) {
                
                $data['Salaire_N1'] = $data['Effectif'] * $data['Salaire']* $data['Mois'];
                $data['Salaire_N2'] = $data['Effectif'] * $data['Salaire']* $data['Mois']*(1+$data['Evolution']/100);
                $data['Salaire_N3'] = $data['Effectif'] * $data['Salaire']* $data['Mois']*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                $data['Salaire_N4'] = $data['Effectif'] * $data['Salaire']* $data['Mois']*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                $data['Salaire_N5'] = $data['Effectif'] * $data['Salaire']* $data['Mois']*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                $data['Salaire_N6'] = $data['Effectif'] * $data['Salaire']* $data['Mois']*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                $data['Salaire_N7'] = $data['Effectif'] * $data['Salaire']* $data['Mois']*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);

                $data['ChSociale_N1'] = $data['Effectif'] * $data['Salaire']* $data['Mois']* $data['Taux_ch']/100;
                $data['ChSociale_N2'] = $data['Effectif'] * $data['Salaire']* $data['Mois']* $data['Taux_ch']/100*(1+$data['Evolution']/100);
                $data['ChSociale_N3'] = $data['Effectif'] * $data['Salaire']* $data['Mois']* $data['Taux_ch']/100*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                $data['ChSociale_N4'] = $data['Effectif'] * $data['Salaire']* $data['Mois']* $data['Taux_ch']/100*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                $data['ChSociale_N5'] = $data['Effectif'] * $data['Salaire']* $data['Mois']* $data['Taux_ch']/100*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                $data['ChSociale_N6'] = $data['Effectif'] * $data['Salaire']* $data['Mois']* $data['Taux_ch']/100*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                $data['ChSociale_N7'] = $data['Effectif'] * $data['Salaire']* $data['Mois']* $data['Taux_ch']/100*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);


                return $data;
            })
            
            
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->mutateFormDataUsing(function (array $data) {
                
                    $data['Salaire_N1'] = $data['Effectif'] * $data['Salaire']* $data['Mois'];
                    $data['Salaire_N2'] = $data['Effectif'] * $data['Salaire']* $data['Mois']*(1+$data['Evolution']/100);
                    $data['Salaire_N3'] = $data['Effectif'] * $data['Salaire']* $data['Mois']*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                    $data['Salaire_N4'] = $data['Effectif'] * $data['Salaire']* $data['Mois']*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                    $data['Salaire_N5'] = $data['Effectif'] * $data['Salaire']* $data['Mois']*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                    $data['Salaire_N6'] = $data['Effectif'] * $data['Salaire']* $data['Mois']*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                    $data['Salaire_N7'] = $data['Effectif'] * $data['Salaire']* $data['Mois']*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
    
                    $data['ChSociale_N1'] = $data['Effectif'] * $data['Salaire']* $data['Mois']* $data['Taux_ch']/100;
                    $data['ChSociale_N2'] = $data['Effectif'] * $data['Salaire']* $data['Mois']* $data['Taux_ch']/100*(1+$data['Evolution']/100);
                    $data['ChSociale_N3'] = $data['Effectif'] * $data['Salaire']* $data['Mois']* $data['Taux_ch']/100*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                    $data['ChSociale_N4'] = $data['Effectif'] * $data['Salaire']* $data['Mois']* $data['Taux_ch']/100*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                    $data['ChSociale_N5'] = $data['Effectif'] * $data['Salaire']* $data['Mois']* $data['Taux_ch']/100*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                    $data['ChSociale_N6'] = $data['Effectif'] * $data['Salaire']* $data['Mois']* $data['Taux_ch']/100*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                    $data['ChSociale_N7'] = $data['Effectif'] * $data['Salaire']* $data['Mois']* $data['Taux_ch']/100*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
    
    
                    return $data;
                }),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }
}
