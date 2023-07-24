<?php

namespace App\Filament\Resources\FactureResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\FactureResource;

class ListFactures extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = FactureResource::class;
}
