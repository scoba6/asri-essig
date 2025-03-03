<?php

namespace App\Enums;
use Filament\Support\Contracts\HasLabel;

enum Banque: string implements HasLabel
{
    case A ='AFGBANK';
    case B = 'BGFIBANK';
    case C = 'ECOBANK';
    case D = 'ORABANK';
    case E = 'UBA';
    case F = 'UGB';



    public function getLabel(): string
    {
        return match ($this) {
            self::A => 'AFGBANK',
            self::B => 'BGFIBANK',
            self::C => 'ECOBANK',
            self::D => 'ORABANK',
            self::E => 'UBA',
            self::F => 'UGB',
        };
    }
}
