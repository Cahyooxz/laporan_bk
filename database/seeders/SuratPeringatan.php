<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuratPeringatan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SuratPeringatan::create([
            'user_id' => '3',
            'surat_peringatan' => 'SP1',
        ])
    }
}
