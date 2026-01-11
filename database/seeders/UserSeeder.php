<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Guru/BK (contoh)
        User::create([
            'username' => 'guru1',
            'password' => Hash::make('guru123'),
            'role' => 'guru',
            'relasi_id' => null, // Akan diisi setelah data guru dibuat
        ]);
    }
}