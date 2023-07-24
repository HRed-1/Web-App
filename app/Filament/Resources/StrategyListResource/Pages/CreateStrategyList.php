<?php

namespace App\Filament\Resources\StrategyListResource\Pages;

use App\Filament\Resources\StrategyListResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStrategyList extends CreateRecord
{
    protected static string $resource = StrategyListResource::class;

    protected function getRedirectUrl(): string
{
    return $this->previousUrl ?? $this->getResource()::getUrl('index');
}
}
