<?php

namespace App\Services;

use App\Exceptions\SymbolNotFoundException;
use App\Models\FavoriteSymbol;

class FavoritesService
{
    public function __construct(
        private readonly BinanceService $binanceService
    ) {}

    public function update(): void
    {
        $favoriteSymbols = FavoriteSymbol::all();

        foreach ($favoriteSymbols as $favoriteSymbol) {
            try {
                $favoriteSymbol->update([
                    'price' => $this->binanceService->getPriceBySymbol($favoriteSymbol->symbol)
                ]);
            } catch (SymbolNotFoundException $e) {
                continue;
            }
        }
    }
}
