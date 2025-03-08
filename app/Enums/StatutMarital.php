<?php

namespace App\Enums;
use Filament\Support\Contracts\HasLabel;
enum StatutMarital: string implements HasLabel
{
    case A ='Célibataire';
    case B = 'Marié';
    case C = 'Veuf';
    case D = 'Divorcé';

    public function getLabel(): string
    {
        return match ($this) {
            self::A => 'Célibataire',
            self::B => 'Marié',
            self::C => 'Veuf',
            self::D => 'Divorcé',
        };
    }
}

