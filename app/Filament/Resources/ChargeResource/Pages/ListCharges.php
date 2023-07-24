<?php

namespace App\Filament\Resources\ChargeResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\ChargeResource;
use App\Filament\Traits\HasDescendingOrder;

class ListCharges extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = ChargeResource::class;
}
