<?php

namespace App\Filament\Resources\ModuleResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\ModuleResource;
use App\Filament\Traits\HasDescendingOrder;

class ListModules extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = ModuleResource::class;
}
