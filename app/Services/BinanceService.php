<?php

namespace App\Services;

use App\Exceptions\SymbolNotFoundException;
use Illuminate\Support\Facades\Http;

class BinanceService
{
    const URL_ALL_PRICES = "https://api.binance.com/api/v1/ticker/allPrices";

    private array $priceList = [];

    public function getPriceList(): array
    {
        if (empty($this->priceList)) {
            $this->priceList = Http::get(self::URL_ALL_PRICES)->json();
        }

        return $this->priceList;
    }

    /**
     * @throws SymbolNotFoundException
     */
    public function getPriceBySymbol(string $symbol): float
    {
        $prices = $this->getPriceList();
        foreach ($prices as $price) {
            if ($price["symbol"] === $symbol) {
                return $price["price"];
            }
        }

        throw new SymbolNotFoundException("Price by $symbol not found");
    }
}
