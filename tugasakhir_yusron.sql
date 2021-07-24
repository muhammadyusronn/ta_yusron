-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 24 Jul 2021 pada 23.28
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugasakhir_yusron`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `departement`
--

CREATE TABLE `departement` (
  `id_departement` int(11) NOT NULL,
  `namadepartement` varchar(100) NOT NULL,
  `deskripsidepartement` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `departement`
--

INSERT INTO `departement` (`id_departement`, `namadepartement`, `deskripsidepartement`) VALUES
(2, 'Poly Anak', 'tess'),
(3, 'Poly Gigi', 'tes poly gigi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `namakategori` varchar(50) NOT NULL,
  `deskripsikategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `namakategori`, `deskripsikategori`) VALUES
(4, 'Kedisiplinan Kerja', 'Ini adalah kategori kriteria yang bersifat kedisiplinan kerja'),
(5, 'Kerjasama', 'Ini adalah kategori kriteria yang bersifat kerjasama tim'),
(6, 'Keaktifan', 'Ini adalah kategori kriteria yang bersifat keaktifan'),
(7, 'Kreatifitas', 'Ini adalah kategori kriteria yang bersifat kreatifitas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `kriteria_id` int(11) NOT NULL,
  `kriteria_nama` varchar(100) NOT NULL,
  `kriteria_bobot` double NOT NULL,
  `kriteria_sifat` enum('Benefit','Cost') NOT NULL,
  `kategori_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`kriteria_id`, `kriteria_nama`, `kriteria_bobot`, `kriteria_sifat`, `kategori_id`) VALUES
(4, 'Pegawai selalu disiplin dalam bekerja', 45, 'Benefit', 4),
(5, 'Pegawai memiliki kreatifitas yang tinggi', 10, 'Benefit', 7),
(6, 'Pegawai mampu bekerjasama dengan tim', 30, 'Benefit', 5),
(7, 'Pegawai memiliki banyak prestasi dan aktif dalam banyak kegiatan eksternal', 15, 'Benefit', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `departement_id` int(11) DEFAULT NULL,
  `kontak` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama`, `departement_id`, `kontak`) VALUES
(7, '1231', 'Yusron', 2, '082186427595'),
(8, '1232', 'Ruben', 2, '087878829992'),
(9, '1233', 'Edho', 2, '08128829922'),
(10, '1234', 'Budi', 2, '081772772822'),
(11, '1235', 'Jimmy', 2, '0819229222833');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `jawaban` int(11) NOT NULL,
  `periode_bulan` int(11) NOT NULL,
  `periode_tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `pegawai_id`, `kriteria_id`, `jawaban`, `periode_bulan`, `periode_tahun`) VALUES
(82, 7, 4, 4, 7, 2021),
(83, 7, 6, 4, 7, 2021),
(84, 7, 7, 4, 7, 2021),
(85, 7, 5, 3, 7, 2021),
(86, 8, 4, 3, 7, 2021),
(87, 8, 6, 3, 7, 2021),
(88, 8, 7, 4, 7, 2021),
(89, 8, 5, 4, 7, 2021),
(90, 9, 4, 3, 7, 2021),
(91, 9, 6, 3, 7, 2021),
(92, 9, 7, 5, 7, 2021),
(93, 9, 5, 3, 7, 2021),
(94, 10, 4, 3, 7, 2021),
(95, 10, 6, 3, 7, 2021),
(96, 10, 7, 3, 7, 2021),
(97, 10, 5, 4, 7, 2021),
(98, 11, 4, 3, 7, 2021),
(99, 11, 6, 3, 7, 2021),
(100, 11, 7, 4, 7, 2021),
(101, 11, 5, 2, 7, 2021);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nip` varchar(12) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `level` enum('Admin','Penilai') NOT NULL,
  `password` text NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nip`, `nama`, `kontak`, `level`, `password`, `last_login`) VALUES
(8, '1111', 'Admin', '082186427595', 'Admin', '$2y$10$0lUKsflEUpMG1kHB2KJjZur8feVnhnesgdY8UxZOVuERDWA966XJK', '2021-07-24 20:41:51'),
(9, '2222', 'Penilai', '08128829992', 'Penilai', '$2y$10$1I3JIPQkWCZRRtPGaIrdg.vaVg3OxTpt9sgDyHHLSTa466cB/uqui', '2021-07-24 15:02:37');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id_departement`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kriteria_id`),
  ADD KEY `kriteria_ibfk_1` (`kategori_id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD KEY `pegawai_ibfk_1` (`departement_id`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_pegawai` (`pegawai_id`),
  ADD KEY `kriteria_id` (`kriteria_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `departement`
--
ALTER TABLE `departement`
  MODIFY `id_departement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `kriteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD CONSTRAINT `kriteria_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id_kategori`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`departement_id`) REFERENCES `departement` (`id_departement`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`kriteria_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
