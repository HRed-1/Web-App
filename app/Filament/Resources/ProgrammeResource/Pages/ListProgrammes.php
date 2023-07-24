<?php

namespace App\Filament\Resources\ProgrammeResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\ProgrammeResource;

class ListProgrammes extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = ProgrammeResource::class;
}
