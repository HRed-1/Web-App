<?php

namespace App\Filament\Resources\OffreResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\OffreResource;
use App\Filament\Traits\HasDescendingOrder;

class ListOffres extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = OffreResource::class;
}
