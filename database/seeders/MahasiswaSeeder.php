<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nim' => '2401001', 'nama' => 'Andi Saputra', 'prodi' => 'TI'],
            ['nim' => '2401002', 'nama' => 'Budi Santoso', 'prodi' => 'SI'],
            ['nim' => '2401003', 'nama' => 'Citra Lestari', 'prodi' => 'TI'],
            ['nim' => '2401004', 'nama' => 'Dewi Anggraini', 'prodi' => 'MI'],
        ];

        foreach ($data as $mahasiswa) {
            Mahasiswa::updateOrCreate(
                ['nim' => $mahasiswa['nim']],
                ['nama' => $mahasiswa['nama'], 'prodi' => $mahasiswa['prodi']],
            );
        }
    }
}
