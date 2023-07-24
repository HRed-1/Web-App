<?php

namespace App\Filament\Resources\ProjetResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Resources\RelationManagers\RelationManager;

class ConcurrentsRelationManager extends RelationManager
{
    protected static string $relationship = 'concurrents';

    protected static ?string $recordTitleAttribute = 'Title';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $title = 'Liste des Concurrents';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 2])->schema([
                TextInput::make('Title')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Title')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('Title_ar')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Title Ar')
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
                Tables\Columns\TextColumn::make('Title')->limit(50),
                Tables\Columns\TextColumn::make('Title_ar')->limit(50),
            ])
        
            ->headerActions([Tables\Actions\CreateAction::make()])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }
}
