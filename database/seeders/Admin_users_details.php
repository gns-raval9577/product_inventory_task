<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Admin_users_details extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

         // Truncate the table to remove existing data
        User::truncate();

         // Seed the table with new data
        User::create([
            'name' => 'Admin',
            'email' => 'Admin@gmail.com',
            'password' => Hash::make('Admin@123'),
            'role'=> 'Admin'
        ]);
    }
}
