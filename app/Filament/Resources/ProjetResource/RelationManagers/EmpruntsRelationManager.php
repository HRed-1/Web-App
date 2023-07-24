<?php

namespace App\Filament\Resources\ProjetResource\RelationManagers;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
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

class EmpruntsRelationManager extends RelationManager
{
    protected static string $relationship = 'emprunts';

    protected static ?string $recordTitleAttribute = 'Title';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $title = 'Liste des Emprunts';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 0])->schema([

                Section::make('Designation')->schema([
                            TextInput::make('Title')
                                ->rules(['max:255', 'string'])
                                ->label('Designation')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 5,
                                ]),

                            TextInput::make('Montant_N1')
                                ->rules(['numeric'])
                                ->numeric()
                                ->label('Montant de l\'Emprunt')
                                ->mask(fn (Mask $mask) => $mask->money(prefix: 'DH    ', thousandsSeparator: ' ', decimalPlaces: 2, isSigned: false))
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 4,
                                ]),

                            TextInput::make('N1')
                                ->rules(['numeric'])
                                ->numeric()
                                ->label('Exercice')
                                ->default(Carbon::now()->year)
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 3,
                                ]),

                            TextInput::make('Reglement')
                                ->rules(['max:255', 'string'])
                                ->label('Mode de Reglement')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 4,
                                ]),

                            TextInput::make('Taux')
                                ->rules(['numeric'])
                                ->numeric()
                                ->suffix('%')
                                ->label('Taux d\'Interet')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 2,
                                ]),

                            TextInput::make('Duree')
                                ->rules(['numeric'])
                                ->numeric()
                                ->label('Duree en Annee')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 2,
                                ]),

                            TextInput::make('Echance_N1')
                                ->rules(['numeric'])
                                ->numeric()
                                ->disabled()
                                ->label('Echeance')
                                ->mask(fn (Mask $mask) => $mask->money(prefix: 'DH    ', thousandsSeparator: ' ', decimalPlaces: 2, isSigned: false))
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
               
                
                Tables\Columns\TextColumn::make('Montant_N1')->label('Montant de l\'Emprunt'),
                Tables\Columns\TextColumn::make('Taux')->label('Taux d\'Interet'),
                Tables\Columns\TextColumn::make('Duree')->label('Duree en Annee'),
                
                Tables\Columns\TextColumn::make('Echance_N1')->label('Echeance'),
            ])
            
            ->headerActions([Tables\Actions\CreateAction::make()
                    ->mutateFormDataUsing(function (array $data) {
                        $P = $data['Montant_N1'];
                        $R = $data['Taux'] / 100;
                        $N = $data['Duree'];
                
                        $E = ($P * $R * pow(1 + $R, $N)) / (pow(1 + $R, $N) - 1);
                
                        // Assign value to Echance_N fields
                        for ($i = 1; $i <= 7; $i++) {
                            if ($i <= $N) {
                                $data["Echance_N$i"] = $E;
                            } else {
                                $data["Echance_N$i"] = 0;
                            }
                        }

                        $data['Interet_N1'] = $P * $R;
                        $data['Amort_N1'] = $data['Echance_N1'] - $data['Interet_N1'];
                        $data['Rest_N1'] = $data['Montant_N1'] - $data['Amort_N1'];

                        $data['Interet_N2'] = $data['Rest_N1'] * $R;
                        $data['Amort_N2'] = $data['Echance_N2'] - $data['Interet_N2'];
                        $data['Rest_N2'] = $data['Montant_N1'] - $data['Amort_N1'] - $data['Amort_N2'];

                        $data['Interet_N3'] = $data['Rest_N2'] * $R;
                        $data['Amort_N3'] = $data['Echance_N3'] - $data['Interet_N3'];
                        $data['Rest_N3'] = $data['Montant_N1'] - $data['Amort_N1'] - $data['Amort_N2'] - $data['Amort_N3'];

                        $data['Interet_N4'] = $data['Rest_N3'] * $R;
                        $data['Amort_N4'] = $data['Echance_N4'] - $data['Interet_N4'];
                        $data['Rest_N4'] = $data['Montant_N1'] - $data['Amort_N1'] - $data['Amort_N2'] - $data['Amort_N3'] - $data['Amort_N4'];

                        $data['Interet_N5'] = $data['Rest_N4'] * $R;
                        $data['Amort_N5'] = $data['Echance_N5'] - $data['Interet_N5'];
                        $data['Rest_N5'] = $data['Montant_N1'] - $data['Amort_N1'] - $data['Amort_N2'] - $data['Amort_N3'] - $data['Amort_N4'] - $data['Amort_N5'];

                        $data['Interet_N6'] = $data['Rest_N5']  * $R;
                        $data['Amort_N6'] = $data['Echance_N6'] - $data['Interet_N6'];
                        $data['Rest_N6'] = $data['Montant_N1'] - $data['Amort_N1'] - $data['Amort_N2'] - $data['Amort_N3'] - $data['Amort_N4'] - $data['Amort_N5'] - $data['Amort_N6'];

                        $data['Interet_N7'] = $data['Rest_N6']  * $R;
                        $data['Amort_N7'] = $data['Echance_N7'] - $data['Interet_N7'];
                        $data['Rest_N7'] = $data['Montant_N1'] - $data['Amort_N1'] - $data['Amort_N2'] - $data['Amort_N3'] - $data['Amort_N4'] - $data['Amort_N5'] - $data['Amort_N6'] - $data['Amort_N7'];
            
                        $data['N2'] = $data['N1'] + 1;
                        $data['N3'] = $data['N1'] + 2;
                        $data['N4'] = $data['N1'] + 3;
                        $data['N5'] = $data['N1'] + 4;
                        $data['N6'] = $data['N1'] + 5;
                        $data['N7'] = $data['N1'] + 6;
                
                        return $data;
                    }),

            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->mutateFormDataUsing(function (array $data) {
                        $P = $data['Montant_N1'];
                        $R = $data['Taux'] / 100;
                        $N = $data['Duree'];
                
                        $E = ($P * $R * pow(1 + $R, $N)) / (pow(1 + $R, $N) - 1);
                
                        // Assign value to Echance_N fields
                        for ($i = 1; $i <= 7; $i++) {
                            if ($i <= $N) {
                                $data["Echance_N$i"] = $E;
                            } else {
                                $data["Echance_N$i"] = 0;
                            }
                        }

                        $data['Interet_N1'] = $P * $R;
                        $data['Amort_N1'] = $data['Echance_N1'] - $data['Interet_N1'];
                        $data['Rest_N1'] = $data['Montant_N1'] - $data['Amort_N1'];

                        $data['Interet_N2'] = $data['Rest_N1'] * $R;
                        $data['Amort_N2'] = $data['Echance_N2'] - $data['Interet_N2'];
                        $data['Rest_N2'] = $data['Montant_N1'] - $data['Amort_N1'] - $data['Amort_N2'];

                        $data['Interet_N3'] = $data['Rest_N2'] * $R;
                        $data['Amort_N3'] = $data['Echance_N3'] - $data['Interet_N3'];
                        $data['Rest_N3'] = $data['Montant_N1'] - $data['Amort_N1'] - $data['Amort_N2'] - $data['Amort_N3'];

                        $data['Interet_N4'] = $data['Rest_N3'] * $R;
                        $data['Amort_N4'] = $data['Echance_N4'] - $data['Interet_N4'];
                        $data['Rest_N4'] = $data['Montant_N1'] - $data['Amort_N1'] - $data['Amort_N2'] - $data['Amort_N3'] - $data['Amort_N4'];

                        $data['Interet_N5'] = $data['Rest_N4'] * $R;
                        $data['Amort_N5'] = $data['Echance_N5'] - $data['Interet_N5'];
                        $data['Rest_N5'] = $data['Montant_N1'] - $data['Amort_N1'] - $data['Amort_N2'] - $data['Amort_N3'] - $data['Amort_N4'] - $data['Amort_N5'];

                        $data['Interet_N6'] = $data['Rest_N5']  * $R;
                        $data['Amort_N6'] = $data['Echance_N6'] - $data['Interet_N6'];
                        $data['Rest_N6'] = $data['Montant_N1'] - $data['Amort_N1'] - $data['Amort_N2'] - $data['Amort_N3'] - $data['Amort_N4'] - $data['Amort_N5'] - $data['Amort_N6'];

                        $data['Interet_N7'] = $data['Rest_N6']  * $R;
                        $data['Amort_N7'] = $data['Echance_N7'] - $data['Interet_N7'];
                        $data['Rest_N7'] = $data['Montant_N1'] - $data['Amort_N1'] - $data['Amort_N2'] - $data['Amort_N3'] - $data['Amort_N4'] - $data['Amort_N5'] - $data['Amort_N6'] - $data['Amort_N7'];
            
            
                        $data['N2'] = $data['N1'] + 1;
                        $data['N3'] = $data['N1'] + 2;
                        $data['N4'] = $data['N1'] + 3;
                        $data['N5'] = $data['N1'] + 4;
                        $data['N6'] = $data['N1'] + 5;
                        $data['N7'] = $data['N1'] + 6;
                
                        return $data;
                    }),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }
}
