<?php

namespace App\Filament\Resources\PorteurResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Resources\{Form, Table};
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProjetResource;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Resources\RelationManagers\RelationManager;

class ProjetsRelationManager extends RelationManager
{
    protected static string $relationship = 'projets';

    protected static ?string $title = 'Liste des Projets';


    public static function form(Form $form): Form
    {
        return $form->schema([
            
            
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Title')->limit(50),
                Tables\Columns\TextColumn::make('Title_ar')->limit(50)->label('Titre')->toggleable(),
                Tables\Columns\TextColumn::make('commune.Title')->limit(50)->label('Commune')->toggleable(),
                Tables\Columns\TextColumn::make('secteurActvite.Title')->limit(50)->label('Secteur d\'Activité')->toggleable(),
       
            ])
            
            ->headerActions([Tables\Actions\CreateAction::make()->url(fn ($livewire) => ProjetResource::getUrl('create', ['ownerRecord' => $livewire->ownerRecord->getKey()]))])
            ->actions([
                Tables\Actions\EditAction::make()    ->url(fn (Model $record): string => ProjetResource::getUrl('edit', $record))
                ,
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }
}
