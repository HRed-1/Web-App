<?php

namespace App\Filament\Resources\SecteurActviteResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Resources\RelationManagers\RelationManager;

class PorteursRelationManager extends RelationManager
{
    protected static string $relationship = 'porteurs';

    protected static ?string $recordTitleAttribute = 'Name';

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

                Select::make('forme_juridique_id')
                    ->rules(['exists:forme_juridiques,id'])
                    ->relationship('formeJuridique', 'Title')
                    ->searchable()
                    ->placeholder('Forme Juridique')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Toggle::make('Creer')
                    ->rules(['boolean'])
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                DatePicker::make('Date_creation')
                    ->rules(['date'])
                    ->placeholder('Date Creation')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('ID_RC')
                    ->rules(['max:255', 'string'])
                    ->unique('porteurs', 'ID_RC', fn(?Model $record) => $record)
                    ->placeholder('Id Rc')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('ID_RCOP')
                    ->rules(['max:255', 'string'])
                    ->unique(
                        'porteurs',
                        'ID_RCOP',
                        fn(?Model $record) => $record
                    )
                    ->placeholder('Id Rcop')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('ID_ICE')
                    ->rules(['max:255', 'string'])
                    ->unique(
                        'porteurs',
                        'ID_ICE',
                        fn(?Model $record) => $record
                    )
                    ->placeholder('Id Ice')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Activity')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Activity')
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

                Select::make('commune_id')
                    ->rules(['exists:communes,id'])
                    ->relationship('commune', 'Title')
                    ->searchable()
                    ->placeholder('Commune')
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

                TextInput::make('Membre')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Membre')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Membre_F')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Membre F')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Membre_H')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Membre H')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Membre_JH')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Membre Jh')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Membre_JF')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Membre Jf')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Select::make('user_id')
                    ->rules(['exists:users,id'])
                    ->relationship('user', 'name')
                    ->searchable()
                    ->placeholder('User')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('validite')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Validite')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                DatePicker::make('date_renouv')
                    ->rules(['date'])
                    ->placeholder('Date Renouv')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('nmbr_conseil')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Nmbr Conseil')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                DatePicker::make('date_assemble')
                    ->rules(['date'])
                    ->placeholder('Date Assemble')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('name_represent')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Name Represent')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('cin_represent')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Cin Represent')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('phone_represent')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Phone Represent')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('if')
                    ->rules(['max:255', 'string'])
                    ->placeholder('If')
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
                Tables\Columns\TextColumn::make('formeJuridique.Title')->limit(
                    50
                ),
                Tables\Columns\IconColumn::make('Creer'),
                Tables\Columns\TextColumn::make('Date_creation')->date(),
                Tables\Columns\TextColumn::make('ID_RC')->limit(50),
                Tables\Columns\TextColumn::make('ID_RCOP')->limit(50),
                Tables\Columns\TextColumn::make('ID_ICE')->limit(50),
                Tables\Columns\TextColumn::make('secteurActvite.Title')->limit(
                    50
                ),
                Tables\Columns\TextColumn::make('Activity')->limit(50),
                Tables\Columns\TextColumn::make('Phone')->limit(50),
                Tables\Columns\TextColumn::make('Email')->limit(50),
                Tables\Columns\TextColumn::make('commune.Title')->limit(50),
                Tables\Columns\TextColumn::make('Adresse')->limit(50),
                Tables\Columns\TextColumn::make('Membre'),
                Tables\Columns\TextColumn::make('Membre_F'),
                Tables\Columns\TextColumn::make('Membre_H'),
                Tables\Columns\TextColumn::make('Membre_JH'),
                Tables\Columns\TextColumn::make('Membre_JF'),
                Tables\Columns\TextColumn::make('user.name')->limit(50),
                Tables\Columns\TextColumn::make('validite'),
                Tables\Columns\TextColumn::make('date_renouv')->date(),
                Tables\Columns\TextColumn::make('nmbr_conseil'),
                Tables\Columns\TextColumn::make('date_assemble')->date(),
                Tables\Columns\TextColumn::make('name_represent')->limit(50),
                Tables\Columns\TextColumn::make('cin_represent')->limit(50),
                Tables\Columns\TextColumn::make('phone_represent')->limit(50),
                Tables\Columns\TextColumn::make('if')->limit(50),
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

                MultiSelectFilter::make('forme_juridique_id')->relationship(
                    'formeJuridique',
                    'Title'
                ),

                MultiSelectFilter::make('secteur_actvite_id')->relationship(
                    'secteurActvite',
                    'Title'
                ),

                MultiSelectFilter::make('commune_id')->relationship(
                    'commune',
                    'Title'
                ),

                MultiSelectFilter::make('user_id')->relationship(
                    'user',
                    'name'
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
