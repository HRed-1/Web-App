<?php

namespace App\Filament\Resources\TypeAccompPostResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Resources\RelationManagers\RelationManager;

class AccompagnementPostsRelationManager extends RelationManager
{
    protected static string $relationship = 'accompagnementPosts';

    protected static ?string $recordTitleAttribute = 'Detail';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 0])->schema([
                Select::make('porteur_id')
                    ->rules(['exists:porteurs,id'])
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
                    ->relationship('conseiller', 'Name')
                    ->searchable()
                    ->placeholder('Conseiller')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Select::make('programme_id')
                    ->rules(['exists:programmes,id'])
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
                    ->placeholder('Date')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                RichEditor::make('Detail')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Detail')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Attach')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Attach')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                FileUpload::make('Photo')
                    ->rules(['file'])
                    ->image()
                    ->placeholder('Photo')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('projet')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Projet')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Toggle::make('check')
                    ->rules(['boolean'])
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Select::make('projet_id')
                    ->rules(['exists:projets,id'])
                    ->relationship('projet', 'Title')
                    ->searchable()
                    ->placeholder('Projet')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('action')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Action')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('diagnostic')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Diagnostic')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('resultat')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Resultat')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('objectif')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Objectif')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('porteur.Name')->limit(50),
                Tables\Columns\TextColumn::make('conseiller.Name')->limit(50),
                Tables\Columns\TextColumn::make('programme.Title')->limit(50),
                Tables\Columns\TextColumn::make('Date')->dateTime(),
                Tables\Columns\TextColumn::make('Detail')->limit(50),
                Tables\Columns\TextColumn::make('Attach')->limit(50),
                Tables\Columns\ImageColumn::make('Photo')->rounded(),
                Tables\Columns\TextColumn::make('projet')->limit(50),
                Tables\Columns\TextColumn::make('typeAccompPost.Title')->limit(
                    50
                ),
                Tables\Columns\IconColumn::make('check'),
                Tables\Columns\TextColumn::make('projet.Title')->limit(50),
                Tables\Columns\TextColumn::make('action')->limit(50),
                Tables\Columns\TextColumn::make('diagnostic')->limit(50),
                Tables\Columns\TextColumn::make('resultat')->limit(50),
                Tables\Columns\TextColumn::make('objectif')->limit(50),
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

                MultiSelectFilter::make('programme_id')->relationship(
                    'programme',
                    'Title'
                ),

                MultiSelectFilter::make('type_accomp_post_id')->relationship(
                    'typeAccompPost',
                    'Title'
                ),

                MultiSelectFilter::make('projet_id')->relationship(
                    'projet',
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
