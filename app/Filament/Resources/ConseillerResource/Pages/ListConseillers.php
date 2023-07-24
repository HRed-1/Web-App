<?php

namespace App\Filament\Resources\ConseillerResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\ConseillerResource;

class ListConseillers extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = ConseillerResource::class;
}
