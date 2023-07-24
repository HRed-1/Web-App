<?php

namespace App\Filament\Resources\OffreResource\RelationManagers;

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

class AllChiffreAffairesRelationManager extends RelationManager
{
    protected static string $relationship = 'allChiffreAffaires';

    protected static ?string $recordTitleAttribute = 'Title';

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

                TextInput::make('Title')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Title')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Mode')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Mode')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Price')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Price')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Unity')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Unity')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Qty')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Qty')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Evolution')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Evolution')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Montant_CA_N1')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Montant Ca N1')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Montant_CA_N2')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Montant Ca N2')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Montant_CA_N3')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Montant Ca N3')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Montant_CA_N4')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Montant Ca N4')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Montant_CA_N5')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Montant Ca N5')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Montant_CA_N6')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Montant Ca N6')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Montant_CA_N7')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Montant Ca N7')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Cout_Charge')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Cout Charge')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Montant_CHVar_N1')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Montant Ch Var N1')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Montant_CHVar_N2')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Montant Ch Var N2')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Montant_CHVar_N3')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Montant Ch Var N3')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Montant_CHVar_N4')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Montant Ch Var N4')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Montant_CHVar_N5')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Montant Ch Var N5')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Montant_CHVar_N6')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Montant Ch Var N6')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Montant_CHVar_N7')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Montant Ch Var N7')
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
                Tables\Columns\TextColumn::make('offre.Type')->limit(50),
                Tables\Columns\TextColumn::make('Title')->limit(50),
                Tables\Columns\TextColumn::make('Mode')->limit(50),
                Tables\Columns\TextColumn::make('Price'),
                Tables\Columns\TextColumn::make('Unity')->limit(50),
                Tables\Columns\TextColumn::make('Qty'),
                Tables\Columns\TextColumn::make('Evolution')->limit(50),
                Tables\Columns\TextColumn::make('Montant_CA_N1'),
                Tables\Columns\TextColumn::make('Montant_CA_N2'),
                Tables\Columns\TextColumn::make('Montant_CA_N3'),
                Tables\Columns\TextColumn::make('Montant_CA_N4'),
                Tables\Columns\TextColumn::make('Montant_CA_N5'),
                Tables\Columns\TextColumn::make('Montant_CA_N6'),
                Tables\Columns\TextColumn::make('Montant_CA_N7'),
                Tables\Columns\TextColumn::make('Cout_Charge')->limit(50),
                Tables\Columns\TextColumn::make('Montant_CHVar_N1'),
                Tables\Columns\TextColumn::make('Montant_CHVar_N2'),
                Tables\Columns\TextColumn::make('Montant_CHVar_N3'),
                Tables\Columns\TextColumn::make('Montant_CHVar_N4'),
                Tables\Columns\TextColumn::make('Montant_CHVar_N5'),
                Tables\Columns\TextColumn::make('Montant_CHVar_N6'),
                Tables\Columns\TextColumn::make('Montant_CHVar_N7'),
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

                MultiSelectFilter::make('offre_id')->relationship(
                    'offre',
                    'Type'
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
