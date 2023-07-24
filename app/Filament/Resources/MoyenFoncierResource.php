<?php

namespace App\Filament\Resources;

use App\Models\MoyenFoncier;
use Filament\{Tables, Forms};
use Filament\Resources\{Form, Table, Resource};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\MoyenFoncierResource\Pages;

class MoyenFoncierResource extends Resource
{
    protected static ?string $model = MoyenFoncier::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    //protected static ?string $recordTitleAttribute = 'Title';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()->schema([
                Grid::make(['default' => 0])->schema([
                    TextInput::make('Title')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Title')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    FileUpload::make('Photo')
                        ->rules(['file'])
                        ->nullable()
                        ->image()
                        ->placeholder('Photo')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Usage')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Usage')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Zone')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Zone')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Select::make('investissement_id')
                        ->rules(['exists:investissements,id'])
                        ->nullable()
                        ->relationship('investissement', 'Title')
                        ->searchable()
                        ->placeholder('Investissement')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Select::make('charge_id')
                        ->rules(['exists:charges,id'])
                        ->nullable()
                        ->relationship('charge', 'Type')
                        ->searchable()
                        ->placeholder('Charge')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

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
                ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->poll('60s')
            ->columns([
                Tables\Columns\TextColumn::make('Title')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\ImageColumn::make('Photo')
                    ->toggleable()
                    ->circular(),
                Tables\Columns\TextColumn::make('Usage')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('Zone')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('investissement.Title')
                    ->toggleable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('charge.Type')
                    ->toggleable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('projet.Title')
                    ->toggleable()
                    ->limit(50),
            ])
            ->filters([
                DateRangeFilter::make('created_at'),

                SelectFilter::make('investissement_id')
                    ->relationship('investissement', 'Title')
                    ->indicator('Investissement')
                    ->multiple()
                    ->label('Investissement'),

                SelectFilter::make('charge_id')
                    ->relationship('charge', 'Type')
                    ->indicator('Charge')
                    ->multiple()
                    ->label('Charge'),

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
            'index' => Pages\ListMoyenFonciers::route('/'),
            'create' => Pages\CreateMoyenFoncier::route('/create'),
            'view' => Pages\ViewMoyenFoncier::route('/{record}'),
            'edit' => Pages\EditMoyenFoncier::route('/{record}/edit'),
        ];
    }
}
