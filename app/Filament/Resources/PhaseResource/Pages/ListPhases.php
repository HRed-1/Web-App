<?php

namespace App\Filament\Resources\PhaseResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\PhaseResource;
use App\Filament\Traits\HasDescendingOrder;

class ListPhases extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = PhaseResource::class;
}
