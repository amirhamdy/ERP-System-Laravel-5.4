<?php

use Illuminate\Database\Seeder;
use App\Region;

class RegionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->delete();

        $region = [
            [
                'name' => 'U.S.A',
            ],
            [
                'name' => 'EUROPE',
            ],
            [
                'name' => 'ASIA',
            ],
            [
                'name' => 'MEA',
            ],
        ];
        foreach ($region as $key => $value) {
            Region::create($value);
        }
    }
}
