<?php

namespace Database\Seeders;

use App\Enums\BotSignalType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoriteSymbolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $symbols = ['BTCUSDT', 'ETHUSDT', 'DOTUSDT', 'UNIUSDT'];

        foreach ($symbols as $symbol) {
            DB::table('favorite_symbols')->insert([
                'symbol' => $symbol,
                'price'  => rand(10, 30000),
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime()
            ]);
        }
    }
}
