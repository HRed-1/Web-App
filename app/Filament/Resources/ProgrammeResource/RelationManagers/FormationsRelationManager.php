<?php

namespace App\Filament\Resources\ProgrammeResource\RelationManagers;

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
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Resources\RelationManagers\RelationManager;

class FormationsRelationManager extends RelationManager
{
    protected static string $relationship = 'formations';

    protected static ?string $recordTitleAttribute = 'Lieu';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 0])->schema([
                Select::make('module_id')
                    ->rules(['exists:modules,id'])
                    ->relationship('module', 'Title')
                    ->searchable()
                    ->placeholder('Module')
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

                DateTimePicker::make('Debut')
                    ->rules(['date'])
                    ->placeholder('Debut')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                DateTimePicker::make('Fin')
                    ->rules(['date'])
                    ->placeholder('Fin')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Lieu')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Lieu')
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
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('module.Title')->limit(50),
                Tables\Columns\TextColumn::make('conseiller.Name')->limit(50),
                Tables\Columns\TextColumn::make('programme.Title')->limit(50),
                Tables\Columns\TextColumn::make('Debut')->dateTime(),
                Tables\Columns\TextColumn::make('Fin')->dateTime(),
                Tables\Columns\TextColumn::make('Lieu')->limit(50),
                Tables\Columns\TextColumn::make('Attach')->limit(50),
                Tables\Columns\ImageColumn::make('Photo')->rounded(),
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

                MultiSelectFilter::make('module_id')->relationship(
                    'module',
                    'Title'
                ),

                MultiSelectFilter::make('conseiller_id')->relationship(
                    'conseiller',
                    'Name'
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
