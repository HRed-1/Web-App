<?php

namespace App\Filament\Resources\ProjetResource\RelationManagers;

use Closure;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\TextInput\Mask;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Resources\RelationManagers\RelationManager;

class InvestissementsRelationManager extends RelationManager
{
    protected static string $relationship = 'investissements';

    protected static ?string $recordTitleAttribute = 'Title';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $title = 'Liste des Investissements';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 12])->schema([

                Section::make('Designation')->schema([

                            Select::make('actif_poste_id')
                                ->rules(['exists:actif_postes,id'])
                                ->relationship('actifPoste', 'title')
                                ->preload()
                                ->required()
                                ->label('Type')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 4,
                                ]),

                            TextInput::make('N1')
                                ->rules(['numeric'])
                                ->numeric()
                                ->default(Carbon::now()->year)
                                ->label('Exercie')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 4,
                                ]),

                            TextInput::make('Title')
                                ->rules(['max:255', 'string'])
                                ->label('Designation')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 12,
                                ]),

                            TextInput::make('Qty')
                                ->rules(['numeric'])
                                ->numeric()
                                ->label('Quantité')
                                ->required()
                                ->default('1')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 2,
                                ]),

                            TextInput::make('PU')
                                ->rules(['numeric'])
                                ->numeric()
                                ->label('Prix Unitaire')
                                ->default('0')
                                ->required()

                                ->mask(fn (Mask $mask) => $mask->money(prefix: 'DH    ', thousandsSeparator: ' ', decimalPlaces: 2, isSigned: false))

                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 3,
                                ]),

                            TextInput::make('Invest_N1')
                                ->rules(['numeric'])
                                ->numeric()
                                ->label('Total')
                                ->mask(fn (Mask $mask) => $mask->money(prefix: 'DH    ', thousandsSeparator: ' ', decimalPlaces: 2, isSigned: false))

                                ->disabled()
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 4,
                                ]),

                            Toggle::make('amortissable')
                                ->rules(['boolean'])
                                ->reactive()
                                ->inline(false)
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 2,
                                ]),

                ])->collapsible()->columns(12),
                            
                Fieldset::make('Amortissement')
                        ->visible(fn (Closure $get) => $get('amortissable') == 1)
                        ->columns(12)
                        ->schema([

                        TextInput::make('N1')
                            ->rules(['numeric'])
                            ->numeric()
                            ->default(Carbon::now()->year)
                            ->label('Exercie')
                            ->columnSpan([
                                'default' => 12,
                                'md' => 12,
                                'lg' => 4,
                            ]),

                        TextInput::make('Amortissement')
                            ->rules(['numeric'])
                            ->numeric()
                            ->default('5')
                            ->label('Durée d\'Amortissement')
                            ->columnSpan([
                                'default' => 12,
                                'md' => 12,
                                'lg' => 3,
                            ]),

                        TextInput::make('Montant_N1')
                            ->rules(['numeric'])
                            ->numeric()
                            ->label('Dotation')
                            ->mask(fn (Mask $mask) => $mask->money(prefix: 'DH    ', thousandsSeparator: ' ', decimalPlaces: 2, isSigned: false))

                            ->disabled()
                            ->columnSpan([
                                'default' => 12,
                                'md' => 12,
                                'lg' => 5,
                            ]),

                        
                        

                
                
                ]),
                Section::make('Photos du Matériel')->schema([
                    Grid::make(['default' => 12])->schema([
    
                            FileUpload::make('Photo')
                                ->rules(['file'])
                                ->directory('Photo-Produit')
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
                Tables\Columns\TextColumn::make('actifPoste.title')->label('Type')->limit(50),
                Tables\Columns\TextColumn::make('Title')->label('Designation')->limit(50),
                Tables\Columns\TextColumn::make('Qty')->label('Quantité'),
                Tables\Columns\TextColumn::make('PU')->label('Prix Unitaire'),
                Tables\Columns\TextColumn::make('Invest_N1')->label('Total'),
                
            ])
            
            ->headerActions([Tables\Actions\CreateAction::make()
                        ->mutateFormDataUsing(function (array $data) {
                            $data['N2'] = $data['N1'] + 1;
                            $data['N3'] = $data['N1'] + 2;
                            $data['N4'] = $data['N1'] + 3;
                            $data['N5'] = $data['N1'] + 4;
                            $data['N6'] = $data['N1'] + 5;
                            $data['N7'] = $data['N1'] + 6;
                            $data['Invest_N1'] = $data['Qty'] * $data['PU'];
        
                            if ($data['amortissable'] == 1) {
                                if ($data['Amortissement'] >= 1) {
                                    $data['Montant_N1'] = $data['Qty'] * $data['PU'] / $data['Amortissement'];
        
                                    if ($data['Amortissement'] >= 2) {
                                        $data['Montant_N2'] = $data['Qty'] * $data['PU'] / ($data['Amortissement'] );
                                    } else {
                                        // Perform alternative logic if Amortissement is less than 2
                                        // For example:
                                        $data['Montant_N2'] = 0;
                                    }
        
                                    if ($data['Amortissement'] >= 3) {
                                        $data['Montant_N3'] = $data['Qty'] * $data['PU'] / ($data['Amortissement']);
                                    } else {
                                        // Perform alternative logic if Amortissement is less than 3
                                        // For example:
                                        $data['Montant_N3'] = 0;
                                    }
        
                                    if ($data['Amortissement'] >= 4) {
                                        $data['Montant_N4'] = $data['Qty'] * $data['PU'] / ($data['Amortissement']);
                                    } else {
                                        // Perform alternative logic if Amortissement is less than 4
                                        // For example:
                                        $data['Montant_N4'] = 0;
                                    }
        
                                    if ($data['Amortissement'] >= 5) {
                                        $data['Montant_N5'] = $data['Qty'] * $data['PU'] / ($data['Amortissement']);
                                    } else {
                                        // Perform alternative logic if Amortissement is less than 5
                                        // For example:
                                        $data['Montant_N5'] = 0;
                                    }
        
                                    if ($data['Amortissement'] >= 6) {
                                        $data['Montant_N6'] = $data['Qty'] * $data['PU'] / ($data['Amortissement']);
                                    } else {
                                        // Perform alternative logic if Amortissement is less than 6
                                        // For example:
                                        $data['Montant_N6'] = 0;
                                    }
        
                                    if ($data['Amortissement'] >= 7) {
                                        $data['Montant_N7'] = $data['Qty'] * $data['PU'] / ($data['Amortissement']);
                                    } else {
                                        // Perform alternative logic if Amortissement is less than 7
                                        // For example:
                                        $data['Montant_N7'] = 0;
                                    }
                                } else {
                                    // Perform alternative logic if Amortissement is less than 1
                                    // For example:
                                    $data['Montant_N1'] = 0;
                                    $data['Montant_N2'] = 0;
                                    $data['Montant_N3'] = 0;
                                    $data['Montant_N4'] = 0;
                                    $data['Montant_N5'] = 0;
                                    $data['Montant_N6'] = 0;
                                    $data['Montant_N7'] = 0;
                                }
                            } else {
                                // Perform alternative logic if Amortissement is null
                                // For example:
                                $data['Montant_N1'] = 0;
                                $data['Montant_N2'] = 0;
                                $data['Montant_N3'] = 0;
                                $data['Montant_N4'] = 0;
                                $data['Montant_N5'] = 0;
                                $data['Montant_N6'] = 0;
                                $data['Montant_N7'] = 0;
                            }
        
                            return $data;
                        })
            
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                        ->mutateFormDataUsing(function (array $data) {
                            $data['N2'] = $data['N1'] + 1;
                            $data['N3'] = $data['N1'] + 2;
                            $data['N4'] = $data['N1'] + 3;
                            $data['N5'] = $data['N1'] + 4;
                            $data['N6'] = $data['N1'] + 5;
                            $data['N7'] = $data['N1'] + 6;
                            $data['Invest_N1'] = $data['Qty'] * $data['PU'];

                            if ($data['amortissable'] == 1) {
                                if ($data['Amortissement'] >= 1) {
                                    $data['Montant_N1'] = $data['Qty'] * $data['PU'] / $data['Amortissement'];

                                    if ($data['Amortissement'] >= 2) {
                                        $data['Montant_N2'] = $data['Qty'] * $data['PU'] / ($data['Amortissement'] );
                                    } else {
                                        // Perform alternative logic if Amortissement is less than 2
                                        // For example:
                                        $data['Montant_N2'] = 0;
                                    }

                                    if ($data['Amortissement'] >= 3) {
                                        $data['Montant_N3'] = $data['Qty'] * $data['PU'] / ($data['Amortissement']);
                                    } else {
                                        // Perform alternative logic if Amortissement is less than 3
                                        // For example:
                                        $data['Montant_N3'] = 0;
                                    }

                                    if ($data['Amortissement'] >= 4) {
                                        $data['Montant_N4'] = $data['Qty'] * $data['PU'] / ($data['Amortissement']);
                                    } else {
                                        // Perform alternative logic if Amortissement is less than 4
                                        // For example:
                                        $data['Montant_N4'] = 0;
                                    }

                                    if ($data['Amortissement'] >= 5) {
                                        $data['Montant_N5'] = $data['Qty'] * $data['PU'] / ($data['Amortissement']);
                                    } else {
                                        // Perform alternative logic if Amortissement is less than 5
                                        // For example:
                                        $data['Montant_N5'] = 0;
                                    }

                                    if ($data['Amortissement'] >= 6) {
                                        $data['Montant_N6'] = $data['Qty'] * $data['PU'] / ($data['Amortissement']);
                                    } else {
                                        // Perform alternative logic if Amortissement is less than 6
                                        // For example:
                                        $data['Montant_N6'] = 0;
                                    }

                                    if ($data['Amortissement'] >= 7) {
                                        $data['Montant_N7'] = $data['Qty'] * $data['PU'] / ($data['Amortissement']);
                                    } else {
                                        // Perform alternative logic if Amortissement is less than 7
                                        // For example:
                                        $data['Montant_N7'] = 0;
                                    }
                                } else {
                                    // Perform alternative logic if Amortissement is less than 1
                                    // For example:
                                    $data['Montant_N1'] = 0;
                                    $data['Montant_N2'] = 0;
                                    $data['Montant_N3'] = 0;
                                    $data['Montant_N4'] = 0;
                                    $data['Montant_N5'] = 0;
                                    $data['Montant_N6'] = 0;
                                    $data['Montant_N7'] = 0;
                                }
                            } else {
                                // Perform alternative logic if Amortissement is null
                                // For example:
                                $data['Montant_N1'] = 0;
                                $data['Montant_N2'] = 0;
                                $data['Montant_N3'] = 0;
                                $data['Montant_N4'] = 0;
                                $data['Montant_N5'] = 0;
                                $data['Montant_N6'] = 0;
                                $data['Montant_N7'] = 0;
                            }

                            return $data;
                        }),
        
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }
}
