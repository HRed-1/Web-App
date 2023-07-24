<?php

namespace App\Filament\Resources;

use Filament\{Tables, Forms};
use App\Models\TypeAccompPost;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use App\Filament\Filters\DateRangeFilter;
use Filament\Forms\Components\RichEditor;
use Filament\Resources\{Form, Table, Resource};
use App\Filament\Resources\TypeAccompPostResource\Pages;

class TypeAccompPostResource extends Resource
{
    protected static ?string $model = TypeAccompPost::class;
    
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
        return __(' Types d\'Accompagnement Post');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('Paramètres');
    }

    public static function getModelLabel(): string
    {
        return __('Type d\'Accompagnement');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Types d\'Accompagnement post');
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
            ])
            ->filters([DateRangeFilter::make('created_at')]);
    }

    public static function getRelations(): array
    {
        return [
            TypeAccompPostResource\RelationManagers\AccompagnementPostsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTypeAccompPosts::route('/'),
            'create' => Pages\CreateTypeAccompPost::route('/create'),
            'view' => Pages\ViewTypeAccompPost::route('/{record}'),
            'edit' => Pages\EditTypeAccompPost::route('/{record}/edit'),
        ];
    }
}
