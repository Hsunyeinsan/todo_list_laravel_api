<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Hsu Nyein San',
                'email' => 'hsunyeinsan@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Aye Chan',
                'email' => 'ayechan@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Su Mon',
                'email' => 'sumon@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('mypassword'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ko Ko',
                'email' => 'koko@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('admin1234'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
    User::insert($users);
    }
}
