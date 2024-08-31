<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name"=> "Fabian Leonardo Campoverde",
            "email"=> "fabian_leo29@hotmail.com",
            "password"=> bcrypt("Fabian29*"),
        ])->assignRole('Admin');
            User::factory()->count(40)->create();
    }
}
