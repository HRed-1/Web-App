<?php

namespace App\Filament\Widgets;

use App\Models\Associe;
use App\Models\Porteur;
use App\Models\Projet;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class PorteurWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected int | string | array $columnSpan = 'full';

    
    protected function getCards(): array
    {
        $totalAssocies = Associe::count();
        $femaleAssocies = Associe::where('genre', 'f')->count();
        $maleAssocies = Associe::where('genre', 'h')->count();
        $youngAssocies = Associe::where('age', '<=', 35)->count();

        $femalePercentage = round(($femaleAssocies / $totalAssocies) * 100);
        $malePercentage = round(($maleAssocies / $totalAssocies) * 100);
        $youngPercentage = round(($youngAssocies / $totalAssocies) * 100);

        $description = "{$femalePercentage}% Femmes et {$malePercentage}% Hommes et {$youngPercentage}% Jeunes";

        return [
            Card::make('Porteurs de Projets Inscrits', Porteur::all()->count())
                // ->description('32k increase')
                // ->descriptionIcon('heroicon-s-trending-up')
                ->chart([7, 22, 10, 3, 15, 4, 17])
                ->color('success')
                
                ,
            Card::make('Membres & Associes', Associe::all()->count())
                ->description($description)
                // ->descriptionIcon('heroicon-s-trending-up')
                ->chart([7, 22, 10, 3, 15, 4, 17])
                ->color('primary')
                ,
            //
        ];
    }
}
