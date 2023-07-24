<?php

namespace App\Filament\Resources\ProjetResource\Pages;

use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ProjetResource;

class EditProjet extends EditRecord
{
    protected static string $resource = ProjetResource::class;

    protected static string $view = 'filament.resources.projet-resource.pages.edit-projet';
}
