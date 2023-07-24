<?php

namespace App\Filament\Widgets;

use App\Models\Formation;
use App\Models\Accompagnement;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class SuiviWidget extends BaseWidget
{
    protected static ?int $sort = 11;

    protected function getCards(): array
    {
        
        
        return [

            Card::make('Accompagnements ', Accompagnement::all()->count()),

            Card::make('Formations', Formation::all()->count())
                // ->description('32k increase')
                // ->descriptionIcon('heroicon-s-trending-up')
                // ->chart([7, 22, 10, 3, 15, 4, 17])
                // ->color('success')
                // ->extraAttributes([
                //     'class' => 'cursor-pointer',
                //     'wire:click' => '$emitUp("setStatusFilter", "processed")',
                // ])
                ,
            
            Card::make('Participants', Formation::all()->count('porteurs'))
                //->description('Taux de Partipation 75%')  //participant / total projet 
                ->color('success')
                ->chart([65, 60, 10, 3, 15, 4, 17]),  //partipants par formation
            //
        ];
    }
}
