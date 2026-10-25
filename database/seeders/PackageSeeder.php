<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        $basePackages = [
            ['nama_paket' => 'Paket Bali Eksotis', 'lokasi' => 'Bali', 'harga' => 2500000, 'rating' => 4.80, 'deskripsi' => 'Menjelajahi pantai Kuta dan Ubud.', 'durasi_perjalanan' => 3, 'jumlah_destinasi' => 5, 'poto' => 'bali.jpg'],
            ['nama_paket' => 'Paket Lombok Menawan', 'lokasi' => 'Lombok', 'harga' => 3000000, 'rating' => 4.90, 'deskripsi' => 'Gili Trawangan dan Gunung Rinjani.', 'durasi_perjalanan' => 4, 'jumlah_destinasi' => 4, 'poto' => 'lombok.jpg'],
            ['nama_paket' => 'Paket Yogyakarta Klasik', 'lokasi' => 'Yogyakarta', 'harga' => 1500000, 'rating' => 4.50, 'deskripsi' => 'Candi Borobudur dan Prambanan.', 'durasi_perjalanan' => 2, 'jumlah_destinasi' => 3, 'poto' => 'yogya.jpg'],
            ['nama_paket' => 'Paket Raja Ampat Surga', 'lokasi' => 'Raja Ampat', 'harga' => 5500000, 'rating' => 5.00, 'deskripsi' => 'Surga bawah laut dunia.', 'durasi_perjalanan' => 5, 'jumlah_destinasi' => 6, 'poto' => 'raja_ampat.jpg'],
            ['nama_paket' => 'Paket Bandung Sejuk', 'lokasi' => 'Bandung', 'harga' => 1200000, 'rating' => 4.20, 'deskripsi' => 'Kuliner dan belanja di Kota Kembang.', 'durasi_perjalanan' => 2, 'jumlah_destinasi' => 4, 'poto' => 'bandung.jpg'],
            ['nama_paket' => 'Paket Labuan Bajo Petualangan', 'lokasi' => 'Labuan Bajo', 'harga' => 4500000, 'rating' => 4.95, 'deskripsi' => 'Melihat komodo dan pulau padar.', 'durasi_perjalanan' => 4, 'jumlah_destinasi' => 5, 'poto' => 'labuan_bajo.jpg'],
            ['nama_paket' => 'Paket Bromo Sunrise', 'lokasi' => 'Malang', 'harga' => 1800000, 'rating' => 4.70, 'deskripsi' => 'Melihat matahari terbit di kawah.', 'durasi_perjalanan' => 2, 'jumlah_destinasi' => 2, 'poto' => 'bromo.jpg'],
            ['nama_paket' => 'Paket Derawan Island', 'lokasi' => 'Kalimantan Timur', 'harga' => 3200000, 'rating' => 4.60, 'deskripsi' => 'Snorkeling dengan penyu.', 'durasi_perjalanan' => 3, 'jumlah_destinasi' => 3, 'poto' => 'derawan.jpg'],
            ['nama_paket' => 'Paket Jakarta City Tour', 'lokasi' => 'Jakarta', 'harga' => 1000000, 'rating' => 3.80, 'deskripsi' => 'Monas, Kota Tua, dan Ancol.', 'durasi_perjalanan' => 1, 'jumlah_destinasi' => 4, 'poto' => 'jakarta.jpg'],
            ['nama_paket' => 'Paket Malang Adventure', 'lokasi' => 'Malang', 'harga' => 1600000, 'rating' => 4.40, 'deskripsi' => 'Batu Secret Zoo dan Jatim Park.', 'durasi_perjalanan' => 2, 'jumlah_destinasi' => 5, 'poto' => 'malang.jpg'],
            ['nama_paket' => 'Paket Belitung Laskar Pelangi', 'lokasi' => 'Belitung', 'harga' => 2800000, 'rating' => 4.55, 'deskripsi' => 'Pantai Tanjung Tinggi.', 'durasi_perjalanan' => 3, 'jumlah_destinasi' => 4, 'poto' => 'belitung.jpg'],
            ['nama_paket' => 'Paket Bunaken Diving', 'lokasi' => 'Manado', 'harga' => 3800000, 'rating' => 4.85, 'deskripsi' => 'Spot diving terbaik di Sulawesi.', 'durasi_perjalanan' => 4, 'jumlah_destinasi' => 3, 'poto' => 'bunaken.jpg'],
            ['nama_paket' => 'Paket Toraja Budaya', 'lokasi' => 'Tana Toraja', 'harga' => 2200000, 'rating' => 4.30, 'deskripsi' => 'Mengenal budaya unik Tanah Toraja.', 'durasi_perjalanan' => 3, 'jumlah_destinasi' => 3, 'poto' => 'toraja.jpg'],
            ['nama_paket' => 'Paket Wakatobi Premium', 'lokasi' => 'Wakatobi', 'harga' => 7000000, 'rating' => 5.00, 'deskripsi' => 'Resort mewah dan diving kelas dunia.', 'durasi_perjalanan' => 6, 'jumlah_destinasi' => 4, 'poto' => 'wakatobi.jpg'],
            ['nama_paket' => 'Paket Karimunjawa Sailing', 'lokasi' => 'Jepara', 'harga' => 2100000, 'rating' => 4.50, 'deskripsi' => 'Berlayar mengelilingi kepulauan.', 'durasi_perjalanan' => 2, 'jumlah_destinasi' => 5, 'poto' => 'karimunjawa.jpg'],
            ['nama_paket' => 'Paket Semarang Heritage', 'lokasi' => 'Semarang', 'harga' => 1300000, 'rating' => 4.10, 'deskripsi' => 'Lawang Sewu dan Sam Poo Kong.', 'durasi_perjalanan' => 1, 'jumlah_destinasi' => 3, 'poto' => 'semarang.jpg'],
            ['nama_paket' => 'Paket Solo Batik & Culture', 'lokasi' => 'Solo', 'harga' => 1400000, 'rating' => 4.25, 'deskripsi' => 'Museum Batik dan Keraton.', 'durasi_perjalanan' => 2, 'jumlah_destinasi' => 3, 'poto' => 'solo.jpg'],
            ['nama_paket' => 'Paket Surabaya Modern', 'lokasi' => 'Surabaya', 'harga' => 1100000, 'rating' => 3.90, 'deskripsi' => 'Tunjungan Plaza dan House of Sampoerna.', 'durasi_perjalanan' => 1, 'jumlah_destinasi' => 2, 'poto' => 'surabaya.jpg'],
            ['nama_paket' => 'Paket Medan & Danau Toba', 'lokasi' => 'Medan', 'harga' => 2600000, 'rating' => 4.65, 'deskripsi' => 'Jalan Braga dan keindahan Danau Toba.', 'durasi_perjalanan' => 4, 'jumlah_destinasi' => 4, 'poto' => 'medan.jpg'],
            ['nama_paket' => 'Paket Padang Minangkabau', 'lokasi' => 'Padang', 'harga' => 1900000, 'rating' => 4.45, 'deskripsi' => 'Jam Gadang dan Ngarai Sianok.', 'durasi_perjalanan' => 3, 'jumlah_destinasi' => 3, 'poto' => 'padang.jpg'],
            ['nama_paket' => 'Paket Bukittinggi Panorama', 'lokasi' => 'Bukittinggi', 'harga' => 1750000, 'rating' => 4.35, 'deskripsi' => 'Lembah Harau dan Jembatan Akar.', 'durasi_perjalanan' => 2, 'jumlah_destinasi' => 3, 'poto' => 'bukittinggi.jpg'],
            ['nama_paket' => 'Paket Aceh Sejarah', 'lokasi' => 'Banda Aceh', 'harga' => 2300000, 'rating' => 4.50, 'deskripsi' => 'Masjid Baiturrahman dan Museum Tsunami.', 'durasi_perjalanan' => 3, 'jumlah_destinasi' => 3, 'poto' => 'aceh.jpg'],
            ['nama_paket' => 'Paket Sabang Pulau Weh', 'lokasi' => 'Sabang', 'harga' => 2900000, 'rating' => 4.75, 'deskripsi' => 'Diving dan snorkeling di ujung Sumatera.', 'durasi_perjalanan' => 3, 'jumlah_destinasi' => 2, 'poto' => 'sabang.jpg'],
            ['nama_paket' => 'Paket Batam Shopping', 'lokasi' => 'Batam', 'harga' => 1500000, 'rating' => 4.00, 'deskripsi' => 'Nagoya Hill dan Mega Mall.', 'durasi_perjalanan' => 2, 'jumlah_destinasi' => 3, 'poto' => 'batam.jpg'],
            ['nama_paket' => 'Paket Bintan Resort', 'lokasi' => 'Bintan', 'harga' => 3500000, 'rating' => 4.60, 'deskripsi' => 'Relaksasi di pantai privat.', 'durasi_perjalanan' => 3, 'jumlah_destinasi' => 2, 'poto' => 'bintan.jpg'],
            ['nama_paket' => 'Paket Pekanbaru Riau', 'lokasi' => 'Pekanbaru', 'harga' => 1450000, 'rating' => 4.15, 'deskripsi' => 'Masjid An-Nur dan Sungai Siak.', 'durasi_perjalanan' => 2, 'jumlah_destinasi' => 2, 'poto' => 'pekanbaru.jpg'],
            ['nama_paket' => 'Paket Jambi Expedition', 'lokasi' => 'Jambi', 'harga' => 1650000, 'rating' => 4.20, 'deskripsi' => 'Sungai Batanghari dan Candi Muaro.', 'durasi_perjalanan' => 2, 'jumlah_destinasi' => 3, 'poto' => 'jambi.jpg'],
            ['nama_paket' => 'Paket Bengkulu Pantai Panjang', 'lokasi' => 'Bengkulu', 'harga' => 1550000, 'rating' => 4.10, 'deskripsi' => 'Fort Marlborough.', 'durasi_perjalanan' => 2, 'jumlah_destinasi' => 2, 'poto' => 'bengkulu.jpg'],
            ['nama_paket' => 'Paket Lampung Krakatau', 'lokasi' => 'Lampung', 'harga' => 1850000, 'rating' => 4.30, 'deskripsi' => 'Pemandangan gunung berapi aktif.', 'durasi_perjalanan' => 2, 'jumlah_destinasi' => 2, 'poto' => 'lampung.jpg'],
            ['nama_paket' => 'Paket Pangandaran Green Canyon', 'lokasi' => 'Pangandaran', 'harga' => 1350000, 'rating' => 4.40, 'deskripsi' => 'Arung jeram dan body rafting.', 'durasi_perjalanan' => 2, 'jumlah_destinasi' => 2, 'poto' => 'pangandaran.jpg'],
            ['nama_paket' => 'Paket Cirebon Megalithic', 'lokasi' => 'Cirebon', 'harga' => 1250000, 'rating' => 4.05, 'deskripsi' => 'Situs Batu Kenong.', 'durasi_perjalanan' => 1, 'jumlah_destinasi' => 2, 'poto' => 'cirebon.jpg'],
            ['nama_paket' => 'Paket Tasikmalaya Craft', 'lokasi' => 'Tasikmalaya', 'harga' => 1150000, 'rating' => 3.95, 'deskripsi' => 'Sentra kerajinan bordir.', 'durasi_perjalanan' => 1, 'jumlah_destinasi' => 2, 'poto' => 'tasikmalaya.jpg'],
            ['nama_paket' => 'Paket Garut Camping', 'lokasi' => 'Garut', 'harga' => 900000, 'rating' => 4.10, 'deskripsi' => 'Camping di kawasan Gunung Papandayan.', 'durasi_perjalanan' => 2, 'jumlah_destinasi' => 1, 'poto' => 'garut.jpg'],
            ['nama_paket' => 'Paket Sukabumi Geopark', 'lokasi' => 'Sukabumi', 'harga' => 1400000, 'rating' => 4.25, 'deskripsi' => 'Curug Cikaso dan Palabuhanratu.', 'durasi_perjalanan' => 2, 'jumlah_destinasi' => 3, 'poto' => 'sukabumi.jpg'],
            ['nama_paket' => 'Paket Bogor Safari', 'lokasi' => 'Bogor', 'harga' => 1700000, 'rating' => 4.50, 'deskripsi' => 'Taman Safari Indonesia.', 'durasi_perjalanan' => 2, 'jumlah_destinasi' => 3, 'poto' => 'bogor.jpg'],
            ['nama_paket' => 'Paket Anyer Beach Club', 'lokasi' => 'Anyer', 'harga' => 2000000, 'rating' => 4.35, 'deskripsi' => 'Pantai modern dengan view Selat Sunda.', 'durasi_perjalanan' => 2, 'jumlah_destinasi' => 2, 'poto' => 'anyer.jpg'],
            ['nama_paket' => 'Paket Ujung Kulon Trekking', 'lokasi' => 'Ujung Kulon', 'harga' => 2400000, 'rating' => 4.60, 'deskripsi' => 'Jungle tracking melihat badak Jawa.', 'durasi_perjalanan' => 3, 'jumlah_destinasi' => 2, 'poto' => 'ujung_kulon.jpg'],
            ['nama_paket' => 'Paket Kepulauan Seribu', 'lokasi' => 'Kep. Seribu', 'harga' => 1800000, 'rating' => 4.15, 'deskripsi' => 'Island hopping di dekat Jakarta.', 'durasi_perjalanan' => 2, 'jumlah_destinasi' => 4, 'poto' => 'seribu.jpg'],
            ['nama_paket' => 'Paket Bangka Belitung Hidden', 'lokasi' => 'Bangka', 'harga' => 2700000, 'rating' => 4.55, 'deskripsi' => 'Pantai-pantai tersembunyi.', 'durasi_perjalanan' => 3, 'jumlah_destinasi' => 4, 'poto' => 'bangka.jpg'],
            ['nama_paket' => 'Paket Pontianak Khatulistiwa', 'lokasi' => 'Pontianak', 'harga' => 1600000, 'rating' => 4.20, 'deskripsi' => 'Tugu Khatulistiwa.', 'durasi_perjalanan' => 2, 'jumlah_destinasi' => 2, 'poto' => 'pontianak.jpg'],
            ['nama_paket' => 'Paket Singkawang Tri Dharma', 'lokasi' => 'Singkawang', 'harga' => 1500000, 'rating' => 4.30, 'deskripsi' => 'Vihara dan budaya Tionghoa.', 'durasi_perjalanan' => 2, 'jumlah_destinasi' => 2, 'poto' => 'singkawang.jpg'],
            ['nama_paket' => 'Paket Palangkaraya Orangutan', 'lokasi' => 'Palangkaraya', 'harga' => 2500000, 'rating' => 4.70, 'deskripsi' => 'Taman Nasional Tanjung Puting.', 'durasi_perjalanan' => 3, 'jumlah_destinasi' => 2, 'poto' => 'palangkaraya.jpg'],
            ['nama_paket' => 'Paket Banjarmasin Floating Market', 'lokasi' => 'Banjarmasin', 'harga' => 1700000, 'rating' => 4.40, 'deskripsi' => 'Pasar terapung.', 'durasi_perjalanan' => 2, 'jumlah_destinasi' => 3, 'poto' => 'banjarmasin.jpg'],
            ['nama_paket' => 'Paket Samarinda Mahakam', 'lokasi' => 'Samarinda', 'harga' => 1650000, 'rating' => 4.25, 'deskripsi' => 'Jembatan Merah.', 'durasi_perjalanan' => 2, 'jumlah_destinasi' => 2, 'poto' => 'samarinda.jpg'],
            ['nama_paket' => 'Paket Balikpapan Baywalk', 'lokasi' => 'Balikpapan', 'harga' => 1550000, 'rating' => 4.15, 'deskripsi' => 'Pantai Kemala.', 'durasi_perjalanan' => 2, 'jumlah_destinasi' => 2, 'poto' => 'balikpapan.jpg'],
            ['nama_paket' => 'Paket Manado Bunaken', 'lokasi' => 'Manado', 'harga' => 3100000, 'rating' => 4.80, 'deskripsi' => 'Taman laut nasional.', 'durasi_perjalanan' => 3, 'jumlah_destinasi' => 3, 'poto' => 'manado.jpg'],
            ['nama_paket' => 'Paket Gorontalo Olele', 'lokasi' => 'Gorontalo', 'harga' => 1900000, 'rating' => 4.35, 'deskripsi' => 'Pantai pasir putih.', 'durasi_perjalanan' => 2, 'jumlah_destinasi' => 2, 'poto' => 'gorontalo.jpg'],
            ['nama_paket' => 'Paket Mamasa Toraja Utara', 'lokasi' => 'Mamasa', 'harga' => 2100000, 'rating' => 4.45, 'deskripsi' => 'Desa tradisional Kete Kesu.', 'durasi_perjalanan' => 3, 'jumlah_destinasi' => 3, 'poto' => 'mamasa.jpg'],
            ['nama_paket' => 'Paket Kendari Teluk Kendari', 'lokasi' => 'Kendari', 'harga' => 1800000, 'rating' => 4.20, 'deskripsi' => 'Pulau Bokori.', 'durasi_perjalanan' => 2, 'jumlah_destinasi' => 2, 'poto' => 'kendari.jpg'],
            ['nama_paket' => 'Paket Ambon Manise', 'lokasi' => 'Ambon', 'harga' => 2200000, 'rating' => 4.50, 'deskripsi' => 'Pantai Natsepa.', 'durasi_perjalanan' => 3, 'jumlah_destinasi' => 3, 'poto' => 'ambon.jpg'],
        ];

        $packagesToInsert = [];

        foreach ($basePackages as $package) {
            // Generate UUID unik untuk setiap baris data
            $package['id'] = Str::uuid()->toString();
            $packagesToInsert[] = $package;
        }

        DB::table('paket_wisata')->insert($packagesToInsert);
    }
}
