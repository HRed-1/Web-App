<?php

namespace App\Filament\Resources;

use App\Models\Subvention;
use Filament\{Tables, Forms};
use Filament\Resources\{Form, Table, Resource};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\SubventionResource\Pages;

class SubventionResource extends Resource
{
    protected static ?string $model = Subvention::class;

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
                Tables\Columns\TextColumn::make('Montant_N1')
                    ->toggleable()
                    ->searchable(true, null, true),
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
            'index' => Pages\ListSubventions::route('/'),
            'create' => Pages\CreateSubvention::route('/create'),
            'view' => Pages\ViewSubvention::route('/{record}'),
            'edit' => Pages\EditSubvention::route('/{record}/edit'),
        ];
    }
}
