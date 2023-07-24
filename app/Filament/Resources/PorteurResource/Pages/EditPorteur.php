<?php

namespace App\Filament\Resources\PorteurResource\Pages;

use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\PorteurResource;

class EditPorteur extends EditRecord
{
    protected static string $resource = PorteurResource::class;

    protected static string $view = 'filament.resources.porteur-resource.pages.edit-porteur';

    
}
