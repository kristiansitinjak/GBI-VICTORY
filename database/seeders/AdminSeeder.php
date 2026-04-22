<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('admins')->insert([
            'nama'     => "Admin GBI Vactory",
            'username' => "gbivictoryadmin",
            'password' => Hash::make("gbivictory@2026"), // Lebih aman dari bcrypt()
        ]);
    }
}
