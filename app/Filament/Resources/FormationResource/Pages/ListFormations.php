<?php

namespace App\Filament\Resources\FormationResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\FormationResource;

class ListFormations extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = FormationResource::class;
}
