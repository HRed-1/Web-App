<?php

namespace App\Filament\Resources\CommuneResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\CommuneResource;

class ListCommunes extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = CommuneResource::class;
}
