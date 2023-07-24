<?php

namespace App\Filament\Resources\ProjetResource\Widgets;

//use Filament\Widgets\Widget;
use App\Models\Associe;
use Illuminate\Database\Eloquent\Model;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;


class GenreAssoice extends ApexChartWidget
{
    //protected static string $view = 'filament.resources.projet-resource.widgets.genre-assoice';

    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'genreChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'الأعضاء';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    public ?Model $record = null;

    
    protected int | string | array $columnSpan = 5;

    protected function getOptions(): array
    {
        $porteurId = $this->record->porteur_id;

        $totalHommes = Associe::where('genre', 'h')
            ->where('porteur_id', $porteurId)
            ->count();
        
        $totalFemmes = Associe::where('genre', 'f')
            ->where('porteur_id', $porteurId)
            ->count();

        return [
            'chart' => [
                'type' => 'donut',
                'height' => 600,
            ],
            'series' => [$totalHommes, $totalFemmes],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
            'legend' => [
                'labels' => [
                    'colors' => '#9ca3af',
                    'fontWeight' => 600,
                ],
            ],
        ];
    }
}
