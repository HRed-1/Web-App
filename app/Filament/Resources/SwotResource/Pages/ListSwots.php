<?php

namespace App\Filament\Resources\SwotResource\Pages;

use App\Filament\Resources\SwotResource;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;

class ListSwots extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = SwotResource::class;
}
