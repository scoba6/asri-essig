<?php

namespace App\Filament\Widgets;

use App\Models\Fonctionnaire;
use App\Models\Ministere;
use App\Models\Projet;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $min = Ministere::all()->count();
        $fnc = Fonctionnaire::all()->count();
        $prj = Projet::all()->count();
       
       
        return [
            Stat::make('FONCTIONNAIRES', $fnc)
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('MINISTERES', $min)
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->chart([17, 16, 14, 15, 14, 13, 12])
                ->color('success'),
            Stat::make('PROJETS',  $prj)
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([15, 4, 10, 2, 12, 4, 12])
                ->color('success'),
        ];
    }
}
