-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 24 Agu 2022 pada 04.24
-- Versi server: 5.7.33
-- Versi PHP: 8.0.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekuin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen_guru`
--

CREATE TABLE `absen_guru` (
  `id_absen` bigint(20) UNSIGNED NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_absen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip` int(11) NOT NULL,
  `nama_guru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mata_pelajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kehadiran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `absen_guru`
--

INSERT INTO `absen_guru` (`id_absen`, `tanggal`, `jam_absen`, `nip`, `nama_guru`, `mata_pelajaran`, `kelas`, `kehadiran`, `created_at`, `updated_at`) VALUES
(8, 'Rabu, 17 Agustus 2022', '20:02:10', 9999, 'Ilham,S.Kom', 'MP-001', 'KL-001', 'OP-001', NULL, NULL),
(9, 'Rabu, 17 Agustus 2022', '20:04:08', 9999, 'Ilham,S.Kom', 'MP-001', 'KL-002', 'OP-002', NULL, NULL),
(10, 'Kamis, 18 Agustus 2022', '20:58:24', 9999, 'Ilham,S.Kom', 'MP-001', 'KL-001', 'OP-002', NULL, NULL),
(11, 'Kamis, 18 Agustus 2022', '20:58:38', 9999, 'Ilham,S.Kom', 'MP-001', 'KL-002', 'OP-004', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` bigint(20) UNSIGNED NOT NULL,
  `nip` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_wa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama`, `tempat_lahir`, `tanggal_lahir`, `no_wa`, `email`, `alamat`, `jabatan`, `created_at`, `updated_at`) VALUES
(1, 9999, 'Ilham,S.Kom', 'Padang', '10 Oktober 2000', '081226560805', 'ilhamuntung1902@gmail.com', 'jl.Albahar bekasi utara kota bekasi', 'guru', '2022-08-17 10:36:57', '2022-08-17 10:36:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi`
--

CREATE TABLE `informasi` (
  `id_informasi` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` varchar(15000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_buat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kepsek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `judul`, `isi`, `tanggal_buat`, `nama_kepsek`, `created_at`, `updated_at`) VALUES
(1, 'PEMBAYARAN BIAYA SEKOLAH SEMESTER GANJIL TA.2021/2022', '<div><strong>Assalamualaikum Wr.Wb.<br>&nbsp; &nbsp; &nbsp;</strong>Memperhatikan kalender akademik tahun 2021/2022, bahswa pelaksanaan <strong>Ujian Tengah Semester (UTS) Ganjil TA 2021/2022 </strong>akan dilaksanakan tanggal <strong>06 s/d 12 Desember 2021</strong>. Untuk itu perlu kami informasikan kepada seluruh siswa terkait dengan pembayaran biaya sekolah:<br><br></div><ol><li>Salah satu syarat untuk mengikuti <strong>UTS </strong>adalah melunasi seluruh biaya sekolah Semester Ganjil T.A.2021/2022 (termasuk tunggakan semester sebelumnya), apabila belum bisa melunasinya,minimal adalah melakukan pembayaran 50% dari tagihan semester berjalan.</li><li>Pembayaran biaya semester ganjil 2021/2022 paling lambat tanggal <strong>30 November 2021</strong> via Setor Tunai atau transfer bank dengan beberapa alternatif sebagai berikut:<ul><li><strong>BRI </strong>dengan <strong>Nomor Rek: 0261.02.000.722.30.8 atas nama : SMK EKUIN PANGERAN JAYAKARTA </strong>dengan <strong>kode BRI : 002;</strong></li></ul></li><li>Bukti Transfer diserahkan ke kasir atau dikirim via <em>Whatsapp </em>ke <strong>081226560805,</strong> dengan mencantumkan <strong>Nama Lengkap + Kelas </strong>pada bukti Transfer untuk ditukar dengan kwitansi pembayaran.</li></ol><div>Demikian info yang saya dapat sampaikan. Atas perhatiannya terimakasih.<br><strong><em>Billahitaufiq Wal Hidayah<br>Wassalamualaikum Wr.Wb</em></strong></div><div><br></div>', 'Bekasi, 17 November 2021', 'Sofyan Sauri,S.pdi', '2022-08-17 10:36:57', '2022-08-17 10:36:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_mengajar`
--

CREATE TABLE `jadwal_mengajar` (
  `id_mengajar` bigint(20) UNSIGNED NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_mata_pelajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwal_mengajar`
--

INSERT INTO `jadwal_mengajar` (`id_mengajar`, `tanggal`, `jam`, `kode_kelas`, `kode_mata_pelajaran`, `nip`, `created_at`, `updated_at`) VALUES
(8, 'Rabu, 17 Agustus 2022', '19:54', 'KL-001', 'MP-001', '9999', NULL, NULL),
(9, 'Rabu, 17 Agustus 2022', '19:54', 'KL-002', 'MP-001', '9999', NULL, NULL),
(10, 'Kamis, 18 Agustus 2022', '13:50', 'KL-001', 'MP-001', '9999', NULL, NULL),
(11, 'Kamis, 18 Agustus 2022', '13:50', 'KL-002', 'MP-001', '9999', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` bigint(20) UNSIGNED NOT NULL,
  `kode_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `kode_jurusan`, `nama_jurusan`, `created_at`, `updated_at`) VALUES
(1, 'JR-001', 'Akutansi', '2022-08-17 10:36:57', '2022-08-17 10:36:57'),
(2, 'JR-002', 'Teknik Komputer & Jaringan', '2022-08-17 10:36:57', '2022-08-17 10:36:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` bigint(20) UNSIGNED NOT NULL,
  `kode_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kode_kelas`, `nama_kelas`, `created_at`, `updated_at`) VALUES
(1, 'KL-001', '10 TKJ A', '2022-08-17 10:36:57', '2022-08-17 10:36:57'),
(2, 'KL-002', '10 TKJ B', '2022-08-17 10:36:57', '2022-08-17 10:36:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_mata_pelajaran` bigint(20) UNSIGNED NOT NULL,
  `kode_mata_pelajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mata_pelajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_mata_pelajaran`, `kode_mata_pelajaran`, `nama_mata_pelajaran`, `created_at`, `updated_at`) VALUES
(1, 'MP-001', 'Bahasa Indonesia', '2022-08-17 10:36:57', '2022-08-17 10:36:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_16_073043_informasi', 1),
(6, '2022_07_17_092325_kelas', 1),
(7, '2022_07_18_115231_mata_pelajaran', 1),
(8, '2022_07_19_125150_jadwal_mengajar', 1),
(9, '2022_07_20_134855_siswa', 1),
(10, '2022_07_25_010524_guru', 1),
(11, '2022_07_31_192812_absen_guru', 1),
(12, '2022_08_06_175537_presensi_siswa', 1),
(13, '2022_08_16_221705_jurusan', 1),
(14, '2022_08_17_173307_opsi_kehadiran', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `opsi_kehadiran`
--

CREATE TABLE `opsi_kehadiran` (
  `id_kehadiran` bigint(20) UNSIGNED NOT NULL,
  `kode_kehadiran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kehadiran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `opsi_kehadiran`
--

INSERT INTO `opsi_kehadiran` (`id_kehadiran`, `kode_kehadiran`, `nama_kehadiran`, `created_at`, `updated_at`) VALUES
(1, 'OP-001', 'Hadir', '2022-08-17 10:36:57', '2022-08-17 10:36:57'),
(2, 'OP-002', 'Izin', '2022-08-17 10:36:57', '2022-08-17 10:36:57'),
(3, 'OP-003', 'Sakit', '2022-08-17 10:36:57', '2022-08-17 10:36:57'),
(4, 'OP-004', 'Tidak Hadir', '2022-08-17 10:36:57', '2022-08-17 10:36:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi_siswa`
--

CREATE TABLE `presensi_siswa` (
  `id_presensi` bigint(20) UNSIGNED NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_presensi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nisn` int(11) NOT NULL,
  `nama_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mata_pelajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kehadiran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Tidak Hadir',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `presensi_siswa`
--

INSERT INTO `presensi_siswa` (`id_presensi`, `tanggal`, `jam_presensi`, `nisn`, `nama_siswa`, `mata_pelajaran`, `kelas`, `nip`, `kehadiran`, `created_at`, `updated_at`) VALUES
(8, 'Rabu, 17 Agustus 2022', '20:01:01', 123456, 'wahyu', 'MP-001', 'KL-001', '9999', 'OP-002', NULL, NULL),
(9, 'Rabu, 17 Agustus 2022', '20:00:03', 92641, 'Rama Mendoza', 'MP-001', 'KL-002', '9999', 'OP-001', NULL, NULL),
(10, 'Kamis, 18 Agustus 2022', '20:57:48', 123456, 'wahyu', 'MP-001', 'KL-001', '9999', 'OP-001', NULL, NULL),
(11, 'Kamis, 18 Agustus 2022', '20:57:06', 92641, 'Rama Mendoza', 'MP-001', 'KL-002', '9999', 'OP-001', NULL, NULL),
(12, 'Sabtu, 20 Agustus 2022', '08:00', 124235, 'Panjul', 'MP-001', 'KL-001', '9999', 'OP-001', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` bigint(20) UNSIGNED NOT NULL,
  `NISN` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_masuk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `NISN`, `nama`, `tempat_lahir`, `tanggal_lahir`, `email`, `alamat`, `jurusan`, `tahun_masuk`, `kode_kelas`, `created_at`, `updated_at`) VALUES
(1, 123456, 'wahyu', 'Padang', '10 Oktober 2000', 'wahyu123@gmail.com', 'jl.Albahar bekasi utara kota bekasi', 'JR-002', '2022', 'KL-001', '2022-08-17 10:36:57', '2022-08-17 10:36:57'),
(2, 92641, 'Rama Mendoza', 'Jakarta', '12 Desember 2000', 'rama123@gmail.com', 'Royale Satria Residence Blok A No.4 Ds.Satria Jaya Kec.Tambun Utara Kab.Bekasi', 'JR-002', '2022', 'KL-002', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` int(11) DEFAULT NULL,
  `nisn` int(11) DEFAULT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `nip`, `nisn`, `kelas`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL, NULL, 'admin123@gmail.com', NULL, '$2y$10$sUMaU2WJWtGFUKJS7ekKxeab8u3qPT7c/GM/NcpZ6h3HDNSfDhz2u', 'admin', NULL, '2022-08-17 10:36:56', '2022-08-17 10:36:56'),
(2, 'Ilham,S.Kom', 9999, NULL, NULL, 'ilhamuntung1902@gmail.com', NULL, '$2y$10$T34oGQKACbE/zmk29mDHYupkll6GOOjdiloSMGX8b78dmNlU6gid6', 'guru', NULL, '2022-08-17 10:36:56', '2022-08-17 10:36:56'),
(3, 'wahyu', NULL, 123456, 'KL-001', 'wahyu123@gmail.com', NULL, '$2y$10$106VSg7vOdITxnFX1agSuOpLumBXw1cmUpc7o24iphXeCjW3c4136', 'siswa', NULL, '2022-08-17 10:36:57', '2022-08-17 10:36:57'),
(4, 'Rama Mendoza', NULL, 92641, 'KL-002', 'rama123@gmail.com', NULL, '$2y$10$wDaiUJTvqxTDpXhLek8XounhGg5I1uZcxtoLmXobmguKTSCN7.FFi', 'siswa', NULL, '2022-08-17 10:45:13', '2022-08-17 10:45:13');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen_guru`
--
ALTER TABLE `absen_guru`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indeks untuk tabel `jadwal_mengajar`
--
ALTER TABLE `jadwal_mengajar`
  ADD PRIMARY KEY (`id_mengajar`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_mata_pelajaran`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `opsi_kehadiran`
--
ALTER TABLE `opsi_kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `presensi_siswa`
--
ALTER TABLE `presensi_siswa`
  ADD PRIMARY KEY (`id_presensi`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen_guru`
--
ALTER TABLE `absen_guru`
  MODIFY `id_absen` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_informasi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jadwal_mengajar`
--
ALTER TABLE `jadwal_mengajar`
  MODIFY `id_mengajar` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_mata_pelajaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `opsi_kehadiran`
--
ALTER TABLE `opsi_kehadiran`
  MODIFY `id_kehadiran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `presensi_siswa`
--
ALTER TABLE `presensi_siswa`
  MODIFY `id_presensi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
