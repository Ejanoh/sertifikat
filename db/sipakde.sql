-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 04, 2025 at 10:47 AM
-- Server version: 8.4.3
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipakde`
--

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `kodegejala` varchar(10) NOT NULL,
  `namagejala` varchar(50) NOT NULL,
  `ketgejala` varchar(100) NOT NULL,
  `kodepenyakit` varchar(10) NOT NULL,
  `solusipenanganan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`kodegejala`, `namagejala`, `ketgejala`, `kodepenyakit`, `solusipenanganan`) VALUES
('G1', 'Muncul bercak coklat kemerahan seperti warna karat', 'Muncul bercak coklat kemerahan seperti warna karat', 'P1', ''),
('G2', 'Bercak berkembang ke daun-daun diatasnya seiring b', 'Bercak berkembang ke daun-daun diatasnya seiring bertambah umur tanaman', 'P1', ''),
('G3', 'Bercak juga terlihat pada bagian batang dan tangka', 'Bercak juga terlihat pada bagian batang dan tangkai daun', 'P1', ''),
('G4', 'Tanaman layu', 'Tanaman layu', 'P2', ''),
('G5', 'Daun menguning', 'Daun menguning', 'P2', ''),
('G6', 'Daun agak kaku', 'Daun agak kaku', 'P3', ''),
('G7', 'Tulang daun berwarna hijau tua dan kekuningan dise', 'Tulang daun berwarna hijau tua dan kekuningan disekitar tulang daun', 'P3', ''),
('G8', 'Kerdil', 'Kerdil', 'P3', ''),
('G9', 'Daun keriting', 'Daun keriting', 'P3', ''),
('G10', 'Daun melengkung ke bawah(malformasi)', 'Daun melengkung ke bawah(malformasi)', 'P3', ''),
('G11', 'bercak kecil berwarna kuning yang akan berkembang ', 'bercak kecil berwarna kuning yang akan berkembang menjadi abuabu terang', 'P4', ''),
('G12', 'Serangan parah menyebabkan daun berlubang atau sob', 'Serangan parah menyebabkan daun berlubang atau sobek', 'P4', ''),
('G13', 'Daun gugur sebelum waktunya', 'Daun gugur sebelum waktunya', 'P4', ''),
('G14', 'Menyerang tangkai daun, batang dan polong', 'Menyerang tangkai daun, batang dan polong', 'P5', ''),
('G15', 'Infeksi pada biji menyebabkan kotiledon terlihat c', 'Infeksi pada biji menyebabkan kotiledon terlihat cekung', 'P5', ''),
('G16', 'bercak tak beraturan pada batang, polong dan tangk', 'bercak tak beraturan pada batang, polong dan tangkai kedelai', 'P5', ''),
('G17', 'Bercak coklat tua dan berkembang ke batang tanaman', 'Bercak coklat tua dan berkembang ke batang tanaman', 'P5', ''),
('G18', 'Di Batang muncul bintik-bintik hitam berupa duri-d', 'Di Batang muncul bintik-bintik hitam berupa duri-duri jamur', 'P5', ''),
('G19', 'Permukaan atas dan bawah daun, ditandai dengan ber', 'Permukaan atas dan bawah daun, ditandai dengan bercak kecil berwarna hijau pucat', 'P6', ''),
('G20', 'Pada bagian tengah membentuk bisul berwarna cokela', 'Pada bagian tengah membentuk bisul berwarna cokelat menyebabkan daun kering', 'P6', ''),
('G21', 'Daun mudah robek', 'Daun mudah robek', 'P6', ''),
('G22', 'Infeksi parah membuat daun gugur', 'Infeksi parah membuat daun gugur', 'P6', ''),
('G23', 'Bercak daun bervariasi dari kecil hingga besar tak', 'Bercak daun bervariasi dari kecil hingga besar tak beraturan berwarna kecoklatan', 'P6', ''),
('G24', 'Bercak coklat kemerahan timbul pada daun,  batang,', 'Bercak coklat kemerahan timbul pada daun,  batang, polong, biji, dan akar', 'P7', ''),
('G25', 'Bercak berbentuk lingkaran seperti papan tembak(ta', 'Bercak berbentuk lingkaran seperti papan tembak(target)', 'P7', ''),
('G26', 'Timbul bercak warna putih kekuningan dipermukaan d', 'Timbul bercak warna putih kekuningan dipermukaan daun', 'P8', ''),
('G27', 'Bercak berbentuk bulat', 'Bercak berbentuk bulat', 'P8', ''),
('G28', 'Daun kaku', 'Daun kaku', 'P8', ''),
('G29', 'Bercak yang lebih lebar menyebabkan daun abnormal', 'Bercak yang lebih lebar menyebabkan daun abnormal', 'P8', ''),
('G30', 'Polong dan biji rusak', 'Polong dan biji rusak', 'P9', ''),
('G31', 'Terdapat bintik-bintik cokelat pada kulit polong b', 'Terdapat bintik-bintik cokelat pada kulit polong bagian dalam dan kulit biji', 'P9', ''),
('G32', 'Biji menjadi busuk berwarna hitam', 'Biji menjadi busuk berwarna hitam', 'P9', ''),
('G33', 'Penurunan hasil & kualitas biji', 'Penurunan hasil & kualitas biji', 'P9', ''),
('G34', 'Hama tanaman muda', 'Hama tanaman muda', 'P10', ''),
('G35', 'Bintik-bintik putih pada keping biji, daun pertama', 'Bintik-bintik putih pada keping biji, daun pertama atau kedua', 'P10', ''),
('G36', 'Terdapat telur pada tanaman muda yang baru tumbuh', 'Terdapat telur pada tanaman muda yang baru tumbuh', 'P10', ''),
('G37', 'Larva menggerek batang hingga ke pangkal batang', 'Larva menggerek batang hingga ke pangkal batang', 'P10', ''),
('G38', 'Tanaman layu, mengering dan mati', 'Tanaman layu, mengering dan mati', 'P10', ''),
('G39', 'Daun menjadi keriting', 'Daun menjadi keriting', 'P11', ''),
('G40', 'Infeksi virus, daun menjadi keriting berwarna hita', 'Infeksi virus, daun menjadi keriting berwarna hitam, serangga vektor', 'P11', ''),
('G41', 'Pertumbuhan tanaman terhambat', 'Pertumbuhan tanaman terhambat', 'P11', ''),
('G42', 'Tanaman layu', 'Tanaman layu', 'P11', ''),
('G43', 'Larva merusak daun', 'Larva merusak daun', 'P12', ''),
('G44', 'Larva berada dibawah daun dan menyerang secara ber', 'Larva berada dibawah daun dan menyerang secara berkelompok', 'P12', ''),
('G45', 'Tanaman gundul', 'Tanaman gundul', 'P12', ''),
('G46', 'Daun-daun tergulung jadi satu', 'Daun-daun tergulung jadi satu', 'P13', ''),
('G47', 'Dalam gulungan terdapat ulat atau kotorannya berwa', 'Dalam gulungan terdapat ulat atau kotorannya berwarna coklat hitam', 'P13', ''),
('G48', 'Ulat dalam gulungan memakan daun hingga tinggal tu', 'Ulat dalam gulungan memakan daun hingga tinggal tulang daunnya', 'P13', ''),
('G49', 'Serangga muda menghisap cairan tanaman', 'Serangga muda menghisap cairan tanaman', 'P14', ''),
('G50', 'Pucuk tanaman kerdil', 'Pucuk tanaman kerdil', 'P14', ''),
('G51', 'Menyerang tanaman kedelai muda sampai tua', 'Menyerang tanaman kedelai muda sampai tua', 'P14', ''),
('G52', 'Cuaca panas pada musim kemarau populasi kutu daun ', 'Cuaca panas pada musim kemarau populasi kutu daun tinggi', 'P14', '');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `kodepenyakit` varchar(10) NOT NULL,
  `namapenyakit` varchar(50) NOT NULL,
  `ketpenyakit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`kodepenyakit`, `namapenyakit`, `ketpenyakit`) VALUES
('P1', 'Karat Daun', 'Karat Daun'),
('P2', 'Busuk Batang', 'Busuk Batang'),
('P3', 'Virus Mosaik', 'Virus Mosaik'),
('P4', 'Bercak Daun', 'Bercak Daun'),
('P5', 'Antraknose', 'Antraknose'),
('P6', 'Pustul Bakteri', 'Pustul Bakteri'),
('P7', 'Target Spot', 'Target Spot'),
('P8', 'Downy Mildew', 'Downy Mildew'),
('P9', 'Kepik Hijau', 'Kepik Hijau'),
('P10', 'Lalat Bibit Kacang', 'Lalat Bibit Kacang'),
('P11', 'Kutu Kebul', 'Kutu Kebul'),
('P12', 'Ulat Grayak', 'Ulat Grayak'),
('P13', 'Ulat Penggulung Daun', 'Ulat Penggulung Daun'),
('P14', 'Kutu Daun', 'Kutu Daun');

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat`
--

CREATE TABLE `sertifikat` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `stambuk` varchar(10) NOT NULL,
  `file_pdf` varchar(255) NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tanggal_acc` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sertifikat`
--

INSERT INTO `sertifikat` (`id`, `nama`, `stambuk`, `file_pdf`, `status`, `created_at`, `tanggal_acc`) VALUES
(15, 'Jonny', 'eja', '9ab59b46bcf12b7548a5b1032ae4d0bc.pdf', '', '2025-08-04 11:47:29', NULL),
(16, 'eja', 'eja', '2566b03af1cd1c06032c9920ecf56d8d.pdf', '', '2025-08-04 11:48:03', NULL),
(17, 'kontol', 'kontol', 'b3ef6ef39f7f5db68a0d7a5077681a52.pdf', '', '2025-08-04 14:09:43', NULL),
(18, 'Jonny', 'P21118082', 'Jonny_P21118082.pdf', '', '2025-08-04 14:24:56', NULL),
(19, 'Ulil Albab', 'P21118082', 'Ulil_Albab_P21118082.pdf', '0', '2025-08-04 14:47:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` char(36) NOT NULL,
  `idpetani` char(36) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `namauser` varchar(30) NOT NULL,
  `status` varchar(1) NOT NULL,
  `role` varchar(1) NOT NULL,
  `created_at` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `idpetani`, `username`, `password`, `namauser`, `status`, `role`, `created_at`) VALUES
('85fa70fa-a6b9-11ed-bc36-c01850377eb8', '', 'admin11', 'admin', 'Agrhi', '1', '1', ''),
('c92374a4-ab4e-11ed-a016-c01850377eb8', '', 'cobaedit', '$2y$10$wGjxq/qteBDVizz9i.BA/uCddz6xS4jeDAZ7pYXti2peBRoOvbAKO', 'Agrhi', '1', '1', '1676259038'),
('c5744c92-ac03-11ed-a016-c01850377eb8', '', 'asdin', '26536629d416c0cf5337140ceb3004ef', 'Asdin', '1', '1', '1676336772'),
('f132a9ff-0133-11ee-a87d-c01850377eb8', '', 'hoba', '$2y$10$KMcwZmOapmAtmg.D.Bz6XOH61d3Ak0APlIhzpa5G4LhRjv2XBm6qy', 'coba tambah', '1', '1', '1685703304');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
