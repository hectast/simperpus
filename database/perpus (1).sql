-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jun 2021 pada 04.38
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `pass`) VALUES
(1, 'Ain Gemu', 'admin', '$2y$10$yOyTMmf0ZU9Jvcm8pDtwoOEztjwdxpmSn4Ls2sQdF0b9BHtj82RgC');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
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
  `pass` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`nisn`, `nama_lengkap`, `no_hp`, `tempat_lahir`, `tgl_lahir`, `jk`, `id_kelas`, `thn_masuk`, `foto`, `pass`) VALUES
('531418022', 'Azwar Ramadhan', '085200001111', 'Gorontalo', '2000-11-29', 'Laki Laki', 1, '2015', '1622435268.271360b465c4423a8.jpeg', '$2y$10$HBmXYEoAy//Av0/xauNgRuovOYkOvNIcBVvl./KttOO.PnVylEKAC');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `kode_isbn` varchar(100) NOT NULL,
  `judul_buku` varchar(120) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` varchar(5) NOT NULL,
  `kategori_buku` tinyint(4) NOT NULL,
  `jenis_buku` varchar(100) NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `lokasi_buku` varchar(10) NOT NULL,
  `tanggal_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `kode_isbn`, `judul_buku`, `pengarang`, `penerbit`, `tahun_terbit`, `kategori_buku`, `jenis_buku`, `jumlah_buku`, `lokasi_buku`, `tanggal_input`) VALUES
(1, 'SERKINDO12052021', 'Sejarah Kebudayaan Indonesia', 'Dquerty SK', 'Serkindo', '2021', 0, '4', 25, 'Rak 2', '2021-05-12 01:09:43'),
(2, 'FILSAF12052021', 'Filsafat Dalam Agama Islam', 'Silfatah', 'Filsaf', '2021', 0, '5', 11, 'Rak 3', '2021-05-12 02:34:19'),
(3, 'MATPEND14052021', 'Matematika Pendidikan', 'Dmarque S.Pd', 'Matpend', '2021', 1, '2', 6, 'Rak 1', '2021-05-14 09:11:47'),
(4, 'sad12e12wdaa', 'lojreng', 'xcvxv', 'asdasd', '2021', 1, '3', 1, 'Rak 2', '2021-05-15 02:23:42'),
(5, 'Sit impedit perspic', 'Ut in ut possimus c', 'Ad voluptatem alias ', 'Velit sequi consecte', 'Ea om', 0, '3', 6, 'Rak 1', '2021-05-15 21:43:44'),
(6, 'Atque enim consequat', 'Dolor exercitation b', 'Aperiam hic rem ipsa', 'Eos commodo ut susci', 'Quia ', 1, '1', 97, 'Rak 3', '2021-05-15 21:43:54'),
(7, 'Reprehenderit volupt', 'Deleniti ipsa ea si', 'Voluptas tempore vo', 'Animi debitis conse', 'Ad vo', 1, '2', 78, 'Rak 2', '2021-05-15 21:44:10'),
(8, 'Quibusdam tenetur pl', 'Commodo voluptate qu', 'Commodo distinctio ', 'Mollit magnam deleni', 'Dolor', 1, '4', 2, 'Rak 2', '2021-05-15 21:45:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
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
  `pass` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`nuptk`, `nama_lengkap`, `no_hp`, `tempat_lahir`, `tgl_lahir`, `jk`, `jabatan`, `thn_masuk`, `foto`, `pass`) VALUES
('32314141', 'Papa Guru', '082296663930', 'Gorontalo', '1929-09-21', 'Laki Laki', 'Guru Kelas', '2015', '1622485983.858760b52bdfd1a6b.png', '$2y$10$pNliNEwyHsgCTzMuG5/Z.elJUp2ZEUkInYbz2z8b1rmHQO0riYMXK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
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
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `nisnORuname` varchar(50) NOT NULL,
  `token` varchar(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`id_log`, `nisnORuname`, `token`, `timestamp`) VALUES
(1, 'admin', 'o52X8bovgz', '2021-06-04 13:15:59'),
(2, '532419051', 'guzjO8kCmV', '2021-05-17 07:16:20'),
(3, '531418022', 'xychcD3gka', '2021-05-17 07:01:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL,
  `klasifikasi` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`, `klasifikasi`) VALUES
(1, 'Ilmu Pengatahun Alam', 1),
(2, 'Ilmu Pengetahuan Sosial', 1),
(3, 'Agama', 1),
(4, 'Matematika', 1),
(5, 'Sejarah', 0),
(6, 'Geografis', 0),
(7, 'Ensiklopedia', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
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
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_buku`, `nisn`, `nuptk`, `tgl_pinjam`, `lama`, `tgl_jatuh_tempo`, `tgl_kembali`, `denda`) VALUES
(13, 2, '531418022', '0', '2021-06-03', 3, '2021-06-06', '0000-00-00', 0),
(14, 3, '0', '32314141', '2021-06-03', 2, '2021-06-05', '0000-00-00', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`nisn`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nuptk`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
