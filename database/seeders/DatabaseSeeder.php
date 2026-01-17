<?php

namespace Database\Seeders;
use App\Models\Bendahara;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


User::create([
    'name' => 'Admin',
    'email' => 'admin@example.com',
    'password' => Hash::make('password'),
    'role' => 'admin'
]);

User::create([
    'name' => 'Bendahara',
    'email' => 'bendahara@example.com',
    'password' => Hash::make('password'),
    'role' => 'bendahara'
]);

User::create([
    'name' => 'Koprasi',
    'email' => 'koprasi@example.com',
    'password' => Hash::make('password'),
    'role' => 'koprasi'
]);

User::create([
    'name' => 'Santri',
    'email' => 'santri@example.com',
    'password' => Hash::make('password'),
    'role' => 'santri'
]);

Bendahara::create([
    'nama' => 'walid'
]);

    }
}
