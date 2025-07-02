<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan role "User" ada dulu
        Role::firstOrCreate(['name' => 'User', 'guard_name' => 'web']);

        // Baru buat user dan assign role
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token' => null,
            'created_at' => now(),
        ]);

        $user->assignRole('User');
    }
}