<?php

namespace App\Filament\Pages;

use Closure;

use App\Models\Post;
use Filament\Tables;
use App\Models\Projet;
use Livewire\Component;
use Filament\Pages\Page;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Illuminate\Contracts\View\View;
use Filament\Tables\Actions\Position;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ListeProjet extends Page implements Tables\Contracts\HasTable
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.liste-projet';

    protected static ?string $title = 'Liste des Projets';
 
    protected static ?string $navigationLabel = 'Liste des Projets';
    
    protected static ?string $slug = 'liste-projets';

    

    use Tables\Concerns\InteractsWithTable;
 
    protected function getTableQuery(): Builder
    {
        return Projet::query();
    }
 
    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('porteur.Name')
                    ->toggleable()
                    ->label('Porteur du Projet')
                    ->limit(50)
                    ->searchable()
                    ->description(function (Projet $record): string {
                        // Assuming "porteur" is a relationship on the Projet model.
                        return $record->porteur->Name_ar;
                    }),
                Tables\Columns\TextColumn::make('Title')
                    ->toggleable()
                    ->label('Intitulé du Projet')
                    ->limit(50)
                    //->description(fn (Projet $record): string => $record->Title_ar)
                    ,
                
                Tables\Columns\TextColumn::make('commune.Title')
                    ->toggleable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('secteurActvite.Title')
                    ->toggleable()
                    ->limit(50),
        ];
    }

    
    protected function getTableRecordUrlUsing(): ?Closure
    {
        return fn (Model $record): string => route('filament.resources.projets.presentation', ['record' => $record]);
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('Presentation')
                ->url(fn (Projet $record): string => route('filament.resources.projets.presentation', $record))
                ->openUrlInNewTab()
                ->icon('heroicon-s-pencil')
        ];
    }
    protected function getTableActionsPosition(): ?string
    {
        return Position::BeforeCells;
    }
    // protected function getHeader(): View
    // {
    //     return view('filament.settings.custom-header');
    // }
    
    // protected function getFooter(): View
    // {
    //     return view('filament.settings.custom-footer');
    // }

    
}
