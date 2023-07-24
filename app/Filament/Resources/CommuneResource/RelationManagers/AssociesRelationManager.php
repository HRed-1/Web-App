<?php

namespace App\Filament\Resources\CommuneResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Resources\RelationManagers\RelationManager;

class AssociesRelationManager extends RelationManager
{
    protected static string $relationship = 'associes';

    protected static ?string $recordTitleAttribute = 'Name';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 0])->schema([
                TextInput::make('Name')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Name')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Name_ar')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Name Ar')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('CIN')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Cin')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Genre')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Genre')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Phone')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Phone')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Email')
                    ->rules(['email'])
                    ->email()
                    ->placeholder('Email')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                DatePicker::make('date_now')
                    ->rules(['date'])
                    ->placeholder('Date Now')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Birth_date')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Birth Date')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('age')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Age')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Adresse')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Adresse')
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

                TextInput::make('Formation')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Formation')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Experience')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Experience')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Toggle::make('admin')
                    ->rules(['boolean'])
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Toggle::make('actif')
                    ->rules(['boolean'])
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('poste')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Poste')
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
                Tables\Columns\TextColumn::make('Name')->limit(50),
                Tables\Columns\TextColumn::make('Name_ar')->limit(50),
                Tables\Columns\TextColumn::make('CIN')->limit(50),
                Tables\Columns\TextColumn::make('Genre')->limit(50),
                Tables\Columns\TextColumn::make('Phone')->limit(50),
                Tables\Columns\TextColumn::make('Email')->limit(50),
                Tables\Columns\TextColumn::make('date_now')->date(),
                Tables\Columns\TextColumn::make('Birth_date')->limit(50),
                Tables\Columns\TextColumn::make('age')->limit(50),
                Tables\Columns\TextColumn::make('commune.Title')->limit(50),
                Tables\Columns\TextColumn::make('Adresse')->limit(50),
                Tables\Columns\TextColumn::make('Attach')->limit(50),
                Tables\Columns\ImageColumn::make('Photo')->rounded(),
                Tables\Columns\TextColumn::make('porteur.Name')->limit(50),
                Tables\Columns\TextColumn::make('Formation')->limit(50),
                Tables\Columns\TextColumn::make('Experience')->limit(50),
                Tables\Columns\IconColumn::make('admin'),
                Tables\Columns\IconColumn::make('actif'),
                Tables\Columns\TextColumn::make('poste')->limit(50),
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

                MultiSelectFilter::make('commune_id')->relationship(
                    'commune',
                    'Title'
                ),

                MultiSelectFilter::make('porteur_id')->relationship(
                    'porteur',
                    'Name'
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
