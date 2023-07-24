<?php

namespace App\Filament\Resources\PorteurResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\Section;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Resources\RelationManagers\RelationManager;

class FormationsRelationManager extends RelationManager
{
    protected static string $relationship = 'formations';

    protected static ?string $title = 'Liste des Formations';


    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 12])->schema([
                Select::make('module_id')
                    ->rules(['exists:modules,id'])
                    ->relationship('module', 'Title')
                    ->searchable()
                    ->placeholder('Module')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 8,
                    ]),

                Select::make('conseiller_id')
                    ->rules(['exists:conseillers,id'])
                    ->relationship('conseiller', 'Name')
                    ->searchable()
                    ->placeholder('Conseiller')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 4,
                    ]),

                DateTimePicker::make('Debut')
                    ->rules(['date'])
                    ->placeholder('Debut')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 3,
                    ]),

                DateTimePicker::make('Fin')
                    ->rules(['date'])
                    ->placeholder('Fin')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 3,
                    ]),

                TextInput::make('Lieu')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Lieu')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 6,
                    ]),

                    Section::make('Attachements')->schema([
                        Grid::make(['default' => 12])->schema([
                                FileUpload::make('Attach')
                                    ->directory('Document-Formation')
                                    ->acceptedFileTypes(['application/pdf'])
                                    ->maxSize(2048)
                                    ->multiple()
                                    ->maxFiles(5)
                                    ->enableReordering()
                                    ->enableOpen()
                                    ->enableDownload()
                                    ->label('Pièces Jointes')
                                    ->columnSpan([
                                        'default' => 12,
                                        'md' => 12,
                                        'lg' => 6,
                                    ]),
        
                                FileUpload::make('Photo')
                                    ->rules(['file'])
                                    ->image()
                                    ->maxSize(2048)
                                    ->multiple()
                                    ->maxFiles(10)
                                    ->enableReordering()
                                    ->enableOpen()
                                    ->enableDownload()
                                    ->placeholder('Photo')
                                    ->columnSpan([
                                        'default' => 12,
                                        'md' => 12,
                                        'lg' => 6,
                                    ]),
                        ]),
                    ])->collapsible()->collapsed(),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('module.Title')->limit(50),
                //Tables\Columns\TextColumn::make('conseiller.Name')->limit(50),
                //Tables\Columns\TextColumn::make('programme.Title')->limit(50),
                Tables\Columns\TextColumn::make('Debut')->dateTime(),
                //Tables\Columns\TextColumn::make('Fin')->dateTime(),
                Tables\Columns\TextColumn::make('Lieu')->limit(50),
                //Tables\Columns\TextColumn::make('Attach')->limit(50),
                //Tables\Columns\ImageColumn::make('Photo')->rounded(),
            ])
            //->headerActions([Tables\Actions\CreateAction::make()])
            ->actions([
                Tables\Actions\ViewAction::make(),
                //Tables\Actions\DeleteAction::make(),
            ])
            //->bulkActions([Tables\Actions\DeleteBulkAction::make()])
            ;
    }
}
