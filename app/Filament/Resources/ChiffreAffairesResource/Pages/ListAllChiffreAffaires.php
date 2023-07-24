<?php

namespace App\Filament\Resources\ChiffreAffairesResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\ChiffreAffairesResource;

class ListAllChiffreAffaires extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = ChiffreAffairesResource::class;
}
