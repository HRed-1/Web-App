<?php

namespace App\Filament\Resources\ProjetResource\Pages;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ProjetResource;

class PageProjet extends EditRecord
{
    protected static string $resource = ProjetResource::class;

    protected static string $view = 'filament.resources.projet-resource.pages.page-projet';

    protected function getActions(): array
    {
        return [];
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
