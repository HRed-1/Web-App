<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;
use Filament\Navigation\NavigationGroup;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Filament::serving(function () {
            Filament::registerNavigationGroups([
                NavigationGroup::make()
                     ->label('Gestion des Projets')
                     ->icon('heroicon-o-folder-open'),
                NavigationGroup::make()
                    ->label('Accompagnement')
                    ->icon('heroicon-o-calendar'),
                NavigationGroup::make()
                    ->label('Formation')
                    ->icon('heroicon-o-academic-cap'),
                NavigationGroup::make()
                    ->label('Indicateurs')
                    ->icon('heroicon-o-chart-pie')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('Notre Equipe')
                    ->icon('heroicon-o-user-group')
                    ->collapsed(),
                
                NavigationGroup::make()
                    ->label('Paramètres')
                    ->icon('heroicon-o-cog')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('Filament Shield')
                    ->icon('heroicon-o-users')
                    ->collapsed(),
                
            ]);
        });
        //
    }
}
