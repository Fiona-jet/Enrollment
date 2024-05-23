<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Added import for Hash

class Admin_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('admins_tbl')->insert([
            [
                'admin_name' => 'ani',
                'admin_email' => 'ani@gmail.com',
                'admin_password' => Hash::make('123'), // Hashing the password
                'admin_phone' => '019'
            ]
        ]);
    }
}
