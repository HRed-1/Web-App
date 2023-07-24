<?php

namespace App\Filament\Widgets;

use Illuminate\Support\Facades\DB;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class SecteursChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'secteursChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'SecteursChart';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 1;

    


    protected function getOptions(): array
    {
        $secteur_actvites = DB::table('secteur_actvites')

            ->select('Title','id')
            ->get();

            $projets=DB::table('projets')
            ->select('secteur_actvite_id')
            ->get();

            $secteur_actvite_projets= array_map( function($secteur_actvite){
                return  DB::table('projets')
                ->where('commune_id','=',$secteur_actvite ->id)
                
                ->count(); 
            } , $secteur_actvites->toArray()) ;

        return [
            'chart' => [
                'type' => 'bar',
                'height' => 300,
            ],
            'series' => [
                [
                    'name' => 'Communes',
                    'data' => $secteur_actvite_projets,
                ],
            ],
            'xaxis' => [
                'categories' => array_map( function($secteur_actvite){
                    $maxLabelLength = 10;
                    return mb_strimwidth($secteur_actvite->Title, 0, $maxLabelLength, '...');
                } , $secteur_actvites->toArray())  ,
                'labels' => [
                    'enabled'=> false,
                    'style' => [
                        'colors' => '#9ca3af',
                        'fontWeight' => 600,
                    ],
                'rotate' => -0, // Rotate the labels by -45 degrees (adjust as needed)
                'truncate' => [
                    'enabled' => true,
                    'maxWidth' => 1, // Set the maximum width for the labels (adjust as needed)
            ],
                ],
                
                
            ],
            'yaxis' => [
                'labels' => [
                    
                    'style' => [
                        'colors' => '#9ca3af',
                        'fontWeight' => 600,
                    ],
                ],
            ],
            'colors' => ['#6366f1'],
        ];

    }
}
