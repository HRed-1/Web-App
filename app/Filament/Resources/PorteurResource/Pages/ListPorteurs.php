<?php

namespace App\Filament\Resources\PorteurResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\PorteurResource;

class ListPorteurs extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = PorteurResource::class;
}
