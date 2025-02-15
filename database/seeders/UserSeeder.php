<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'm.s@gmail.com'],
            [
                'name' => 'majd Alsteif',
                'role'=>'Admin',
                'password' => Hash::make('123456789')
            ]
        );
    }
}
