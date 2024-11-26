<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@symphonia.com',
            'password' => bcrypt('batatinhafrita123@'),
            'is_admin' => true,
            'client_ip' => '127.0.0.1',
        ]);
    }
}

