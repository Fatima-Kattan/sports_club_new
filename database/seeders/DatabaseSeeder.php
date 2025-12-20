<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

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
        'full_name' => 'admin',
        'email' => 'admin@gmail.com',
        'phone_number' => '0999999999',
        'email_verified_at' => now(),
        'birth_date' => '2004-11-08',
        'gender' => 'female',
        'is_admin' => true,
        'image' => 'user.jpg',
        'password' => Hash::make('123456789'),]);
        
    }
}
