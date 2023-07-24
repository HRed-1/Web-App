<?php

namespace App\Filament\Resources\MoyenFoncierResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\MoyenFoncierResource;

class ListMoyenFonciers extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = MoyenFoncierResource::class;
}
