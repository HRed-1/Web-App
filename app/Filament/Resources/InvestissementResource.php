<?php

namespace App\Filament\Resources;

use App\Models\Investissement;
use Filament\{Tables, Forms};
use Filament\Resources\{Form, Table, Resource};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\InvestissementResource\Pages;

class InvestissementResource extends Resource
{
    protected static ?string $model = Investissement::class;

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

                    TextInput::make('Title')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Title')
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

                    TextInput::make('PU')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Pu')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Invest_N1')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Invest N1')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Amortissement')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Amortissement')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Montant_N1')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Montant N1')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Montant_N2')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Montant N2')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Montant_N3')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Montant N3')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Montant_N4')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Montant N4')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Montant_N5')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Montant N5')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Montant_N6')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Montant N6')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Montant_N7')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Montant N7')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('N1')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('N1')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('N2')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('N2')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('N3')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('N3')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('N4')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('N4')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('N5')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('N5')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('N6')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('N6')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('N7')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('N7')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Select::make('actif_poste_id')
                        ->rules(['exists:actif_postes,id'])
                        ->required()
                        ->relationship('actifPoste', 'title')
                        ->searchable()
                        ->placeholder('Actif Poste')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    FileUpload::make('photo')
                        ->rules(['file'])
                        ->nullable()
                        ->image()
                        ->placeholder('Photo')
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
                Tables\Columns\TextColumn::make('Title')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('Qty')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('PU')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Invest_N1')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Amortissement')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Montant_N1')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Montant_N2')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Montant_N3')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Montant_N4')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Montant_N5')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Montant_N6')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Montant_N7')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('N1')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('N2')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('N3')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('N4')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('N5')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('N6')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('N7')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('actifPoste.title')
                    ->toggleable()
                    ->limit(50),
                Tables\Columns\ImageColumn::make('photo')
                    ->toggleable()
                    ->circular(),
            ])
            ->filters([
                DateRangeFilter::make('created_at'),

                SelectFilter::make('projet_id')
                    ->relationship('projet', 'Title')
                    ->indicator('Projet')
                    ->multiple()
                    ->label('Projet'),

                SelectFilter::make('actif_poste_id')
                    ->relationship('actifPoste', 'title')
                    ->indicator('ActifPoste')
                    ->multiple()
                    ->label('ActifPoste'),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInvestissements::route('/'),
            'create' => Pages\CreateInvestissement::route('/create'),
            'view' => Pages\ViewInvestissement::route('/{record}'),
            'edit' => Pages\EditInvestissement::route('/{record}/edit'),
        ];
    }
}
