-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 24, 2025 at 02:28 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `destinasi_wisata`
--

CREATE TABLE `destinasi_wisata` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga_tiket` decimal(15,2) NOT NULL,
  `harga_paket` decimal(15,2) NOT NULL,
  `nama_paket` varchar(255) NOT NULL,
  `daftar_paket` text NOT NULL,
  `cocok_untuk` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `destinasi_wisata`
--

INSERT INTO `destinasi_wisata` (`id`, `nama`, `gambar`, `deskripsi`, `harga_tiket`, `harga_paket`, `nama_paket`, `daftar_paket`, `cocok_untuk`, `created_at`) VALUES
(3, 'Tegal mas', 'tegal mas.jpeg', 'Pulau Tegal Mas merupakan sebuah kawasan wisata yang terletak di Pulau Tegal, Kecamatan Teluk Pandan, Kabupaten Pesawaran, Lampung. Banyak yang menyebutnya mirip dengan Maladewa, karena eksotisme alam & penginapan terapung yang ada di sekelilingnya.', 50000.00, 250000.00, 'Tegal Mas Honeymoon & Snorkeling Experience', '', 'Liburan keluarga dan teman teman', '2025-05-20 14:38:39'),
(4, 'Lembah Hijau', 'Lembah Hijau.jpg', 'Lembah Hijau adalah taman wisata keluarga yang terletak di Bandar Lampung, menawarkan perpaduan antara rekreasi dan edukasi dengan latar alam yang hijau dan asri. Dibuka sejak 14 April 2007, kawasan seluas 30 hektar ini terbagi menjadi dua zona utama: taman wisata dan taman satwa. Di taman satwa, pengunjung dapat melihat lebih dari 465 satwa dari 43 spesies berbeda, termasuk burung pelikan, rusa, kambing, dan harimau. Selain itu, tersedia wahana interaktif seperti menunggang gajah dan kuda, serta pertunjukan burung elang yang terbang bebas di udara.', 30000.00, 150000.00, 'Family Day Out Lembah Hijau', 'tiket masuk - akses kebun binatang mini - wahana permainan mini - makan siang di kantin - area piknik keluarga - voucher souvenir keluarga - layanan tour guide', 'Rombongan sekolah, keluarga, wisatawan edukasi', '2025-05-20 15:01:03'),
(5, 'Taman Way Kambas', 'way kambas.jpg', 'aman Nasional Way Kambas adalah kawasan konservasi alam yang terletak di Kecamatan Labuhan Ratu, Kabupaten Lampung Timur, Provinsi Lampung. Dikenal sebagai rumah bagi gajah Sumatera, taman ini juga menjadi habitat bagi satwa langka lainnya seperti badak Sumatera, harimau Sumatera, tapir, dan beruang madu. Dengan luas sekitar 130.000 hektare, kawasan ini mencakup berbagai ekosistem seperti hutan hujan dataran rendah, rawa, hutan pantai, dan hutan mangrove.', 30000.00, 150000.00, 'One Day Tour Way Kambas & Elephant Watching', 'kujungan ke pusat konversi gajah - edukasi satwa langka - area camping - pemandu area lokal - snack dan air mineral ', 'Pencinta alam, keluarga, wisatawan edukasi', '2025-05-20 18:23:03'),
(7, 'Bukit Aslan', 'bukit aslan.jpg', 'Bukit Aslan adalah tempat wisata alam di Way Gubak, Sukabumi, Bandar Lampung yang menyuguhkan pemandangan 360 derajat dari pegunungan, laut, dan kota. Dari atas bukit, pengunjung bisa menikmati pemandangan Teluk Lampung, perkebunan jati, dan gemerlap lampu kota di malam hari. Tempat ini juga memiliki wahana seperti The Magical Forest yang dihiasi lampu warna-warni dan patung hewan, area camping, jalur trekking, serta spot foto yang instagramable. Bukit Aslan buka setiap hari kecuali Senin, dengan tiket masuk mulai dari Rp25.000. Lokasinya sekitar 30 menit dari pusat Kota Bandar Lampung.', 30000.00, 150000.00, 'Sunset di Bukit Aslan + ATV Adventure', 'tiket masuk - sewa atv 30 menit - pemandu lokal untuk spot foto - makanan dan minuman - gratis cetak 2 foto instan', 'Remaja, Fotografi, Liburan ringan akhir pekan', '2025-05-21 15:12:05'),
(8, 'Slanik Waterpark', 'slanik waterpark.jpg', 'Slanik Waterpark adalah taman rekreasi air terbesar di Lampung yang berlokasi di Jati Agung, Lampung Selatan. Tempat ini mengusung tema negeri dongeng dan cocok untuk liburan keluarga. Di dalamnya tersedia berbagai wahana seru seperti kolam ombak, kolam arus, seluncuran ekstrem, serta kolam anak yang penuh warna dan permainan. Ada juga area non-air seperti kereta gantung, sepeda layang, serta spot foto ikonik seperti kastil dan replika candi. Fasilitas yang disediakan cukup lengkap, mulai dari mushola, loker, gazebo, hingga kafe dan toko suvenir. Slanik Waterpark buka setiap hari dari pagi sampai sore dengan harga tiket yang berbeda antara hari biasa dan akhir pekan. Tempat ini menawarkan pengalaman bermain air yang menyenangkan dan cukup lengkap untuk semua kalangan usia.', 50000.00, 300000.00, 'Family Splash Day Slanik Waterpark', 'tiket masuk all day - gazeebo - kupon makan di foodcourt - loker penyimpanan', 'Rombongan sekolah, keluarga, wisatawan edukasi', '2025-05-21 15:28:04'),
(9, 'Puncak Mas', 'puncak mas.webp', 'Puncak Mas adalah tempat wisata di Bandar Lampung yang menyajikan pemandangan kota dari atas bukit. Berlokasi di Sukadanaham, tempat ini dikenal dengan udaranya yang sejuk dan panorama Teluk Lampung serta gemerlap lampu kota di malam hari. Pengunjung bisa menikmati berbagai spot foto seperti rumah pohon, balon udara, jembatan cinta, serta wahana seperti sepeda gantung. Tersedia juga area bersantai, kafe, food court, dan penginapan. Tempat ini buka setiap hari dari pagi hingga malam dengan tiket masuk yang terjangkau. Cocok untuk liburan bersama keluarga, pasangan, atau teman.', 20000.00, 100000.00, 'Sky View Night Camp Puncak Mas', '2 hari 1 malam camping - akses spot foto rumah pohon - tiket masuk dan toilet - voucher makan di restoran', 'Pasangan muda, komunitas, pencari view malam', '2025-05-22 12:40:01'),
(11, 'Air Terjun Waylalaan', 'air terjun waylalaan.jpg', 'Air Terjun Way Lalaan adalah destinasi wisata alam yang terletak di Desa Pekon Kampung Baru, Kecamatan Kota Agung Timur, Kabupaten Tanggamus, Lampung. Berjarak sekitar 8 km dari Kota Agung atau sekitar 1,5 jam perjalanan dari Bandar Lampung, air terjun ini mudah diakses oleh wisatawan lokal maupun luar daerah. Air terjun ini memiliki dua tingkat dengan ketinggian sekitar 11 meter, dikelilingi oleh hutan tropis yang asri. Air yang jernih dan kolam alami di bawahnya menjadikannya tempat ideal untuk berenang dan bersantai. Fasilitas yang tersedia meliputi gazebo, toilet, mushola, dan warung makan. Harga tiket masuknya pun terjangkau, sekitar Rp 10.000 per orang. Selain menikmati keindahan air terjun, pengunjung juga dapat menjelajahi perkebunan durian di sekitar area, terutama saat musim panen. Dengan suasana alam yang menenangkan dan fasilitas yang memadai, Air Terjun Way Lalaan menjadi pilihan tepat untuk liburan bersama keluarga atau teman. ', 10000.00, 2500000.00, 'Trekking Air Terjun Waylalaan', 'Tiket masuk area wisata - pemandu trekking lokal - transportasi lokal dari basecamp - snack dan air mineral - dokumentasi foto', 'Pendaki pemula, pencinta alam, wisatawan petualang', '2025-05-23 09:27:54');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id` int NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `wisata` varchar(100) NOT NULL,
  `jumlah` int NOT NULL,
  `total_harga` int NOT NULL,
  `status` varchar(50) DEFAULT 'Belum bayar',
  `tanggal_pesan` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id`, `order_id`, `nama_pelanggan`, `wisata`, `jumlah`, `total_harga`, `status`, `tanggal_pesan`, `user_id`) VALUES
(47, 'ORD1748049045', 'ahmad', 'Air Terjun Waylalaan', 1, 10000, 'Sudah bayar', '2025-05-24 01:11:09', 6),
(48, 'ORD1748052899', 'HABIBI', 'Taman Way Kambas', 4, 600000, 'Sudah bayar', '2025-05-24 02:15:12', 6),
(49, 'ORD1748053052', 'teo', 'Air Terjun Waylalaan', 1, 10000, 'Sudah bayar', '2025-05-24 02:17:40', 6),
(50, 'ORD1748053052', 'teo', 'Air Terjun Waylalaan', 1, 10000, 'Sudah bayar', '2025-05-24 02:17:44', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `username`, `no_hp`, `password`, `role`) VALUES
(1, 'admin@123', 'admin', '082376283946', '123', 'admin'),
(6, 'user@gmail.com', 'user', '088217368493', '$2y$10$D7F2DYyC/qIOrXstGPU4z.mwteju0e5oxG4Gxpod/MMjDrO4w1TQa', 'user'),
(9, 'habibi', 'habibi', '0895163845326', '123', 'admin'),
(11, 'hanip', 'hanip', '081216357282', '$2y$10$gTzbb5i8aIk9ByCCvHt4Ee7Z2aZKjHEq1qlM4dqXs8yE2ZRKej0R.', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destinasi_wisata`
--
ALTER TABLE `destinasi_wisata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destinasi_wisata`
--
ALTER TABLE `destinasi_wisata`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
