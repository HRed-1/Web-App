<?php

namespace App\Filament\Resources\ProjetResource\RelationManagers;

use Closure;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\TextInput\Mask;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Resources\RelationManagers\RelationManager;

class MoyenFonciersRelationManager extends RelationManager
{
    protected static string $relationship = 'moyenFonciers';

    protected static ?string $recordTitleAttribute = 'Title';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $title = 'Le Local d\'Exploitation';

    public static function form(Form $form): Form
    {
        return $form->schema([
            
            Section::make('Information sur le Local d\'Exploitation')->schema([
                    Grid::make(['default' => 12])->schema([

                        
                        TextInput::make('Title')
                            ->rules(['max:255', 'string'])
                            ->label('Local d\'Exploitation')
                            ->columnSpan([
                                'default' => 12,
                                'md' => 12,
                                'lg' => 4,
                            ]),


                        Select::make('Usage')
                            ->rules(['max:255', 'string'])
                            ->label('Type d\'Usage')
                            ->reactive()
                            ->options([
                                'location' => 'Location',
                                'propriete' => 'Proprietaire',
                                'collective' => 'Terres Collective',
                                'melk' => 'Melk',
                                'autorisation' =>  'Autorisation d\'Exploitation',
                            ])
                            ->columnSpan([
                                'default' => 12,
                                'md' => 12,
                                'lg' => 4,
                            ]),

                        Select::make('Zone')
                            ->rules(['max:255', 'string'])
                            ->label('Zone')
                            ->options([
                                'rurale' => 'Zone Rurale',
                                'urbaine' => 'Zone Urbaine',
                                'industriel' => 'Zone Industrielle',
                                'artisanal' => 'Complexe Artisanal'
                            ])
                            ->columnSpan([
                                'default' => 12,
                                'md' => 12,
                                'lg' => 4,
                            ]),

                        Section::make('Photos du Local d\'Exploitation')->schema([
                                Grid::make(['default' => 12])->schema([
                
                                        FileUpload::make('Photo')
                                            ->rules(['file'])
                                            ->directory('Photo-Produit')
                                            ->image()
                                            ->maxSize(2048)
                                            // ->multiple()
                                            // ->maxFiles(10)
                                            ->enableReordering()
                                            ->enableOpen()
                                            ->enableDownload()
                                            ->placeholder('Photo')
                                            ->columnSpan([
                                                'default' => 12,
                                                'md' => 12,
                                                'lg' => 12,
                                            ]),
                                ]),
                        ])->collapsible()->collapsed(),
                    


                        Toggle::make('amenagement')
                            ->rules(['boolean'])
                            ->reactive()
                            ->columnSpan([
                                'default' => 12,
                                'md' => 12,
                                'lg' => 12,
                            ]),

                        Fieldset::make('Travaux d\'Amenagement')
                            ->relationship('investissement')
                            ->visible(fn (Closure $get) => $get('amenagement') == 1)
                            ->schema([

                                    Hidden::make('projet_id')
                                        ->default(function (RelationManager $livewire) {
                                            return $livewire->ownerRecord->id;
                                        }),

                                    TextInput::make('Title')
                                        ->rules(['max:255', 'string'])
                                        ->label('Description')
                                        ->prefix('Aménagement : ')
                                        ->columnSpan([
                                            'default' => 12,
                                            'md' => 12,
                                            'lg' => 2,
                                        ]),

                                    TextInput::make('Invest_N1')
                                        ->rules(['numeric'])
                                        ->numeric()
                                        ->label('Montant des Travaux')
                                        ->mask(fn (Mask $mask) => $mask->money(prefix: 'DH    ', thousandsSeparator: ' ', decimalPlaces: 2, isSigned: false))

                                        ->columnSpan([
                                            'default' => 12,
                                            'md' => 12,
                                            'lg' => 1,
                                        ]),

                            ])->columns(3),



                        Fieldset::make('Loyer et Charges Locatives')
                            ->relationship('charge')
                            ->visible(fn (Closure $get) => $get('Usage') == 'location')
                            ->schema([

                                    Hidden::make('projet_id')
                                        ->default(function (RelationManager $livewire) {
                                            return $livewire->ownerRecord->id;
                                        }),

                                    TextInput::make('Title')
                                        ->rules(['max:255', 'string'])
                                        ->label('Charge')
                                        ->default('Loyer')
                                        ->columnSpan([
                                            'default' => 12,
                                            'md' => 12,
                                            'lg' => 2,
                                        ]),

                                        TextInput::make('Mensuel')
                                        ->rules(['numeric'])
                                        ->numeric()
                                        ->placeholder('Mensuel')
                                        ->mask(fn (Mask $mask) => $mask->money(prefix: 'DH    ', thousandsSeparator: ' ', decimalPlaces: 2, isSigned: false))

                                        ->columnSpan([
                                            'default' => 12,
                                            'md' => 12,
                                            'lg' => 1,
                                        ]),

                        ])->columns(3),

                        
                    ]),

            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Title')->limit(50),
                
                Tables\Columns\TextColumn::make('Usage')->limit(50),
                Tables\Columns\TextColumn::make('Zone')->limit(50),
            ])
            ->headerActions([Tables\Actions\CreateAction::make()])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }
}
