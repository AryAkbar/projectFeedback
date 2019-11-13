-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Nov 2019 pada 02.50
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feedback`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `departemen`
--

CREATE TABLE `departemen` (
  `id_departemen` int(10) NOT NULL,
  `departemen` varchar(255) NOT NULL,
  `total_keluhan` varchar(255) NOT NULL,
  `terselesaikan` varchar(255) NOT NULL,
  `proses` varchar(255) NOT NULL,
  `belum_terjawab` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `departemen`
--

INSERT INTO `departemen` (`id_departemen`, `departemen`, `total_keluhan`, `terselesaikan`, `proses`, `belum_terjawab`) VALUES
(1234, 'Kesiswaan', '12', '12', '0', '0'),
(1235, 'Sarana Prasarana', '15', '12', '2', '1'),
(1236, 'Kabid.Perpustakaan', '17', '15', '2', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluhan`
--

CREATE TABLE `keluhan` (
  `id_keluhan` int(10) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_departemen` int(10) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tanggal_upload` datetime NOT NULL,
  `terakhir_diupdate` datetime NOT NULL,
  `id_user` int(10) NOT NULL,
  `eksekutor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keluhan`
--

INSERT INTO `keluhan` (`id_keluhan`, `judul`, `deskripsi`, `id_departemen`, `status`, `tanggal_upload`, `terakhir_diupdate`, `id_user`, `eksekutor`) VALUES
(1, 'pembangunan rame', '&lt;p&gt;Sabarr&lt;/p&gt;', 1234, 'Sudah Dibalas', '2019-10-30 14:17:03', '2019-10-30 02:17:03', 13, 3),
(2, 'Mantap', '&lt;p&gt;Mantap Sangat&lt;/p&gt;', 1235, 'Terbuka', '2019-11-07 07:35:50', '2019-11-07 07:35:50', 16, 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(10) NOT NULL,
  `komentar` text NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_keluhan` int(10) NOT NULL,
  `tanggal_komentar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `komentar`, `id_user`, `id_keluhan`, `tanggal_komentar`) VALUES
(2, '&lt;p&gt;&lt;b&gt;yarrak&lt;/b&gt;&lt;/p&gt;', 1, 3, '2019-08-02 08:09:40'),
(3, 'KEHED', 12, 3, '2019-08-02 08:10:10'),
(4, '&lt;p&gt;ANANG JANCOK&lt;/p&gt;', 9, 4, '2019-08-02 08:12:44'),
(5, '&lt;p&gt;SUTRIS BELEGUG&lt;/p&gt;', 12, 4, '2019-08-02 08:13:04'),
(6, '&lt;p&gt;Mantap&lt;/p&gt;', 3, 1, '2019-10-30 14:33:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(10) NOT NULL,
  `id_keluhan` int(11) NOT NULL,
  `notifikasi` varchar(255) NOT NULL,
  `from_name` varchar(250) NOT NULL,
  `tanggal` datetime NOT NULL,
  `unseen_notif` int(11) NOT NULL,
  `id_departemen` int(11) NOT NULL,
  `goal_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `id_keluhan`, `notifikasi`, `from_name`, `tanggal`, `unseen_notif`, `id_departemen`, `goal_user`) VALUES
(35, 1, 'Memiliki Keluhan Baru', 'ary', '2019-10-30 14:17:03', 0, 0, 3),
(36, 1, 'Memiliki Keluhan Baru', 'ary', '2019-10-30 14:17:03', 1, 0, 9),
(37, 1, 'Memiliki Keluhan Baru', 'ary', '2019-10-30 14:17:03', 0, 0, 14),
(38, 1, 'Telah Membalas Keluhan Anda', 'Adi Ariyanto', '2019-10-30 14:33:27', 0, 0, 13),
(39, 2, 'Memiliki Keluhan Baru', 'super', '2019-11-07 07:35:50', 1, 0, 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `record`
--

CREATE TABLE `record` (
  `id_record` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_departemen` int(10) NOT NULL,
  `belum_terjawab` int(10) NOT NULL,
  `menunggu_balasan` int(10) NOT NULL,
  `balasan_klien` int(10) NOT NULL,
  `tutup` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `record`
--

INSERT INTO `record` (`id_record`, `id_user`, `id_departemen`, `belum_terjawab`, `menunggu_balasan`, `balasan_klien`, `tutup`) VALUES
(1, 3, 1234, 1, 0, 0, 1),
(2, 9, 1234, 9, 1, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(10) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `biografi` text NOT NULL,
  `username` varbinary(250) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `position` varchar(20) NOT NULL,
  `role` varchar(50) NOT NULL,
  `imgdir` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `name`, `tgl_lahir`, `jk`, `alamat`, `phone`, `biografi`, `username`, `password`, `email`, `position`, `role`, `imgdir`, `status`) VALUES
(1, 'superadmin', '0000-00-00', 'Pria', 'superadmin', '824018041', '', 0x737570657261646d696e, '17c4520f6cfd1ab53d8745e84681eb49', 'superadmin@drag', 'Admin', 'superadmin', 'no-image.png', 'active'),
(2, 'mantap', '2016-12-31', 'Pria', 'mantap', '08123831944', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                mantap anjing                                                \r\n                                                                                            \r\n                                                                                            \r\n                                                                                            \r\n                                                                                            \r\n                                                                                            \r\n                                                                                            \r\n                                                                                            \r\n                                                                                            \r\n                                                                                            \r\n                                            ', 0x6d616e746170, '2fea6c02a98d6318d44cdf150775f07a', 'mantaps@gmail.com', 'Anggota', '', 'ww.jpg', 'active'),
(3, 'Adi Ariyanto', '2018-11-30', 'Pria', 'Jakarta', '08123831944', '', 0x6b657369737761616e, '827ccb0eea8a706c4c34a16891f84e7b', 'kesiswaan@gmail.com', 'Admin', '1234', '', ''),
(8, 'Novito Ramadana', '2015-11-01', 'Pria', 'malang', '08123456789', 'Saya Jomblo', 0x6e6f7669746f, '51e437825cb6bf2e629ee7b1661a37eb', 'novito@gmail.com', 'Anggota', '', 'no-image.png', ''),
(9, 'Jennie Risa', '1995-03-31', 'Wanita', 'Kota Batu', '08123456789', '', 0x6a656e6e6965, '4db63cb2f0bde8c4a2582b0e66fe4c7a', 'jennie@gmail.com', 'Admin', '1234', 'no-image.png', ''),
(10, 'tabver', '1998-04-15', 'Pria', 'Batu', '082139167634', '                                                                                                                                                                                                                                                \r\n                                                                                            \r\n                                                                                            \r\n                                                                                            \r\n                                            ', 0x746162766572, '78e0782b89f45b7dfd5fedb3de3d4191', 'tabver@gmail.com', 'Anggota', '', '1541814274079.jpg', ''),
(11, 'Ary Akbar', '2002-12-04', 'Pria', 'Batu', '081234567890', '                                                                                                \r\n                                            ', 0x617279616b626172, '7aa82ffef5c9a909fb588f42eb3a213a', 'ary@gmail.com', 'Anggota', '', 'unnamed.jpg', ''),
(12, 'asu', '2019-07-09', 'Pria', 'asu', '107104081734', '', 0x617375, '102a6ed6587b5b8cb4ebbe972864690b', 'asu@gmail.com', 'Anggota', '', 'no-image.png', ''),
(13, 'ary', '2002-02-20', 'Pria', 'nothing', '1084107571', '                                                                                                \r\n                                            ', 0x4d696e61726958, 'b50f48837181a0aa605d24e8d7e52559', 'ary@gmail.com', 'Anggota', '', 'henry-hudson-9346049-1-402.jpg', ''),
(14, 'ar', '2002-06-20', 'Pria', 'kaowkwo', '0895322173515', '', 0x417279313233, '86795bdfd4727b7ebc668dfccb64784d', 'ar@gmail.com', 'Admin', '1234', 'no-image.png', ''),
(15, 'Dede Adyt', '2002-07-20', 'Pria', 'dott', '0128309771', '', 0x6465646531323334, 'c69b1c6efc585384d5f789d0d9204508', 'dede@gmail.com', 'Admin', '1235', 'no-image.png', ''),
(16, 'super', '2019-11-12', 'Pria', 'super', '014810', '', 0x7375706572, '1b3231655cebb7a1f783eddf27d254ca', 'super@gmail.com', 'Anggota', '1234', 'no-image.png', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id_departemen`);

--
-- Indeks untuk tabel `keluhan`
--
ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`id_keluhan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_keluhan` (`id_keluhan`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`),
  ADD KEY `id_keluhan` (`id_keluhan`);

--
-- Indeks untuk tabel `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id_record`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_departemen` (`id_departemen`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `keluhan`
--
ALTER TABLE `keluhan`
  ADD CONSTRAINT `keluhan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
