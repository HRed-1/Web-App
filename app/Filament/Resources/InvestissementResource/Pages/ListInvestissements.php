<?php

namespace App\Filament\Resources\InvestissementResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\InvestissementResource;

class ListInvestissements extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = InvestissementResource::class;
}
