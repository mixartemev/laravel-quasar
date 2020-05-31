<?php

use App\Profile;
use App\User;
use App\Market;
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
        $profiles = [
            [
                'code'        => 'G37317',
                'title'       => 'Forex',
                'market_type' => Profile::MARKET_TYPE_FOREX,
                'user_id'     => User::ADMIN,
            ],
            [
                'code'        => 'D70657',
                'title'       => 'Found',
                'market_type' => Profile::MARKET_TYPE_FOUND,
                'user_id'     => User::ADMIN,
            ],
        ];
        Profile::insert($profiles);

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
