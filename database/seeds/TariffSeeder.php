<?php

use App\Models\Profile;
use App\Models\Market;
use App\Models\Tariff;
use Illuminate\Database\Seeder;

class TariffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tariffs = [
            [
                'name'        => 'Professional',
                'market_type' => Profile::MARKET_TYPE_FOUND,
                'deposit'     => 150,
                'min'         => 250,
            ],
            [
                'name'        => 'Валютный',
                'market_type' => Profile::MARKET_TYPE_FOREX,
                'deposit'     => 0,
                'min'         => 0,
            ],
        ];
        Tariff::insert($tariffs);
    }
}
