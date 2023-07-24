<?php

namespace App\Filament\Resources\DevisFournisseurResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\DevisFournisseurResource;

class ListDevisFournisseurs extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = DevisFournisseurResource::class;
}
