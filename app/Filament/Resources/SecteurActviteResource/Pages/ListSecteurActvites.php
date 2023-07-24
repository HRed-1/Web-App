<?php

namespace App\Filament\Resources\SecteurActviteResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\SecteurActviteResource;

class ListSecteurActvites extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = SecteurActviteResource::class;
}
