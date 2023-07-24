<?php

namespace App\Filament\Resources\ConcurrentResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\ConcurrentResource;

class ListConcurrents extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = ConcurrentResource::class;
}
