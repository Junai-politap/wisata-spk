<?php

namespace Database\Factories;

use App\Models\PaketWisata;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PaketWisata>
 */
class PaketWisataFactory extends Factory
{
    protected $model = PaketWisata::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $destinasiWisata = [
            'Bali' => ['Pantai Kuta', 'Ubud', 'Tanah Lot', 'Uluwatu', 'Seminyak', 'Tegalalang', 'Nusa Dua', 'Sanur'],
            'Lombok' => ['Pantai Senggigi', 'Gili Trawangan', 'Gunung Rinjani', 'Pantai Selong Belanak', 'Kuta Lombok'],
            'Yogyakarta' => ['Candi Borobudur', 'Candi Prambanan', 'Keraton Yogyakarta', 'Pantai Parangtritis', 'Malioboro'],
            'Labuan Bajo' => ['Pulau Komodo', 'Pantai Pink', 'Pulau Rinca', 'Bukit Sylvia', 'Goa Rangko'],
            'Raja Ampat' => ['Pulau Wayag', 'Teluk Kabui', 'Pantai Pasir Timbul', 'Pulau Pianemo', 'Sauwandarek'],
            'Bromo' => ['Gunung Bromo', 'Bukit Penanjakan', 'Padang Savana', 'Kawah Ijen', 'Taman Nasional TNBTS'],
            'Komodo' => ['Pulau Komodo', 'Pulau Padar', 'Pantai Merah', 'Pulau Kanawa', 'Batu Bolong'],
            'Manado' => ['Taman Laut Bunaken', 'Gunung Mahawu', 'Danau Tondano', 'Pantai Malalayang', 'Pulau Siladen'],
            'Bandung' => ['Kawah Putih', 'Tangkuban Perahu', 'Lembang', 'Ciwidey', 'Dago Pakar'],
            'Flores' => ['Danau Kelimutu', 'Ruteng', 'Kampung Waerebo', 'Pantai 17 Pulau Riung', 'Bena'],
        ];

        $jenisWisata = [
            'Paket Liburan', 'Paket Wisata Alam', 'Paket Petualangan', 'Paket Honeymoon',
            'Paket Keluarga', 'Paket Backpacker', 'Paket Premium', 'Paket Snorkeling',
            'Paket Diving', 'Paket Hiking', 'Paket Budaya', 'Paket All Inclusive',
        ];

        $tujuan = $this->faker->randomKey($destinasiWisata);
        $lokasiList = $destinasiWisata[$tujuan];
        $jumlahLokasi = $this->faker->numberBetween(2, min(count($lokasiList), 7));
        shuffle($lokasiList);
        $lokasiDipilih = array_slice($lokasiList, 0, $jumlahLokasi);

        $jenis = $this->faker->randomElement($jenisWisata);
        $namaPaket = $jenis.' '.$tujuan;

        $deskripsiTemplate = [
            'Nikmati keindahan {tujuan} dengan paket wisata terbaik kami. Anda akan mengunjungi {lokasi} dan berbagai destinasi menarik lainnya yang tak terlupakan.',
            'Jelajahi pesona alam {tujuan} bersama orang-orang tercinta. Paket ini mencakup kunjungan ke {lokasi} dengan pemandu wisata berpengalaman.',
            'Rasakan pengalaman liburan yang mewah di {tujuan}. Paket premium kami mengajak Anda menikmati keindahan {lokasi} dengan fasilitas terbaik.',
            'Petualangan seru menanti Anda di {tujuan}! Kunjungi {lokasi} dan banyak tempat wisata eksotis lainnya dalam perjalanan yang tak terlupakan.',
            'Buat kenangan indah bersama keluarga di {tujuan}. Paket kami dirancang khusus untuk memberikan pengalaman wisata terbaik di {lokasi}.',
        ];

        $template = $this->faker->randomElement($deskripsiTemplate);
        $deskripsi = str_replace(
            ['{tujuan}', '{lokasi}'],
            [$tujuan, implode(', ', array_slice($lokasiDipilih, 0, 2))],
            $template
        );

        return [
            'nama_paket' => $namaPaket,
            'lokasi' => $tujuan.', '.$this->faker->randomElement($lokasiDipilih),
            'harga' => $this->faker->randomElement([
                $this->faker->numberBetween(500000, 1499999),
                $this->faker->numberBetween(1500000, 2499999),
                $this->faker->numberBetween(2500000, 3499999),
                $this->faker->numberBetween(3500000, 4999999),
                $this->faker->numberBetween(5000000, 9000000),
            ]),
            'rating' => $this->faker->randomFloat(1, 2.5, 5.0),
            'poto' => null,
            'deskripsi' => $deskripsi,
            'durasi_perjalanan' => $this->faker->numberBetween(1, 7),
            'jumlah_destinasi' => $jumlahLokasi,
        ];
    }
}
