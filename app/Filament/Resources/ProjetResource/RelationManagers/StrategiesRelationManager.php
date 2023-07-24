<?php

namespace App\Filament\Resources\ProjetResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use App\Models\StrategyList;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Filters\MultiSelectFilter;
use App\Filament\Resources\StrategyListResource;
use Filament\Resources\RelationManagers\RelationManager;

class StrategiesRelationManager extends RelationManager
{
    protected static string $relationship = 'strategies';

    //protected static ?string $recordTitleAttribute = 'Price';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $title = 'Mix Marketing';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 12])->schema([


                Forms\Components\Select::make('Price')
                    ->options(StrategyList::where('type', 'price')->pluck('strategy' , 'id'))
                    ->searchable()
                    ->multiple()
                    ->preload()
                    ->label('Stratégie Prix')
                    ->createOptionForm([
                        Forms\Components\Select::make('type')
                            ->options([
                                'price'=>'Prix',
                                'place'=>'Distribution',
                                'promotion'=>'Communication'
                            ])
                            ->required(),

                        Forms\Components\TextInput::make('strategy'),

                        Forms\Components\TextInput::make('strategy_ar'),

           
                    ])
                    ->createOptionAction(function (Forms\Components\Actions\Action $action) {
                        return $action
                            ->modalHeading('Create')
                            ->modalButton('Create')
                            ->modalWidth('lg')
                            ->url(StrategyListResource::getUrl('create'));
                    })
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Forms\Components\Select::make('Distribution')
                    ->options(StrategyList::where('type', 'place')->pluck('strategy' , 'id'))
                    ->searchable()
                    ->multiple()
                    ->preload()
                    ->label('Stratégie Distribution')
                    ->createOptionForm([
                        Forms\Components\Select::make('type')
                            ->options([
                                'price'=>'Prix',
                                'place'=>'Distribution',
                                'promotion'=>'Communication'
                            ])
                            ->required(),

                        Forms\Components\TextInput::make('strategy'),

                        Forms\Components\TextInput::make('strategy_ar'),

           
                    ])
                    ->createOptionAction(function (Forms\Components\Actions\Action $action) {
                        return $action
                            ->modalHeading('Create')
                            ->modalButton('Create')
                            ->modalWidth('lg')
                            ->url(StrategyListResource::getUrl('create'));
                    })
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Forms\Components\Select::make('Communication')
                    ->options(StrategyList::where('type', 'promotion')->pluck('strategy' , 'id'))
                    ->searchable()
                    ->multiple()
                    ->preload()
                    ->label('Stratégie Communication')
                    ->createOptionForm([
                        Forms\Components\Select::make('type')
                            ->options([
                                'price'=>'Prix',
                                'place'=>'Distribution',
                                'promotion'=>'Communication'
                            ])
                            ->required(),

                        Forms\Components\TextInput::make('strategy'),

                        Forms\Components\TextInput::make('strategy_ar'),

           
                    ])
                    ->createOptionAction(function (Forms\Components\Actions\Action $action) {
                        return $action
                            ->modalHeading('Create')
                            ->modalButton('Create')
                            ->modalWidth('lg')
                            ->url(StrategyListResource::getUrl('create'));
                    })
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
                Tables\Columns\TextColumn::make('projet.Title')->limit(50),
            ])
            
            ->headerActions([Tables\Actions\CreateAction::make()])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }
}
