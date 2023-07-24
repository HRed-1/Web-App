<?php

namespace App\Filament\Resources\ConcurrentResource\Pages;

use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ConcurrentResource;

class EditConcurrent extends EditRecord
{
    protected static string $resource = ConcurrentResource::class;
}
