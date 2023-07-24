<?php

namespace App\Filament\Resources\ProjetResource\Pages;

use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\ProjetResource;

class ViewProjet extends ViewRecord
{
    protected static string $resource = ProjetResource::class;

    protected static string $view = 'filament.resources.projet-resource.pages.view-projet';
}
