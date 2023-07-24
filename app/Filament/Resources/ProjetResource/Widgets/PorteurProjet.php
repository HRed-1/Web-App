<?php

namespace App\Filament\Resources\ProjetResource\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Model;

class PorteurProjet extends Widget
{
    protected static string $view = 'filament.resources.projet-resource.widgets.porteur-projet';

    public ?Model $record = null;

    protected int | string | array $columnSpan = 12;
}
