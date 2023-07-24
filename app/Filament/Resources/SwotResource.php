<?php

namespace App\Filament\Resources;

use App\Models\Swot;
use Filament\{Tables, Forms};
use Filament\Resources\{Form, Table, Resource};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\SwotResource\Pages;

class SwotResource extends Resource
{
    protected static ?string $model = Swot::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

   

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()->schema([
                Grid::make(['default' => 0])->schema([
                    TextInput::make('pfort')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Pfort')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('pfaible')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Pfaible')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('opportunity')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Opportunity')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('threat')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Threat')
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
                Tables\Columns\TextColumn::make('pfort')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('pfaible')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('opportunity')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('threat')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('projet.Title')
                    ->toggleable()
                    ->limit(50),
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
            'index' => Pages\ListSwots::route('/'),
            'create' => Pages\CreateSwot::route('/create'),
            'view' => Pages\ViewSwot::route('/{record}'),
            'edit' => Pages\EditSwot::route('/{record}/edit'),
        ];
    }
}
