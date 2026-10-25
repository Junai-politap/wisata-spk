<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Database\Seeder;

class SubKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subKriteriaData = [
            // Sub-Kriteria untuk C1: Harga Paket (Tipe: Cost)
            'C1' => [
                ['nama' => 'Sangat Murah', 'nilai' => 5, 'min_range' => 0, 'max_range' => 1500000],
                ['nama' => 'Murah', 'nilai' => 4, 'min_range' => 1500001, 'max_range' => 2500000],
                ['nama' => 'Sedang', 'nilai' => 3, 'min_range' => 2500001, 'max_range' => 3500000],
                ['nama' => 'Mahal', 'nilai' => 2, 'min_range' => 3500001, 'max_range' => 5000000],
                ['nama' => 'Sangat Mahal', 'nilai' => 1, 'min_range' => 5000001, 'max_range' => 9999999],
            ],

            // Sub-Kriteria untuk C2: Rating Wisatawan (Tipe: Benefit)
            'C2' => [
                ['nama' => 'Sangat Buruk', 'nilai' => 1, 'min_range' => 0, 'max_range' => 1.5],
                ['nama' => 'Buruk', 'nilai' => 2, 'min_range' => 1.6, 'max_range' => 2.5],
                ['nama' => 'Cukup', 'nilai' => 3, 'min_range' => 2.6, 'max_range' => 3.5],
                ['nama' => 'Baik', 'nilai' => 4, 'min_range' => 3.6, 'max_range' => 4.5],
                ['nama' => 'Sangat Baik', 'nilai' => 5, 'min_range' => 4.6, 'max_range' => 5.0],
            ],

            // Sub-Kriteria untuk C3: Durasi Perjalanan (Tipe: Benefit)
            'C3' => [
                ['nama' => 'Sangat Singkat', 'nilai' => 1, 'min_range' => 0, 'max_range' => 1],
                ['nama' => 'Singkat', 'nilai' => 2, 'min_range' => 2, 'max_range' => 2],
                ['nama' => 'Sedang', 'nilai' => 3, 'min_range' => 3, 'max_range' => 3],
                ['nama' => 'Lama', 'nilai' => 4, 'min_range' => 4, 'max_range' => 4],
                ['nama' => 'Sangat Lama', 'nilai' => 5, 'min_range' => 5, 'max_range' => 10],
            ],

            // Sub-Kriteria untuk C4: Jumlah Destinasi (Tipe: Benefit)
            'C4' => [
                ['nama' => 'Sangat Sedikit', 'nilai' => 1, 'min_range' => 0, 'max_range' => 2],
                ['nama' => 'Sedikit', 'nilai' => 2, 'min_range' => 3, 'max_range' => 3],
                ['nama' => 'Sedang', 'nilai' => 3, 'min_range' => 4, 'max_range' => 4],
                ['nama' => 'Banyak', 'nilai' => 4, 'min_range' => 5, 'max_range' => 5],
                ['nama' => 'Sangat Banyak', 'nilai' => 5, 'min_range' => 6, 'max_range' => 20],
            ],
        ];

        foreach ($subKriteriaData as $kode => $items) {
            $kriteria = Kriteria::where('kode', $kode)->first();
            if ($kriteria) {
                foreach ($items as $item) {
                    SubKriteria::updateOrCreate(
                        [
                            'kriteria_id' => $kriteria->id,
                            'nama' => $item['nama'],
                        ],
                        [
                            'nilai' => $item['nilai'],
                            'min_range' => $item['min_range'],
                            'max_range' => $item['max_range'],
                        ]
                    );
                }
            }
        }
    }
}
