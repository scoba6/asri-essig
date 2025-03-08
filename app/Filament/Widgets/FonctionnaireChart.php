<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class FonctionnaireChart extends ChartWidget
{
    protected static ?string $heading = 'Stage des fonctionnaires';
    protected static ?string $subheading = 'Fonctionnaires en stage';
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Fonctionnaires en stage',
                    'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
