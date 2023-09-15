<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin@gmail.com'),
        ])->assignRole('admin');

        User::factory()->create([
            'name' => 'Raju Bepary',
            'email' => 'raju@gmail.com',
            'password' => bcrypt('raju@gmail.com'),
        ])->assignRole('admin');

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user@gmail.com'),
        ])->assignRole('user');
    }
}
