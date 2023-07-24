<?php

namespace App\Filament\Resources;

use App\Models\TypeAccompagnement;
use Filament\{Tables, Forms};
use Filament\Resources\{Form, Table, Resource};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\TypeAccompagnementResource\Pages;

class TypeAccompagnementResource extends Resource
{
    protected static ?string $model = TypeAccompagnement::class;

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
        return __(' Types d\'Accompagnement');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('Paramètres');
    }

    public static function getModelLabel(): string
    {
        return __('Type d\'Accompagnement post Financement');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Types d\'Accompagnement post Financement');
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

                    RichEditor::make('Detail')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Detail')
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
                Tables\Columns\TextColumn::make('Detail')
                    ->toggleable()
                    ->searchable()
                    ->limit(50),
            ])
            ->filters([DateRangeFilter::make('created_at')]);
    }

    public static function getRelations(): array
    {
        return [
            TypeAccompagnementResource\RelationManagers\AccompagnementsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTypeAccompagnements::route('/'),
            'create' => Pages\CreateTypeAccompagnement::route('/create'),
            'view' => Pages\ViewTypeAccompagnement::route('/{record}'),
            'edit' => Pages\EditTypeAccompagnement::route('/{record}/edit'),
        ];
    }
}
