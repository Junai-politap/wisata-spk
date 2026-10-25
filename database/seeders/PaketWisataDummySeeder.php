<?php

namespace Database\Seeders;

use App\Models\PaketWisata;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaketWisataDummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /** @var list<array{location: string, latitude: float, longitude: float, attractions: list<string>, base_price: int}> $destinations */
        $destinations = [
            ['location' => 'Bali', 'latitude' => -8.4095, 'longitude' => 115.1889, 'attractions' => ['Ubud', 'Tanah Lot', 'Uluwatu'], 'base_price' => 2500000],
            ['location' => 'Lombok', 'latitude' => -8.5833, 'longitude' => 116.1167, 'attractions' => ['Gili Trawangan', 'Gunung Rinjani', 'Pantai Senggigi'], 'base_price' => 2200000],
            ['location' => 'Yogyakarta', 'latitude' => -7.7956, 'longitude' => 110.3695, 'attractions' => ['Malioboro', 'Candi Prambanan', 'Keraton Yogyakarta'], 'base_price' => 1400000],
            ['location' => 'Labuan Bajo', 'latitude' => -8.4964, 'longitude' => 119.8877, 'attractions' => ['Pulau Komodo', 'Pulau Padar', 'Pantai Pink'], 'base_price' => 4200000],
            ['location' => 'Raja Ampat', 'latitude' => -0.2333, 'longitude' => 130.5167, 'attractions' => ['Wayag', 'Pianemo', 'Teluk Kabui'], 'base_price' => 5500000],
            ['location' => 'Probolinggo', 'latitude' => -7.9425, 'longitude' => 112.9530, 'attractions' => ['Gunung Bromo', 'Bukit Penanjakan', 'Pasir Berbisik'], 'base_price' => 1800000],
            ['location' => 'Manado', 'latitude' => 1.4748, 'longitude' => 124.8421, 'attractions' => ['Bunaken', 'Pulau Siladen', 'Danau Tondano'], 'base_price' => 3200000],
            ['location' => 'Bandung', 'latitude' => -6.9175, 'longitude' => 107.6191, 'attractions' => ['Kawah Putih', 'Lembang', 'Dago Pakar'], 'base_price' => 1300000],
            ['location' => 'Flores', 'latitude' => -8.6574, 'longitude' => 121.0794, 'attractions' => ['Danau Kelimutu', 'Kampung Bena', 'Maumere'], 'base_price' => 2800000],
            ['location' => 'Jakarta', 'latitude' => -6.2088, 'longitude' => 106.8456, 'attractions' => ['Kota Tua', 'Monas', 'Ancol'], 'base_price' => 950000],
            ['location' => 'Medan', 'latitude' => 3.5952, 'longitude' => 98.6722, 'attractions' => ['Istana Maimun', 'Masjid Raya', 'Danau Toba'], 'base_price' => 1900000],
            ['location' => 'Padang', 'latitude' => -0.9471, 'longitude' => 100.4172, 'attractions' => ['Pantai Padang', 'Ngarai Sianok', 'Bukittinggi'], 'base_price' => 1700000],
            ['location' => 'Makassar', 'latitude' => -5.1477, 'longitude' => 119.4327, 'attractions' => ['Pantai Losari', 'Rammang-Rammang', 'Benteng Rotterdam'], 'base_price' => 1800000],
            ['location' => 'Banyuwangi', 'latitude' => -8.2191, 'longitude' => 114.3691, 'attractions' => ['Kawah Ijen', 'Baluran', 'Pulau Merah'], 'base_price' => 1600000],
            ['location' => 'Semarang', 'latitude' => -6.9667, 'longitude' => 110.4167, 'attractions' => ['Lawang Sewu', 'Kota Lama', 'Sam Poo Kong'], 'base_price' => 1100000],
            ['location' => 'Bogor', 'latitude' => -6.5950, 'longitude' => 106.8166, 'attractions' => ['Kebun Raya', 'Puncak', 'Taman Safari'], 'base_price' => 1200000],
            ['location' => 'Belitung', 'latitude' => -2.7411, 'longitude' => 107.6525, 'attractions' => ['Tanjung Tinggi', 'Pulau Lengkuas', 'Pantai Tanjung Kelayang'], 'base_price' => 2600000],
            ['location' => 'Wakatobi', 'latitude' => -5.3193, 'longitude' => 123.5948, 'attractions' => ['Wangi-Wangi', 'Pulau Hoga', 'Pulau Tomia'], 'base_price' => 4300000],
            ['location' => 'Garut', 'latitude' => -7.2167, 'longitude' => 107.9010, 'attractions' => ['Gunung Papandayan', 'Situ Bagendit', 'Kawah Kamojang'], 'base_price' => 1000000],
            ['location' => 'Tana Toraja', 'latitude' => -3.0426, 'longitude' => 119.8230, 'attractions' => ['Kete Kesu', 'Londa', 'Lemo'], 'base_price' => 2100000],
            ['location' => 'Derawan', 'latitude' => 2.2868, 'longitude' => 118.2458, 'attractions' => ['Pulau Derawan', 'Pulau Maratua', 'Danau Kakaban'], 'base_price' => 3500000],
            ['location' => 'Pangandaran', 'latitude' => -7.7014, 'longitude' => 108.4938, 'attractions' => ['Green Canyon', 'Pantai Pangandaran', 'Batu Hiu'], 'base_price' => 1250000],
            ['location' => 'Bukittinggi', 'latitude' => -0.3050, 'longitude' => 100.3692, 'attractions' => ['Jam Gadang', 'Lembah Harau', 'Ngarai Sianok'], 'base_price' => 1500000],
            ['location' => 'Karimunjawa', 'latitude' => -5.8788, 'longitude' => 110.4402, 'attractions' => ['Pulau Menjangan', 'Pantai Tanjung Gelam', 'Pulau Cemara'], 'base_price' => 2300000],
            ['location' => 'Banda Aceh', 'latitude' => 5.5483, 'longitude' => 95.3238, 'attractions' => ['Museum Tsunami', 'Masjid Baiturrahman', 'Pantai Lampuuk'], 'base_price' => 1650000],
        ];

        $packageTypes = ['Eksplorasi', 'Wisata Keluarga', 'Petualangan Alam', 'Liburan Santai'];
        $coordinateOffsets = [
            [0.0060, 0.0040],
            [-0.0060, 0.0050],
            [0.0050, -0.0060],
            [-0.0050, -0.0040],
        ];

        $packageNames = [];
        for ($number = 1; $number <= 100; $number++) {
            $destinationIndex = intdiv($number - 1, count($packageTypes));
            $packageTypeIndex = ($number - 1) % count($packageTypes);
            $packageNames[] = sprintf(
                'Paket Dummy %03d - %s %s',
                $number,
                $packageTypes[$packageTypeIndex],
                $destinations[$destinationIndex]['location'],
            );
        }

        $existingNames = array_fill_keys(
            PaketWisata::query()->whereIn('nama_paket', $packageNames)->pluck('nama_paket')->all(),
            true,
        );
        $packages = [];
        $now = now();

        for ($number = 1; $number <= 100; $number++) {
            $destinationIndex = intdiv($number - 1, count($packageTypes));
            $packageTypeIndex = ($number - 1) % count($packageTypes);
            $destination = $destinations[$destinationIndex];
            $packageName = $packageNames[$number - 1];

            if (isset($existingNames[$packageName])) {
                continue;
            }

            [$latitudeOffset, $longitudeOffset] = $coordinateOffsets[$packageTypeIndex];
            $attractions = $destination['attractions'];
            $packages[] = [
                'id' => (string) Str::orderedUuid(),
                'nama_paket' => $packageName,
                'lokasi' => $destination['location'],
                'latitude' => $destination['latitude'] + $latitudeOffset,
                'longitude' => $destination['longitude'] + $longitudeOffset,
                'harga' => $destination['base_price'] + (($number % 5) * 175000),
                'rating' => 3.8 + (($number * 7) % 13) / 10,
                'deskripsi' => sprintf(
                    'Data dummy untuk paket %s di %s. Perjalanan mencakup %s, %s, dan pilihan destinasi menarik lainnya.',
                    strtolower($packageTypes[$packageTypeIndex]),
                    $destination['location'],
                    $attractions[$packageTypeIndex % count($attractions)],
                    $attractions[($packageTypeIndex + 1) % count($attractions)],
                ),
                'durasi_perjalanan' => 1 + ($number % 6),
                'jumlah_destinasi' => 2 + ($number % 5),
                'poto' => 'user/assets/img/hero-carousel/hero-carousel-'.($packageTypeIndex + 1).'.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        foreach (array_chunk($packages, 100) as $packageBatch) {
            DB::table('paket_wisata')->insert($packageBatch);
        }
    }
}
