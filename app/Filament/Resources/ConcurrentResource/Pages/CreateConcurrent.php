<?php

namespace App\Filament\Resources\ConcurrentResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ConcurrentResource;

class CreateConcurrent extends CreateRecord
{
    protected static string $resource = ConcurrentResource::class;
}
