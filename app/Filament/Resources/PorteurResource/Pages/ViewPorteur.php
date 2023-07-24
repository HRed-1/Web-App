<?php

namespace App\Filament\Resources\PorteurResource\Pages;

use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\PorteurResource;

class ViewPorteur extends ViewRecord
{
    protected static string $resource = PorteurResource::class;

    protected static string $view = 'filament.resources.porteur-resource.pages.view-porteur';

    protected function getActions(): array
    {
        return [];
    }

    protected function getTitle(): string
    {
        return '';
    }
}
