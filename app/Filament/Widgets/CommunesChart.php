<?php

namespace App\Filament\Widgets;

use Illuminate\Support\Facades\DB;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class CommunesChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'communesChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Repartition par Commune';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 2;

    
    protected function getOptions(): array
    {

        $communes = DB::table('communes')

            ->select('Title','id')
            ->get();

            $projets=DB::table('projets')
            ->select('commune_id')
            ->get();

            $commune_projets= array_map( function($commune){
                return  DB::table('projets')
                ->where('commune_id','=',$commune ->id)
                
                ->count(); 
            } , $communes->toArray()) ;

        return [
            'chart' => [
                'type' => 'bar',
                'height' => 300,
            ],
            'series' => [
                [
                    'name' => 'Communes',
                    'data' => $commune_projets,
                ],
            ],
            'xaxis' => [
                'categories' => array_map( function($commune){
                    $maxLabelLength = 10;
                    return mb_strimwidth($commune->Title, 0, $maxLabelLength, '...');
                } , $communes->toArray())  ,
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
