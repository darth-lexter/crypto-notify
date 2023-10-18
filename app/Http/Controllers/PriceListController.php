<?php

namespace App\Http\Controllers;

use App\Services\BinanceService;
use App\Services\SignalCheckerService;

class PriceListController extends Controller
{
    public function getPriceList(BinanceService $binanceService, SignalCheckerService $checkerService): array
    {
//        $checkerService->checkSignals();

        $currentBtcPrice = $binanceService->getCurrentBtcPrice();
        dd($currentBtcPrice);
    }
}
