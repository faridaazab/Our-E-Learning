<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Session;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $session = Session::create([
            "name"=>'session_1',
            "link"=>'https://docs.google.com/forms/d/e/1FAIpQLSdPAU2UYDNXdLKSUlI-3lF0qBAWC-o0Tv8VKAP2PHAwhxA6rQ/viewform?usp=sf_link',
            'create_user_id' => 3,
            'course_id' => 1
        ]);

        $session = Session::create([
            "name"=>'session_1',
            "link"=>'https://drive.google.com/file/d/1qs_2QJBAY-BFyH600A2waONX6sJjvVa6/view?usp=drive_link',
            'create_user_id' => 3,
            'course_id' => 2
        ]);

        $session = Session::create([
            "name"=>'session_2',
            "link"=>'https://drive.google.com/file/d/1LI2w-aX1HVw9FoH6vyE3YpmMDc0LqQsC/view?usp=drive_link',
            'create_user_id' => 3,
            'course_id' => 2
        ]);

        $session = Session::create([
            "name"=> 'session_1',
            "link"=>'https://drive.google.com/file/d/1gBePirRlfcIbhawfGz5KLGYQpQJebhWC/view?usp=drive_link',
            'course_id' => 3

        ]);
    }
}
