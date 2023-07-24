<?php

namespace App\Filament\Resources\StrategyListResource\Pages;

use App\Filament\Resources\StrategyListResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStrategyList extends EditRecord
{
    protected static string $resource = StrategyListResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
