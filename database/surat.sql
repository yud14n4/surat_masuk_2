-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 31 Bulan Mei 2019 pada 01.34
-- Versi server: 5.7.24
-- Versi PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_golongan`
--

DROP TABLE IF EXISTS `m_golongan`;
CREATE TABLE IF NOT EXISTS `m_golongan` (
  `Golongan_ID` int(3) NOT NULL AUTO_INCREMENT,
  `Golongan_Name` varchar(30) NOT NULL,
  `Golongan_Description` varchar(100) DEFAULT NULL,
  `Golongan_Pangkat` varchar(50) NOT NULL,
  `Golongan_PangkatDesc` varchar(100) DEFAULT NULL,
  `Input_Date` datetime NOT NULL,
  `Input_By` int(2) NOT NULL,
  `Update_Date` datetime DEFAULT NULL,
  `Update_By` int(2) DEFAULT NULL,
  PRIMARY KEY (`Golongan_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `m_golongan`
--

INSERT INTO `m_golongan` (`Golongan_ID`, `Golongan_Name`, `Golongan_Description`, `Golongan_Pangkat`, `Golongan_PangkatDesc`, `Input_Date`, `Input_By`, `Update_Date`, `Update_By`) VALUES
(11, 'I/C', '-', 'Juru', '-', '2019-05-30 00:00:00', 1, NULL, NULL),
(13, 'II/A', '-', 'Pengatur Muda', '-', '2019-05-30 00:00:00', 1, NULL, NULL),
(9, 'I/A', '-', 'Juru Muda', '-', '2019-05-30 00:00:00', 1, NULL, NULL),
(6, 'II/B', '-', 'Pengatur Muda Tk.1', NULL, '2019-05-30 00:00:00', 1, NULL, NULL),
(12, 'I/D', '-', 'Juru Tk.1', '-', '2019-05-30 00:00:00', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_index_surat`
--

DROP TABLE IF EXISTS `m_index_surat`;
CREATE TABLE IF NOT EXISTS `m_index_surat` (
  `Index_Surat_ID` int(6) NOT NULL AUTO_INCREMENT,
  `Index_Surat_Name` varchar(50) NOT NULL,
  `Index_Surat_Description` varchar(100) DEFAULT NULL,
  `Input_Date` datetime NOT NULL,
  `Input_By` int(2) NOT NULL,
  `Update_Date` datetime DEFAULT NULL,
  `Update_By` int(2) DEFAULT NULL,
  PRIMARY KEY (`Index_Surat_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `m_index_surat`
--

INSERT INTO `m_index_surat` (`Index_Surat_ID`, `Index_Surat_Name`, `Index_Surat_Description`, `Input_Date`, `Input_By`, `Update_Date`, `Update_By`) VALUES
(1, 'Penting', '-', '2019-05-30 00:00:00', 1, NULL, NULL),
(2, 'Rahasia', '-', '2019-05-30 00:00:00', 1, NULL, NULL),
(3, 'Segera', '-', '2019-05-30 00:00:00', 1, NULL, NULL),
(4, 'Biasa', 'Biasa Surat', '2019-05-30 00:00:00', 1, '2019-05-30 00:00:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_jenis_surat`
--

DROP TABLE IF EXISTS `m_jenis_surat`;
CREATE TABLE IF NOT EXISTS `m_jenis_surat` (
  `Jenis_Surat_ID` int(6) NOT NULL AUTO_INCREMENT,
  `Jenis_Surat_Name` varchar(50) NOT NULL,
  `Jenis_Surat_Description` varchar(100) DEFAULT NULL,
  `Input_Date` datetime NOT NULL,
  `Input_By` int(2) NOT NULL,
  `Update_Date` datetime DEFAULT NULL,
  `Update_By` int(2) DEFAULT NULL,
  PRIMARY KEY (`Jenis_Surat_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `m_jenis_surat`
--

INSERT INTO `m_jenis_surat` (`Jenis_Surat_ID`, `Jenis_Surat_Name`, `Jenis_Surat_Description`, `Input_Date`, `Input_By`, `Update_Date`, `Update_By`) VALUES
(1, 'Surat Undangan', '-', '2019-05-30 00:00:00', 1, NULL, NULL),
(2, 'Surat Keputusan', '-', '2019-05-30 00:00:00', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_media_arsip`
--

DROP TABLE IF EXISTS `m_media_arsip`;
CREATE TABLE IF NOT EXISTS `m_media_arsip` (
  `MediaArsip_ID` int(6) NOT NULL AUTO_INCREMENT,
  `MediaArsip_Name` varchar(50) NOT NULL,
  `MediaArsip_Desc` text NOT NULL,
  `Input_Date` datetime NOT NULL,
  `Input_By` int(3) NOT NULL,
  `Update_Date` datetime DEFAULT NULL,
  `Update_By` int(3) DEFAULT NULL,
  PRIMARY KEY (`MediaArsip_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `m_media_arsip`
--

INSERT INTO `m_media_arsip` (`MediaArsip_ID`, `MediaArsip_Name`, `MediaArsip_Desc`, `Input_Date`, `Input_By`, `Update_Date`, `Update_By`) VALUES
(5, 'Rak-0001', 'Rak urutan Nomor 1', '2019-05-30 00:00:00', 1, NULL, NULL),
(6, 'Rak-0002', 'Rak urutan Nomor 2', '2019-05-30 00:00:00', 1, NULL, NULL),
(7, 'Arsip-0001', 'Arsip Urutan Nomor 1', '2019-05-30 00:00:00', 1, '2019-05-30 00:00:00', 1),
(8, 'Arsip-0002', 'Arsip Urutan Nomor 2', '2019-05-30 00:00:00', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_penerima`
--

DROP TABLE IF EXISTS `m_penerima`;
CREATE TABLE IF NOT EXISTS `m_penerima` (
  `Customer_ID` int(6) NOT NULL AUTO_INCREMENT,
  `Customer_Name` varchar(50) NOT NULL,
  `Customer_NIP` varchar(30) NOT NULL,
  `Customer_GolID` int(6) NOT NULL,
  `Input_Date` datetime NOT NULL,
  `Input_By` int(2) NOT NULL,
  `Update_Date` datetime DEFAULT NULL,
  `Update_By` int(2) DEFAULT NULL,
  PRIMARY KEY (`Customer_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `m_penerima`
--

INSERT INTO `m_penerima` (`Customer_ID`, `Customer_Name`, `Customer_NIP`, `Customer_GolID`, `Input_Date`, `Input_By`, `Update_Date`, `Update_By`) VALUES
(1, 'Yudiana', '12345678', 6, '2019-05-30 00:00:00', 1, '2019-05-30 00:00:00', 1),
(3, 'Arief Manggala', '3423444444', 12, '2019-05-30 00:00:00', 1, '2019-05-30 00:00:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_surat_masuk`
--

DROP TABLE IF EXISTS `t_surat_masuk`;
CREATE TABLE IF NOT EXISTS `t_surat_masuk` (
  `SuratM_ID` int(30) NOT NULL AUTO_INCREMENT,
  `SuratM_InputDate` date NOT NULL,
  `SuratM_AsalSurat` varchar(100) NOT NULL,
  `SuratM_NoSurat` varchar(20) NOT NULL,
  `SuratM_IndexSuratID` int(6) NOT NULL,
  `SuratM_DateSurat` date NOT NULL,
  `SuratM_JenisSuratID` int(6) NOT NULL,
  `SuratM_Perihal` text NOT NULL,
  `SuratM_Tujuan` varchar(100) NOT NULL,
  `SuratM_Keterangan` text NOT NULL,
  `SuratM_PenerimaSurat` varchar(50) NOT NULL,
  `SuratM_KodeArsip` varchar(50) NOT NULL,
  `SuratM_FileArsip` text NOT NULL,
  `Input_Date` datetime NOT NULL,
  `Input_By` int(2) NOT NULL,
  `Update_Date` datetime DEFAULT NULL,
  `Update_By` int(2) DEFAULT NULL,
  PRIMARY KEY (`SuratM_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `t_surat_masuk`
--

INSERT INTO `t_surat_masuk` (`SuratM_ID`, `SuratM_InputDate`, `SuratM_AsalSurat`, `SuratM_NoSurat`, `SuratM_IndexSuratID`, `SuratM_DateSurat`, `SuratM_JenisSuratID`, `SuratM_Perihal`, `SuratM_Tujuan`, `SuratM_Keterangan`, `SuratM_PenerimaSurat`, `SuratM_KodeArsip`, `SuratM_FileArsip`, `Input_Date`, `Input_By`, `Update_Date`, `Update_By`) VALUES
(2, '2019-05-31', 'Mentri Agama', 'II/234/XII/19/0001', 2, '2019-05-30', 2, 'OK hal', 'Mentri Agama', 'Ok keterangan', 'Yudiana Dulu', '7', 'Manipulasi_Combobox_dan_Textbox_dengan_Ajax_JQuery_Achmatim.Net.pdf', '2019-05-30 00:00:00', 1, '2019-05-31 00:00:00', 1),
(3, '2019-05-31', 'Mentri Agama', 'II/234/XII/19/0002', 1, '2019-05-30', 1, 'Mengundang', 'Teknik Sipiln Mentri Agama', 'OK', 'Yudiana Dulu', '5', 'und up buka Dikpa Karfi 2019.pdf', '2019-05-30 00:00:00', 1, '2019-05-31 00:00:00', 1),
(4, '2019-05-30', 'Mentri Agama', 'II/234/XII/19/0003', 3, '2019-05-30', 2, '-', 'Teknik Sipiln Mentri Agama', 'ok', 'Yudiana Dulu', '7', 'WMS-DEV Report Release.pdf', '2019-05-30 00:00:00', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin_surat', 'admin_surat@admin.com', NULL, '$2y$10$qcUgmhojD7BNddySdaE/g.KvyCvyH5jXYJopcellfeczIU8xsWRpm', NULL, '2019-05-26 23:21:24', '2019-05-26 23:21:24'),
(2, 'admin_surat_view', 'admin_surat_view@admin.com', NULL, '$2y$10$l67IbnkdqznVidAt7mWZHugbQWeCqQBJ5U/eMLx7aGTwFZY7fEmgm', NULL, '2019-05-27 00:11:14', '2019-05-27 00:11:14');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
