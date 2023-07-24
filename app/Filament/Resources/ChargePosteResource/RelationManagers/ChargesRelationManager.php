<?php

namespace App\Filament\Resources\ChargePosteResource\RelationManagers;

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

class ChargesRelationManager extends RelationManager
{
    protected static string $relationship = 'charges';

    protected static ?string $recordTitleAttribute = 'Type';

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

                TextInput::make('Type')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Type')
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

                TextInput::make('Reglement')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Reglement')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Mensuel')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Mensuel')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Trimestriel')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Trimestriel')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Semstriel')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Semstriel')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Annuel')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Annuel')
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

                TextInput::make('Montant_N1')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Montant N1')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Montant_N2')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Montant N2')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Montant_N3')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Montant N3')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Montant_N4')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Montant N4')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Montant_N5')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Montant N5')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Montant_N6')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Montant N6')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Montant_N7')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Montant N7')
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
                Tables\Columns\TextColumn::make('Type')->limit(50),
                Tables\Columns\TextColumn::make('Title')->limit(50),
                Tables\Columns\TextColumn::make('Reglement')->limit(50),
                Tables\Columns\TextColumn::make('Mensuel'),
                Tables\Columns\TextColumn::make('Trimestriel'),
                Tables\Columns\TextColumn::make('Semstriel'),
                Tables\Columns\TextColumn::make('Annuel'),
                Tables\Columns\TextColumn::make('Evolution')->limit(50),
                Tables\Columns\TextColumn::make('Montant_N1'),
                Tables\Columns\TextColumn::make('Montant_N2'),
                Tables\Columns\TextColumn::make('Montant_N3'),
                Tables\Columns\TextColumn::make('Montant_N4'),
                Tables\Columns\TextColumn::make('Montant_N5'),
                Tables\Columns\TextColumn::make('Montant_N6'),
                Tables\Columns\TextColumn::make('Montant_N7'),
                Tables\Columns\TextColumn::make('chargePoste.title')->limit(50),
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

                MultiSelectFilter::make('charge_poste_id')->relationship(
                    'chargePoste',
                    'title'
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
