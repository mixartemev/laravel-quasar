<?php

use App\Models\User;
use App\Models\Market;
use Illuminate\Database\Seeder;

class MarketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $markets = [
            [
                'market'      => Market::MARKET_FRX,
                'ts_code'    => 'FX1',
                'profile_id' => 1,
            ],
            [
                'market'      => Market::MARKET_MOEX,
                'ts_code'    => 'TRADE',
                'profile_id' => 2,
            ],
            [
                'market'      => Market::MARKET_SPBX,
                'ts_code'    => 'ITRADE',
                'profile_id' => 2,
            ],
        ];
        Market::insert($markets);
    }
}
