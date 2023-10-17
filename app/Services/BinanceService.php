<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class BinanceService
{
    const URL_ALL_PRICES = "https://api.binance.com/api/v1/ticker/allPrices";

    public function getPriceList(): array
    {
        $response = Http::get(self::URL_ALL_PRICES);

        return $response->json();
    }
}
