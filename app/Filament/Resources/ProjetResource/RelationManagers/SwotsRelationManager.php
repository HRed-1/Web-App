<?php

namespace App\Filament\Resources\ProjetResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use App\Models\SwotList;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Resources\RelationManagers\RelationManager;

class SwotsRelationManager extends RelationManager
{
    protected static string $relationship = 'swots';

    //protected static ?string $recordTitleAttribute = 'pfort';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $title = 'Analyse SWOT';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 2])->schema([
                Card::make()->schema([
                        Select::make('pfort')
                                    ->options(SwotList::where('type', 'point fort')->pluck('title' , 'id'))
                                    ->label('Points Forts')
                                    ->searchable()
                                    ->multiple()
                                    ->preload()
                    
                                    ->columnSpan([
                                        'default' => 12,
                                        'md' => 12,
                                        'lg' => 12,
                                    ]),
                        
                ])->columnSpan('6'),


                Card::make()->extraAttributes(['class' => 'bg-gray-900'])->schema([

                        Select::make('pfaible')
                                    ->options(SwotList::where('type', 'point faible')->pluck('title' , 'id'))
                                    ->label('Points Faibles')
                                    ->searchable()
                                    ->multiple()
                                    ->preload()
                       
                                    ->columnSpan([
                                        'default' => 12,
                                        'md' => 12,
                                        'lg' => 12,
                                    ]),
                        

                ])          ->columnSpan('6')
                            ->extraAttributes(['class' => 'bg-gray-500']),
                Card::make()->schema([

                        Select::make('opportunity')
                                    ->options(SwotList::where('type', 'opportunite')->pluck('title' , 'id'))
                                    ->label('Opportunités')
                                    ->searchable()
                                    ->multiple()
                                    ->preload()
                                    
                                    ->columnSpan([
                                        'default' => 12,
                                        'md' => 12,
                                        'lg' => 12,
                                    ]),

                ])->columnSpan('6'),
                Card::make()->schema([

                        Select::make('threat')
                                    ->options(SwotList::where('type', 'menace')->pluck('title' , 'id'))
                                    ->label('Menaces')
                                    ->searchable()
                                    ->multiple()
                                    ->preload()
                                    
                                    ->columnSpan([
                                        'default' => 12,
                                        'md' => 12,
                                        'lg' => 12,
                                    ]),

                ])->columnSpan('6'),
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
