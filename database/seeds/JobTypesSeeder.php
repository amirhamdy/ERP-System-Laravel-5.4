<?php

use Illuminate\Database\Seeder;
use App\JobType;

class JobTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_types')->delete();

        $jobType = [
            [
                'name' => 'Full DTP',
            ],
            [
                'name' => 'Translation and Editing',
            ],
            [
                'name' => 'Engineering',
            ],
            [
                'name' => 'Translation, Editing and Proofreading',
            ],
            [
                'name' => 'Translation Only',
            ],
            [
                'name' => 'Revision Only',
            ],
            [
                'name' => 'Proofreading Only',
            ],
            [
                'name' => 'QC Only',
            ],
            [
                'name' => 'Transcription',
            ],
            [
                'name' => 'Transcription & Translation',
            ],
        ];
        foreach ($jobType as $key => $value) {
            JobType::create($value);
        }
    }
}
