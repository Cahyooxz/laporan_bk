<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SuratPeringatan as Sp;

class SuratPeringatan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $surat = Sp::create([
            'user_id' => '3',
            'surat_peringatan' => 'SP3',
            'pelanggaran' => 'Membolos',
        ]);
    }
}
