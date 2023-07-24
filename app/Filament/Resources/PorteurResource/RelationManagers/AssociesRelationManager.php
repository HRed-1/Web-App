<?php

namespace App\Filament\Resources\PorteurResource\RelationManagers;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\Section;
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

    

    protected static ?string $label = 'Associe';
    protected static ?string $title = 'Liste des Associes';


    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Informations Personnelles')->schema([
                
                TextInput::make('Name')
                    ->rules(['max:255', 'string'])
                    ->required()
                    ->label('Nom & Prénom')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 6,
                    ]),

                TextInput::make('Name_ar')
                    ->rules(['max:255', 'string'])
                    ->required()
                    ->label('Nom & Prénom')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 6,
                    ]),

                TextInput::make('CIN')
                    ->rules(['max:255', 'string'])
                    ->label('CIN')
                    ->required()
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 3,
                    ]),

                Radio::make('Genre')
                    ->rules(['max:255', 'string'])
                    ->label('Genre')
                    ->required()
                    ->options([
                        'H' => 'Homme',
                        'F' => 'Femme'
                    ])
                    
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 3,
                    ]),


                DatePicker::make('Birth_date')
                    ->rules(['max:255', 'string'])
                    ->required()
                    ->label('Date de Naissance')
                    ->default(now()->subYears(18))

                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 3,
                    ]),

                TextInput::make('age')
                    ->rules(['max:255', 'string'])
                    ->label('Age')
                    ->disabled()
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 2,
                    ]),

            ])->columns(12),
            Section::make('Coordonées')->schema([

                TextInput::make('Phone')
                    ->rules(['max:255', 'string'])
                    ->nullable()
                    ->Label('Numéro de TelePhone')
                    ->mask(fn (TextInput\Mask $mask) => $mask->pattern('00 00 00 00 00'))
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 4,
                    ]),

                TextInput::make('email')
                    ->rules(['email'])
                    ->nullable()
                    ->email()
                    ->Email('E-mail')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 4,
                    ]),


                TextInput::make('Adresse')
                            ->rules(['max:255', 'string'])
                            ->nullable()
                            
                            ->columnSpan([
                                'default' => 12,
                                'md' => 12,
                                'lg' => 8,
                            ]),

                Select::make('commune_id')
                            ->rules(['exists:communes,id'])
                            ->nullable()
                            ->required()
                            ->preload()
                            ->relationship('commune', 'Title')
                            ->searchable()
                            ->Label('Commune')
                            ->columnSpan([
                                'default' => 12,
                                'md' => 12,
                                'lg' => 4,
                            ]),


            ])->columns(12)->collapsible(),
            Section::make('Informations Professionnelles')->schema([
                

                Select::make('Formation')
                    ->label('Formation')
                    ->options([
                        '1' =>  'Primaire',
                        '2' =>  'Secondaire',
                        '3' =>  'Supérieur',
                        '4' =>  'Téchnique',
                        '5' =>  'Non Identifié'
                    ])
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 3,
                    ]),

                TextInput::make('Experience')
                    ->rules(['max:255', 'string'])
                    ->label('Année d\'Experience')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 3,
                    ]),

                Toggle::make('admin')
                    ->rules(['boolean'])
                    ->required()
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 3,
                    ]),

                Toggle::make('actif')
                    ->rules(['boolean'])
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 3,
                    ]),

            ])->columns(12)->collapsible()->collapsed(),
            Section::make('Pièces Jointes')->schema([
                
                FileUpload::make('Photo')
                    ->rules(['file'])
                    ->avatar()
                    ->image()
                    ->maxSize(2048)
                    ->directory('Photo-Associe')
                    ->label('Photo')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 6,
                    ]),

                FileUpload::make('Attach')
                    ->directory('Document-Associe')
                    ->acceptedFileTypes(['application/pdf'])
                    ->maxSize(2048)
                    ->multiple()
                    ->maxFiles(5)
                    ->enableReordering()
                    ->enableOpen()
                    ->enableDownload()
                    ->label('Pièce Jointe')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 6,
                    ]),
               
            ])->columns(12)->collapsible()->collapsed(),
            
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('Photo')->rounded()->toggleable(),
                Tables\Columns\TextColumn::make('Name')->limit(50)->toggleable()->label('Nom & Prénom'),
                Tables\Columns\TextColumn::make('Name_ar')->limit(50)->toggleable()->label('Nom & Prénom'),
                Tables\Columns\IconColumn::make('admin')->toggleable()->label('Admin')->boolean(),
                //Tables\Columns\TextColumn::make('CIN')->limit(50)->toggleable(),
                //Tables\Columns\TextColumn::make('Genre')->limit(50)->toggleable(),
                Tables\Columns\TextColumn::make('Phone')->limit(50)->toggleable()->Label('Numéro de TelePhone'),
                //Tables\Columns\TextColumn::make('Email')->limit(50)->toggleable(),

                //Tables\Columns\TextColumn::make('Birth_date')->limit(50)->toggleable(),
                Tables\Columns\TextColumn::make('age')->limit(50)->toggleable()->label('Age'),
                //Tables\Columns\TextColumn::make('commune.Title')->limit(50)->toggleable(),
   
    
                Tables\Columns\TextColumn::make('Formation')->limit(50)->toggleable(),
                //Tables\Columns\TextColumn::make('Experience')->limit(50)->toggleable(),
              
            ])
            
            ->headerActions([
                Tables\Actions\CreateAction::make()
                ->mutateFormDataUsing(function (array $data) {
                    // Calculate the age from the provided birth date
                    if (isset($data['Birth_date']) && !empty($data['Birth_date'])) {
                        $birthDate = \Carbon\Carbon::parse($data['Birth_date']);
                        $now = \Carbon\Carbon::now();
                        $data['age'] = $birthDate->diffInYears($now);
                    }
                    return $data;
                })
                ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }
}
