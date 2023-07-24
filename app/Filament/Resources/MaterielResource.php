<?php

namespace App\Filament\Resources;

use App\Models\Materiel;
use Filament\{Tables, Forms};
use Filament\Resources\{Form, Table, Resource};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\MaterielResource\Pages;

class MaterielResource extends Resource
{
    protected static ?string $model = Materiel::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    //protected static ?string $recordTitleAttribute = 'title';

    protected static bool $shouldRegisterNavigation = false;

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

                    TextInput::make('ref')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Ref')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    RichEditor::make('detail')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Detail')
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

                    Toggle::make('reception')
                        ->rules(['boolean'])
                        ->nullable()
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Toggle::make('check1')
                        ->rules(['boolean'])
                        ->nullable()
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Toggle::make('check2')
                        ->rules(['boolean'])
                        ->nullable()
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Toggle::make('check3')
                        ->rules(['boolean'])
                        ->nullable()
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Toggle::make('check4')
                        ->rules(['boolean'])
                        ->nullable()
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Toggle::make('check5')
                        ->rules(['boolean'])
                        ->nullable()
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    DatePicker::make('date1')
                        ->rules(['date'])
                        ->nullable()
                        ->placeholder('Date1')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    DatePicker::make('date2')
                        ->rules(['date'])
                        ->nullable()
                        ->placeholder('Date2')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    DatePicker::make('date3')
                        ->rules(['date'])
                        ->nullable()
                        ->placeholder('Date3')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    DatePicker::make('date4')
                        ->rules(['date'])
                        ->nullable()
                        ->placeholder('Date4')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    DatePicker::make('date5')
                        ->rules(['date'])
                        ->nullable()
                        ->placeholder('Date5')
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
                Tables\Columns\TextColumn::make('ref')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('detail')
                    ->toggleable()
                    ->searchable()
                    ->limit(50),
                Tables\Columns\ImageColumn::make('photo')
                    ->toggleable()
                    ->circular(),
                Tables\Columns\TextColumn::make('projet.Title')
                    ->toggleable()
                    ->limit(50),
                Tables\Columns\IconColumn::make('reception')
                    ->toggleable()
                    ->boolean(),
                Tables\Columns\IconColumn::make('check1')
                    ->toggleable()
                    ->boolean(),
                Tables\Columns\IconColumn::make('check2')
                    ->toggleable()
                    ->boolean(),
                Tables\Columns\IconColumn::make('check3')
                    ->toggleable()
                    ->boolean(),
                Tables\Columns\IconColumn::make('check4')
                    ->toggleable()
                    ->boolean(),
                Tables\Columns\IconColumn::make('check5')
                    ->toggleable()
                    ->boolean(),
                Tables\Columns\TextColumn::make('date1')
                    ->toggleable()
                    ->date(),
                Tables\Columns\TextColumn::make('date2')
                    ->toggleable()
                    ->date(),
                Tables\Columns\TextColumn::make('date3')
                    ->toggleable()
                    ->date(),
                Tables\Columns\TextColumn::make('date4')
                    ->toggleable()
                    ->date(),
                Tables\Columns\TextColumn::make('date5')
                    ->toggleable()
                    ->date(),
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
            'index' => Pages\ListMateriels::route('/'),
            'create' => Pages\CreateMateriel::route('/create'),
            'view' => Pages\ViewMateriel::route('/{record}'),
            'edit' => Pages\EditMateriel::route('/{record}/edit'),
        ];
    }
}
