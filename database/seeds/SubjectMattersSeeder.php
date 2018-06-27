<?php

use Illuminate\Database\Seeder;
use App\SubjectMatter;

class SubjectMattersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subject_matters')->delete();

        $subject_matter = [
            [
                'name' => 'Advertising & Marketing',
            ],
            [
                'name' => 'Aerospace',
            ],
            [
                'name' => 'Agriculture',
            ],
            [
                'name' => 'Arts & Entertainment',
            ],
            [
                'name' => 'Banking & Finance',
            ],
            [
                'name' => 'Books & Publishing',
            ],
            [
                'name' => 'Business Services',
            ],
            [
                'name' => 'Computer Games',
            ],
            [
                'name' => 'Constructions & Building Materials',
            ],
            [
                'name' => 'Consumer Electronics',
            ],
            [
                'name' => 'Customer Support',
            ],
            [
                'name' => 'Desktop Publishing',
            ],
            [
                'name' => 'Electronics',
            ],
            [
                'name' => 'Engineering',
            ],
            [
                'name' => 'Film & Video',
            ],
            [
                'name' => 'Food & Beverages',
            ],
            [
                'name' => 'General',
            ],
            [
                'name' => 'Graphics',
            ],
            [
                'name' => 'Hospitality',
            ],
            [
                'name' => 'Insurance',
            ],
            [
                'name' => 'Legal',
            ],
            [
                'name' => 'Life Science',
            ],
            [
                'name' => 'Medical & Pharmaceuticals',
            ],
            [
                'name' => 'Other',
            ],
            [
                'name' => 'Public Sector & Governmental',
            ],
            [
                'name' => 'Real Estate',
            ],
            [
                'name' => 'Sports',
            ],
            [
                'name' => 'Telecommunications',
            ],
            [
                'name' => 'Televisions & Broadcasting',
            ],
            [
                'name' => 'Textile',
            ],
            [
                'name' => 'Transportations',
            ],
            [
                'name' => 'Trucks & Heavy Equipment',
            ],
        ];
        foreach ($subject_matter as $key => $value) {
            SubjectMatter::create($value);
        }
    }
}
