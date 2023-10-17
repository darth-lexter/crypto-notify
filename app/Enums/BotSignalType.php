<?php

namespace App\Enums;


enum BotSignalType: int
{
    case PRICE_UP = 1;
    case PRICE_DOWN = 2;
}
