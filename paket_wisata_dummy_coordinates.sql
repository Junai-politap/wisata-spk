-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 25 Okt 2026 pada 13.18
-- Versi server: 8.0.30
-- Versi PHP: 8.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisata_spk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket_wisata`
--

CREATE TABLE `paket_wisata` (
  `id` char(36) NOT NULL,
  `nama_paket` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `rating` decimal(3,2) NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `durasi_perjalanan` int NOT NULL,
  `jumlah_destinasi` int NOT NULL,
  `poto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longitude` decimal(11,7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `paket_wisata`
--

INSERT INTO `paket_wisata` (`id`, `nama_paket`, `lokasi`, `harga`, `rating`, `deskripsi`, `durasi_perjalanan`, `jumlah_destinasi`, `poto`, `created_at`, `updated_at`, `latitude`, `longitude`) VALUES
('01cd9645-79e1-44c1-acd4-58f3ca84f375', 'Paket Medan & Danau Toba', 'Medan', 2600000, 4.65, 'Jalan Braga dan keindahan Danau Toba.', 4, 4, 'medan.jpg', NULL, NULL, NULL, NULL),
('07d2ec53-6bbb-43e2-ac7f-71f00b3877e5', 'Paket Cirebon Megalithic', 'Cirebon', 1250000, 4.05, 'Situs Batu Kenong.', 1, 2, 'cirebon.jpg', NULL, NULL, NULL, NULL),
('1c7ba368-ed3b-4e48-9438-7f76d0a37539', 'Paket Yogyakarta Klasik', 'Yogyakarta', 1500000, 4.50, 'Candi Borobudur dan Prambanan.', 2, 3, 'yogya.jpg', NULL, NULL, NULL, NULL),
('1d8a375e-5722-4f21-8281-eacba3adfb0f', 'Paket Bogor Safari', 'Bogor', 1700000, 4.50, 'Taman Safari Indonesia.', 2, 3, 'bogor.jpg', NULL, NULL, NULL, NULL),
('244ab4a6-4e33-4956-9220-6ad2a043976e', 'Paket Karimunjawa Sailing', 'Jepara', 2100000, 4.50, 'Berlayar mengelilingi kepulauan.', 2, 5, 'karimunjawa.jpg', NULL, NULL, NULL, NULL),
('25aaf235-7c44-4e75-8d3d-0d4023d9152c', 'Paket Jakarta City Tour', 'Jakarta', 1000000, 3.80, 'Monas, Kota Tua, dan Ancol.', 1, 4, 'jakarta.jpg', NULL, NULL, NULL, NULL),
('269ca79a-2343-4cec-a51f-f8fdf472f082', 'Paket Solo Batik & Culture', 'Solo', 1400000, 4.25, 'Museum Batik dan Keraton.', 2, 3, 'solo.jpg', NULL, NULL, NULL, NULL),
('296c997d-dff3-4e5f-9f13-12dcff5649b0', 'Paket Wakatobi Premium', 'Wakatobi', 7000000, 5.00, 'Resort mewah dan diving kelas dunia.', 6, 4, 'wakatobi.jpg', NULL, NULL, NULL, NULL),
('30987a9b-7cf0-4b0a-a5aa-4280ea996cea', 'Paket Mamasa Toraja Utara', 'Mamasa', 2100000, 4.45, 'Desa tradisional Kete Kesu.', 3, 3, 'mamasa.jpg', NULL, NULL, NULL, NULL),
('33715f53-dc7e-49aa-826d-f6da3206fd5f', 'Paket Balikpapan Baywalk', 'Balikpapan', 1550000, 4.15, 'Pantai Kemala.', 2, 2, 'balikpapan.jpg', NULL, NULL, NULL, NULL),
('4617186c-79a0-4bcc-9fe8-353644f3c13d', 'Paket Gorontalo Olele', 'Gorontalo', 1900000, 4.35, 'Pantai pasir putih.', 2, 2, 'gorontalo.jpg', NULL, NULL, NULL, NULL),
('4728cb98-256e-4d08-8794-47fcde4aa9ce', 'Paket Kendari Teluk Kendari', 'Kendari', 1800000, 4.20, 'Pulau Bokori.', 2, 2, 'kendari.jpg', NULL, NULL, NULL, NULL),
('48cad734-d2c7-4da6-97c6-87c3d8fc60ca', 'Paket Ujung Kulon Trekking', 'Ujung Kulon', 2400000, 4.60, 'Jungle tracking melihat badak Jawa.', 3, 2, 'ujung_kulon.jpg', NULL, NULL, NULL, NULL),
('4ae37518-5a88-45ee-b814-23c6b00e56eb', 'Paket Bromo Sunrise', 'Malang', 1800000, 4.70, 'Melihat matahari terbit di kawah.', 2, 2, 'bromo.jpg', NULL, NULL, NULL, NULL),
('4d194e5e-28bf-4556-a827-c06e844bf635', 'Paket Kepulauan Seribu', 'Kep. Seribu', 1800000, 4.15, 'Island hopping di dekat Jakarta.', 2, 4, 'seribu.jpg', NULL, NULL, NULL, NULL),
('5476c78a-ca0a-43a7-bc91-f0f35b6eb146', 'Paket Ambon Manise', 'Ambon', 2200000, 4.50, 'Pantai Natsepa.', 3, 3, 'ambon.jpg', NULL, NULL, NULL, NULL),
('5e885f5f-2f46-429b-a9b9-25694081cbd3', 'Paket Aceh Sejarah', 'Banda Aceh', 2300000, 4.50, 'Masjid Baiturrahman dan Museum Tsunami.', 3, 3, 'aceh.jpg', NULL, NULL, NULL, NULL),
('615195e4-4c74-487c-b1b2-9f8262cd90eb', 'Paket Bali Eksotis', 'Bali', 2500000, 4.80, 'Menjelajahi pantai Kuta dan Ubud.', 3, 5, 'bali.jpg', NULL, NULL, NULL, NULL),
('6178211e-2aec-43c0-9a85-03f4c3e84123', 'Paket Labuan Bajo Petualangan', 'Labuan Bajo', 4500000, 4.95, 'Melihat komodo dan pulau padar.', 4, 5, 'labuan_bajo.jpg', NULL, NULL, NULL, NULL),
('63566205-fdec-40fd-a457-cf63998b6f6e', 'Paket Tasikmalaya Craft', 'Tasikmalaya', 1150000, 3.95, 'Sentra kerajinan bordir.', 1, 2, 'tasikmalaya.jpg', NULL, NULL, NULL, NULL),
('72144b3f-44e2-4228-a8f6-4071adfaa7ac', 'Paket Padang Minangkabau', 'Padang', 1900000, 4.45, 'Jam Gadang dan Ngarai Sianok.', 3, 3, 'padang.jpg', NULL, NULL, NULL, NULL),
('76bbb6b9-7497-4c72-9a7d-6cf5f66af454', 'Paket Sukabumi Geopark', 'Sukabumi', 1400000, 4.25, 'Curug Cikaso dan Palabuhanratu.', 2, 3, 'sukabumi.jpg', NULL, NULL, NULL, NULL),
('787c5fc6-cd5c-49e6-a431-0ab1e7d7983c', 'Paket Bintan Resort', 'Bintan', 3500000, 4.60, 'Relaksasi di pantai privat.', 3, 2, 'bintan.jpg', NULL, NULL, NULL, NULL),
('78fc0fec-d15b-4af0-898b-378059ed27f6', 'Paket Batam Shopping', 'Batam', 1500000, 4.00, 'Nagoya Hill dan Mega Mall.', 2, 3, 'batam.jpg', NULL, NULL, NULL, NULL),
('7b067758-1150-42f1-8b27-e5d4831c8989', 'Paket Pontianak Khatulistiwa', 'Pontianak', 1600000, 4.20, 'Tugu Khatulistiwa.', 2, 2, 'pontianak.jpg', NULL, NULL, NULL, NULL),
('7bde6041-a1b1-44b8-ba4f-6336c88ad464', 'Paket Garut Camping', 'Garut', 900000, 4.10, 'Camping di kawasan Gunung Papandayan.', 2, 1, 'garut.jpg', NULL, NULL, NULL, NULL),
('8c4d1d08-b9b9-4829-92d2-4322abf3a3e7', 'Paket Derawan Island', 'Kalimantan Timur', 3200000, 4.60, 'Snorkeling dengan penyu.', 3, 3, 'derawan.jpg', NULL, NULL, NULL, NULL),
('91a828e2-e167-4fa2-af1b-d99f6db7182f', 'Paket Lombok Menawan', 'Lombok', 3000000, 4.90, 'Gili Trawangan dan Gunung Rinjani.', 4, 4, 'lombok.jpg', NULL, NULL, NULL, NULL),
('96797623-9a4a-43d8-98f4-6d36a95f11f0', 'Paket Samarinda Mahakam', 'Samarinda', 1650000, 4.25, 'Jembatan Merah.', 2, 2, 'samarinda.jpg', NULL, NULL, NULL, NULL),
('97bf6ebd-d726-418b-9819-6b072b4ec954', 'Paket Banjarmasin Floating Market', 'Banjarmasin', 1700000, 4.40, 'Pasar terapung.', 2, 3, 'banjarmasin.jpg', NULL, NULL, NULL, NULL),
('9815d31a-d938-4b11-893f-a63fbe65e555', 'Paket Bangka Belitung Hidden', 'Bangka', 2700000, 4.55, 'Pantai-pantai tersembunyi.', 3, 4, 'bangka.jpg', NULL, NULL, NULL, NULL),
('9e3dfe45-aa01-4e34-a460-2a79dbefbd74', 'Paket Belitung Laskar Pelangi', 'Belitung', 2800000, 4.55, 'Pantai Tanjung Tinggi.', 3, 4, 'belitung.jpg', NULL, NULL, NULL, NULL),
('a132b03e-0420-4b87-9b3e-dee9a6657745', 'Paket Malang Adventure', 'Malang', 1600000, 4.40, 'Batu Secret Zoo dan Jatim Park.', 2, 5, 'malang.jpg', NULL, NULL, NULL, NULL),
('a3051960-2765-436f-93ea-dfde5d823fac', 'Paket Wisata Bali', 'Pantai Melasti', 300000, 4.00, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since 1966, when designers at Letraset and James Mosley, the librarian at St Bride Printing Library in London, took a 1914 Cicero translation and scrambled it to make dummy text for Letraset\'s Body Type sheets. It has survived not only many decades, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised thanks to these sheets and more recently with desktop publishing software like Aldus PageMaker and Microsoft Word including versions of Lorem Ipsum.', 1, 5, 'app/paket-wisata/1792422958-ICjb9.png', '2026-10-20 16:16:02', '2026-10-20 16:16:02', NULL, NULL),
('abefd4e1-12fd-4216-9c35-78ec099f7447', 'Paket Bengkulu Pantai Panjang', 'Bengkulu', 1550000, 4.10, 'Fort Marlborough.', 2, 2, 'bengkulu.jpg', NULL, NULL, NULL, NULL),
('acc46713-948f-4f60-8d2b-e95e39dadc05', 'Paket Bunaken Diving', 'Manado', 3800000, 4.85, 'Spot diving terbaik di Sulawesi.', 4, 3, 'bunaken.jpg', NULL, NULL, NULL, NULL),
('adc63e5e-06dd-45fd-a818-b688673c5e93', 'Paket Surabaya Modern', 'Surabaya', 1100000, 3.90, 'Tunjungan Plaza dan House of Sampoerna.', 1, 2, 'surabaya.jpg', NULL, NULL, NULL, NULL),
('af807207-60bd-4863-a94f-46fa1486544c', 'Paket Pangandaran Green Canyon', 'Pangandaran', 1350000, 4.40, 'Arung jeram dan body rafting.', 2, 2, 'pangandaran.jpg', NULL, NULL, NULL, NULL),
('b3bb1098-76d1-4bcf-83f1-56bcf46ce1e3', 'Paket Lampung Krakatau', 'Lampung', 1850000, 4.30, 'Pemandangan gunung berapi aktif.', 2, 2, 'lampung.jpg', NULL, NULL, NULL, NULL),
('b8171710-7e0b-4893-9fe9-83f7ce634338', 'Paket Raja Ampat Surga', 'Raja Ampat', 5500000, 5.00, 'Surga bawah laut dunia.', 5, 6, 'raja_ampat.jpg', NULL, NULL, NULL, NULL),
('cab2282c-d453-432b-9b44-66e26dbc6e7e', 'Paket Jambi Expedition', 'Jambi', 1650000, 4.20, 'Sungai Batanghari dan Candi Muaro.', 2, 3, 'jambi.jpg', NULL, NULL, NULL, NULL),
('cbdda1f4-10a5-486f-a5ec-764f18c20a14', 'Paket Bandung Sejuk', 'Bandung', 1200000, 4.20, 'Kuliner dan belanja di Kota Kembang.', 2, 4, 'bandung.jpg', NULL, NULL, NULL, NULL),
('cfe2cdcb-b3ce-4998-a23f-392baae583a1', 'Paket Sabang Pulau Weh', 'Sabang', 2900000, 4.75, 'Diving dan snorkeling di ujung Sumatera.', 3, 2, 'sabang.jpg', NULL, NULL, NULL, NULL),
('cff7c166-24dd-496f-8fa7-9e86809874c3', 'Paket Semarang Heritage', 'Semarang', 1300000, 4.10, 'Lawang Sewu dan Sam Poo Kong.', 1, 3, 'semarang.jpg', NULL, NULL, NULL, NULL),
('e287f6fc-ef80-4970-9a6f-1574cf5288be', 'Paket Anyer Beach Club', 'Anyer', 2000000, 4.35, 'Pantai modern dengan view Selat Sunda.', 2, 2, 'anyer.jpg', NULL, NULL, NULL, NULL),
('e7027f13-ff6b-4f5b-973d-60d34d28d51f', 'Paket Pekanbaru Riau', 'Pekanbaru', 1450000, 4.15, 'Masjid An-Nur dan Sungai Siak.', 2, 2, 'pekanbaru.jpg', NULL, NULL, NULL, NULL),
('f69573ab-c6ff-4d32-a687-f1b7f4b4da71', 'Paket Bukittinggi Panorama', 'Bukittinggi', 1750000, 4.35, 'Lembah Harau dan Jembatan Akar.', 2, 3, 'bukittinggi.jpg', NULL, NULL, NULL, NULL),
('f731db34-c2cc-41b5-8f04-18797ccd860e', 'Paket Toraja Budaya', 'Tana Toraja', 2200000, 4.30, 'Mengenal budaya unik Tanah Toraja.', 3, 3, 'toraja.jpg', NULL, NULL, NULL, NULL),
('fa643214-01f3-46b8-b9f3-5dca744f66c7', 'Paket Manado Bunaken', 'Manado', 3100000, 4.80, 'Taman laut nasional.', 3, 3, 'manado.jpg', NULL, NULL, NULL, NULL),
('fccd4889-9003-4c3f-b677-58f305a9492b', 'Paket Palangkaraya Orangutan', 'Palangkaraya', 2500000, 4.70, 'Taman Nasional Tanjung Puting.', 3, 2, 'palangkaraya.jpg', NULL, NULL, NULL, NULL),
('ffc45ec4-938f-48b9-aec8-a22af7ee3532', 'Paket Singkawang Tri Dharma', 'Singkawang', 1500000, 4.30, 'Vihara dan budaya Tionghoa.', 2, 2, 'singkawang.jpg', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `paket_wisata`
--
ALTER TABLE `paket_wisata`
  ADD PRIMARY KEY (`id`);
-- Dummy coordinates approximate each package's city or destination center.
UPDATE paket_wisata
SET latitude = CASE lokasi
    WHEN 'Medan' THEN 3.5952
    WHEN 'Cirebon' THEN -6.7320
    WHEN 'Yogyakarta' THEN -7.7956
    WHEN 'Bogor' THEN -6.5950
    WHEN 'Jepara' THEN -6.5888
    WHEN 'Jakarta' THEN -6.2088
    WHEN 'Solo' THEN -7.5755
    WHEN 'Wakatobi' THEN -5.3193
    WHEN 'Mamasa' THEN -2.9437
    WHEN 'Balikpapan' THEN -1.2379
    WHEN 'Gorontalo' THEN 0.5435
    WHEN 'Kendari' THEN -3.9985
    WHEN 'Ujung Kulon' THEN -6.7450
    WHEN 'Malang' THEN -7.9666
    WHEN 'Kep. Seribu' THEN -5.7457
    WHEN 'Ambon' THEN -3.6954
    WHEN 'Banda Aceh' THEN 5.5483
    WHEN 'Bali' THEN -8.4095
    WHEN 'Labuan Bajo' THEN -8.4964
    WHEN 'Tasikmalaya' THEN -7.3274
    WHEN 'Padang' THEN -0.9471
    WHEN 'Sukabumi' THEN -6.9277
    WHEN 'Bintan' THEN 1.1774
    WHEN 'Batam' THEN 1.0456
    WHEN 'Pontianak' THEN -0.0263
    WHEN 'Garut' THEN -7.2167
    WHEN 'Kalimantan Timur' THEN 2.2868
    WHEN 'Lombok' THEN -8.5833
    WHEN 'Samarinda' THEN -0.5022
    WHEN 'Banjarmasin' THEN -3.3186
    WHEN 'Bangka' THEN -2.1316
    WHEN 'Belitung' THEN -2.7411
    WHEN 'Pantai Melasti' THEN -8.8489
    WHEN 'Bengkulu' THEN -3.8004
    WHEN 'Manado' THEN 1.4748
    WHEN 'Surabaya' THEN -7.2575
    WHEN 'Pangandaran' THEN -7.7014
    WHEN 'Lampung' THEN -5.4292
    WHEN 'Raja Ampat' THEN -0.2333
    WHEN 'Jambi' THEN -1.6101
    WHEN 'Bandung' THEN -6.9175
    WHEN 'Sabang' THEN 5.8933
    WHEN 'Semarang' THEN -6.9667
    WHEN 'Anyer' THEN -6.0667
    WHEN 'Pekanbaru' THEN 0.5071
    WHEN 'Bukittinggi' THEN -0.3050
    WHEN 'Tana Toraja' THEN -3.0426
    WHEN 'Palangkaraya' THEN -2.2096
    WHEN 'Singkawang' THEN 0.9060
    ELSE latitude
END,
longitude = CASE lokasi
    WHEN 'Medan' THEN 98.6722
    WHEN 'Cirebon' THEN 108.5523
    WHEN 'Yogyakarta' THEN 110.3695
    WHEN 'Bogor' THEN 106.8166
    WHEN 'Jepara' THEN 110.6670
    WHEN 'Jakarta' THEN 106.8456
    WHEN 'Solo' THEN 110.8243
    WHEN 'Wakatobi' THEN 123.5948
    WHEN 'Mamasa' THEN 119.3660
    WHEN 'Balikpapan' THEN 116.8529
    WHEN 'Gorontalo' THEN 123.0568
    WHEN 'Kendari' THEN 122.5129
    WHEN 'Ujung Kulon' THEN 105.3500
    WHEN 'Malang' THEN 112.6326
    WHEN 'Kep. Seribu' THEN 106.6135
    WHEN 'Ambon' THEN 128.1814
    WHEN 'Banda Aceh' THEN 95.3238
    WHEN 'Bali' THEN 115.1889
    WHEN 'Labuan Bajo' THEN 119.8877
    WHEN 'Tasikmalaya' THEN 108.2207
    WHEN 'Padang' THEN 100.4172
    WHEN 'Sukabumi' THEN 106.9299
    WHEN 'Bintan' THEN 104.3327
    WHEN 'Batam' THEN 104.0305
    WHEN 'Pontianak' THEN 109.3425
    WHEN 'Garut' THEN 107.9010
    WHEN 'Kalimantan Timur' THEN 118.2458
    WHEN 'Lombok' THEN 116.1167
    WHEN 'Samarinda' THEN 117.1537
    WHEN 'Banjarmasin' THEN 114.5944
    WHEN 'Bangka' THEN 106.1169
    WHEN 'Belitung' THEN 107.6525
    WHEN 'Pantai Melasti' THEN 115.1728
    WHEN 'Bengkulu' THEN 102.2655
    WHEN 'Manado' THEN 124.8421
    WHEN 'Surabaya' THEN 112.7521
    WHEN 'Pangandaran' THEN 108.4938
    WHEN 'Lampung' THEN 105.2615
    WHEN 'Raja Ampat' THEN 130.5167
    WHEN 'Jambi' THEN 103.6131
    WHEN 'Bandung' THEN 107.6191
    WHEN 'Sabang' THEN 95.3200
    WHEN 'Semarang' THEN 110.4167
    WHEN 'Anyer' THEN 105.9333
    WHEN 'Pekanbaru' THEN 101.4478
    WHEN 'Bukittinggi' THEN 100.3692
    WHEN 'Tana Toraja' THEN 119.8230
    WHEN 'Palangkaraya' THEN 113.9213
    WHEN 'Singkawang' THEN 108.9872
    ELSE longitude
END
WHERE latitude IS NULL AND longitude IS NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

