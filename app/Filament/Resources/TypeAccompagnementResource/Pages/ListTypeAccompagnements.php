<?php

namespace App\Filament\Resources\TypeAccompagnementResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\TypeAccompagnementResource;

class ListTypeAccompagnements extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = TypeAccompagnementResource::class;
}
