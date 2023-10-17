<?php

namespace App\Http\Controllers;

use App\Services\BinanceService;
use App\Services\SignalCheckerService;

class PriceListController extends Controller
{
    public function getPriceList(BinanceService $binanceService, SignalCheckerService $checkerService): array
    {
        $checkerService->checkSignals();

        return $binanceService->getPriceList();
    }
}
