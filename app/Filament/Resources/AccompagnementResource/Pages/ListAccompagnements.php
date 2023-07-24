<?php

namespace App\Filament\Resources\AccompagnementResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\AccompagnementResource;

class ListAccompagnements extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = AccompagnementResource::class;

    protected function getActions(): array
    {
        return [
            //Action::make('create')->modalHidden(true),
        ];
    }
}
