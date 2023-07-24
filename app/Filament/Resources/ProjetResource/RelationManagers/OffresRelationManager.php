<?php

namespace App\Filament\Resources\ProjetResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\TextInput\Mask;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Resources\RelationManagers\RelationManager;

class OffresRelationManager extends RelationManager
{
    protected static string $relationship = 'offres';

    protected static ?string $recordTitleAttribute = 'Type';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $title = 'Liste des Produits & Services';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 12])->schema([
                Select::make('Type')
                    ->rules(['max:255', 'string'])
                    ->label('Catégorie')
                    ->options([
                        'p' => 'Produit',
                        's' => 'Service',
                        'm' => 'Marchandise'

                    ])
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 3,
                    ]),

                TextInput::make('Title')
                    ->rules(['max:255', 'string'])
                    ->label('Designation')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 3,
                    ]),

                TextInput::make('Title_ar')
                    ->rules(['max:255', 'string'])
                    ->label('Designation Ar')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 3,
                    ]),

                TextInput::make('Price')
                    ->rules(['numeric'])
                    ->numeric()
                    ->label('Prix')
                    ->mask(fn (Mask $mask) => $mask->money(prefix: 'DH    ', thousandsSeparator: ' ', decimalPlaces: 2, isSigned: false))

                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 3,
                    ]),

                Section::make('Information sur Produits & Services')->schema([
                        Grid::make(['default' => 12])->schema([
        
                                FileUpload::make('photo')
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
                                        'lg' => 6,
                                    ]),
                                
                                RichEditor::make('Detail')
                                    ->rules(['max:255', 'string'])
                                    ->label('Observations')
                                    ->disableAllToolbarButtons()
                                    ->enableToolbarButtons([
                                            'bold',
                                            'bulletList',
                                            'italic',])
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
                Tables\Columns\TextColumn::make('Type')->label('Type')->limit(50)
                ->enum([
                    'p' => 'Produit',
                    's' => 'Service',
                    'm' => 'Marchandise'

                ]),
                Tables\Columns\TextColumn::make('Title')->label('Designation')->limit(50),
                Tables\Columns\TextColumn::make('Price')->label('Prix de Vente')->money('MAD'),
            ])
            
            ->headerActions([Tables\Actions\CreateAction::make()])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }
}
