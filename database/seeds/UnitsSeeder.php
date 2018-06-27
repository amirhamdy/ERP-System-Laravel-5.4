<?php

use Illuminate\Database\Seeder;
use App\Unit;

class UnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->delete();

        $unit = [
            [
                'name' => 'Character',
            ],
            [
                'name' => 'File',
            ],
            [
                'name' => 'Hour',
            ],
            [
                'name' => 'Line',
            ],
            [
                'name' => 'Page',
            ],
            [
                'name' => 'Screen',
            ],
            [
                'name' => 'Term',
            ],
            [
                'name' => 'Unit',
            ],
            [
                'name' => 'Word',
            ],
            [
                'name' => 'Minute',
            ],
        ];
        foreach ($unit as $key => $value) {
            Unit::create($value);
        }
    }
}
