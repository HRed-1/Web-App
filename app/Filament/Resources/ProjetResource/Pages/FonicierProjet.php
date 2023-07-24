<?php

namespace App\Filament\Resources\ProjetResource\Pages;

use App\Filament\Resources\ProjetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Actions\Action;


class FonicierProjet extends EditRecord
{
    protected static string $resource = ProjetResource::class;

    protected static string $view = 'filament.resources.projet-resource.pages.page-projet';

    protected function getActions(): array
    {
        return [];
    }

    protected function getFormActions(): array
    {
        return [
            $this->getPreviousFormAction(),
            //$this->getSaveFormAction(),
            //$this->getCancelFormAction(),
            $this->getNextFormAction(),
            
        ];
    }

    protected function getNextFormAction(): Action
    {
        return Action::make('next')
            ->label(false)
            ->url(ProjetResource::getUrl('technique', $this->record))
            ->icon('heroicon-o-chevron-double-right');
    }

    protected function getPreviousFormAction(): Action
    {
        return Action::make('previous')
            ->label(false)
            ->url(ProjetResource::getUrl('offre', $this->record))
            ->icon('heroicon-o-chevron-double-left')
            ->color('secondary');
    }

    protected function getTitle(): string
    {
        return '';
    }

    protected function getFormSchema(): array
    {
        return [

            Card::make()->schema([
                Grid::make(['default' => 0])->schema([

                            TextInput::make('Title')
                                ->rules(['max:255', 'string'])
                                ->nullable()
                                
                                ->Label('Intitulé du Projet')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 6,
                                ]),

                            TextInput::make('Title_ar')
                                ->rules(['max:255', 'string'])
                                ->nullable()
                                
                                ->Label('إسم المشروع')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 6,
                                ]),

                            Select::make('porteur_id')
                                ->rules(['exists:porteurs,id'])
                                ->nullable()
                                ->relationship('porteur', 'Name')
                                ->searchable()
                                ->Label('Nom du Porteur de Projet')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 6,
                                ]),

                            Select::make('porteur_id')
                                ->rules(['exists:porteurs,id'])
                                ->nullable()
                                ->relationship('porteur', 'Name_ar')
                                ->searchable()
                                ->Label('إسم حامل المشروع')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 6,
                                ]),
                    //...
                ])->columns(12),

                
            ]),
            
        ];
    }

}
