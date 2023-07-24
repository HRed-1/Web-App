<?php

namespace App\Filament\Resources;

use App\Models\ChiffreAffaires;
use Filament\{Tables, Forms};
use Filament\Resources\{Form, Table, Resource};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\ChiffreAffairesResource\Pages;

class ChiffreAffairesResource extends Resource
{
    protected static ?string $model = ChiffreAffaires::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    //protected static ?string $recordTitleAttribute = 'Title';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()->schema([
                Grid::make(['default' => 0])->schema([
                    Select::make('projet_id')
                        ->rules(['exists:projets,id'])
                        ->nullable()
                        ->relationship('projet', 'Title')
                        ->searchable()
                        ->placeholder('Projet')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Select::make('offre_id')
                        ->rules(['exists:offres,id'])
                        ->nullable()
                        ->relationship('offre', 'Type')
                        ->searchable()
                        ->placeholder('Offre')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Title')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Title')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Mode')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Mode')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Price')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Price')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Unity')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Unity')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Qty')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Qty')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Evolution')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Evolution')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Montant_CA_N1')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Montant Ca N1')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Montant_CA_N2')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Montant Ca N2')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Montant_CA_N3')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Montant Ca N3')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Montant_CA_N4')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Montant Ca N4')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Montant_CA_N5')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Montant Ca N5')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Montant_CA_N6')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Montant Ca N6')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Montant_CA_N7')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Montant Ca N7')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Cout_Charge')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Cout Charge')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Montant_CHVar_N1')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Montant Ch Var N1')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Montant_CHVar_N2')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Montant Ch Var N2')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Montant_CHVar_N3')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Montant Ch Var N3')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Montant_CHVar_N4')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Montant Ch Var N4')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Montant_CHVar_N5')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Montant Ch Var N5')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Montant_CHVar_N6')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Montant Ch Var N6')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Montant_CHVar_N7')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Montant Ch Var N7')
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
                Tables\Columns\TextColumn::make('offre.Type')
                    ->toggleable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('Title')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('Mode')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('Price')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Unity')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('Qty')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Evolution')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('Montant_CA_N1')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Montant_CA_N2')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Montant_CA_N3')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Montant_CA_N4')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Montant_CA_N5')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Montant_CA_N6')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Montant_CA_N7')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Cout_Charge')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('Montant_CHVar_N1')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Montant_CHVar_N2')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Montant_CHVar_N3')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Montant_CHVar_N4')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Montant_CHVar_N5')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Montant_CHVar_N6')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Montant_CHVar_N7')
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

                SelectFilter::make('offre_id')
                    ->relationship('offre', 'Type')
                    ->indicator('Offre')
                    ->multiple()
                    ->label('Offre'),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAllChiffreAffaires::route('/'),
            'create' => Pages\CreateChiffreAffaires::route('/create'),
            'view' => Pages\ViewChiffreAffaires::route('/{record}'),
            'edit' => Pages\EditChiffreAffaires::route('/{record}/edit'),
        ];
    }
}
