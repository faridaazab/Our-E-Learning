<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Feedback;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //we make an array so if we have more than one seeder
        // $this->call([UserSeeder::class]);
        // $this->call([CategorySeeder::class]);
        // $this->call([QuizSeeder::class]);
        // $this->call([CourseSeeder::class]);
        // $this->call([SessionSeeder::class]);
        // $this->call([FeedbackSeeder::class]);

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            QuizSeeder::class,
            CourseSeeder::class,
            SessionSeeder::class,
            FeedbackSeeder::class,
        ]);
    }
}
