<?php

namespace App\Filament\Resources;

use App\Models\Accompagnement;
use Filament\{Tables, Forms};
use Filament\Resources\{Form, Table, Resource};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Filters\DateRangeFilter;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\AccompagnementResource\Pages;

class AccompagnementResource extends Resource
{
    protected static ?string $model = Accompagnement::class;

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-calculator';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function getNavigationLabel(): string
    {
        return __('Accompagnement');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('Accompagnement');
    }

    public static function getModelLabel(): string
    {
        return __('Accompagnement');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Accompagnements');
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
                    Select::make('porteur_id')
                        ->rules(['exists:porteurs,id'])
                        ->nullable()
                        ->relationship('porteur', 'Name')
                        ->searchable()
                        ->placeholder('Porteur')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Select::make('conseiller_id')
                        ->rules(['exists:conseillers,id'])
                        ->nullable()
                        ->relationship('conseiller', 'Name')
                        ->searchable()
                        ->placeholder('Conseiller')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Select::make('type_accompagnement_id')
                        ->rules(['exists:type_accompagnements,id'])
                        ->nullable()
                        ->relationship('typeAccompagnement', 'Title')
                        ->searchable()
                        ->placeholder('Type Accompagnement')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Select::make('programme_id')
                        ->rules(['exists:programmes,id'])
                        ->nullable()
                        ->relationship('programme', 'Title')
                        ->searchable()
                        ->placeholder('Programme')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    DateTimePicker::make('Date')
                        ->rules(['date'])
                        ->nullable()
                        ->placeholder('Date')
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

                    TextInput::make('Attach')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Attach')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    FileUpload::make('photo')
                        ->rules(['file'])
                        ->nullable()
                        ->image()
                        ->placeholder('Photo')
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
                Tables\Columns\TextColumn::make('porteur.Name')
                    ->toggleable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('conseiller.Name')
                    ->toggleable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('typeAccompagnement.Title')
                    ->toggleable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('programme.Title')
                    ->toggleable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('Date')
                    ->toggleable()
                    ->dateTime(),
                Tables\Columns\TextColumn::make('Detail')
                    ->toggleable()
                    ->searchable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('Attach')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\ImageColumn::make('photo')
                    ->toggleable()
                    ->circular(),
            ])
            ->filters([
                DateRangeFilter::make('created_at'),

                SelectFilter::make('porteur_id')
                    ->relationship('porteur', 'Name')
                    ->indicator('Porteur')
                    ->multiple()
                    ->label('Porteur'),

                SelectFilter::make('conseiller_id')
                    ->relationship('conseiller', 'Name')
                    ->indicator('Conseiller')
                    ->multiple()
                    ->label('Conseiller'),

                SelectFilter::make('type_accompagnement_id')
                    ->relationship('typeAccompagnement', 'Title')
                    ->indicator('TypeAccompagnement')
                    ->multiple()
                    ->label('TypeAccompagnement'),

                SelectFilter::make('programme_id')
                    ->relationship('programme', 'Title')
                    ->indicator('Programme')
                    ->multiple()
                    ->label('Programme'),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAccompagnements::route('/'),
            'create' => Pages\CreateAccompagnement::route('/create'),
            'view' => Pages\ViewAccompagnement::route('/{record}'),
            'edit' => Pages\EditAccompagnement::route('/{record}/edit'),
        ];
    }
}
