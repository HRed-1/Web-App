<?php

namespace App\Filament\Resources\PorteurResource\Pages;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\PorteurResource;

class PagePorteur extends EditRecord
{
    protected static string $resource = PorteurResource::class;

    protected static string $view = 'filament.resources.porteur-resource.pages.page-porteur';

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

            Section::make('Porteur de Projet')->schema([
                Grid::make(['default' => 0])->schema([

                            TextInput::make('Name')
                                ->rules(['max:255', 'string'])
                                ->nullable()
                                
                                ->Label('Nom du Porteur de Projet')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 6,
                                ]),

                            TextInput::make('Name_ar')
                                ->rules(['max:255', 'string'])
                                ->nullable()
                                
                                ->Label('إسم حامل المشروع')
                                ->columnSpan([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 6,
                                ]),
                    //...
                ])  ->columns(12),

                
            ]),
            
        ];
    }
}
