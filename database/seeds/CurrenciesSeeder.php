<?php

use Illuminate\Database\Seeder;
use App\Currency;

class CurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->delete();

        $currencies = [
            [
                'code' => 'USD',
                'name' => 'USD',
            ],
            [
                'code' => 'EUR',
                'name' => 'EUR',
            ],
            [
                'code' => 'GBP',
                'name' => 'GBP',
            ],
            [
                'code' => 'EGP',
                'name' => 'EGP',
            ],
        ];

        foreach ($currencies as $key => $value) {
            Currency::create($value);
        }
    }
}
