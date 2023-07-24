<?php

namespace App\Filament\Resources\ProjetResource\Widgets;


use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Model;

class Projet extends Widget
{
    protected static string $view = 'filament.resources.projet-resource.widgets.projet';
    public ?Model $record = null;

    protected int | string | array $columnSpan = 12;


}
