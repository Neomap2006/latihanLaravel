<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use App\Models\Kelas;

class MahasiswaSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk tabel mahasiswa.
     */
    public function run(): void
    {
        // Data mahasiswa beserta nama kelasnya
        $data = [
            [
                'nama' => 'Neo M.A.P','nim' => '12345',
                'jurusan' => 'Teknik Informatika','kelas' => 'ASE24-001',],
            [
                'nama' => 'Rangga','nim' => '12346',
                'jurusan' => 'Manajemen','kelas' => 'OAA24-002',],
            [
                'nama' => 'Helvira','nim' => '12347',
                'jurusan' => 'Akuntansi','kelas' => 'AIS24-003',],
        ];

        foreach ($data as $item) {
            // Cari kelas berdasarkan nama_kelas
            $kelas = Kelas::where('nama_kelas', $item['kelas'])->first();

            if ($kelas) {
                // Buat atau update mahasiswa berdasarkan NIM
                Mahasiswa::updateOrCreate(
                    ['nim' => $item['nim']], // cek apakah sudah ada NIM ini
                    [
                        'nama' => $item['nama'],
                        'jurusan' => $item['jurusan'],
                        'kelas_id' => $kelas->id,
                    ]
                );
            }
        }
    }
}
