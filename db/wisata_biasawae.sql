-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 26 Jul 2021 pada 10.37
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisata_biasawae`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `adminx`
--

CREATE TABLE `adminx` (
  `kd` varchar(50) NOT NULL,
  `usernamex` varchar(100) DEFAULT NULL,
  `passwordx` varchar(100) DEFAULT NULL,
  `postdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `adminx`
--

INSERT INTO `adminx` (`kd`, `usernamex`, `passwordx`, `postdate`) VALUES
('21232f297a57a5a743894a0e4a801fc3', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2020-10-24 09:43:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cp_artikel`
--

CREATE TABLE `cp_artikel` (
  `kd` varchar(50) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `isi` longtext DEFAULT NULL,
  `postdate` datetime DEFAULT NULL,
  `filex` longtext DEFAULT NULL,
  `jml_dilihat` varchar(100) DEFAULT '0',
  `jml_komentar` varchar(100) DEFAULT '0',
  `jml_suka` varchar(100) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cp_artikel`
--

INSERT INTO `cp_artikel` (`kd`, `judul`, `isi`, `postdate`, `filex`, `jml_dilihat`, `jml_komentar`, `jml_suka`) VALUES
('09a549be0ed16fc66c18f8070b251c78', 'artikel 1', 'xkkirixpxkkananxdetail artikel 1xkkirixxgmringxpxkkananx', '2021-07-26 09:39:52', '09a549be0ed16fc66c18f8070b251c78-1.png', '0', '0', '0'),
('e6e6b9149656f09795b53a7869ff7c44', 'artikel 2', 'xkkirixpxkkananxdetail artikel 2xkkirixxgmringxpxkkananx', '2021-07-26 09:40:12', 'e6e6b9149656f09795b53a7869ff7c44-1.png', '0', '0', '0'),
('c89d58e2af8d76bd97d8d2dd4bc0e186', 'artikel 3', 'xkkirixpxkkananxdetail artikel 3xkkirixxgmringxpxkkananx', '2021-07-26 09:40:28', 'c89d58e2af8d76bd97d8d2dd4bc0e186-1.png', '2', '2', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cp_artikel_komentar`
--

CREATE TABLE `cp_artikel_komentar` (
  `kd` varchar(50) NOT NULL,
  `kd_artikel` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` longtext NOT NULL,
  `isi` longtext NOT NULL,
  `postdate` datetime NOT NULL,
  `aktif` enum('true','false') NOT NULL DEFAULT 'false'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cp_artikel_komentar`
--

INSERT INTO `cp_artikel_komentar` (`kd`, `kd_artikel`, `nama`, `email`, `isi`, `postdate`, `aktif`) VALUES
('c797bfcd079895d34a758f60927784bf', 'c89d58e2af8d76bd97d8d2dd4bc0e186', 'coba', 'cobaxtkeongxgmail.com', 'coba isi komentar...', '2021-07-26 09:50:14', 'true'),
('1bc6a16b46fcef342cfadb10b9d575f3', 'c89d58e2af8d76bd97d8d2dd4bc0e186', 'ADMIN', '', 'ok deh...', '2021-07-26 09:53:42', 'true'),
('468d1fed268a8d2a7873f04f235b56b7', 'c89d58e2af8d76bd97d8d2dd4bc0e186', 'okk', 'okkxtkeongxgmail.com', 'okk...', '2021-07-26 09:57:39', 'false');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cp_bukutamu`
--

CREATE TABLE `cp_bukutamu` (
  `kd` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` longtext NOT NULL,
  `telp` varchar(100) NOT NULL,
  `email` longtext NOT NULL,
  `situs` longtext NOT NULL,
  `isi` longtext NOT NULL,
  `postdate` datetime NOT NULL,
  `aktif` enum('true','false') NOT NULL DEFAULT 'false'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cp_bukutamu`
--

INSERT INTO `cp_bukutamu` (`kd`, `nama`, `alamat`, `telp`, `email`, `situs`, `isi`, `postdate`, `aktif`) VALUES
('c8caa5897f0b456601a431e4d01a30ee', 'agus muhajir', 'kendal', '0818298854', 'hajirodeonxtkeongxgmail.com', 'http:xgmringxxgmringxgithub.comxgmringxhajirodeon', 'coba isi buku tamu...', '2021-07-26 09:49:07', 'false');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cp_g_foto`
--

CREATE TABLE `cp_g_foto` (
  `kd` varchar(50) NOT NULL,
  `nama` longtext DEFAULT NULL,
  `filex` longtext DEFAULT NULL,
  `postdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `cp_g_foto`
--

INSERT INTO `cp_g_foto` (`kd`, `nama`, `filex`, `postdate`) VALUES
('0d2fa7aad1d4050d45e067518c4c9ac1', 'foto 1', '0d2fa7aad1d4050d45e067518c4c9ac1-1.png', '2021-07-26 09:33:48'),
('8ce74ea8e8eeb1986862114055676e0e', 'foto 2', '8ce74ea8e8eeb1986862114055676e0e-1.png', '2021-07-26 09:33:55'),
('cf980119ca60da859bf324dba61afcbd', 'foto 3', 'cf980119ca60da859bf324dba61afcbd-1.png', '2021-07-26 09:34:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cp_m_slideshow`
--

CREATE TABLE `cp_m_slideshow` (
  `kd` varchar(50) NOT NULL,
  `filex` longtext DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `isi` longtext DEFAULT NULL,
  `postdate` datetime DEFAULT NULL,
  `urlnya` longtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `cp_m_slideshow`
--

INSERT INTO `cp_m_slideshow` (`kd`, `filex`, `nama`, `isi`, `postdate`, `urlnya`) VALUES
('edbeac19fb0ab381a74186ac8ef4f4e0', 'edbeac19fb0ab381a74186ac8ef4f4e0-1.jpg', 'wisata 1', 'tentang wisata 1', '2021-07-26 09:32:55', ''),
('631cb230f1407bf1c42be53b8dbe28a9', '631cb230f1407bf1c42be53b8dbe28a9-1.jpg', 'wisata 2', 'tentang wisata 2', '2021-07-26 09:33:16', ''),
('012608ca862d58db578201e3334d9e35', '012608ca862d58db578201e3334d9e35-1.jpg', 'wisata 3', 'tentang wisata 3', '2021-07-26 09:33:30', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cp_profil`
--

CREATE TABLE `cp_profil` (
  `kd` varchar(50) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` longtext NOT NULL,
  `postdate` datetime NOT NULL,
  `x_lat` longtext NOT NULL,
  `x_long` longtext NOT NULL,
  `fb` longtext NOT NULL,
  `twitter` longtext NOT NULL,
  `youtube` longtext NOT NULL,
  `wa` longtext NOT NULL,
  `alamat` longtext NOT NULL,
  `telp` longtext NOT NULL,
  `web` longtext NOT NULL,
  `fax` longtext NOT NULL,
  `email` longtext NOT NULL,
  `filex` longtext NOT NULL,
  `alamat_googlemap` longtext NOT NULL,
  `instagram` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cp_profil`
--

INSERT INTO `cp_profil` (`kd`, `judul`, `isi`, `postdate`, `x_lat`, `x_long`, `fb`, `twitter`, `youtube`, `wa`, `alamat`, `telp`, `web`, `fax`, `email`, `filex`, `alamat_googlemap`, `instagram`) VALUES
('e807f1fcf82d132f9bb018ca6738a19f', 'WISATA BIASAWAE', 'BIASAKAN HIDUP SEPERTI BIASA. BIASAWAE', '2021-07-26 09:27:29', 'xstrix6.921924', '110.2042707', 'hajirodeon', 'hajirodeon', 'hajirodeon', '0818298854', 'Jl. Raya BIASAWAE...', '0818298854', 'https:xgmringxxgmringxgithub.comxgmringxhajirodeon', '0818298854', 'hajirodeonxtkeongxgmail.com', 'logo.jpg', 'Kabupaten Lampung Timur, Lampung', 'hajirodeon');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cp_visitor`
--

CREATE TABLE `cp_visitor` (
  `kd` varchar(50) NOT NULL,
  `ipnya` varchar(100) DEFAULT NULL,
  `postdate` datetime DEFAULT NULL,
  `online` enum('true','false') DEFAULT 'false'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `cp_visitor`
--

INSERT INTO `cp_visitor` (`kd`, `ipnya`, `postdate`, `online`) VALUES
('a5fcb1613c82b1d99eca75198843c9c5', '127.0.0.1', '2020-10-24 15:51:31', 'false'),
('6f0cc941ad4ff9e1ee848a7b7ee532a2', '127.0.0.1', '2020-10-24 16:35:48', 'false'),
('7aa60143b90bb464f02877e8caef8950', '127.0.0.1', '2020-10-24 17:17:35', 'true'),
('e3374976963bc2e4597159a6fae16b1a', '127.0.0.1', '2020-10-25 03:29:04', 'false'),
('7f7551fd9542453473f04d8f53e4925f', '127.0.0.1', '2020-10-25 03:31:05', 'false'),
('d8fe89e9aeb81bc246a6be71da0dce3d', '127.0.0.1', '2020-10-25 03:31:09', 'false'),
('9a8939bb4cc80608800fa13bbd152099', '127.0.0.1', '2020-10-25 03:31:56', 'false'),
('a0aeddb3a1382747be67e94e123f34d3', '127.0.0.1', '2020-10-25 03:32:02', 'false'),
('5df977b863ea9aff4b83652adc434afa', '127.0.0.1', '2020-10-25 03:33:49', 'false'),
('6bafdb029ffd599adc6c4fe486e63aab', '127.0.0.1', '2020-10-25 03:34:37', 'false'),
('e652ced39d8a7da1e6e91dd15b2cb5ee', '127.0.0.1', '2020-10-25 03:35:32', 'false'),
('53deaa7c59a5862ccb13563b40f2423f', '127.0.0.1', '2020-10-25 03:35:36', 'false'),
('d6a1f46727850bdb4629942dc7a647eb', '127.0.0.1', '2020-10-25 03:35:42', 'false'),
('bf6ce8e69ec89687c3d9700f033456e2', '127.0.0.1', '2020-10-25 03:36:04', 'false'),
('19819f47a0fe456c66635984c89ac88b', '127.0.0.1', '2020-10-25 03:36:05', 'false'),
('c25c764e61556c885b50cebc8163822c', '127.0.0.1', '2020-10-25 03:36:29', 'false'),
('c5e57399e4ff76ecc42c90bba47bef4c', '127.0.0.1', '2020-10-25 03:36:41', 'false'),
('159b5921f4cb5eb0ef6ce6e5e9a68081', '127.0.0.1', '2020-10-25 03:36:45', 'false'),
('0e1705efb8248269407b379f9bb13590', '127.0.0.1', '2020-10-25 03:36:46', 'false'),
('fdee8ef1b1d6d432a5c5d50cbd443a8e', '127.0.0.1', '2020-10-25 03:36:59', 'false'),
('df42bb02ad1f5d927c752bd214c8ad92', '127.0.0.1', '2020-10-25 03:37:30', 'false'),
('f4f95a0c54784a2c2dd18c83834959ca', '127.0.0.1', '2020-10-25 03:37:32', 'false'),
('74e07e3316fc7a971f5c5dae9d538d2e', '127.0.0.1', '2020-10-25 03:37:32', 'false'),
('a5817f40aff46feb9f7933189c330436', '127.0.0.1', '2020-10-25 03:37:35', 'false'),
('f5c584a593ed6e8f4fba592f22430f9b', '127.0.0.1', '2020-10-25 03:37:35', 'false'),
('9194b987014f7e85c6a2abcc189c4eb7', '127.0.0.1', '2020-10-25 03:37:42', 'false'),
('29bf8f6e7e40bb554600942b1d3ab690', '127.0.0.1', '2020-10-25 03:37:42', 'false'),
('5958643b6ebb724ea14c5d06744ee85d', '127.0.0.1', '2020-10-25 03:37:46', 'false'),
('d279578381e7517ddec371265eff251e', '127.0.0.1', '2020-10-25 03:37:46', 'false'),
('f5cc810f6e24b5d668923fb63fa1f45d', '127.0.0.1', '2020-10-25 03:38:45', 'false'),
('b2770fd49ece7833a4fb37bc829fe8ee', '127.0.0.1', '2020-10-25 03:38:46', 'false'),
('681bb5e77c37030996e5d4a8b3ba20a6', '127.0.0.1', '2020-10-25 03:38:54', 'false'),
('2caeb2b46ecad706a2879e8c2f488229', '127.0.0.1', '2020-10-25 03:38:54', 'false'),
('18562efad32efc413201e5e400bf350a', '127.0.0.1', '2020-10-25 03:38:55', 'false'),
('310031ce39f7dccde20382be474d7249', '127.0.0.1', '2020-10-25 03:38:55', 'false'),
('b58b4bb27fe879dbeec30d102b461538', '127.0.0.1', '2020-10-25 03:39:48', 'false'),
('58e813816047f6226bb8c515a52f7ed4', '127.0.0.1', '2020-10-25 03:39:49', 'false'),
('fc77c9f98be08f030f60feec25eab3aa', '127.0.0.1', '2020-10-25 03:39:54', 'false'),
('295b668ceb4edf5b99a6b15956dae4aa', '127.0.0.1', '2020-10-25 03:39:58', 'false'),
('5fde332bfe2995566c67c9e653a408a2', '127.0.0.1', '2020-10-25 03:40:05', 'false'),
('c4105b44c72ae7b741ffe0069a0f5226', '127.0.0.1', '2020-10-25 03:40:10', 'false'),
('8c240a4ac6ec8efc19161772d1adc73b', '127.0.0.1', '2020-10-25 03:40:22', 'false'),
('0fd6c194ccee71e1a35fa5bde069f10b', '127.0.0.1', '2020-10-25 03:40:26', 'false'),
('8c42b381c204007262feaf731e90bd96', '127.0.0.1', '2020-10-25 03:43:03', 'false'),
('cf214fd0bc1c513144c751643c8f64e7', '127.0.0.1', '2020-10-25 03:43:04', 'false'),
('78b55fcf4356cafd6faf02fde7b59c3d', '127.0.0.1', '2020-10-25 03:43:11', 'false'),
('a3bdcd328da241ee7d94967c00b8c8fc', '127.0.0.1', '2020-10-25 03:43:28', 'false'),
('77fa32aa0030f34a902808dea483a9c6', '127.0.0.1', '2020-10-25 03:43:34', 'false'),
('9833685f839e6e6271414c7780bd91be', '127.0.0.1', '2020-10-25 03:44:35', 'false'),
('217d57abac8a2df54b8a6d90bc5caac4', '127.0.0.1', '2020-10-25 03:44:38', 'false'),
('9eefb7bcdd8e3fa0fc17f0e709777912', '127.0.0.1', '2020-10-25 03:44:44', 'false'),
('acf0879ad121d683a06064b37c447faa', '127.0.0.1', '2020-10-25 03:44:55', 'false'),
('55fc8b219a7efe2fa46cde55254031a5', '127.0.0.1', '2020-10-25 03:44:58', 'false'),
('9a308f685ec6ffd6add7570bee898209', '127.0.0.1', '2020-10-25 03:45:06', 'false'),
('8db7bbcde397585bddb89b9e3b0d75e5', '127.0.0.1', '2020-10-25 03:45:13', 'false'),
('5115905364c120dbd26cdbe9ee10af77', '127.0.0.1', '2020-10-25 03:45:19', 'false'),
('93612b593daca2440baeabd327688c73', '127.0.0.1', '2020-10-25 03:46:43', 'false'),
('b8321907a11fb98d491eac7a2d58545e', '127.0.0.1', '2020-10-25 03:46:44', 'false'),
('7c55d3807acd259e5eec2650d08a4d0d', '127.0.0.1', '2020-10-25 03:46:45', 'false'),
('acb27acbe0ab1709eb43dcbe48cc045f', '127.0.0.1', '2020-10-25 03:47:06', 'false'),
('e3c5986249e21cad5ad428196079f048', '127.0.0.1', '2020-10-25 03:48:00', 'false'),
('e0c50e4ef3c3ed59a18f8de2f0928027', '127.0.0.1', '2020-10-25 03:49:47', 'false'),
('c2e60201e813baffc1ee4bdf18b856cc', '127.0.0.1', '2020-10-25 08:29:52', 'true'),
('deafdb8c96fd367dd1f2a0bd7dca1db6', '127.0.0.1', '2020-10-25 08:32:12', 'true'),
('9c5a86044259bc0f3ca50dede43bac6f', '127.0.0.1', '2020-10-25 08:35:47', 'true'),
('a0e8f0d567c069846a4f40ff1379682a', '127.0.0.1', '2020-10-27 03:47:18', 'false'),
('fb02aa1926bd9d4ce6f1bdf03ba2f304', '127.0.0.1', '2020-10-27 03:52:54', 'false'),
('c917c9a19c3953f955540626aef2326b', '127.0.0.1', '2020-10-27 03:52:59', 'false'),
('6db5a0d0c327d0abb72c91d6328def01', '127.0.0.1', '2020-10-27 03:53:01', 'false'),
('f51f8760f38f3932af2e70d95f7bbc9d', '127.0.0.1', '2020-10-27 03:53:21', 'false'),
('0cce164c36263f26820d9e81973bc06c', '127.0.0.1', '2020-10-27 03:53:36', 'false'),
('72f14f6a4c41386eb3cafc491fed1653', '127.0.0.1', '2020-10-27 03:57:57', 'false'),
('8837b66fa3727f017625dbc0d26b61c3', '127.0.0.1', '2020-10-27 04:02:43', 'false'),
('e5abfe840ddeddc3a8bb8b46ffd82e7f', '127.0.0.1', '2020-10-27 04:24:37', 'false'),
('7e43d1fc0a2d5bc6144255935e63ebc8', '127.0.0.1', '2020-10-27 04:41:08', 'false'),
('7cd4d47ad97c75b07b888635d75c0bb5', '127.0.0.1', '2020-10-27 04:41:10', 'false'),
('340c78fa82b276cb919e37e5b22e4c96', '127.0.0.1', '2020-10-27 04:41:13', 'false'),
('3b2a84cca7bdb1063815669d780ea28e', '127.0.0.1', '2020-10-27 04:41:39', 'false'),
('01c9096ef4489ffcf6ba94501b0b5d85', '127.0.0.1', '2020-10-27 04:42:24', 'false'),
('30b1861a3c301d4e0e3150cbdac310c3', '127.0.0.1', '2020-10-27 04:44:36', 'false'),
('ae824ecb2d0deafb526f65496d084145', '127.0.0.1', '2020-10-27 04:44:37', 'false'),
('540aee799f8862080c9a9bd907f31e8b', '127.0.0.1', '2020-10-27 04:45:00', 'false'),
('06a2d5bb15bd0010a7b4b6dfd8dfaa86', '127.0.0.1', '2020-10-27 04:48:10', 'false'),
('fd1d9e964e726fd2c0a6f00d3d3de969', '127.0.0.1', '2020-10-27 04:49:44', 'false'),
('909cd6baa2bc649667dca5a79aca0dbd', '127.0.0.1', '2020-10-27 04:49:45', 'false'),
('ed577e1aee90331a77f92292a36e1ee6', '127.0.0.1', '2020-10-27 04:50:09', 'false'),
('74d20dbd6800d41076807b9cf97b9205', '127.0.0.1', '2020-10-27 04:50:09', 'false'),
('ad8777248b0c5544c4e2aadb9fd3176d', '127.0.0.1', '2020-10-27 04:50:10', 'false'),
('0b945fcc01b623673c670ba881cce05b', '127.0.0.1', '2020-10-27 04:50:47', 'false'),
('bb1cbe50cef171161cad52aba88101e3', '127.0.0.1', '2020-10-27 04:50:50', 'false'),
('88fc81c9202623fc95335335a2457b0b', '127.0.0.1', '2020-10-27 04:50:51', 'false'),
('6620f55265b2bd90d16ba43486d4f111', '127.0.0.1', '2020-10-27 04:51:05', 'false'),
('a7ec7282199a2bdd638f630d9a74cc4d', '127.0.0.1', '2020-10-27 04:51:06', 'false'),
('9608be471ace8d6f035de460359f7057', '127.0.0.1', '2020-10-27 04:55:26', 'false'),
('4164c7533cf45e415b2eb1529da6eaba', '127.0.0.1', '2020-10-27 04:55:27', 'false'),
('f6ef7d55f434234c36348194d35a9271', '127.0.0.1', '2020-10-27 04:56:10', 'false'),
('f0cdc1587e7e06dbf8db08a28f81482c', '127.0.0.1', '2020-10-27 04:56:11', 'false'),
('418a570a9d40bcf32c3656e0edb874fc', '127.0.0.1', '2020-10-27 04:56:11', 'false'),
('fdd1fcae421c68f58b0a8238a35691cf', '127.0.0.1', '2020-10-27 04:56:12', 'false'),
('faf615a18257c7f2be0176c11f2bc427', '127.0.0.1', '2020-10-27 04:57:46', 'false'),
('a534695cabfb66d4db08ff048bb7cf91', '127.0.0.1', '2020-10-27 04:57:47', 'false'),
('5a9fac3f693c619b197683fa280b3e6a', '127.0.0.1', '2020-10-27 05:02:39', 'true'),
('ad4db91f17ea03b3b250ec9ce331f791', '127.0.0.1', '2020-10-27 05:02:47', 'true'),
('c4e76b5ae6e3c64923b965228099b7a6', '127.0.0.1', '2020-10-27 05:04:44', 'true'),
('3238daa5d611dacee6d292c527b4c971', '127.0.0.1', '2020-10-27 05:07:29', 'true'),
('02f9a4f26b759173762a6e9918bb3dd0', '127.0.0.1', '2020-10-27 05:07:57', 'true'),
('3269b7586fe297e49850eab53465ad75', '127.0.0.1', '2020-10-27 05:07:58', 'true'),
('56e2d1ef33b5d83451e3dca9bd1a5f15', '127.0.0.1', '2020-10-27 05:08:02', 'true'),
('4a4c2fab9441d04dfb7acb77486b9e1f', '127.0.0.1', '2020-10-27 05:08:54', 'true'),
('e18d8acbf5937aa09b6acd531475a147', '127.0.0.1', '2020-10-27 05:15:43', 'true'),
('4d4e3be86d64936bf68066acaa1b480c', '127.0.0.1', '2020-10-28 03:23:33', 'false'),
('4fefb6fe904c73868864f8cfed0a5d4a', '127.0.0.1', '2020-10-28 03:23:48', 'false'),
('ffb9d17b813e5e4fe7f228932e137b08', '127.0.0.1', '2020-10-28 03:23:53', 'false'),
('0b6afb9e5cdc138092744110dfc63c61', '127.0.0.1', '2020-10-28 03:26:05', 'false'),
('84a46b6a8621f224d436df42c3f4356a', '127.0.0.1', '2020-10-28 03:30:05', 'false'),
('919c4e034bac10d09f305abc61b9d3d7', '127.0.0.1', '2020-10-28 03:30:32', 'false'),
('13a42f5cd1599cc977a9e5678a469967', '127.0.0.1', '2020-10-28 03:31:00', 'false'),
('1b6d79cbd0d300d33b96601b8a96b695', '127.0.0.1', '2020-10-28 03:35:10', 'false'),
('648ba646a9ff79b32e0713e46c53fdf3', '127.0.0.1', '2020-10-28 03:37:51', 'false'),
('5ce4b3755e90d03ee50a904d912efd7b', '127.0.0.1', '2020-10-28 03:38:25', 'false'),
('11ff2e4c45acab215ca175adf85d065f', '127.0.0.1', '2020-10-28 03:38:26', 'false'),
('7da6e447230904c5b50ed277ddd20e2e', '127.0.0.1', '2020-10-28 03:39:20', 'false'),
('7aa4fb9bc1a00e583b8354507d3be429', '127.0.0.1', '2020-10-28 03:39:21', 'false'),
('f032e4a73f6217f371800063c0ff837a', '127.0.0.1', '2020-10-28 03:41:37', 'false'),
('80387f93ffd9d6bcf41bab366bc1a302', '127.0.0.1', '2020-10-28 03:41:58', 'false'),
('dcafd16381a385e4612b2ec302856748', '127.0.0.1', '2020-10-28 03:42:37', 'false'),
('0e713eff206c56379adbb5ad1cf35759', '127.0.0.1', '2020-10-28 03:42:55', 'false'),
('7a9b044f71a0e63cfb4bc85d4c5ac3e0', '127.0.0.1', '2020-10-28 03:43:25', 'false'),
('4e55db0396a3a567adf94a01d90a0118', '127.0.0.1', '2020-10-28 03:43:47', 'false'),
('4603f3b8535aa24b47546fbd3598ec5d', '127.0.0.1', '2020-10-28 03:48:26', 'false'),
('d713c9b59054f90055aa2a0b8a874f39', '127.0.0.1', '2020-10-28 03:49:48', 'false'),
('3c5d225070925c882cb107ca80e7b328', '127.0.0.1', '2020-10-28 03:50:29', 'false'),
('1e67b6e182763aba4d52eed5e524e620', '127.0.0.1', '2020-10-28 03:50:33', 'false'),
('8593b28262f7fc7680ea820c58ff20e4', '127.0.0.1', '2020-10-28 03:50:43', 'false'),
('728481b25c76513bd0131ca973b11427', '127.0.0.1', '2020-10-28 04:03:33', 'false'),
('2a530d134bb6a9205b63b37dc57d8e20', '127.0.0.1', '2020-10-28 04:36:21', 'false'),
('bf2f2efdb86e0694cd3cd7b7ff82d544', '127.0.0.1', '2020-10-28 04:37:10', 'false'),
('58a5f945f5dc543e2f6c3f41a38beffe', '127.0.0.1', '2020-10-28 04:37:12', 'false'),
('cef3b1fc2877362b8aed785ca455aa7c', '127.0.0.1', '2020-10-28 04:39:00', 'false'),
('bcb1384fe2476747296f7f80e4e8900e', '127.0.0.1', '2020-10-28 04:39:05', 'false'),
('15481c7394a95534abe8a03833522535', '127.0.0.1', '2020-10-28 04:39:56', 'false'),
('e9c001def8ce8ec4bdeb056266f29568', '127.0.0.1', '2020-10-28 04:39:57', 'false'),
('cefd5f3687a99e2a0fcb6e04cc1a5cd0', '127.0.0.1', '2020-10-28 04:39:58', 'false'),
('ceec31174dc7f5bba26751d50aaf83fd', '127.0.0.1', '2020-10-28 04:40:32', 'false'),
('590474fb72a12ce928daed0899e080ee', '127.0.0.1', '2020-10-28 04:43:56', 'false'),
('dcea621d2cefe8f683db080608b6000d', '127.0.0.1', '2020-10-28 04:44:01', 'false'),
('ca14d93613d2ec6eb74a2fc574b8ab1f', '127.0.0.1', '2020-10-28 04:44:39', 'false'),
('96ca970b1726987a7dfbe7884e63da01', '127.0.0.1', '2020-10-28 04:45:38', 'false'),
('cf6caced8ebd47d8e97530e84809e8c4', '127.0.0.1', '2020-10-28 04:45:43', 'false'),
('06b5a521eb9f5e8f7952531a682006be', '127.0.0.1', '2020-10-28 04:46:14', 'false'),
('b48245c82d1da616253b0af99c4036cf', '127.0.0.1', '2020-10-28 04:48:27', 'false'),
('3df6bc09ad4b3c1841e7bf38d58c69c8', '127.0.0.1', '2020-10-28 04:48:33', 'false'),
('2dcb4fdf19e78ec92b00d02133535ae1', '127.0.0.1', '2020-10-28 04:49:14', 'false'),
('e6ddcf02b29f8525dc71b1176d1b3682', '127.0.0.1', '2020-10-28 04:50:23', 'false'),
('a145554775e976762d3fe6bedfa2fcb2', '127.0.0.1', '2020-10-28 04:50:29', 'false'),
('af39e3f4fd5ad61020309175e73d8f5f', '127.0.0.1', '2020-10-28 04:51:00', 'false'),
('8d56547055a8d8512620439859a33127', '127.0.0.1', '2020-10-28 04:52:09', 'false'),
('0362825534d7529be4882e67aa400230', '127.0.0.1', '2020-10-28 04:52:13', 'false'),
('f5d3cba1a6b0fa6f5fd1185f376a8c50', '127.0.0.1', '2020-10-28 04:52:43', 'false'),
('6c23d1b0f4fdfd615eb770e1f3fd0793', '127.0.0.1', '2020-10-28 04:54:17', 'false'),
('b4f4db1ba02333b228db5f6d6c1af640', '127.0.0.1', '2020-10-28 04:54:28', 'false'),
('aed2a485d88df8b9cfebfc7ceb9d0062', '127.0.0.1', '2020-10-28 04:54:31', 'false'),
('e450897c88f4dbb85700294b667db9d0', '127.0.0.1', '2020-10-28 04:55:02', 'false'),
('c2f67d601b6bc1b72e071af1023daa0a', '127.0.0.1', '2020-10-28 04:56:16', 'false'),
('1950a61a821c50d4792a1ffc9ea69281', '127.0.0.1', '2020-10-28 04:56:17', 'false'),
('6634ccd8bfd8b08b53b3d99a7209fff5', '127.0.0.1', '2020-10-28 04:56:21', 'false'),
('1e3b967fb7eec7583959cf1576480ac7', '127.0.0.1', '2020-10-28 04:56:53', 'false'),
('80a33e0e269063287cc9b2af8c43a38c', '127.0.0.1', '2020-10-28 05:02:55', 'true'),
('8d6372566e49c8401c47b0c011c2f5f2', '127.0.0.1', '2020-10-28 05:03:00', 'true'),
('fa4fe592c7515145929a4ae01218d6a8', '127.0.0.1', '2020-10-28 05:03:31', 'true'),
('b0cbac6427e04d413c2f8b08123b7aee', '127.0.0.1', '2020-10-28 05:09:56', 'true'),
('89863fa9b262d8196602263376b2c751', '127.0.0.1', '2020-10-28 05:10:37', 'true'),
('d63959ba5fd56ba89d8815a926378d38', '127.0.0.1', '2020-10-28 05:10:46', 'true'),
('56c54598bd5c78ee06445b7c3266c7cf', '127.0.0.1', '2020-10-28 05:11:32', 'true'),
('a806081af2cda53c1c059b0501221700', '127.0.0.1', '2020-10-28 05:12:45', 'true'),
('bed714cfd583d50786e1c15f97f781d5', '127.0.0.1', '2020-10-28 05:12:51', 'true'),
('a62e29ee71f0a70b6cb068ead6e78e95', '127.0.0.1', '2020-10-28 05:15:47', 'true'),
('c2e82675610c3aca93f19992158eca36', '127.0.0.1', '2020-10-28 05:16:00', 'true'),
('ca30d34226c67c3e95c7535eb55884ab', '127.0.0.1', '2020-10-28 05:20:23', 'true'),
('d6791eddef65277974246f47346d7883', '127.0.0.1', '2020-10-28 05:20:55', 'true'),
('daa71b6c72f942dbe902ea759ce2f27d', '127.0.0.1', '2020-10-28 05:21:33', 'true'),
('fd45dce59f4ae13d3aaa810f0e9d6ce4', '127.0.0.1', '2020-10-28 05:21:36', 'true'),
('7c8080659b8059af0c1974b635269c8e', '127.0.0.1', '2020-10-28 05:22:10', 'true'),
('c86904b8263b005bcca3f5b8633b0d70', '127.0.0.1', '2020-10-28 05:23:42', 'true'),
('0ebcd10af0f4a3b6caa568b1dbb1a3b9', '127.0.0.1', '2020-10-28 05:23:45', 'true'),
('3c18c0d0bb901b5640a8ab97e39c684e', '127.0.0.1', '2020-10-28 05:24:44', 'true'),
('f38fce68c8d5c2728f2eb450585cb11f', '127.0.0.1', '2020-10-28 05:27:24', 'true'),
('9f6d676e4917cb5d8a31a205fee14434', '127.0.0.1', '2020-10-28 05:27:28', 'true'),
('2632c1cdcca1c3b692c89f16c08cc2f8', '127.0.0.1', '2020-10-28 05:28:01', 'true'),
('87c5be0874bd97dd7af1c5ff3f2dbd3c', '127.0.0.1', '2021-07-26 09:17:34', 'false'),
('7d6e5d6b0898aebcb0631aa9a6b38567', '127.0.0.1', '2021-07-26 09:17:45', 'false'),
('6f0aafcf79251bc19d6d9ac40d42170a', '127.0.0.1', '2021-07-26 09:18:40', 'false'),
('432fb7630a4c88ee5548181068be337b', '127.0.0.1', '2021-07-26 09:20:20', 'false'),
('9596f7417137b1fa13369821e0e175d1', '127.0.0.1', '2021-07-26 09:20:27', 'false'),
('fde6707e31320ae01a7cee0918a517de', '127.0.0.1', '2021-07-26 09:20:49', 'false'),
('06d7540627f5547ce66c4db9c51a962e', '127.0.0.1', '2021-07-26 09:20:59', 'false'),
('865ab8452911b5fe825d0cdc84e5b0a7', '127.0.0.1', '2021-07-26 09:21:44', 'false'),
('0e48fa21c256af0235d0d9de34ff281a', '127.0.0.1', '2021-07-26 09:21:53', 'false'),
('82430fd2fddbd9477000e5dbc5b21c08', '127.0.0.1', '2021-07-26 09:21:54', 'false'),
('029e8e6781d0b5989d7b4de4f35eaa7a', '127.0.0.1', '2021-07-26 09:21:56', 'false'),
('51a2b8460261014d9b6c729d1f57adf7', '127.0.0.1', '2021-07-26 09:22:05', 'false'),
('18d2882ccffa7462f016342f90922202', '127.0.0.1', '2021-07-26 09:22:11', 'false'),
('b5b0a0cd6de04330220d588045dba752', '127.0.0.1', '2021-07-26 09:23:20', 'false'),
('778f2134f4673d0bc1bc632a55a6b359', '127.0.0.1', '2021-07-26 09:23:26', 'false'),
('3105248b7bc2a31f0f66ab4695ac6772', '127.0.0.1', '2021-07-26 09:24:10', 'false'),
('e01691fcc684e0af7c90c852c07f269e', '127.0.0.1', '2021-07-26 09:24:10', 'false'),
('941e617c0f35cf86493e61fea18963df', '127.0.0.1', '2021-07-26 09:25:25', 'false'),
('74f80a37cfd4ebd23864475772eff8d3', '127.0.0.1', '2021-07-26 09:25:26', 'false'),
('5b7d5ec4a476b1c3dee4d33f6d9cce7c', '127.0.0.1', '2021-07-26 09:25:27', 'false'),
('98ff71c43a3480d2e50ff419173b336a', '127.0.0.1', '2021-07-26 09:42:11', 'false'),
('f622337526075c7cc8b4523e69ed8aa0', '127.0.0.1', '2021-07-26 09:42:20', 'false'),
('ec1a216f633958de0919d89911917180', '127.0.0.1', '2021-07-26 09:42:47', 'false'),
('c397ff410b3fb485e704d191ef33cd19', '127.0.0.1', '2021-07-26 09:43:17', 'false'),
('8570d7ce7ef63779c137bb42e940dcd7', '127.0.0.1', '2021-07-26 09:43:24', 'false'),
('fb17a71fa7e908fd51ecd5744d9e772d', '127.0.0.1', '2021-07-26 09:43:26', 'false'),
('dff1e0c01a66d4194665b65a817fd248', '127.0.0.1', '2021-07-26 09:43:27', 'false'),
('fd233113c8d10197e462c4da16d0e604', '127.0.0.1', '2021-07-26 09:43:28', 'false'),
('ddc5f98ad80ed96c8031c0af1add6223', '127.0.0.1', '2021-07-26 09:45:27', 'false'),
('6fd2bce3a138ebee2f37b6fd81e3fdfc', '127.0.0.1', '2021-07-26 09:45:30', 'false'),
('d3d06eb3b80732470288787943f2ab0e', '127.0.0.1', '2021-07-26 09:47:34', 'false'),
('600787f509772fd6efe96b984a8d4140', '127.0.0.1', '2021-07-26 09:48:44', 'false'),
('482f07ce0402e30121b24986bf4a994c', '127.0.0.1', '2021-07-26 09:49:40', 'false'),
('04845eb31358c42c444cfdee17d6e1f8', '127.0.0.1', '2021-07-26 09:49:44', 'false'),
('fe61c0c0416bed26395b0c099ad9ab4c', '127.0.0.1', '2021-07-26 09:50:26', 'false'),
('94c88898de7f72d322fb7dd42d5a7eb4', '127.0.0.1', '2021-07-26 09:53:51', 'false'),
('6067e02267d0c1a02d67359251c42e3a', '127.0.0.1', '2021-07-26 09:53:55', 'false'),
('299404f4206d917ebacfd2426b6cad2a', '127.0.0.1', '2021-07-26 09:53:59', 'false'),
('ded66f9cd65f62611aa2470502b5564d', '127.0.0.1', '2021-07-26 09:54:07', 'false'),
('bdacb7f26bb361d3e665bd58bee915c7', '127.0.0.1', '2021-07-26 09:54:31', 'false'),
('6fbd46f546d1151e11923a01be1c54da', '127.0.0.1', '2021-07-26 09:55:01', 'false'),
('6830f86cc53fdea0ba4c106709d7abe7', '127.0.0.1', '2021-07-26 09:56:37', 'false'),
('41dc1edd991750933ca509d06840cc0f', '127.0.0.1', '2021-07-26 09:57:10', 'false'),
('e6c3d8eefa961876a4b1ffb44765e26c', '127.0.0.1', '2021-07-26 09:57:11', 'false'),
('a91acf5efa993faba2eed59e8296d690', '127.0.0.1', '2021-07-26 09:57:52', 'false'),
('9c552e0f4cc5804292fc8a36d582040f', '127.0.0.1', '2021-07-26 09:57:55', 'false'),
('f1474223c5c10839ccd5bb18ee092807', '127.0.0.1', '2021-07-26 09:57:59', 'false'),
('f5c8c5bcbb9ae220077fcdd0fddf5b37', '127.0.0.1', '2021-07-26 09:58:48', 'false'),
('59abb64c4c9c7fa7240bcf1e3253770f', '127.0.0.1', '2021-07-26 09:59:12', 'false'),
('d11e578e1bdc9313adf46bb1035bdbff', '127.0.0.1', '2021-07-26 10:00:06', 'true'),
('5e2d221678470d362f2a87623e28d92b', '127.0.0.1', '2021-07-26 10:00:08', 'true'),
('0cfa87e7e493457bd5ab36dd8d735c4b', '127.0.0.1', '2021-07-26 10:00:18', 'true'),
('37bce19a54a3a342592efcd101ca1fb6', '127.0.0.1', '2021-07-26 10:02:06', 'true'),
('37456842acdaf919ebe932b9e096e25b', '127.0.0.1', '2021-07-26 10:35:11', 'true'),
('2d9f9541869880a93407a90c304a2811', '127.0.0.1', '2021-07-26 10:35:13', 'true'),
('0986db7364d3d955a1da612cb7cc6f9c', '127.0.0.1', '2021-07-26 10:35:18', 'true'),
('732d8957cdbc3b8c8e0c4adb95476df7', '127.0.0.1', '2021-07-26 10:35:50', 'true'),
('970cc53cd33376d62eecf50a50eb8bd2', '127.0.0.1', '2021-07-26 10:36:07', 'true');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_tempat`
--

CREATE TABLE `m_tempat` (
  `kd` varchar(50) NOT NULL,
  `kode` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `ket` longtext DEFAULT NULL,
  `filex` longtext DEFAULT NULL,
  `harga_kerja_wni` varchar(100) DEFAULT NULL,
  `harga_libur_wni` varchar(100) DEFAULT NULL,
  `harga_kerja_wna` varchar(100) DEFAULT NULL,
  `harga_libur_wna` varchar(100) DEFAULT NULL,
  `postdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_tempat`
--

INSERT INTO `m_tempat` (`kd`, `kode`, `nama`, `ket`, `filex`, `harga_kerja_wni`, `harga_libur_wni`, `harga_kerja_wna`, `harga_libur_wna`, `postdate`) VALUES
('3c98ac77fca21623a94c3f9c4b391a0a', 'WS003', 'wisata 3', 'tentang wisata 3', '3c98ac77fca21623a94c3f9c4b391a0a-1.png', '25000', '50000', '50000', '100000', '2021-07-26 09:36:11'),
('dfc35ec1ba434881d9a10bd745dc69df', 'WS002', 'wisata 2', 'tentang wisata 2', 'dfc35ec1ba434881d9a10bd745dc69df-1.png', '100000', '125000', '125000', '150000', '2021-07-26 09:35:40'),
('b99b7ed00aa3403cd8c244886ce609c4', 'WS001', 'wisata 1', 'tentang wisata 1', 'b99b7ed00aa3403cd8c244886ce609c4-1.png', '50000', '60000', '75000', '100000', '2021-07-26 09:35:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderan`
--

CREATE TABLE `orderan` (
  `kd` varchar(50) NOT NULL,
  `kodebooking` varchar(100) DEFAULT NULL,
  `booking_postdate` datetime DEFAULT NULL,
  `booking_expire` datetime DEFAULT NULL,
  `tempat_kd` varchar(50) DEFAULT NULL,
  `tempat_nama` varchar(100) DEFAULT NULL,
  `tempat_pintu_masuk` varchar(100) DEFAULT NULL,
  `tgl_berangkat` date DEFAULT NULL,
  `tgl_pulang` date DEFAULT NULL,
  `o_nama` varchar(100) DEFAULT NULL,
  `o_bangsa` varchar(100) DEFAULT NULL,
  `o_tgl_lahir` date DEFAULT NULL,
  `o_kelamin` varchar(100) DEFAULT NULL,
  `o_jenis_id` varchar(100) DEFAULT NULL,
  `o_no_id` varchar(100) DEFAULT NULL,
  `o_telp` varchar(100) DEFAULT NULL,
  `o_jml_wni` varchar(100) DEFAULT NULL,
  `o_jml_wna` varchar(100) DEFAULT NULL,
  `postdate` datetime DEFAULT NULL,
  `wni_harga` varchar(100) DEFAULT NULL,
  `wna_harga` varchar(100) DEFAULT NULL,
  `subtotal_wni` varchar(100) DEFAULT NULL,
  `subtotal_wna` varchar(100) DEFAULT NULL,
  `subtotal_kendaraan` varchar(100) DEFAULT NULL,
  `bayar_total` varchar(100) DEFAULT NULL,
  `bayar_postdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orderan`
--

INSERT INTO `orderan` (`kd`, `kodebooking`, `booking_postdate`, `booking_expire`, `tempat_kd`, `tempat_nama`, `tempat_pintu_masuk`, `tgl_berangkat`, `tgl_pulang`, `o_nama`, `o_bangsa`, `o_tgl_lahir`, `o_kelamin`, `o_jenis_id`, `o_no_id`, `o_telp`, `o_jml_wni`, `o_jml_wna`, `postdate`, `wni_harga`, `wna_harga`, `subtotal_wni`, `subtotal_wna`, `subtotal_kendaraan`, `bayar_total`, `bayar_postdate`) VALUES
('c98fd8422c2161b6b9d03f0f57565f76', '0818298854ADIE', '2021-07-26 09:58:47', '2021-07-26 12:58:00', 'b99b7ed00aa3403cd8c244886ce609c4', 'wisata 1', 'Gerbang A', '2021-07-26', '2021-07-26', 'coba1', 'indonesia', '2021-07-26', 'L', 'KTP', '1234567890', '0818298854', '2', '1', '2021-07-26 09:58:47', '50000', '75000', '100000', '75000', '0', '175000', NULL),
('5f8023a57cd2ae0cac2c5d5ada37d75f', '0818298854AAEC', '2021-07-26 10:35:50', '2021-07-26 13:35:00', 'b99b7ed00aa3403cd8c244886ce609c4', 'wisata 1', 'Gerbang A', '2021-07-26', '2021-07-26', 'aa', 'indonesia', '2021-07-26', 'L', 'KTP', '1234567890', '0818298854', '1', '3', '2021-07-26 10:35:50', '50000', '75000', '50000', '225000', '200000', '475000', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderan_kendaraan`
--

CREATE TABLE `orderan_kendaraan` (
  `kd` varchar(50) NOT NULL,
  `orderan_kd` varchar(50) DEFAULT NULL,
  `tempat_kd` varchar(50) DEFAULT NULL,
  `tempat_nama` varchar(100) DEFAULT NULL,
  `kendaraan` varchar(100) DEFAULT NULL,
  `jml` varchar(5) DEFAULT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `subtotal` varchar(100) DEFAULT NULL,
  `postdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orderan_kendaraan`
--

INSERT INTO `orderan_kendaraan` (`kd`, `orderan_kd`, `tempat_kd`, `tempat_nama`, `kendaraan`, `jml`, `harga`, `subtotal`, `postdate`) VALUES
('c98fd8422c2161b6b9d03f0f57565f761', 'c98fd8422c2161b6b9d03f0f57565f76', 'b99b7ed00aa3403cd8c244886ce609c4', 'wisata 1', '', '1', '', '0', '2021-07-26 09:58:47'),
('5f8023a57cd2ae0cac2c5d5ada37d75f1', '5f8023a57cd2ae0cac2c5d5ada37d75f', 'b99b7ed00aa3403cd8c244886ce609c4', 'wisata 1', 'Mobil Travel', '2', '100000', '200000', '2021-07-26 10:35:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat_kapasitas`
--

CREATE TABLE `tempat_kapasitas` (
  `kd` varchar(50) NOT NULL,
  `tempat_kd` varchar(50) DEFAULT NULL,
  `tempat_nama` varchar(100) DEFAULT NULL,
  `tglnya` date DEFAULT NULL,
  `jml` varchar(5) DEFAULT NULL,
  `postdate` datetime DEFAULT NULL,
  `statusnya` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tempat_kapasitas`
--

INSERT INTO `tempat_kapasitas` (`kd`, `tempat_kd`, `tempat_nama`, `tglnya`, `jml`, `postdate`, `statusnya`) VALUES
('16bc7a243e37a78500f2861a9fc50240', 'e15ace31bb4049f6aec0fa0435c58810', 'PUSAT LATIHAN GAJAH', '2020-10-27', '42', '2020-10-24 17:13:07', NULL),
('1df5002cfdac5ddac7fb87efe0ad3658', 'b99b7ed00aa3403cd8c244886ce609c4', 'wisata 1', '2021-07-01', '100', '2021-07-26 09:36:42', 'KERJA'),
('6e0c696ab7e6fffebe61469263ad2ad2', 'b99b7ed00aa3403cd8c244886ce609c4', 'wisata 1', '2021-07-26', '100', '2021-07-26 09:41:30', 'KERJA'),
('30871d45882cf87860dfd80a41cc2466', 'dfc35ec1ba434881d9a10bd745dc69df', 'wisata 2', '2021-07-26', '1000', '2021-07-26 09:41:49', 'KERJA'),
('f35b0c1cddb80842f19f0a66d2332ec9', '3c98ac77fca21623a94c3f9c4b391a0a', 'wisata 3', '2021-07-26', '100', '2021-07-26 09:42:06', 'KERJA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat_kendaraan`
--

CREATE TABLE `tempat_kendaraan` (
  `kd` varchar(50) NOT NULL,
  `tempat_kd` varchar(50) DEFAULT NULL,
  `tempat_nama` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `postdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tempat_kendaraan`
--

INSERT INTO `tempat_kendaraan` (`kd`, `tempat_kd`, `tempat_nama`, `nama`, `harga`, `postdate`) VALUES
('c6ec2cdc7f8b100aeb83ff6c7ec72258', 'b99b7ed00aa3403cd8c244886ce609c4', 'wisata 1', 'Mobil Travel', '100000', '2021-07-26 10:34:46'),
('37992228f1fc87eb0480653f826b857f', 'dfc35ec1ba434881d9a10bd745dc69df', 'wisata 2', 'mobil jalan xstrix jalan', '100000', '2021-07-26 10:35:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat_pintu_masuk`
--

CREATE TABLE `tempat_pintu_masuk` (
  `kd` varchar(50) NOT NULL,
  `tempat_kd` varchar(50) DEFAULT NULL,
  `tempat_nama` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `postdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tempat_pintu_masuk`
--

INSERT INTO `tempat_pintu_masuk` (`kd`, `tempat_kd`, `tempat_nama`, `nama`, `postdate`) VALUES
('a2e31b0684a8b4b2108e2dedc6754e77', '3c98ac77fca21623a94c3f9c4b391a0a', 'wisata 3', 'Gerbang C', '2021-07-26 09:37:21'),
('428d9cb9becec174ff72c4c1ccf1bba2', 'dfc35ec1ba434881d9a10bd745dc69df', 'wisata 2', 'Gerbang B', '2021-07-26 09:37:14'),
('d5389e2015a470032de034f9942e1276', 'b99b7ed00aa3403cd8c244886ce609c4', 'wisata 1', 'Gerbang A', '2021-07-26 09:37:06');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `adminx`
--
ALTER TABLE `adminx`
  ADD PRIMARY KEY (`kd`);

--
-- Indeks untuk tabel `cp_artikel`
--
ALTER TABLE `cp_artikel`
  ADD PRIMARY KEY (`kd`);

--
-- Indeks untuk tabel `cp_artikel_komentar`
--
ALTER TABLE `cp_artikel_komentar`
  ADD PRIMARY KEY (`kd`);

--
-- Indeks untuk tabel `cp_bukutamu`
--
ALTER TABLE `cp_bukutamu`
  ADD PRIMARY KEY (`kd`);

--
-- Indeks untuk tabel `cp_g_foto`
--
ALTER TABLE `cp_g_foto`
  ADD PRIMARY KEY (`kd`);

--
-- Indeks untuk tabel `cp_m_slideshow`
--
ALTER TABLE `cp_m_slideshow`
  ADD PRIMARY KEY (`kd`);

--
-- Indeks untuk tabel `cp_profil`
--
ALTER TABLE `cp_profil`
  ADD PRIMARY KEY (`kd`);

--
-- Indeks untuk tabel `cp_visitor`
--
ALTER TABLE `cp_visitor`
  ADD PRIMARY KEY (`kd`);

--
-- Indeks untuk tabel `m_tempat`
--
ALTER TABLE `m_tempat`
  ADD PRIMARY KEY (`kd`);

--
-- Indeks untuk tabel `orderan`
--
ALTER TABLE `orderan`
  ADD PRIMARY KEY (`kd`);

--
-- Indeks untuk tabel `orderan_kendaraan`
--
ALTER TABLE `orderan_kendaraan`
  ADD PRIMARY KEY (`kd`);

--
-- Indeks untuk tabel `tempat_kapasitas`
--
ALTER TABLE `tempat_kapasitas`
  ADD PRIMARY KEY (`kd`);

--
-- Indeks untuk tabel `tempat_kendaraan`
--
ALTER TABLE `tempat_kendaraan`
  ADD PRIMARY KEY (`kd`);

--
-- Indeks untuk tabel `tempat_pintu_masuk`
--
ALTER TABLE `tempat_pintu_masuk`
  ADD PRIMARY KEY (`kd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
