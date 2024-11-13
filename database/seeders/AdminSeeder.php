<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

         // Create an admin account
         Admin::create([
            // 'name' => 'Admin User',
            // 'email' => 'admin@gmail.com',
            // 'password' => Hash::make('12345678'), 

            'username' => 'developer',
            'email' => 'developer@gmail.com',  
            'password' => Hash::make('Test@Password123#'),
            'status' => '1', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
