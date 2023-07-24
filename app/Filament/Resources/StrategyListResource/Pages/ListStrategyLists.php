<?php

namespace App\Filament\Resources\StrategyListResource\Pages;

use App\Filament\Resources\StrategyListResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStrategyLists extends ListRecords
{
    protected static string $resource = StrategyListResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
