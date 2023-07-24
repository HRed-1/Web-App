<?php

namespace App\Filament\Resources\PosteResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\PosteResource;
use App\Filament\Traits\HasDescendingOrder;

class ListPostes extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = PosteResource::class;
}
