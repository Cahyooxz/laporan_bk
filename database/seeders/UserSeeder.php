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
        $admin  = User::create([
            'nisn/nip' => '1',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);
        $admin->assignRole('admin');

        $guru  = User::create([
            'nisn/nip' => '2',
            'name' => 'guru',
            'email' => 'guru@gmail.com',
            'password' => bcrypt('guru'),
            'role' => 'guru',
        ]);
        $guru->assignRole('guru');

        $siswa  = User::create([
            'nisn/nip' => '3',
            'name' => 'siswa',
            'email' => 'siswa@gmail.com',
            'password' => bcrypt('siswa'),
            'role' => 'siswa',
        ]);
        $siswa->assignRole('siswa');
    }
}
