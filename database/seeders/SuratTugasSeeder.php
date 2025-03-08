<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SuratTugas;
use App\Models\Pegawai;
use Illuminate\Support\Str;

class SuratTugasSeeder extends Seeder
{
    public function run()
    {
        // Ambil semua ID pegawai untuk digunakan sebagai foreign key
        $pegawaiIds = Pegawai::pluck('id')->toArray();

        // Jika tidak ada pegawai, buat dummy pegawai dulu
        if (empty($pegawaiIds)) {
            \App\Models\Pegawai::factory(10)->create(); // Buat 10 pegawai
            $pegawaiIds = Pegawai::pluck('id')->toArray();
        }

        // Masukkan 1000 data dummy
        for ($i = 0; $i < 1000; $i++) {
            SuratTugas::create([
                'uuid' => Str::uuid(),
                'pegawai_id' => $pegawaiIds[array_rand($pegawaiIds)], // Random pegawai
                'no_surat' => 'ST-' . ($i + 1),
                'tgl_surat' => now()->subDays(rand(1, 365)),
                'tempat_berangkat' => 'Kota ' . rand(1, 10),
                'tempat_tujuan' => 'Kota ' . rand(11, 20),
                'tgl_berangkat' => now()->subDays(rand(1, 30)),
                'tgl_kembali' => now()->subDays(rand(1, 10)),
                'instansi' => 'Instansi ' . rand(1, 5),
                'untuk' => 'Tugas ke ' . ($i + 1),
            ]);
        }
    }
}
