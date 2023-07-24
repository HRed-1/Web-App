<?php

namespace App\Filament\Resources;

use App\Models\ActifPoste;
use Filament\{Tables, Forms};
use Filament\Resources\{Form, Table, Resource};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\ActifPosteResource\Pages;

class ActifPosteResource extends Resource
{
    protected static ?string $model = ActifPoste::class;

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-calculator';
    }

    public static function getNavigationSort(): ?int
    {
        return 2;
    }

    public static function getNavigationLabel(): string
    {
        return __('Postes Actif Circulant');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('Paramètres');
    }

    public static function getModelLabel(): string
    {
        return __('Actif');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Actifs');
    }

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function canGloballySearch(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()->schema([
                Grid::make(['default' => 0])->schema([
                    TextInput::make('title')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Title')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('title_ar')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Title Ar')
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
                Tables\Columns\TextColumn::make('title')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('title_ar')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
            ])
            ->filters([DateRangeFilter::make('created_at')]);
    }

    public static function getRelations(): array
    {
        return [
            ActifPosteResource\RelationManagers\InvestissementsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListActifPostes::route('/'),
            'create' => Pages\CreateActifPoste::route('/create'),
            'view' => Pages\ViewActifPoste::route('/{record}'),
            'edit' => Pages\EditActifPoste::route('/{record}/edit'),
        ];
    }
}
