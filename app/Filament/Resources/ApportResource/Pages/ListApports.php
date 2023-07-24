<?php

namespace App\Filament\Resources\ApportResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\ApportResource;
use App\Filament\Traits\HasDescendingOrder;

class ListApports extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = ApportResource::class;
}
