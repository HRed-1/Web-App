<?php

namespace App\Filament\Resources\TypeAccompPostResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\TypeAccompPostResource;

class ListTypeAccompPosts extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = TypeAccompPostResource::class;
}
