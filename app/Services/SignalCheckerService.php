<?php

namespace App\Services;

use App\Models\BotSignal;

class SignalCheckerService
{
    public function checkSignals()
    {
        $signals = BotSignal::where('active', true)->get();

        dd($signals);
    }
}
