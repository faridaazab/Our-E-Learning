<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quiz;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quiz= Quiz::create([
            "link"=>'https://docs.google.com/forms/d/e/1FAIpQLSdPAU2UYDNXdLKSUlI-3lF0qBAWC-o0Tv8VKAP2PHAwhxA6rQ/viewform?usp=sf_link',
            "grades"=>"https://docs.google.com/forms/d/1tMPpfm7M3_vzmL72r5VDkfAv-UKBfDfKGGPT6-zPaYE/edit#responses",
        ]);
    }
}
