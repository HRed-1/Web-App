<?php

namespace App\Filament\Resources\ProjetResource\Widgets;

use Closure;
use Filament\Tables;
use App\Models\Associe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as BaseWidget;

class AssociesProjet extends BaseWidget
{
    public ?Model $record = null;
    

    protected int | string | array $columnSpan = 7;


    protected static ?string $heading = 'لائحة الأعضاء';

    public function getDefaultTableRecordsPerPageSelectOption(): int
    {
        return 5;
    }

    protected function getDefaultTableSortColumn(): ?string
    {
        return 'admin';
    }

    protected function getDefaultTableSortDirection(): ?string
    {
        return 'desc';
    }
    protected function getTableQuery(): Builder
    {
        return Associe::query()->where('porteur_id', $this->record->porteur_id);
        // ...
    }

    protected function getTableColumns(): array
    {
        return [
                Tables\Columns\ImageColumn::make('Photo')->rounded()->label(''),
                Tables\Columns\TextColumn::make('Name_ar')->limit(50)->label('الإسم'),
                Tables\Columns\IconColumn::make('admin')->label('مسير')->boolean(),
                Tables\Columns\TextColumn::make('age')->limit(50)->label('العمر'),

                Tables\Columns\TextColumn::make('Formation')->limit(50)->label('التكوين')->enum([
                    '1' =>  'إبتدائي',
                    '2' =>  'ثانوي',
                    '3' =>  'عالي',
                    '4' =>  'تقني',
                    '5' =>  'غير محدد'
                ]),
                
                
                
                
        ];
    }
}
