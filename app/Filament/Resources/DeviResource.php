<?php

namespace App\Filament\Resources;

use App\Models\Devi;
use Filament\{Tables, Forms};
use Filament\Resources\{Form, Table, Resource};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\DeviResource\Pages;

class DeviResource extends Resource
{
    protected static ?string $model = Devi::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    //protected static ?string $recordTitleAttribute = 'Sort';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()->schema([
                Grid::make(['default' => 0])->schema([
                    Select::make('devis_fournisseur_id')
                        ->rules(['exists:devis_fournisseurs,id'])
                        ->nullable()
                        ->relationship('devisFournisseur', 'Title')
                        ->searchable()
                        ->placeholder('Devis Fournisseur')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

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

                    TextInput::make('Montant')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Montant')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Sort')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Sort')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    FileUpload::make('file')
                        ->rules(['file'])
                        ->nullable()
                        ->placeholder('File')
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
                Tables\Columns\TextColumn::make('devisFournisseur.Title')
                    ->toggleable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('projet.Title')
                    ->toggleable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('Montant')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('Sort')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
            ])
            ->filters([
                DateRangeFilter::make('created_at'),

                SelectFilter::make('devis_fournisseur_id')
                    ->relationship('devisFournisseur', 'Title')
                    ->indicator('DevisFournisseur')
                    ->multiple()
                    ->label('DevisFournisseur'),

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
            'index' => Pages\ListDevis::route('/'),
            'create' => Pages\CreateDevi::route('/create'),
            'view' => Pages\ViewDevi::route('/{record}'),
            'edit' => Pages\EditDevi::route('/{record}/edit'),
        ];
    }
}
