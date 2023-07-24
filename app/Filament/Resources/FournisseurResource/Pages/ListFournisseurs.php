<?php

namespace App\Filament\Resources\FournisseurResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\FournisseurResource;

class ListFournisseurs extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = FournisseurResource::class;
}
