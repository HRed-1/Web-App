<?php

namespace App\Filament\Resources\ProjetResource\Pages;

use App\Models\Projet;
use Filament\Resources\Pages\Page;
use App\Filament\Resources\ProjetResource;

class PresentationProjet extends Page
{
    protected static string $resource = ProjetResource::class;

    protected static string $view = 'filament.resources.projet-resource.pages.presentation-projet';

    public Projet $record;

    

}
