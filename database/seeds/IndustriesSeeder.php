<?php

use Illuminate\Database\Seeder;
use App\Industry;

class IndustriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('industries')->delete();

        $industry = [
            [
                'name' => 'Agriculture & Environment',
            ],
            [
                'name' => 'Arts & Entertainment',
            ],
            [
                'name' => 'Automotive & transport',
            ],
            [
                'name' => 'Consumer Goods & Electronics',
            ],
            [
                'name' => 'Education & Training',
            ],
            [
                'name' => 'Energy & Raw Material',
            ],
            [
                'name' => 'Finance',
            ],
            [
                'name' => 'Government & Organization',
            ],
            [
                'name' => 'Individual',
            ],
            [
                'name' => 'Industrial & Manufacturing',
            ],
            [
                'name' => 'Legal & Corporate',
            ],
            [
                'name' => 'Media & Publishing',
            ],
            [
                'name' => 'Medical & Healthcare',
            ],
            [
                'name' => 'Other',
            ],
            [
                'name' => 'Professional Services',
            ],
            [
                'name' => 'Technology & Telecom',
            ],
            [
                'name' => 'Trade & Retail',
            ],
            [
                'name' => 'Translation & Interpreting',
            ],
            [
                'name' => 'Unknown',
            ],
        ];
        foreach ($industry as $key => $value) {
            Industry::create($value);
        }
    }
}
