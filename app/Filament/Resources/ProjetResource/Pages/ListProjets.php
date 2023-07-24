<?php

namespace App\Filament\Resources\ProjetResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\ProjetResource;
use App\Filament\Traits\HasDescendingOrder;

class ListProjets extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = ProjetResource::class;
}
