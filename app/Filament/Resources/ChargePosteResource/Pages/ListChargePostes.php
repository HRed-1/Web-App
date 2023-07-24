<?php

namespace App\Filament\Resources\ChargePosteResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\ChargePosteResource;

class ListChargePostes extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = ChargePosteResource::class;
}
