<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\role;
use App\Models\User;
use App\Models\user_role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Jason Garab',
            'user_name' => 'superadmin',
            'password' => bcrypt('Admin123'),
        ]);

        User::create([
            'name' => 'Juan Dela Cruz',
            'user_name' => 'admin',
            'password' => bcrypt('Admin123'),
        ]);

        User::create([
            'name' => 'Juan Gomez',
            'user_name' => 'driver',
            'password' => bcrypt('Driver123'),
        ]);

        User::create([
            'name' => 'Juan Del Mundo',
            'user_name' => 'resident',
            'password' => bcrypt('Resident123'),
        ]);

        role::create([
            'id' => 1,
            'role_name' => 'SUPER ADMINISTRATOR',
        ]);

        role::create([
            'id' => 2,
            'role_name' => 'ADMIN',
        ]);

        role::create([
            'id' => 3,
            'role_name' => 'DRIVER',
        ]);

        role::create([
            'id' => 4,
            'role_name' => 'RESIDENT',
        ]);

        user_role::create([
            'user_id' => 1,
            'role_id' => 1,
        ]);

        user_role::create([
            'user_id' => 2,
            'role_id' => 2,
        ]);

        user_role::create([
            'user_id' => 3,
            'role_id' => 3,
        ]);

        user_role::create([
            'user_id' => 4,
            'role_id' => 4,
        ]);

    }
}
