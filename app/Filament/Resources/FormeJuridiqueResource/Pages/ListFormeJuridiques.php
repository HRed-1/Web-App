<?php

namespace App\Filament\Resources\FormeJuridiqueResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\FormeJuridiqueResource;

class ListFormeJuridiques extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = FormeJuridiqueResource::class;
}
