-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Sep 2020 pada 13.42
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_e-learning`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username_admin` varchar(255) NOT NULL,
  `password_admin` varchar(255) NOT NULL,
  `img_admin` varchar(255) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username_admin`, `password_admin`, `img_admin`, `id_level`) VALUES
(1, 'admin', 'admin', 'default.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(11) NOT NULL,
  `no_induk` int(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `kelahiran` date NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `golongan` varchar(255) NOT NULL,
  `ijazah` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `no_induk`, `nama`, `jenis_kelamin`, `kelahiran`, `jabatan`, `status`, `golongan`, `ijazah`, `is_active`) VALUES
(29, 171002, 'Hayley', 'P', '1998-09-27', 'Guru Mata pelajaran', 'PNS', 'null', 'S1 FISIKA', 0),
(30, 171003, 'Norah', 'P', '1998-09-28', 'Guru Mata pelajaran', 'PNS', 'null', 'S1 Kimia', 0),
(31, 171004, 'Rosina', 'P', '1998-09-29', 'Guru Mata pelajaran', 'PNS', 'null', 'S1 Matematika', 0),
(32, 171005, 'Royal', 'P', '1998-09-30', 'Guru Mata pelajaran', 'PNS', 'null', 'S1 Komputer', 0),
(33, 171006, 'Barrie', 'L', '1998-10-01', 'Guru Mata pelajaran', 'PNS', 'null', 'S2 Komputer', 0),
(34, 171007, 'Linsey', 'L', '1998-10-02', 'Guru Mata pelajaran', 'PNS', 'null', 'S3 Komputer', 1),
(35, 171008, 'Laura', 'L', '1998-10-03', 'Guru Mata pelajaran', 'PNS', 'null', 'S4 Komputer', 0),
(36, 171009, 'Fanny', 'L', '1998-10-04', 'Guru Mata pelajaran', 'PNS', 'null', 'S5 Komputer', 0),
(37, 171010, 'Kristian', 'L', '1998-10-05', 'Guru Mata pelajaran', 'PNS', 'null', 'S6 Komputer', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `label_kelas` varchar(255) NOT NULL,
  `tingkat` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `label_kelas`, `tingkat`, `jurusan`) VALUES
(1, 'X IPA ', '1', 'ipa'),
(2, 'X IPA 2', '1', 'ipa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Guru'),
(3, 'Siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_log`
--

CREATE TABLE `tb_log` (
  `id_log` int(11) NOT NULL,
  `log_user` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `log_str` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `log_tipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_log`
--

INSERT INTO `tb_log` (`id_log`, `log_user`, `tanggal`, `log_str`, `level`, `log_tipe`) VALUES
(1, 16101, '0000-00-00 00:00:00', 'menambahkan data', '', 1),
(2, 16101, '2020-08-22 14:07:50', 'admin telah login', '1', 0),
(3, 171002, '2020-08-22 19:00:31', 'baru bergabung', '2', 1),
(4, 16101, '2020-08-22 19:01:45', 'admin telah login', '1', 0),
(5, 16101, '2020-08-22 19:01:56', 'Logout', '1', 4),
(6, 16101, '2020-08-22 19:05:08', 'Login', '1', 0),
(7, 16101, '2020-08-22 19:05:32', 'menghapus171004', '1', 3),
(8, 16101, '2020-08-22 19:05:58', 'menghapus 2147483647', '1', 3),
(9, 16101, '2020-08-22 19:12:08', 'menghapus 171010', '1', 3),
(10, 16101, '2020-08-22 19:36:51', 'menghapus 171008', '1', 3),
(11, 16101, '2020-08-22 19:36:56', 'menghapus 171006', '1', 3),
(12, 16101, '2020-08-22 19:37:00', 'menghapus 171007', '1', 3),
(13, 16101, '2020-08-22 19:37:43', 'Import data guru', '1', 1),
(14, 16101, '2020-08-23 11:29:42', 'Login', '1', 0),
(15, 16101, '2020-08-23 11:29:56', 'menghapus 171001', '1', 3),
(16, 16101, '2020-08-23 12:06:09', 'menambah data siswa ', '1', 1),
(17, 16101, '2020-08-23 12:26:25', 'Import data siswa', '1', 1),
(18, 16101, '2020-08-23 12:29:48', 'Import data siswa', '1', 1),
(19, 16101, '2020-08-23 14:14:33', 'update data sekolah', '1', 2),
(20, 16101, '2020-08-23 14:39:30', 'update data sekolah', '1', 2),
(21, 16101, '2020-08-23 14:42:35', 'update data sekolah', '1', 2),
(22, 16101, '2020-08-23 15:07:06', 'update data sekolah', '1', 2),
(23, 16101, '2020-08-23 19:55:25', 'Login', '1', 0),
(24, 16101, '2020-08-23 20:41:27', 'Menambahkan kelas baru', '1', 1),
(25, 16101, '2020-08-24 14:48:53', 'Login', '1', 0),
(26, 16101, '2020-08-24 14:57:29', 'Logout', '1', 4),
(27, 171007, '2020-08-24 15:04:59', 'Joined', '2', 1),
(28, 171007, '2020-08-24 15:05:18', 'Login', '2', 0),
(29, 171007, '2020-08-24 15:24:06', 'Logout', '2', 4),
(30, 16101, '2020-08-24 15:24:17', 'Login', '1', 0),
(31, 16101, '2020-08-24 15:41:01', 'Menambahkan kelas baru', '1', 1),
(32, 16101, '2020-08-24 15:41:58', 'Logout', '1', 4),
(33, 171007, '2020-08-24 15:42:10', 'Login', '2', 0),
(34, 171007, '2020-08-24 17:14:38', 'Upload Materi ', '2', 1),
(35, 171007, '2020-08-24 19:30:11', 'Login', '2', 0),
(36, 171007, '2020-08-24 19:31:26', 'Upload Materi ', '2', 1),
(37, 171007, '2020-08-24 19:31:55', 'Upload Materi ', '2', 1),
(38, 171007, '2020-08-24 19:32:42', 'Upload Materi ', '2', 1),
(39, 171007, '2020-08-24 19:39:24', 'Upload Materi ', '2', 1),
(40, 171007, '2020-08-24 19:57:48', 'Logout', '2', 4),
(41, 16101, '2020-08-24 19:57:57', 'Login', '1', 0),
(42, 16101, '2020-08-25 13:31:26', 'Login', '1', 0),
(43, 16101, '2020-08-25 13:32:29', 'Logout', '1', 4),
(44, 171007, '2020-08-25 13:32:39', 'Login', '2', 0),
(45, 171007, '2020-08-25 13:42:52', 'Upload Materi ', '2', 1),
(46, 171007, '2020-08-25 18:56:40', 'Login', '2', 0),
(47, 171007, '2020-08-25 19:23:52', 'Login', '2', 0),
(48, 16101, '2020-09-04 18:38:32', 'Login', '1', 0),
(49, 16101, '2020-09-04 18:38:55', 'Logout', '1', 4),
(50, 171007, '2020-09-04 18:39:04', 'Login', '2', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `tingkat_mapel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `nama_mapel`, `tingkat_mapel`) VALUES
(1, 'Fisika', '1'),
(2, 'Biologi', '1'),
(3, 'Biologi', '2'),
(4, 'Sejarah', '2'),
(5, 'Matematika ', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_materi`
--

CREATE TABLE `tb_materi` (
  `id_materi` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `is_created` datetime NOT NULL,
  `uploader` int(11) NOT NULL,
  `judul_materi` varchar(255) NOT NULL,
  `materi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_materi`
--

INSERT INTO `tb_materi` (`id_materi`, `id_mapel`, `id_kelas`, `is_created`, `uploader`, `judul_materi`, `materi`) VALUES
(1, 1, 1, '2020-08-24 17:14:38', 171007, 'gaya pegas', 'contoh.pdf'),
(4, 5, 1, '2020-08-24 19:32:42', 171007, 'Integral', 'contoh.pdf'),
(6, 3, 2, '2020-08-25 13:42:52', 171007, 'Sistem Operrasi Lanjut', 'KB_005_-_Surat_Pernyataan_Persetujuan_KB_CDTP.docx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_menu`
--

CREATE TABLE `tb_menu` (
  `no_menu` int(11) NOT NULL,
  `nama_menu` varchar(25) NOT NULL,
  `href` varchar(500) NOT NULL,
  `role` varchar(25) NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_menu`
--

INSERT INTO `tb_menu` (`no_menu`, `nama_menu`, `href`, `role`, `icon`) VALUES
(1, 'dashboard', '', '1', 'ti-dashboard'),
(2, 'Managemen Data', '#', '1', 'ti-dashboard'),
(3, 'Profile ', '#', '1', 'ti-dashboard'),
(4, 'tambah menu', 'admin/tambahMenu', '1', ' ti-plus '),
(5, 'dashboard', '#', '2', 'ti-dashboard'),
(6, 'Management data', '#', '2', 'ti-dashboard');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sekolah`
--

CREATE TABLE `tb_sekolah` (
  `npsn` int(11) NOT NULL,
  `nama_sekolah` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `jenjang` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_sekolah`
--

INSERT INTO `tb_sekolah` (`npsn`, `nama_sekolah`, `status`, `jenjang`, `logo`, `is_active`) VALUES
(10310590, 'SMAN 2 LUBUK SIKAPING', 'negri', 'sma', 'sman2.png', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `no_induk` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `kelamin` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `tingkat` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `no_induk`, `nama`, `tanggal`, `kelamin`, `agama`, `kelas`, `tingkat`, `jurusan`, `is_active`) VALUES
(23, 16101101, 'Rebbecca', '1998-10-05', 'L', 'Islam', '1', '1', 'ipa', 0),
(24, 16101102, 'Stevie', '1998-10-06', 'L', 'Islam', '2', '1', 'ipa', 0),
(25, 16101103, 'Mariko', '1998-10-07', 'L', 'Islam', '3', '1', 'ipa', 0),
(26, 16101104, 'Gerardo', '1998-10-08', 'L', 'Islam', '4', '1', 'ipa', 0),
(27, 16101105, 'Mayra', '1998-10-09', 'L', 'Islam', '1', '1', 'ipa', 0),
(28, 16101106, 'Idella', '1998-10-10', 'P', 'Islam', '2', '1', 'ipa', 0),
(29, 16101107, 'Sherill', '1998-10-11', 'P', 'Islam', '3', '1', 'ipa', 0),
(30, 16101108, 'Ena', '1998-10-12', 'P', 'Islam', '4', '1', 'ipa', 0),
(31, 16101109, 'Vince', '1998-10-13', 'P', 'Islam', '1', '1', 'ips', 0),
(32, 16101110, 'Theron', '1998-10-14', 'P', 'Islam', '2', '2', 'ips', 0),
(33, 16101111, 'Amira', '1998-10-15', 'P', 'Islam', '3', '2', 'ips', 0),
(34, 16101112, 'Marica', '1998-10-16', 'P', 'Islam', '4', '2', 'ips', 0),
(35, 16101113, 'Shawna', '1998-10-17', 'P', 'Islam', '1', '2', 'ips', 0),
(36, 16101114, 'Paulina', '1998-10-18', 'P', 'Islam', '2', '2', 'ips', 0),
(37, 16101115, 'Rose', '1998-10-19', 'L', 'Islam', '3', '2', 'ipa', 0),
(38, 16101116, 'Reita', '1998-10-20', 'L', 'Islam', '4', '3', 'ipa', 0),
(39, 16101117, 'Maybelle', '1998-10-21', 'L', 'Islam', '1', '3', 'ipa', 0),
(40, 16101118, 'Camellia', '1998-10-22', 'L', 'Islam', '2', '3', 'ipa', 0),
(41, 16101119, 'Roy', '1998-10-23', 'L', 'Islam', '3', '3', 'ipa', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sub_menu`
--

CREATE TABLE `tb_sub_menu` (
  `no_menu` int(11) NOT NULL,
  `sub_menu` varchar(25) NOT NULL,
  `href` varchar(25) NOT NULL,
  `role` varchar(25) NOT NULL,
  `menuUtama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_sub_menu`
--

INSERT INTO `tb_sub_menu` (`no_menu`, `sub_menu`, `href`, `role`, `menuUtama`) VALUES
(1, 'data guru', 'admin/dataGuru', '1', '2'),
(2, 'data siswa', 'admin/dataSiswa', '1', '2'),
(3, 'data sekolah', 'admin/dataSekolah', '1', '2'),
(4, 'user', 'user', '1', '3'),
(5, 'data pengguna', 'dataPengguna', '1', '2'),
(6, 'data Kelas', 'admin/dataKelas', '1', '2'),
(7, 'dataPelajaran', 'dataPelajaran', '2', '2'),
(8, 'Kelas Online', 'guru/kelasOnline', '2', '6'),
(9, 'Tugas', 'guru/tugas', '2', '6'),
(10, 'Ujian Online', 'guru/ujian', '2', '6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `no_induk` int(11) NOT NULL,
  `nama_lengkap` varchar(125) NOT NULL,
  `email` varchar(125) NOT NULL,
  `img_user` varchar(125) NOT NULL,
  `level` int(11) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `is_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `no_induk`, `nama_lengkap`, `email`, `img_user`, `level`, `password_user`, `is_created`) VALUES
(1, 16101, 'admin', 'admin@gmail.com', 'default.jpg', 1, '$2y$10$x2o.xmhM/G5T/bV/ryziHOZD8MEXC4M9I47IudA81SWgd2Ov3RMqu', '0000-00-00 00:00:00'),
(47, 171007, 'Linsey', 'ilham@gmail.com', '', 2, '$2y$10$Fz3kALo6M2na6yWDfZg6EuZXSAE.0rtmBmH8u5vU2uX7Ifk9Qr5MC', '2020-08-24 15:04:59');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `nip` (`no_induk`) USING BTREE;

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indeks untuk tabel `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`no_menu`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tb_sub_menu`
--
ALTER TABLE `tb_sub_menu`
  ADD PRIMARY KEY (`no_menu`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_log`
--
ALTER TABLE `tb_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_materi`
--
ALTER TABLE `tb_materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `no_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `tb_sub_menu`
--
ALTER TABLE `tb_sub_menu`
  MODIFY `no_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
