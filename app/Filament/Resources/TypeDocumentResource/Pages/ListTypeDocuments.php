<?php

namespace App\Filament\Resources\TypeDocumentResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\TypeDocumentResource;

class ListTypeDocuments extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = TypeDocumentResource::class;
}
