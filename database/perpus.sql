-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2021 at 04:14 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `pass`) VALUES
(1, 'Golden Papa', 'admin', '$2y$10$I5IxmVPbLdBlpCorvg193./TtvQyulEjiKk7qNzC8LMtiLCFiL2kC');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `nisn` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(10) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `thn_masuk` varchar(4) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `pass` varchar(80) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`nisn`, `nama_lengkap`, `no_hp`, `tempat_lahir`, `tgl_lahir`, `jk`, `id_kelas`, `thn_masuk`, `foto`, `pass`, `username`) VALUES
('531418022', 'Azwar Ramadhan', '085200001111', 'Gorontalo', '2000-11-29', 'Laki Laki', 1, '2015', '1622435268.271360b465c4423a8.jpeg', '$2y$10$7J3/Nfxno6Oi67DP5zVipuNhroU9TpSLTPj1fWOzOjOyoahNeTK72', 'azbot11'),
('532419051', 'Wahyu Setiawan Usman', '08325235912', 'Gorontalo', '2001-09-11', 'Laki Laki', 14, '2016', '1622965176.612560bc7bb89587d.jpg', '$2y$10$/Zb4RmFw49DXlIybfvvzaeAW6nmgfs.5izuPRM29kvMbizPEq6PFK', 'wahyusman');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `kode_isbn` varchar(100) NOT NULL,
  `no_buku` char(6) NOT NULL,
  `judul_buku` varchar(120) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` varchar(5) NOT NULL,
  `tempat_terbit` varchar(100) NOT NULL,
  `kategori_buku` tinyint(4) NOT NULL,
  `kode_klasifikasi` char(3) NOT NULL,
  `jilid_edisi` varchar(20) NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `sumber_dana` varchar(50) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `tanggal_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `kode_isbn`, `no_buku`, `judul_buku`, `pengarang`, `penerbit`, `tahun_terbit`, `tempat_terbit`, `kategori_buku`, `kode_klasifikasi`, `jilid_edisi`, `jumlah_buku`, `sumber_dana`, `harga_satuan`, `tanggal_input`) VALUES
(1, 'ISBN2021', '5001', 'Eksperimen Kimia', 'Pemuda Tersesat', 'Sapurata', '2021', 'Gorontalo', 0, '500', 'Jilid 1 edisi 1', 14, 'DANA BOS', 50000, '2021-06-06 20:55:11'),
(2, 'ISBN2018', '8001', 'Sastra Bahasa', 'Sutisna', 'Sinar Gempita', '2018', 'Siduarjo', 1, '800', 'Jilid 1 edisi 1', 20, 'DANA BOS', 12500, '2021-06-07 04:08:03'),
(3, 'ISBN2019', '1001', 'Filsafat Kependidikan', 'Suterjo', 'Sinar Gembira', '2019', 'Siduarjo', 1, '100', 'Jilid 1 edisi 2', 4, 'DANA BOS', 20000, '2021-06-07 04:08:46');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nuptk` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(10) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `thn_masuk` varchar(4) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `pass` varchar(80) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nuptk`, `nama_lengkap`, `no_hp`, `tempat_lahir`, `tgl_lahir`, `jk`, `jabatan`, `thn_masuk`, `foto`, `pass`, `username`) VALUES
('32314141', 'Papa Guru', '082296663930', 'Gorontalo', '1929-09-21', 'Laki Laki', 'Guru Kelas', '2015', '1622485983.858760b52bdfd1a6b.png', '$2y$10$pNliNEwyHsgCTzMuG5/Z.elJUp2ZEUkInYbz2z8b1rmHQO0riYMXK', '32314141'),
('765345435345', 'Om Pian', '0888123823', 'Gorontalo', '1990-06-23', 'Laki Laki', 'Kepala Sekolah', '2001', '1622964931.604960bc7ac393ace.png', '$2y$10$KWOn8x1RCfw8Zt9bG70.KORHphD4RBwrx0Em0hCPVac.HoIBckfaK', 'pian2021');

-- --------------------------------------------------------

--
-- Table structure for table `history_buku`
--

CREATE TABLE `history_buku` (
  `id` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `waktu_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history_buku`
--

INSERT INTO `history_buku` (`id`, `id_buku`, `jumlah`, `waktu_input`) VALUES
(3, 1, 5, '2021-06-06 18:55:11'),
(4, 1, 10, '2021-06-06 18:55:29'),
(5, 2, 20, '2021-06-07 02:08:03'),
(6, 3, 5, '2021-06-07 02:08:46');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'VII - A'),
(2, 'VII - B'),
(3, 'VII - C'),
(4, 'VIII - A'),
(5, 'VIII - B'),
(6, 'VIII - C'),
(7, 'IX - A'),
(10, 'IX - B'),
(14, 'IX - C');

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `kode_klasifikasi` char(3) NOT NULL,
  `klasifikasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `klasifikasi`
--

INSERT INTO `klasifikasi` (`kode_klasifikasi`, `klasifikasi`) VALUES
('000', 'Karya Umum'),
('100', 'Filsafat'),
('200', 'Agama'),
('300', 'Ips'),
('400', 'Bahasa'),
('500', 'Ipa'),
('600', 'Ilmu Pengetahuan Praktis'),
('700', 'Kesenian/Olahraga'),
('800', 'Kesusastraan'),
('900', 'Sejarah');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `nisnORuname` varchar(50) NOT NULL,
  `token` varchar(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `nisnORuname`, `token`, `timestamp`) VALUES
(5, 'admin', 'K1ygICIkjj', '2021-06-07 02:04:56'),
(6, '532419051', 'WVzxkavnP1', '2021-06-07 02:02:55'),
(7, '765345435345', 'Rrlg8Md2u0', '2021-06-07 00:48:30'),
(8, 'omGondrong', 'lWoK0vp4FR', '2021-06-06 22:01:44'),
(9, '531418022', 'suRXcHk1eA', '2021-06-06 22:18:56'),
(10, 'azbot11', 'Ec6DIeGsMA', '2021-06-07 02:10:47'),
(11, 'pian2021', '1CCrordVjQ', '2021-06-07 02:11:00'),
(12, 'wahyusman', 'T2FLetCnUL', '2021-06-07 02:10:30');

-- --------------------------------------------------------

--
-- Table structure for table `non_buku`
--

CREATE TABLE `non_buku` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `non_buku`
--

INSERT INTO `non_buku` (`id`, `nama`, `jumlah`, `tanggal_masuk`) VALUES
(1, 'Globe', 20, '2021-06-06'),
(2, 'Alat Peraga', 15, '2021-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `no_buku` char(10) NOT NULL,
  `buku` varchar(10) NOT NULL,
  `kode_klasifikasi` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`no_buku`, `buku`, `kode_klasifikasi`) VALUES
('0001', 'test1', '000'),
('1001', 'test2', '100'),
('1002', 'test3', '100');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nuptk` varchar(20) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `lama` int(3) NOT NULL,
  `tgl_jatuh_tempo` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `denda` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_buku`, `nisn`, `nuptk`, `tgl_pinjam`, `lama`, `tgl_jatuh_tempo`, `tgl_kembali`, `denda`) VALUES
(15, 1, '531418022', '0', '2021-06-06', 2, '2021-06-08', '2021-06-07', 0),
(16, 1, '0', '765345435345', '2021-06-06', 3, '2021-06-09', '0000-00-00', 0),
(17, 3, '532419051', '0', '2021-06-07', 1, '2021-06-08', '0000-00-00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nuptk`);

--
-- Indexes for table `history_buku`
--
ALTER TABLE `history_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`kode_klasifikasi`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `non_buku`
--
ALTER TABLE `non_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`no_buku`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `history_buku`
--
ALTER TABLE `history_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `non_buku`
--
ALTER TABLE `non_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
