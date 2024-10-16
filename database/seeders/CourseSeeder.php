<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $course = Course::create([
            'name'          => 'PHP',
            'category_id'   => 2,
            'instructor_id' => 3,
        ]);

        $course = Course::create([
            'name'          => 'CCNA',
            'category_id'   => 1,
            'instructor_id' => 3,
        ]);

        $course = Course::create([
            'name'          => 'Healthy Habits',
            'category_id'   => 4,
            'instructor_id' => 3,
        ]);

        $course = Course::create([
            'name'          => 'Angular',
            'category_id'   => 2,
            'instructor_id' => 4,
        ]);

        $course = Course::create([
            'name'          => 'Basketball',
            'category_id'   => 3,
            'instructor_id' => 4,
        ]);

    }
}
