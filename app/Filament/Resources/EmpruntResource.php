<?php

namespace App\Filament\Resources;

use App\Models\Emprunt;
use Filament\{Tables, Forms};
use Filament\Resources\{Form, Table, Resource};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\EmpruntResource\Pages;

class EmpruntResource extends Resource
{
    protected static ?string $model = Emprunt::class;

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
                        ->required()
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

                    TextInput::make('Taux')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Taux')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Duree')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Duree')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Reglement')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Reglement')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Echance_N1')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Echance N1')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Echance_N2')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Echance N2')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Echance_N3')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Echance N3')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Echance_N4')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Echance N4')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Echance_N5')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Echance N5')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Echance_N6')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Echance N6')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Echance_N7')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Echance N7')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Interet_N1')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Interet N1')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Interet_N2')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Interet N2')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Interet_N3')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Interet N3')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Interet_N4')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Interet N4')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Interet_N5')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Interet N5')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Interet_N6')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Interet N6')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Interet_N7')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Interet N7')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Amort_N1')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Amort N1')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Amort_N2')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Amort N2')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Amort_N3')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Amort N3')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Amort_N4')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Amort N4')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Amort_N5')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Amort N5')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Amort_N6')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Amort N6')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Amort_N7')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Amort N7')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Rest_N1')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Rest N1')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Rest_N2')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Rest N2')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Rest_N3')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Rest N3')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Rest_N4')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Rest N4')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Rest_N5')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Rest N5')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Rest_N6')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Rest N6')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Rest_N7')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Rest N7')
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
                Tables\Columns\TextColumn::make('Montant_N1')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Taux')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Duree')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Reglement')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('Echance_N1')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Echance_N2')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Echance_N3')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Echance_N4')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Echance_N5')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Echance_N6')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Echance_N7')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Interet_N1')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Interet_N2')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Interet_N3')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Interet_N4')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Interet_N5')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Interet_N6')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Interet_N7')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Amort_N1')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Amort_N2')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Amort_N3')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Amort_N4')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Amort_N5')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Amort_N6')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Amort_N7')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Rest_N1')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Rest_N2')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Rest_N3')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Rest_N4')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Rest_N5')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Rest_N6')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Rest_N7')
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
            ])
            ->filters([
                DateRangeFilter::make('created_at'),

                SelectFilter::make('projet_id')
                    ->relationship('projet', 'Title')
                    ->indicator('Projet')
                    ->multiple()
                    ->label('Projet'),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmprunts::route('/'),
            'create' => Pages\CreateEmprunt::route('/create'),
            'view' => Pages\ViewEmprunt::route('/{record}'),
            'edit' => Pages\EditEmprunt::route('/{record}/edit'),
        ];
    }
}
