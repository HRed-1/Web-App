<?php

namespace App\Filament\Resources;

use App\Models\MoyenHumain;
use Filament\{Tables, Forms};
use Filament\Resources\{Form, Table, Resource};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\MoyenHumainResource\Pages;

class MoyenHumainResource extends Resource
{
    protected static ?string $model = MoyenHumain::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    //protected static ?string $recordTitleAttribute = 'Contrat';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()->schema([
                Grid::make(['default' => 0])->schema([
                    Select::make('projet_id')
                        ->rules(['exists:projets,id'])
                        ->required()
                        ->relationship('projet', 'Title')
                        ->searchable()
                        ->placeholder('Projet')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Select::make('poste_id')
                        ->rules(['exists:postes,id'])
                        ->nullable()
                        ->relationship('poste', 'Title')
                        ->searchable()
                        ->placeholder('Poste')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Contrat')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Contrat')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Effectif')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Effectif')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Salaire')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Salaire')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Mois')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Mois')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Evolution')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Evolution')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Salaire_N1')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Salaire N1')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Salaire_N2')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Salaire N2')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Salaire_N3')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Salaire N3')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Salaire_N4')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Salaire N4')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Salaire_N5')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Salaire N5')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Salaire_N6')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Salaire N6')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Salaire_N7')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Salaire N7')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Taux_ch')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Taux Ch')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('ChSociale_N1')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Ch Sociale N1')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('ChSociale_N2')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Ch Sociale N2')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('ChSociale_N3')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Ch Sociale N3')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('ChSociale_N4')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Ch Sociale N4')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('ChSociale_N5')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Ch Sociale N5')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('ChSociale_N6')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Ch Sociale N6')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('ChSociale_N7')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Ch Sociale N7')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),
                ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->poll('60s')
            ->columns([
                Tables\Columns\TextColumn::make('projet.Title')
                    ->toggleable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('poste.Title')
                    ->toggleable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('Contrat')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('Effectif')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Salaire')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Mois')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Evolution')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Salaire_N1')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Salaire_N2')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Salaire_N3')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Salaire_N4')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Salaire_N5')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Salaire_N6')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Salaire_N7')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Taux_ch')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('ChSociale_N1')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('ChSociale_N2')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('ChSociale_N3')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('ChSociale_N4')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('ChSociale_N5')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('ChSociale_N6')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('ChSociale_N7')
                    ->toggleable()
                    ->searchable(true, null, true),
            ])
            ->filters([
                DateRangeFilter::make('created_at'),

                SelectFilter::make('projet_id')
                    ->relationship('projet', 'Title')
                    ->indicator('Projet')
                    ->multiple()
                    ->label('Projet'),

                SelectFilter::make('poste_id')
                    ->relationship('poste', 'Title')
                    ->indicator('Poste')
                    ->multiple()
                    ->label('Poste'),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMoyenHumains::route('/'),
            'create' => Pages\CreateMoyenHumain::route('/create'),
            'view' => Pages\ViewMoyenHumain::route('/{record}'),
            'edit' => Pages\EditMoyenHumain::route('/{record}/edit'),
        ];
    }
}
