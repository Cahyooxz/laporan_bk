<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prestasi;

class PrestasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prestasi::create([
            'user_id' => '3',
            'Peringkat' => 'Juara 3',
            'nama_kompetisi' => 'LKS Tingkat Provinsi',
        ]);
    }
}
