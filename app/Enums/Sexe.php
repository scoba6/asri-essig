<?php

namespace App\Enums;
use Filament\Support\Contracts\HasLabel;

enum Sexe : string implements HasLabel
{
    case A ='Masculin';

    case B = 'Féminin';

 
    public function getLabel(): string
    {
        return match ($this) {
            self::A => 'Masculin',
            self::B => 'Féminin',
            
        };
    }
}
