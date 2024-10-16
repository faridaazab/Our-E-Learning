<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category=Category::create([
            'name' => 'Cyber Security',
            'description' => 'loreeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeem',
            'smallDescription'=>'loreeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeem',
            'create_user_id' => 1,
        ]);

        $category=Category::create([
            'name' => 'Web Development',
            'description' => 'loreeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeem',
            'smallDescription'=>'loreeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeem',
            'create_user_id' => 2,
        ]);

        $category=Category::create([
            'name' => 'Sport',
            'description' => 'loreeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeem',
            'smallDescription'=>'loreeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeem',
            'create_user_id' => 3,
        ]);

        $category=Category::create([
            'name' => 'Nutrition',
            'description' => 'loreeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeem',
            'smallDescription'=>'loreeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeem',
            'create_user_id' => 1,
        ]);
    }
}
