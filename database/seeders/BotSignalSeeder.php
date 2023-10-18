<?php

namespace Database\Seeders;

use App\Enums\BotSignalType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BotSignalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bot_signals')->insert([
            'active' => true,
            'type' => BotSignalType::PRICE_UP,
            'rule_limit' => 21000,
            'symbol' => 'BTCUSDT',
            'comment' => 'Sell!',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]);

        DB::table('bot_signals')->insert([
            'active' => true,
            'type' => BotSignalType::PRICE_DOWN,
            'rule_limit' => 20000,
            'symbol' => 'BTCUSDT',
            'comment' => 'Buy!',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]);
    }
}
