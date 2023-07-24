<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\StrategyList;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StrategyListResource\Pages;
use App\Filament\Resources\StrategyListResource\RelationManagers;

class StrategyListResource extends Resource
{
    protected static ?string $model = StrategyList::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static bool $shouldRegisterNavigation = false;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Stratégie Marketing')->schema([
                    Grid::make(['default' => 0])->schema([

                        Forms\Components\Select::make('type')
                            ->options([
                                'price'=>'Prix',
                                'place'=>'Distribution',
                                'promotion'=>'Communication'
                            ])
                            ->required(),

                    Forms\Components\TextInput::make('strategy'),

                    Forms\Components\TextInput::make('strategy_ar'),
                        
                    ]),
                ]),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('strategy'),
                Tables\Columns\TextColumn::make('strategy_ar'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStrategyLists::route('/'),
            'create' => Pages\CreateStrategyList::route('/create'),
            'edit' => Pages\EditStrategyList::route('/{record}/edit'),
        ];
    }    
}
