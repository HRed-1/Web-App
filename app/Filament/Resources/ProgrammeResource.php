<?php

namespace App\Filament\Resources;

use App\Models\Programme;
use Filament\{Tables, Forms};
use Filament\Resources\{Form, Table, Resource};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\ProgrammeResource\Pages;

class ProgrammeResource extends Resource
{
    protected static ?string $model = Programme::class;

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-calculator';
    }

    public static function getNavigationSort(): ?int
    {
        return 4;
    }
    
    public static function getNavigationLabel(): string
    {
        return __('Projets par Programmes');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('Indicateurs');
    }

    public static function getModelLabel(): string
    {
        return __('Commune');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Communes');
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
                    TextInput::make('Title')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Title')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Title_ar')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Title Ar')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    DatePicker::make('Date')
                        ->rules(['date'])
                        ->nullable()
                        ->placeholder('Date')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Toggle::make('Open')
                        ->rules(['boolean'])
                        ->nullable()
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('Attach')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Attach')
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
                Tables\Columns\TextColumn::make('Title_ar')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('Date')
                    ->toggleable()
                    ->date(),
                Tables\Columns\IconColumn::make('Open')
                    ->toggleable()
                    ->boolean(),
                Tables\Columns\TextColumn::make('Attach')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
            ])
            ->filters([DateRangeFilter::make('created_at')]);
    }

    public static function getRelations(): array
    {
        return [
            ProgrammeResource\RelationManagers\ProjetsRelationManager::class,
            ProgrammeResource\RelationManagers\FormationsRelationManager::class,
            ProgrammeResource\RelationManagers\AccompagnementsRelationManager::class,
            ProgrammeResource\RelationManagers\AccompagnementPostsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProgrammes::route('/'),
            'create' => Pages\CreateProgramme::route('/create'),
            'view' => Pages\ViewProgramme::route('/{record}'),
            'edit' => Pages\EditProgramme::route('/{record}/edit'),
        ];
    }
}
