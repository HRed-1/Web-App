<?php

namespace App\Filament\Resources\EmpruntResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\EmpruntResource;

class ListEmprunts extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = EmpruntResource::class;
}
