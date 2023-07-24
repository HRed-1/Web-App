<?php

namespace App\Filament\Resources\StrategyResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\StrategyResource;

class ListStrategies extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = StrategyResource::class;
}
