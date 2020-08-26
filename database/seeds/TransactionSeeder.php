<?php

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
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
                'from'   => 1,
                'to'     => 2,
                'amount' => 1000,
                'cur'    => 1,
                'when'   => 1588948044,
            ],
        ];
        Transaction::insert($tariffs);
    }
}
