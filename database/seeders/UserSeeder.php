<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users =[
            [
                'name' => 'Farzana Rahman Ani',
                'email' => 'ani@gmail.com',
                'password' => bcrypt('1234'),
                'role' => 'admin',
                'sid' => null,
                'created_at' => 2024_04_20_064141,
                'updated_at' => 2024_04_20_064141
            ]
        ];
        DB::table('users')->insert($users);
    }
}
