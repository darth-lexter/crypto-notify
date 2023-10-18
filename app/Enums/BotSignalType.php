<?php

namespace App\Enums;


enum BotSignalType: int
{
    case PRICE_UP = 1;
    case PRICE_DOWN = 2;

    public function toString(): string
    {
        return match ($this) {
            self::PRICE_UP => 'price up',
            self::PRICE_DOWN => 'price down'
        };
    }
}
