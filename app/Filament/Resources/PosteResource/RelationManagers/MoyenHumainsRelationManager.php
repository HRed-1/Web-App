<?php

namespace App\Filament\Resources\PosteResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Resources\RelationManagers\RelationManager;

class MoyenHumainsRelationManager extends RelationManager
{
    protected static string $relationship = 'moyenHumains';

    protected static ?string $recordTitleAttribute = 'Contrat';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 0])->schema([
                Select::make('projet_id')
                    ->rules(['exists:projets,id'])
                    ->relationship('projet', 'Title')
                    ->searchable()
                    ->placeholder('Projet')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Contrat')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Contrat')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Effectif')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Effectif')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Salaire')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Salaire')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Mois')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Mois')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Evolution')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Evolution')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Salaire_N1')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Salaire N1')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Salaire_N2')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Salaire N2')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Salaire_N3')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Salaire N3')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Salaire_N4')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Salaire N4')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Salaire_N5')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Salaire N5')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Salaire_N6')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Salaire N6')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Salaire_N7')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Salaire N7')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Taux_ch')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Taux Ch')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('ChSociale_N1')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Ch Sociale N1')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('ChSociale_N2')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Ch Sociale N2')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('ChSociale_N3')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Ch Sociale N3')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('ChSociale_N4')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Ch Sociale N4')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('ChSociale_N5')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Ch Sociale N5')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('ChSociale_N6')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Ch Sociale N6')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('ChSociale_N7')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Ch Sociale N7')
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
                Tables\Columns\TextColumn::make('projet.Title')->limit(50),
                Tables\Columns\TextColumn::make('poste.Title')->limit(50),
                Tables\Columns\TextColumn::make('Contrat')->limit(50),
                Tables\Columns\TextColumn::make('Effectif'),
                Tables\Columns\TextColumn::make('Salaire'),
                Tables\Columns\TextColumn::make('Mois'),
                Tables\Columns\TextColumn::make('Evolution'),
                Tables\Columns\TextColumn::make('Salaire_N1'),
                Tables\Columns\TextColumn::make('Salaire_N2'),
                Tables\Columns\TextColumn::make('Salaire_N3'),
                Tables\Columns\TextColumn::make('Salaire_N4'),
                Tables\Columns\TextColumn::make('Salaire_N5'),
                Tables\Columns\TextColumn::make('Salaire_N6'),
                Tables\Columns\TextColumn::make('Salaire_N7'),
                Tables\Columns\TextColumn::make('Taux_ch'),
                Tables\Columns\TextColumn::make('ChSociale_N1'),
                Tables\Columns\TextColumn::make('ChSociale_N2'),
                Tables\Columns\TextColumn::make('ChSociale_N3'),
                Tables\Columns\TextColumn::make('ChSociale_N4'),
                Tables\Columns\TextColumn::make('ChSociale_N5'),
                Tables\Columns\TextColumn::make('ChSociale_N6'),
                Tables\Columns\TextColumn::make('ChSociale_N7'),
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

                MultiSelectFilter::make('projet_id')->relationship(
                    'projet',
                    'Title'
                ),

                MultiSelectFilter::make('poste_id')->relationship(
                    'poste',
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
