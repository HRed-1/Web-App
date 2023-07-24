<?php

namespace App\Filament\Resources\PosteResource\Pages;

use App\Filament\Resources\PosteResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePoste extends CreateRecord
{
    protected static string $resource = PosteResource::class;

    protected function getRedirectUrl(): string
{
    return $this->previousUrl ?? $this->getResource()::getUrl('index');
}
}
