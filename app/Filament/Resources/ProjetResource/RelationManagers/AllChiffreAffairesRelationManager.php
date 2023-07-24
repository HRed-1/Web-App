<?php

namespace App\Filament\Resources\ProjetResource\RelationManagers;

use Closure;
use Filament\Forms;
use Filament\Tables;
use App\Models\Offre;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Fieldset;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\TextInput\Mask;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Resources\RelationManagers\RelationManager;

class AllChiffreAffairesRelationManager extends RelationManager
{
    protected static string $relationship = 'allChiffreAffaires';

    protected static ?string $recordTitleAttribute = 'Title';

    protected static ?string $title = 'Chiffres d\'Affaires';

    protected static bool $shouldRegisterNavigation = false;

    public Model $ownerRecord;
    


    public static function form(Form $form ): Form
    {
        
        
        return $form->schema([
            Grid::make(['default' => 12])->schema([

                Section::make('Designation')->schema([
                
                        Select::make('offre_id')
                                ->rules(['exists:offres,id'])
                                ->nullable()
                                ->relationship('offre', 'Title')
                                ->preload()
                                ->options(function (RelationManager $livewire): array {
                                    return $livewire->ownerRecord->offres()
                                        ->pluck('Title', 'id')
                                        ->toArray();
                                })
                                ->label('Produit & Service')
                                ->reactive()
                                ->afterStateUpdated(fn ($state, callable $set) => $set('Price', Offre::find($state)?->Price ?? 0))
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 7,
                                ]),

                        TextInput::make('Price')
                            ->rules(['numeric', 'max:99999'])
                            ->numeric()
                            ->label('Prix')
                            ->mask(fn (Mask $mask) => $mask->money(prefix: 'DH    ', thousandsSeparator: ' ', decimalPlaces: 2, isSigned: false))


                            ->columnSpan([
                                'default' => 12,
                                'md' => 12,
                                'lg' => 5,
                            ]),

                        
                        Fieldset::make('Chiffre d\'Affaires')
                            
                            ->schema([
                                    Radio::make('Mode')
                                        ->rules(['max:255', 'string'])
                                        ->label('Mode de Saisie')
                                        ->required()
                                        ->reactive()
                                        ->options([
                                            'D' => 'Detail',
                                            'G' => 'Global'
                                        ])
                                        ->columnSpan([
                                            'default' => 12,
                                            'md' => 12,
                                            'lg' => 4,
                                        ]),
                                        


                                    TextInput::make('Qty')
                                        ->rules(['numeric', 'max:99999'])
                                        ->visible(fn (Closure $get) => $get('Mode') == 'D')
                                        ->numeric()
                                        ->label('Quantité')
                                        ->default('0')
                                        ->columnSpan([
                                            'default' => 12,
                                            'md' => 12,
                                            'lg' => 2,
                                        ]),

                                    
                                        

                                    TextInput::make('CA_D')
                                        ->rules(['numeric'])
                                        ->visible(fn (Closure $get) => $get('Mode') == 'D')
                                        ->numeric()
                                        ->disabled()
                                        ->default('0')
                                        ->mask(fn (Mask $mask) => $mask->money(prefix: 'DH    ', thousandsSeparator: ' ', decimalPlaces: 2, isSigned: false))
                                        ->label('Total')
                                        ->columnSpan([
                                            'default' => 12,
                                            'md' => 12,
                                            'lg' => 6,
                                        ]),

                                    TextInput::make('CA_G')
                                        ->rules(['numeric'])
                                        ->numeric()
                                        ->visible(fn (Closure $get) => $get('Mode') == 'G')
                                        ->label('Chiffre d\'Affaires Global')
                                        ->default('0')
                                        ->mask(fn (Mask $mask) => $mask->money(prefix: 'DH    ', thousandsSeparator: ' ', decimalPlaces: 2, isSigned: false))
                                        ->columnSpan([
                                            'default' => 12,
                                            'md' => 12,
                                            'lg' => 8,
                                        ]),

                        ])->columns(12),

                            Fieldset::make('Charges Variables')
                                ->schema([
                                    TextInput::make('Cout_Charge')
                                        ->rules(['max:255', 'string'])
                                        ->label('Marge')
                                        ->suffix('%')
                                        ->columnSpan([
                                            'default' => 12,
                                            'md' => 12,
                                            'lg' => 4,
                                        ]),

                                    TextInput::make('Montant_CHVar_N1')
                                        ->rules(['numeric'])
                                        ->numeric()
                                        ->mask(fn (Mask $mask) => $mask->money(prefix: 'DH    ', thousandsSeparator: ' ', decimalPlaces: 2, isSigned: false))
                                        ->label('Montant Charges Variables')
                                        ->columnSpan([
                                            'default' => 12,
                                            'md' => 12,
                                            'lg' => 8,
                                        ]),

                                    
                            ])->columns(12)->columnSpan(8),

                            TextInput::make('Evolution')
                                        ->rules(['max:255', 'string'])
                                        ->label('Evolution Annuelle')
                                        ->suffix('%')
                                        ->columnSpan([
                                            'default' => 12,
                                            'md' => 12,
                                            'lg' => 4,
                                        ]),
                        
                ])->columns(12),

                    
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                
                Tables\Columns\TextColumn::make('offre.Title')->label('Produit & Service')->limit(50),
     
                //Tables\Columns\TextColumn::make('Price')->label('Prix')->money('MAD'),
                Tables\Columns\TextColumn::make('Montant_CA_N1')->label('Chiffre d\'Affaires'),
                Tables\Columns\TextColumn::make('Montant_CHVar_N1')->label('Charges Variables')
            ])
            
            ->headerActions([Tables\Actions\CreateAction::make()
                    ->mutateFormDataUsing(function (array $data) {

                        if (isset($data['Qty'])) {
                            $data['Montant_CA_N1'] = $data['Price'] * $data['Qty'];
                        } else {
                            $data['Montant_CA_N1'] = $data['CA_G'];
                        }

                        
                        
                        
                       
                        $data['Montant_CHVar_N1'] = $data['Montant_CA_N1']*$data['Cout_Charge']/100;

                        $data['Montant_CA_N2'] = $data['Montant_CA_N1']*(1+$data['Evolution']/100);
                        $data['Montant_CA_N3'] = $data['Montant_CA_N1']*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                        $data['Montant_CA_N4'] = $data['Montant_CA_N1']*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                        $data['Montant_CA_N5'] = $data['Montant_CA_N1']*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                        $data['Montant_CA_N6'] = $data['Montant_CA_N1']*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                        $data['Montant_CA_N7'] = $data['Montant_CA_N1']*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);

                        $data['Montant_CHVar_N2'] = $data['Montant_CA_N1']*$data['Cout_Charge']/100*(1+$data['Evolution']/100);
                        $data['Montant_CHVar_N3'] = $data['Montant_CA_N1']*$data['Cout_Charge']/100*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                        $data['Montant_CHVar_N4'] = $data['Montant_CA_N1']*$data['Cout_Charge']/100*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                        $data['Montant_CHVar_N5'] = $data['Montant_CA_N1']*$data['Cout_Charge']/100*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                        $data['Montant_CHVar_N6'] = $data['Montant_CA_N1']*$data['Cout_Charge']/100*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                        $data['Montant_CHVar_N7'] = $data['Montant_CA_N1']*$data['Cout_Charge']/100*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);


                    return $data;
                    })
                    ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->mutateFormDataUsing(function (array $data) {

                    if (isset($data['Qty'])) {
                        $data['Montant_CA_N1'] = $data['Price'] * $data['Qty'];
                    } else {
                        $data['Montant_CA_N1'] = $data['CA_G'];
                    }

                    
                    
                    
                   
                    $data['Montant_CHVar_N1'] = $data['Montant_CA_N1']*$data['Cout_Charge']/100;

                    $data['Montant_CA_N2'] = $data['Montant_CA_N1']*(1+$data['Evolution']/100);
                    $data['Montant_CA_N3'] = $data['Montant_CA_N1']*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                    $data['Montant_CA_N4'] = $data['Montant_CA_N1']*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                    $data['Montant_CA_N5'] = $data['Montant_CA_N1']*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                    $data['Montant_CA_N6'] = $data['Montant_CA_N1']*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                    $data['Montant_CA_N7'] = $data['Montant_CA_N1']*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);

                    $data['Montant_CHVar_N2'] = $data['Montant_CA_N1']*$data['Cout_Charge']/100*(1+$data['Evolution']/100);
                    $data['Montant_CHVar_N3'] = $data['Montant_CA_N1']*$data['Cout_Charge']/100*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                    $data['Montant_CHVar_N4'] = $data['Montant_CA_N1']*$data['Cout_Charge']/100*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                    $data['Montant_CHVar_N5'] = $data['Montant_CA_N1']*$data['Cout_Charge']/100*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                    $data['Montant_CHVar_N6'] = $data['Montant_CA_N1']*$data['Cout_Charge']/100*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);
                    $data['Montant_CHVar_N7'] = $data['Montant_CA_N1']*$data['Cout_Charge']/100*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100)*(1+$data['Evolution']/100);


                return $data;
                })                    
                ,
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }


    
}
