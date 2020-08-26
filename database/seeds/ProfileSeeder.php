<?php

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
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
    }
}
