<?php

namespace App\Filament\Resources\PorteurResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Resources\RelationManagers\RelationManager;

class AccompagnementsRelationManager extends RelationManager
{
    protected static string $relationship = 'accompagnements';


    protected static ?string $title = 'Liste des Séances d\'Accompagnement';


    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 12])->schema([
                Select::make('conseiller_id')
                    ->rules(['exists:conseillers,id'])
                    ->relationship('conseiller', 'Name')
                    ->searchable()
                    ->label('Conseiller')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 4,
                    ]),

                Select::make('type_accompagnement_id')
                    ->rules(['exists:type_accompagnements,id'])
                    ->relationship('typeAccompagnement', 'Title')
                    ->searchable()
                    ->preload()
                    ->label('Type Accompagnement')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 4,
                    ]),

                DateTimePicker::make('Date')
                    ->rules(['date'])
                    ->label('Date')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 4,
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
                            ->directory('Photo-Accompagnement')
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
                        
                        RichEditor::make('Detail')
                            ->rules(['max:255', 'string'])
                            ->label('Compte Rendu')
                            ->disableAllToolbarButtons()
                            ->enableToolbarButtons([
                                    'bold',
                                    'bulletList',
                                    'italic',])
                            ->columnSpan([
                                'default' => 12,
                                'md' => 12,
                                'lg' => 12,
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
                Tables\Columns\TextColumn::make('porteur.Name')->limit(50),
                Tables\Columns\TextColumn::make('conseiller.Name')->limit(50),
                Tables\Columns\TextColumn::make(
                    'typeAccompagnement.Title'
                )->limit(50),
                Tables\Columns\TextColumn::make('programme.Title')->limit(50),
                Tables\Columns\TextColumn::make('Date')->dateTime(),
                Tables\Columns\TextColumn::make('Detail')->limit(50),
                Tables\Columns\TextColumn::make('Attach')->limit(50),
                Tables\Columns\ImageColumn::make('photo')->rounded(),
            ])
            ->filters([
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from'),
                        Forms\Components\DatePicker::make('created_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn(
                                    Builder $query,
                                    $date
                                ): Builder => $query->whereDate(
                                    'created_at',
                                    '>=',
                                    $date
                                )
                            )
                            ->when(
                                $data['created_until'],
                                fn(
                                    Builder $query,
                                    $date
                                ): Builder => $query->whereDate(
                                    'created_at',
                                    '<=',
                                    $date
                                )
                            );
                    }),

                MultiSelectFilter::make('porteur_id')->relationship(
                    'porteur',
                    'Name'
                ),

                MultiSelectFilter::make('conseiller_id')->relationship(
                    'conseiller',
                    'Name'
                ),

                MultiSelectFilter::make('type_accompagnement_id')->relationship(
                    'typeAccompagnement',
                    'Title'
                ),

                MultiSelectFilter::make('programme_id')->relationship(
                    'programme',
                    'Title'
                ),
            ])
            ->headerActions([Tables\Actions\CreateAction::make()])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }
}
