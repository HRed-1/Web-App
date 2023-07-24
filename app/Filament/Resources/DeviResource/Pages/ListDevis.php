<?php

namespace App\Filament\Resources\DeviResource\Pages;

use App\Filament\Resources\DeviResource;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;

class ListDevis extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = DeviResource::class;
}
