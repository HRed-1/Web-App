<?php

namespace App\Filament\Resources\ProgrammeResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
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

                Select::make('type_accompagnement_id')
                    ->rules(['exists:type_accompagnements,id'])
                    ->relationship('typeAccompagnement', 'Title')
                    ->searchable()
                    ->placeholder('Type Accompagnement')
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

                FileUpload::make('photo')
                    ->rules(['file'])
                    ->image()
                    ->placeholder('Photo')
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
