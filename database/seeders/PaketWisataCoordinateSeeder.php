<?php

namespace Database\Seeders;

use App\Models\PaketWisata;
use Illuminate\Database\Seeder;

class PaketWisataCoordinateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /** @var array<string, array{0: float, 1: float}> $coordinatesByLocation */
        $coordinatesByLocation = [
            'Medan' => [3.5952, 98.6722],
            'Cirebon' => [-6.7320, 108.5523],
            'Yogyakarta' => [-7.7956, 110.3695],
            'Bogor' => [-6.5950, 106.8166],
            'Jepara' => [-6.5888, 110.6670],
            'Jakarta' => [-6.2088, 106.8456],
            'Solo' => [-7.5755, 110.8243],
            'Wakatobi' => [-5.3193, 123.5948],
            'Mamasa' => [-2.9437, 119.3660],
            'Balikpapan' => [-1.2379, 116.8529],
            'Gorontalo' => [0.5435, 123.0568],
            'Kendari' => [-3.9985, 122.5129],
            'Ujung Kulon' => [-6.7450, 105.3500],
            'Malang' => [-7.9666, 112.6326],
            'Kep. Seribu' => [-5.7457, 106.6135],
            'Ambon' => [-3.6954, 128.1814],
            'Banda Aceh' => [5.5483, 95.3238],
            'Bali' => [-8.4095, 115.1889],
            'Labuan Bajo' => [-8.4964, 119.8877],
            'Tasikmalaya' => [-7.3274, 108.2207],
            'Padang' => [-0.9471, 100.4172],
            'Sukabumi' => [-6.9277, 106.9299],
            'Bintan' => [1.1774, 104.3327],
            'Batam' => [1.0456, 104.0305],
            'Pontianak' => [-0.0263, 109.3425],
            'Garut' => [-7.2167, 107.9010],
            'Kalimantan Timur' => [2.2868, 118.2458],
            'Lombok' => [-8.5833, 116.1167],
            'Samarinda' => [-0.5022, 117.1537],
            'Banjarmasin' => [-3.3186, 114.5944],
            'Bangka' => [-2.1316, 106.1169],
            'Belitung' => [-2.7411, 107.6525],
            'Pantai Melasti' => [-8.8489, 115.1728],
            'Bengkulu' => [-3.8004, 102.2655],
            'Manado' => [1.4748, 124.8421],
            'Surabaya' => [-7.2575, 112.7521],
            'Pangandaran' => [-7.7014, 108.4938],
            'Lampung' => [-5.4292, 105.2615],
            'Raja Ampat' => [-0.2333, 130.5167],
            'Jambi' => [-1.6101, 103.6131],
            'Bandung' => [-6.9175, 107.6191],
            'Sabang' => [5.8933, 95.3200],
            'Semarang' => [-6.9667, 110.4167],
            'Anyer' => [-6.0667, 105.9333],
            'Pekanbaru' => [0.5071, 101.4478],
            'Bukittinggi' => [-0.3050, 100.3692],
            'Tana Toraja' => [-3.0426, 119.8230],
            'Palangkaraya' => [-2.2096, 113.9213],
            'Singkawang' => [0.9060, 108.9872],
        ];

        foreach ($coordinatesByLocation as $location => [$latitude, $longitude]) {
            PaketWisata::query()
                ->where('lokasi', $location)
                ->whereNull('latitude')
                ->whereNull('longitude')
                ->update([
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                ]);
        }
    }
}
