<?php

namespace App\Filament\Resources\ProjetResource\RelationManagers;

use Closure;
use Filament\Forms;
use Filament\Tables;
use App\Models\ActifPoste;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\TextInput\Mask;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Resources\RelationManagers\RelationManager;

class ApportsRelationManager extends RelationManager
{
    protected static string $relationship = 'apports';

    protected static ?string $recordTitleAttribute = 'Title';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $title = 'Liste des Apports';

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
                                ->label('Montant')
                                ->mask(fn (Mask $mask) => $mask->money(prefix: 'DH    ', thousandsSeparator: ' ', decimalPlaces: 2, isSigned: false))
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 4,
                                ]),

                            Toggle::make('en_nature')
                                ->rules(['boolean'])
                                ->inline(false)
                                ->reactive()
                                ->label('Apport En Nature')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 3,
                                ]),

                            Fieldset::make('Designation de l\'Apport En Nature')
                                ->relationship('investissement')
                                ->visible(fn (Closure $get) => $get('en_nature') == 1)
                                ->schema([

                                        Hidden::make('projet_id')
                                            ->default(function (RelationManager $livewire) {
                                                return $livewire->ownerRecord->id;
                                            }),

                                        Select::make('actif_poste_id')
                                            ->options(ActifPoste::all()->pluck('title' , 'id'))
                                            
                                            ->label('Composantes de l\'Apport En Nature')
                                            ->preload()
                                            ->columnSpan([
                                                'default' => 12,
                                                'md' => 12,
                                                'lg' => 6,
                                            ]),

                                            TextInput::make('Title')
                                            ->rules(['max:255', 'string'])
                                            ->label('Designation')
                                            ->default('Apport en Nature')
                                            ->columnSpan([
                                                'default' => 12,
                                                'md' => 12,
                                                'lg' => 6,
                                            ]),
            
                                        TextInput::make('Qty')
                                            ->rules(['numeric'])
                                            ->numeric()
                                            ->default('1')
                                            ->label('Quantité')
                                            ->columnSpan([
                                                'default' => 12,
                                                'md' => 12,
                                                'lg' => 3,
                                            ]),
            
                                        TextInput::make('PU')
                                            ->rules(['numeric'])
                                            ->numeric()
                                            ->label('Valeur Uniteur')
                                            ->mask(fn (Mask $mask) => $mask->money(prefix: 'DH    ', thousandsSeparator: ' ', decimalPlaces: 2, isSigned: false))
                                            ->columnSpan([
                                                'default' => 12,
                                                'md' => 12,
                                                'lg' => 4,
                                            ]),
            
                                        TextInput::make('Invest_N1')
                                            ->rules(['numeric'])
                                            ->numeric()
                                            ->label('Estimation de la Valeur')
                                            ->mask(fn (Mask $mask) => $mask->money(prefix: 'DH    ', thousandsSeparator: ' ', decimalPlaces: 2, isSigned: false))
                                            ->columnSpan([
                                                'default' => 12,
                                                'md' => 12,
                                                'lg' => 5,
                                            ]),
            

                            ])->columns(12),

                ])->columns(12),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Title')->label('Designation')->limit(50),
                Tables\Columns\TextColumn::make('Montant_N1')->label('Montant'),
                Tables\Columns\IconColumn::make('en_nature')->boolean(),
  
            ])
            ->headerActions([Tables\Actions\CreateAction::make()])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }
}
