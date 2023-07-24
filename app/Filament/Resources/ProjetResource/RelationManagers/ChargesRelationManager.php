<?php

namespace App\Filament\Resources\ProjetResource\RelationManagers;

use Closure;
use Filament\Forms;
use Filament\Tables;
use App\Models\ChargePoste;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\TextInput\Mask;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Resources\RelationManagers\RelationManager;

class ChargesRelationManager extends RelationManager
{
    protected static string $relationship = 'charges';

    protected static ?string $recordTitleAttribute = 'Type';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $title = 'Liste des Charges';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 0])->schema([

                Section::make('Designation')->schema([
                                Select::make('charge_poste_id')
                                    ->rules(['exists:charge_postes,id'])
                                    ->relationship('chargePoste', 'title')
                                    ->searchable()
                                    ->reactive()
                                    ->afterStateUpdated(fn ($state, callable $set) => $set('Title', ChargePoste::find($state)?->title))
                                    ->preload()
                                    ->label('Categorie')
                                    ->columnSpan([
                                        'default' => 12,
                                        'md' => 12,
                                        'lg' => 5,
                                    ]),

                                TextInput::make('Title')
                                    ->rules(['max:255', 'string'])
                                    ->label('Designation')
                                    ->columnSpan([
                                        'default' => 12,
                                        'md' => 12,
                                        'lg' => 7,
                                    ]),

                                Select::make('Reglement')
                                    ->rules(['max:255', 'string'])
                                    ->label('Periodicite')
                                    ->reactive()
                                    ->default('m')
                                    ->options([
                                        'm' => 'Mensuelle',
                                        't' => 'Trimestrielle',
                                        's' => 'Semestrielle',
                                        'a' => 'Annuelle',
                                    ])
                                    ->columnSpan([
                                        'default' => 12,
                                        'md' => 12,
                                        'lg' => 3,
                                    ]),

                                TextInput::make('Mensuel')
                                    ->rules(['numeric'])
                                    ->visible(fn (Closure $get) => $get('Reglement') == 'm')
                                    ->numeric()
                                    ->label('Montant Periodique')
                                    ->mask(fn (Mask $mask) => $mask->money(prefix: 'DH    ', thousandsSeparator: ' ', decimalPlaces: 2, isSigned: false))
                                    ->columnSpan([
                                        'default' => 12,
                                        'md' => 12,
                                        'lg' => 4,
                                    ]),

                                TextInput::make('Trimestriel')
                                    ->rules(['numeric'])
                                    ->visible(fn (Closure $get) => $get('Reglement') == 't')
                                    ->numeric()
                                    ->label('Montant Periodique')
                                    ->mask(fn (Mask $mask) => $mask->money(prefix: 'DH    ', thousandsSeparator: ' ', decimalPlaces: 2, isSigned: false))
                                    ->columnSpan([
                                        'default' => 12,
                                        'md' => 12,
                                        'lg' => 4,
                                    ]),

                                TextInput::make('Semstriel')
                                    ->rules(['numeric'])
                                    ->visible(fn (Closure $get) => $get('Reglement') == 's')
                                    ->numeric()
                                    ->label('Montant Periodique')
                                    ->mask(fn (Mask $mask) => $mask->money(prefix: 'DH    ', thousandsSeparator: ' ', decimalPlaces: 2, isSigned: false))
                                    ->columnSpan([
                                        'default' => 12,
                                        'md' => 12,
                                        'lg' => 4,
                                    ]),

                                TextInput::make('Annuel')
                                    ->rules(['numeric'])
                                    ->visible(fn (Closure $get) => $get('Reglement') == 'a')
                                    ->numeric()
                                    ->label('Montant Periodique')
                                    ->mask(fn (Mask $mask) => $mask->money(prefix: 'DH    ', thousandsSeparator: ' ', decimalPlaces: 2, isSigned: false))
                                    ->columnSpan([
                                        'default' => 12,
                                        'md' => 12,
                                        'lg' => 4,
                                    ]),

                                
                                TextInput::make('Montant_N1')
                                    ->rules(['numeric'])
                                    ->numeric()
                                    ->disabled()
                                    ->placeholder('Montant N1')
                                    ->mask(fn (Mask $mask) => $mask->money(prefix: 'DH    ', thousandsSeparator: ' ', decimalPlaces: 2, isSigned: false))
                                    ->columnSpan([
                                        'default' => 12,
                                        'md' => 12,
                                        'lg' => 5,
                                    ]),

                                TextInput::make('Evolution')
                                    ->rules(['max:255', 'string'])
                                    ->label('Evolution')
                                    ->suffix('%')
                                    ->default('0')
                                    ->columnSpan([
                                        'default' => 12,
                                        'md' => 12,
                                        'lg' => 3,
                                    ]),


                 
                ])->columns(12),

                
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                 
                Tables\Columns\TextColumn::make('chargePoste.title')->limit(50)->label('Categorie'),
                Tables\Columns\TextColumn::make('Reglement')->label('Mode Paiement')->limit(50)
                ->enum([
                    'm' => 'Mensuelle',
                    't' => 'Trimestrielle',
                    's' => 'Semestrielle',
                    'a' => 'Annuelle',
                ]),
           
                Tables\Columns\TextColumn::make('Montant_N1')->label('Charge Annuelle'),
          
            ])
            
            ->headerActions([Tables\Actions\CreateAction::make()])
            ->actions([
                Tables\Actions\EditAction::make()
                ->mutateFormDataUsing(function (array $data) {

                    if (isset($data['Mensuel'])) {
                        $data['Montant_N1'] = $data['Mensuel']*12 ;

                    } else if (isset($data['Trimestriel'])) {
                        $data['Montant_N1'] = $data['Trimestriel']*4 ;

                    } else if (isset($data['Semstriel'])) {
                        $data['Montant_N1'] = $data['Semstriel']*2 ;

                    } else {
                        $data['Montant_N1'] = $data['Annuel'];
                    }

                    $data['Montant_N2'] = $data['Montant_N1']*(1+$data['Evolution']/100);
                    $data['Montant_N3'] = $data['Montant_N1']*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                    $data['Montant_N4'] = $data['Montant_N1']*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                    $data['Montant_N5'] = $data['Montant_N1']*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                    $data['Montant_N6'] = $data['Montant_N1']*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                    $data['Montant_N7'] = $data['Montant_N1']*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);

                    
                    
                    
                   

                return $data;
                }),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }
}
