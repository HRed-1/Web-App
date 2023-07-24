<?php

namespace App\Filament\Resources\MaterielResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\MaterielResource;

class ListMateriels extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = MaterielResource::class;
}
