<?php

namespace App\Filament\Resources\MoyenHumainResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\MoyenHumainResource;

class ListMoyenHumains extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = MoyenHumainResource::class;
}
