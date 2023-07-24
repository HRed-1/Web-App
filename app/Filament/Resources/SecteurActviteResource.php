<?php

namespace App\Filament\Resources;

use App\Models\SecteurActvite;
use Filament\{Tables, Forms};
use Filament\Resources\{Form, Table, Resource};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\SecteurActviteResource\Pages;

class SecteurActviteResource extends Resource
{
    protected static ?string $model = SecteurActvite::class;

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
        return __('Projets par Secteurs d\'Activité');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('Indicateurs');
    }

    public static function getModelLabel(): string
    {
        return __('Secteur d\'Activité');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Secteurs d\'Activité');
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
            ])
            ->filters([DateRangeFilter::make('created_at')]);
    }

    public static function getRelations(): array
    {
        return [
            SecteurActviteResource\RelationManagers\PorteursRelationManager::class,
            SecteurActviteResource\RelationManagers\ProjetsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSecteurActvites::route('/'),
            'create' => Pages\CreateSecteurActvite::route('/create'),
            'view' => Pages\ViewSecteurActvite::route('/{record}'),
            'edit' => Pages\EditSecteurActvite::route('/{record}/edit'),
        ];
    }
}
