<?php

namespace App\Filament\Resources\FormationResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use App\Models\Porteur;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Resources\{Form, Table};
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Resources\RelationManagers\RelationManager;

class PorteursRelationManager extends RelationManager
{
    protected static string $relationship = 'porteurs';

    protected static ?string $recordTitleAttribute = 'Name';

    public static function form(Form $form): Form
    {
        return $form->schema([
            
           
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Name')->limit(50)
                ->description(fn (Porteur $record): string => $record->Name_ar),
                
                
            ])
            ->headerActions([Tables\Actions\AttachAction::make()
            ->preloadRecordSelect()
            ->recordSelect(function (Select $select) {
                return $select->multiple();
            })])
            ->actions([
                // ...
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                // ...
                Tables\Actions\DetachBulkAction::make(),
            ]);
    }
}
