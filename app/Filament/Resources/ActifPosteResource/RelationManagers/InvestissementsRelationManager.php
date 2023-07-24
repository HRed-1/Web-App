<?php

namespace App\Filament\Resources\ActifPosteResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Resources\RelationManagers\RelationManager;

class InvestissementsRelationManager extends RelationManager
{
    protected static string $relationship = 'investissements';

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

                TextInput::make('Qty')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Qty')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('PU')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Pu')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Invest_N1')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Invest N1')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Amortissement')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Amortissement')
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

                TextInput::make('N1')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('N1')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('N2')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('N2')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('N3')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('N3')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('N4')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('N4')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('N5')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('N5')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('N6')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('N6')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('N7')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('N7')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                FileUpload::make('photo')
                    ->rules(['file'])
                    ->image()
                    ->placeholder('Photo')
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
                Tables\Columns\TextColumn::make('Title')->limit(50),
                Tables\Columns\TextColumn::make('Qty'),
                Tables\Columns\TextColumn::make('PU'),
                Tables\Columns\TextColumn::make('Invest_N1'),
                Tables\Columns\TextColumn::make('Amortissement'),
                Tables\Columns\TextColumn::make('Montant_N1'),
                Tables\Columns\TextColumn::make('Montant_N2'),
                Tables\Columns\TextColumn::make('Montant_N3'),
                Tables\Columns\TextColumn::make('Montant_N4'),
                Tables\Columns\TextColumn::make('Montant_N5'),
                Tables\Columns\TextColumn::make('Montant_N6'),
                Tables\Columns\TextColumn::make('Montant_N7'),
                Tables\Columns\TextColumn::make('N1'),
                Tables\Columns\TextColumn::make('N2'),
                Tables\Columns\TextColumn::make('N3'),
                Tables\Columns\TextColumn::make('N4'),
                Tables\Columns\TextColumn::make('N5'),
                Tables\Columns\TextColumn::make('N6'),
                Tables\Columns\TextColumn::make('N7'),
                Tables\Columns\TextColumn::make('actifPoste.title')->limit(50),
                Tables\Columns\ImageColumn::make('photo')->rounded(),
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

                MultiSelectFilter::make('actif_poste_id')->relationship(
                    'actifPoste',
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
