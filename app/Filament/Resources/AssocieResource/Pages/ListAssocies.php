<?php

namespace App\Filament\Resources\AssocieResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\AssocieResource;

class ListAssocies extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = AssocieResource::class;
}
