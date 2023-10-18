<?php

namespace App\Services;

use App\Enums\BotSignalType;
use App\Exceptions\SymbolNotFoundException;
use App\Models\BotSignal;

class SignalCheckerService
{
    private array $messages = [];
    private array $errors = [];

    public function __construct(
        private readonly BinanceService $binanceService
    ) {}


    /**
     * @throws SymbolNotFoundException
     */
    public function checkSignals(): void
    {
        $signals = BotSignal::where('active', true)->get();

        foreach ($signals as $signal) {
            try {
                $isFulfilled = $this->checkSignal($signal);

                if (!$isFulfilled) {
                    continue;
                }

                $this->messages[] = $this->getSignalMessage($signal);

            } catch (SymbolNotFoundException $e) {
                $this->errors[] = $e->getMessage();
            }
        }
    }

    /**
     * @throws SymbolNotFoundException
     */
    public function checkSignal(BotSignal $signal): bool
    {
        $currentPrice = $this->binanceService->getPriceBySymbol($signal->symbol);

        return match($signal->type) {
            BotSignalType::PRICE_UP->value => $currentPrice >= $signal->rule_limit,
            BotSignalType::PRICE_DOWN->value => $currentPrice <= $signal->rule_limit
        };
    }

    /**
     * @throws SymbolNotFoundException
     */
    private function getSignalMessage(BotSignal $signal): string
    {
        return "Signal #" . $signal->id . " completed. Current price: "
            . $this->binanceService->getPriceBySymbol($signal->symbol)
            . " Limit: " . $signal->rule_limit;
    }

    public function getMessages(): array
    {
        return $this->messages;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}

