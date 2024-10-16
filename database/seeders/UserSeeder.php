<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user= User::create([
            "username" => "Farida Azab",
            "email" => "faridaazab@gmail.com",
            "user_type" => "admin",
            "password" => "123456789",]);

            $user= User::create([
            "username" => "Kareem Tarek",
            "email" => "kareem@gmail.com",
            "user_type" => "admin",
            "password" => "123456789",]);

            $user= User::create([
            "username" => "Mariam Gamal",
            "email" => "mariam@gmail.com",
            "user_type" => "instructor",
            "password" => "123456789",
            ]);

            $user= User::create([
                "username" => "Hossam Ramy",
                "email" => "hossam@gmail.com",
                "user_type" => "instructor",
                "password" => "123456789",
                ]);

         $user= User::create([
             "username" => "Ahmed",
             "email" => "ahmed@gmail.com",
             "user_type" => "student",
             "password" => "123456789",
          ]);

          $user= User::create([
             "username" => "Ali",
             "email" => "ali@gmail.com",
             "user_type" => "student",
             "password" => "123456789",
          ]);

          $user= User::create([
             "username" => "Marwa",
             "email" => "marwa@gmail.com",
             "user_type" => "student",
             "password" => "123456789",
          ]);
          $user= User::create([
             "username" => "Hala",
             "email" => "hala@gmail.com",
             "user_type" => "student",
             "password" => "123456789",
          ]);
          $user= User::create([
             "username" => "Manal Goda",
             "email" => "Manal@gmail.com",
             "user_type" => "student",
             "password" => "123456789",
          ]);
          $user= User::create([
             "username" => "Magdy",
             "email" => "magdy@gmail.com",
             "user_type" => "student",
             "password" => "123456789",
          ]);
          $user= User::create([
             "username" => "Ezz",
             "email" => "ezz@gmail.com",
             "user_type" => "student",
             "password" => "123456789",
          ]);
          $user= User::create([
             "username" => "Esraa",
             "email" => "esraa@gmail.com",
             "user_type" => "student",
             "password" => "123456789",
          ]);
    }
}
