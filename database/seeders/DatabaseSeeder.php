<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use \Database\Seeders\UserSeeder;
use \Database\Seeders\ProductSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'username' => 'ozodbek',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        $this->call([
            UserSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
