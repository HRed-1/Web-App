<?php

namespace App\Filament\Resources\AccompagnementPostResource\Pages;

use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\AccompagnementPostResource;

class ListAccompagnementPosts extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = AccompagnementPostResource::class;

    protected function getActions(): array
    {
        return [
            //Action::make('create')->modalHidden(true),
        ];
    }

    
}
