<?php

namespace App\Filament\Resources\SubventionResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\SubventionResource;

class ListSubventions extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = SubventionResource::class;
}
