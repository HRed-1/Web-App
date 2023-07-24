<?php

namespace App\Filament\Resources\ActifPosteResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\ActifPosteResource;

class ListActifPostes extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = ActifPosteResource::class;
}
