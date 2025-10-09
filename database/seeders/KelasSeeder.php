<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk tabel kelas
     */
    public function run(): void
    {
        $data = [
            ['nama_kelas' => 'ASE24-001', 'jurusan' => 'Teknik Informatika'],
            ['nama_kelas' => 'OAA24-002', 'jurusan' => 'Manajemen'],
            ['nama_kelas' => 'AIS24-003', 'jurusan' => 'Akuntansi'],
        ];

        foreach ($data as $item) {
            Kelas::updateOrCreate(
                ['nama_kelas' => $item['nama_kelas']],
                ['jurusan' => $item['jurusan']]
            );
        }

    }
}
