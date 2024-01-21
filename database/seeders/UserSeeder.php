<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'R',
            'email' => 'R@gmail.com',
            'password' => Hash::make('12345678'),
            'created_at' => Carbon::now()
            
        ]);

        User::create([
            'nama' => 'Admin',
            'email' => 'admin@admin.company.com',
            'password' => Hash::make('123'),
            'created_at' => Carbon::now()
        ]);
    }
}
