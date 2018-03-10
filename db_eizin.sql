-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2018 at 05:58 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_eizin`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_attachment`
--

CREATE TABLE `tb_attachment` (
  `attachment_id` int(11) NOT NULL,
  `attachment_at_id` int(11) NOT NULL,
  `attachment_eizin_id` int(11) NOT NULL,
  `attachment_file_name` varchar(255) NOT NULL,
  `attachment_file_type` varchar(255) NOT NULL,
  `attachment_file_size` float NOT NULL,
  `attachment_file_ext` varchar(255) NOT NULL,
  `attachment_entri` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_attachment_type`
--

CREATE TABLE `tb_attachment_type` (
  `at_id` int(11) NOT NULL,
  `at_nama` varchar(255) NOT NULL,
  `at_deskripsi` text NOT NULL,
  `at_type` enum('IB','SKLK','semua') NOT NULL,
  `at_entri` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_attachment_type`
--

INSERT INTO `tb_attachment_type` (`at_id`, `at_nama`, `at_deskripsi`, `at_type`, `at_entri`) VALUES
(4, 'Surat Pengantar dari SKPD', '', 'IB', '2017-12-26 19:35:57'),
(5, 'SK Pangkat Terakhir', '', 'IB', '2017-12-26 19:39:06'),
(6, 'SKP 2 (dua) tahun terakhir', '', 'IB', '2017-12-26 19:39:28'),
(7, 'Ijazah terakhir dan Transkip Nilai', '', 'IB', '2017-12-26 19:39:55'),
(8, 'Surat Pernyataan dari Perguruan Tinggi', '', 'IB', '2017-12-26 19:40:32'),
(9, 'Sertifikat Akreditasi', '', 'IB', '2017-12-26 19:41:06'),
(10, 'Surat Keterangan dari SKPD', '', 'IB', '2017-12-26 19:42:09'),
(11, 'Surat Pengantar dari SKPD', '', 'SKLK', '2017-12-26 19:42:47'),
(12, 'Surat Keterangan Lulus dari Perguruan Tinggi', '', 'SKLK', '2017-12-26 19:43:15'),
(13, 'Ijazah terakhir dan Transkip Nilai', '', 'SKLK', '2017-12-26 19:43:44'),
(14, 'Surat Keterangan dari SKPD', '', 'SKLK', '2017-12-26 19:43:55'),
(15, 'Sertifikat Akreditasi', '', 'SKLK', '2017-12-26 19:44:06'),
(16, 'Surat Pernyataan Keaslian Ijazah', '', 'semua', '2017-12-26 19:44:22'),
(17, 'SKP 2 (dua) tahun terakhir', '', 'SKLK', '2017-12-26 19:44:48');

-- --------------------------------------------------------

--
-- Table structure for table `tb_biodata`
--

CREATE TABLE `tb_biodata` (
  `biodata_id` int(11) NOT NULL,
  `biodata_eizin_id` int(11) NOT NULL,
  `biodata_nomor` varchar(255) NOT NULL,
  `biodata_nama` varchar(255) NOT NULL,
  `biodata_tanggal_surat` date NOT NULL,
  `biodata_nip` varchar(255) NOT NULL,
  `biodata_pangkat` varchar(255) NOT NULL,
  `biodata_jabatan` varchar(255) NOT NULL,
  `biodata_unit_kerja` varchar(255) NOT NULL,
  `biodata_almamater` varchar(255) NOT NULL,
  `biodata_penyelenggara` varchar(255) NOT NULL,
  `biodata_jurusan` varchar(255) NOT NULL,
  `biodata_program` varchar(255) NOT NULL,
  `biodata_no_ijazah` varchar(255) NOT NULL,
  `biodata_tahun_kelulusan` varchar(255) NOT NULL,
  `biodata_nilai` int(11) NOT NULL,
  `biodata_dasar` text NOT NULL,
  `biodata_akreditasi` enum('A','B') NOT NULL,
  `biodata_alamat` text NOT NULL,
  `biodata_entri` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dinas`
--

CREATE TABLE `tb_dinas` (
  `dinas_id` int(11) NOT NULL,
  `dinas_nama` varchar(255) NOT NULL,
  `dinas_email` varchar(255) DEFAULT NULL,
  `dinas_photo` varchar(255) NOT NULL,
  `dinas_password` varchar(255) NOT NULL,
  `dinas_entri` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dinas`
--

INSERT INTO `tb_dinas` (`dinas_id`, `dinas_nama`, `dinas_email`, `dinas_photo`, `dinas_password`, `dinas_entri`) VALUES
(1, 'Sekretariat Daerah Kabupaten Subang', 'email.ahmadirfan@gmail.com', 'default.png', '922715928', '2017-12-22 18:30:38'),
(2, 'Sekretariat DPRD Kabupaten Subang', 'huhu', 'default.png', '813693576', '2017-12-22 18:31:27'),
(3, 'Inspektorat Daerah Kabupaten Subang', '', 'default.png', '416368272', '2017-12-22 18:32:04'),
(4, 'Dinas Kearsipan dan Perpustakaan Kabupaten Subang', '', 'default.png', '205132378', '2017-12-22 18:32:38'),
(5, 'Dinas Kependudukan dan Pencatatan Sipil Kabupaten Subang', '', 'default.png', '330485025', '2017-12-22 18:38:55'),
(6, 'Dinas Kesehatan Kabupaten Subang', '', 'default.png', '371636284', '2017-12-22 18:39:40'),
(8, 'Dinas Ketahanan Pangan Kabupaten Subang', '', 'default.png', '974039713', '2017-12-22 18:42:47'),
(9, 'Dinas Komunikasi dan Informatika Kabupaten Subang', '', 'default.png', '130208333', '2017-12-22 18:43:22'),
(10, 'Dinas Koperasi, UMKM, Perdagangan dan Perindustrian Kabupaten Subang', '', 'default.png', '749810112', '2017-12-22 18:44:04'),
(11, 'Dinas Lingkungan Hidup Kabupaten Subang', '', 'default.png', '494737413', '2017-12-22 18:44:32'),
(12, 'Dinas Pariwisata, Kepemudaan dan Olah Raga Kabupaten Subang', '', 'default.png', '300401475', '2017-12-26 19:22:31'),
(13, 'Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Subang', '', 'default.png', '828640407', '2017-12-26 19:22:34'),
(14, 'Dinas Pemadam Kebakaran dan Penanggulangan Bencana Kabupaten Subang', '', 'default.png', '948350694', '2017-12-26 19:22:50'),
(15, 'Dinas Pemberdayaan Masyarakat dan Desa Kabupaten Subang', '', 'default.png', '816216362', '2017-12-26 19:23:04'),
(16, 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kabupaten Subang', '', 'default.png', '399685329', '2017-12-26 19:23:18'),
(17, 'Dinas Pendidikan dan Kebudayaan Kabupaten Subang', '', 'default.png', '372802734', '2017-12-26 19:23:35'),
(18, 'Dinas Pengendalian Penduduk, KB, Pemberdayaan Perempuan dan Perlindungan Anak Kabupaten Subang', '', 'default.png', '206488715', '2017-12-26 19:23:56'),
(19, 'Dinas Perhubungan Kabupaten Subang', '', 'default.png', '675482855', '2017-12-26 19:24:08'),
(20, 'Dinas Perikanan Kabupaten Subang', '', 'default.png', '670844183', '2017-12-26 19:24:28'),
(21, 'Dinas Pertanian Kabupaten Subang', '', 'default.png', '873562282', '2017-12-26 19:24:42'),
(22, 'Dinas Perumahan dan Kawasan Permukiman Kabupaten Subang', '', 'default.png', '622612847', '2017-12-26 19:24:54'),
(23, 'Dinas Peternakan dan Kesehatan Hewan Kabupaten Subang', '', 'default.png', '533013237', '2017-12-26 19:25:16'),
(24, 'Dinas Sosial Kabupaten Subang', '', 'default.png', '752766927', '2017-12-26 19:25:28'),
(25, 'Dinas Tenaga Kerja dan Transmigrasi Kabupaten Subang', '', 'default.png', '303141275', '2017-12-26 19:25:40'),
(26, 'Satuan Polisi Pamong Praja Kabupaten Subang', '', 'default.png', '724500868', '2017-12-26 19:25:56'),
(27, 'Badan Kepegawaian dan Pengembangan SDM Kabupaten Subang', '', 'default.png', '805474175', '2017-12-26 19:26:07'),
(28, 'Badan Pengelolaan Keuangan Daerah Kabupaten Subang', '', 'default.png', '728786892', '2017-12-26 19:26:19'),
(29, 'Badan Perencanaan Pembangunan, Penelitian dan Pengembangan Daerah Kabupaten Subang', '', 'default.png', '633761935', '2017-12-26 19:26:33'),
(30, 'Rumah Sakit Umum Daerah Kelas B', '', 'default.png', '373263888', '2017-12-26 19:26:46'),
(31, 'Akademi Keperawatan', '', 'default.png', '576199001', '2017-12-26 19:27:00'),
(32, 'Kantor Kesatuan Bangsa dan Linmas Kabupaten Subang', '', 'default.png', '237792968', '2017-12-26 19:27:15'),
(33, 'Kecamatan Binong', '', 'default.png', '726535373', '2017-12-26 19:27:36'),
(34, 'Kecamatan Blanakan', '', 'default.png', '763346354', '2017-12-26 19:27:49'),
(35, 'Kecamatan Ciasem', '', 'default.png', '261854383', '2017-12-26 19:28:08'),
(36, 'Kecamatan Ciater', '', 'default.png', '252007378', '2017-12-26 19:28:21'),
(37, 'Kecamatan Cibogo', '', 'default.png', '775906032', '2017-12-26 19:28:32'),
(38, 'Kecamatan Cijambe', '', 'default.png', '866970486', '2017-12-26 19:28:45'),
(39, 'Kecamatan Cikaum', '', 'default.png', '723551432', '2017-12-26 19:28:55'),
(40, 'Kecamatan Cipeundeuy', '', 'default.png', '410319010', '2017-12-26 19:29:06'),
(41, 'Kecamatan Cipunagara', '', 'default.png', '531873914', '2017-12-26 19:29:19'),
(42, 'Kecamatan Cisalak', '', 'default.png', '989691840', '2017-12-26 19:29:29'),
(43, 'Kecamatan Compreng', '', 'default.png', '600179036', '2017-12-26 19:29:40'),
(44, 'Kecamatan Dawuan', '', 'default.png', '796061197', '2017-12-26 19:29:50'),
(45, 'Kecamatan Jalancagak', '', 'default.png', '188883463', '2017-12-26 19:29:59'),
(46, 'Kecamatan Kalijati', '', 'default.png', '992621527', '2017-12-26 19:30:13'),
(47, 'Kecamatan Kasomalang', '', 'default.png', '752848307', '2017-12-26 19:30:23'),
(48, 'Kecamatan Legonkulon', '', 'default.png', '159233940', '2017-12-26 19:30:35'),
(49, 'Kecamatan Pabuaran', '', 'default.png', '385823567', '2017-12-26 19:30:47'),
(50, 'Kecamatan Pagaden', '', 'default.png', '292426215', '2017-12-26 19:30:58'),
(51, 'Kecamatan Pagaden Barat', '', 'default.png', '709337022', '2017-12-26 19:31:09'),
(52, 'Kecamatan Pamanukan', '', 'default.png', '360948350', '2017-12-26 19:31:19'),
(53, 'Kecamatan Patokbeusi', '', 'default.png', '428249782', '2017-12-26 19:31:29'),
(54, 'Kecamatan Purwadadi', '', 'default.png', '527994791', '2017-12-26 19:31:39'),
(55, 'Kecamatan Pusakajaya', '', 'Ilmu-Administrasi-Negara.jpg', '441867404', '2017-12-26 19:31:51'),
(56, 'Kecamatan Pusakanagara', '', 'default.png', '151204426', '2017-12-26 19:31:59'),
(57, 'Kecamatan Sagalaherang', '', 'default.png', '955050998', '2017-12-26 19:32:09'),
(58, 'Kecamatan Serangpanjang', '', 'default.png', '227105034', '2017-12-26 19:32:19'),
(59, 'Kecamatan Subang', '', 'default.png', '367106119', '2017-12-26 19:32:30'),
(60, 'Kecamatan Sukasari', '', 'default.png', '502224392', '2017-12-26 19:32:41'),
(61, 'Kecamatan Tambakdahan', 'kt@gmail.com', 'ass.png', '382893880', '2017-12-26 19:32:50'),
(62, 'Kecamatan Tanjungsiang', '', 'default.png', '139756944', '2017-12-26 19:33:04');

-- --------------------------------------------------------

--
-- Table structure for table `tb_eizin`
--

CREATE TABLE `tb_eizin` (
  `eizin_id` int(11) NOT NULL,
  `eizin_dinas_id` int(11) NOT NULL,
  `eizin_dir` varchar(255) NOT NULL,
  `eizin_entri` datetime NOT NULL,
  `eizin_type` enum('IB','SKLK') NOT NULL,
  `eizin_date_kirim` datetime NOT NULL,
  `eizin_kode` varchar(255) NOT NULL,
  `eizin_status` enum('belum dikirim','terkirim','verifikasi 1','verifikasi 2') NOT NULL DEFAULT 'belum dikirim'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_notif`
--

CREATE TABLE `tb_notif` (
  `notif_id` int(11) NOT NULL,
  `notif_user_id` int(11) NOT NULL,
  `notif_to_user_id` int(11) NOT NULL,
  `notif_eizin_id` int(11) NOT NULL,
  `notif_type` varchar(255) NOT NULL,
  `notif_title` varchar(255) NOT NULL,
  `notif_text` text NOT NULL,
  `notif_link` varchar(255) NOT NULL DEFAULT '#',
  `notif_status` enum('delive','read') NOT NULL,
  `notif_entri` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `user_id` int(11) NOT NULL,
  `user_dinas_id` int(11) DEFAULT NULL,
  `user_level` enum('dinas','admin1','admin2') NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_entri` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`user_id`, `user_dinas_id`, `user_level`, `user_username`, `user_password`, `user_entri`) VALUES
(1, NULL, 'admin1', 'admin1', '1058a6b21b461590b461590c2149f37d3f88eb1058a6b', '2017-12-19 00:00:00'),
(19, NULL, 'admin2', 'admin2', '9c2485439d7dd55ad7dd55aa8dda4bea31f62e9c24854', '2017-12-21 00:00:00'),
(22, 1, 'dinas', '9FFB0DE1D', '9e4ccf4c7165d0c9165d0c92984b19658a53f09e4ccf4', '2017-12-22 18:30:38'),
(23, 2, 'dinas', '07925E7EF', '34576d6ee35b4c7f35b4c7fce5c62ba2b65f2b34576d6', '2017-12-22 18:31:27'),
(24, 3, 'dinas', '5150EAC7E', '98b047c7f86c067f86c067f2a38676a2710e3998b047c', '2017-12-22 18:32:04'),
(25, 4, 'dinas', '68B263F06', 'fed3a1d074c260bc4c260bc42d493feee7bfcdfed3a1d', '2017-12-22 18:32:38'),
(26, 5, 'dinas', '342BA5349', '70d2f1850d798d26d798d26a03ac4b96cf003870d2f18', '2017-12-22 18:38:55'),
(27, 6, 'dinas', 'BF2D9817B', '4b137556fd68b303d68b303976367ff71625854b13755', '2017-12-22 18:39:40'),
(29, 8, 'dinas', 'B987C954B', '250155ffe6b934006b934005b28fa1ef504f72250155f', '2017-12-22 18:42:47'),
(30, 9, 'dinas', '3371DA6CE', '391222ed897927329792732a29e032c7556249391222e', '2017-12-22 18:43:22'),
(31, 10, 'dinas', 'BAB8EB42C', '1468aa0bf966dd80966dd803ecbb6dce792a331468aa0', '2017-12-22 18:44:04'),
(32, 11, 'dinas', 'D71901262', 'a6fbba474bc1dfc2bc1dfc2b4d9042c2acca13a6fbba4', '2017-12-22 18:44:32'),
(33, 12, 'dinas', '6BCC4DA98', '44490134278405d378405d329cd0971a081e814449013', '2017-12-26 19:22:31'),
(34, 13, 'dinas', '98910BED0', 'bc7724c036b85eed6b85eed76c405fca0d57a9bc7724c', '2017-12-26 19:22:34'),
(35, 14, 'dinas', '10B142A4E', '9473f96a7d74ceded74cedef64ae0334d070839473f96', '2017-12-26 19:22:50'),
(36, 15, 'dinas', '36758D282', '621b57d85fb6de1afb6de1ae1a05c69a2de80c621b57d', '2017-12-26 19:23:04'),
(37, 16, 'dinas', '649C658D2', '8e0f6c214042b78d042b78d48bfc3e7e3d3ed28e0f6c2', '2017-12-26 19:23:18'),
(38, 17, 'dinas', '72E9B8DAC', '4603d65bd7358d527358d52532d93a1c9242084603d65', '2017-12-26 19:23:35'),
(39, 18, 'dinas', 'E66BDF5F0', 'e05764d3be096a46e096a460fb16c88dacfb65e05764d', '2017-12-26 19:23:56'),
(40, 19, 'dinas', '067A2192D', 'bdaec8ec7e143612e1436125556f8aee301876bdaec8e', '2017-12-26 19:24:08'),
(41, 20, 'dinas', 'CD630B97D', '119d97a5a2e03a252e03a2579427016ee443b4119d97a', '2017-12-26 19:24:28'),
(42, 21, 'dinas', '573D7EA0D', 'f7d0a157e05493900549390d0d7cbf1cf1f3daf7d0a15', '2017-12-26 19:24:42'),
(43, 22, 'dinas', '1A94CC03D', '62971b91e35f80c235f80c27481bf2d80d5e0862971b9', '2017-12-26 19:24:54'),
(44, 23, 'dinas', 'BB03D9F4A', '9c45bfc9231e9b6231e9b62b171a7f3de4a9879c45bfc', '2017-12-26 19:25:16'),
(45, 24, 'dinas', 'A8A4242A7', '2c7c2a069f6e3c9bf6e3c9bde76324d4173de92c7c2a0', '2017-12-26 19:25:28'),
(46, 25, 'dinas', '0F8EB6A51', '62a031d09ff6372dff6372d873870f56e083c462a031d', '2017-12-26 19:25:40'),
(47, 26, 'dinas', '60DD09486', 'db10e41d221c2f6121c2f614b9fa488c84946fdb10e41', '2017-12-26 19:25:56'),
(48, 27, 'dinas', 'BEC002850', 'f74d3f2779b6f9ef9b6f9ef030cc56658e1292f74d3f2', '2017-12-26 19:26:07'),
(49, 28, 'dinas', '76757EDE7', '6dd6f92a2b2110dab2110da09bf552af79ddab6dd6f92', '2017-12-26 19:26:19'),
(50, 29, 'dinas', '4BF615D9D', 'be8f76a3db89707ab89707aa1632744a365922be8f76a', '2017-12-26 19:26:33'),
(51, 30, 'dinas', '78ADD917F', '1e5b5b3ceb5688f2b5688f25ee356a9f5d948f1e5b5b3', '2017-12-26 19:26:46'),
(52, 31, 'dinas', '2E3BCE0A0', 'cee0019a5813fe88813fe88de47260e68a0617cee0019', '2017-12-26 19:27:00'),
(53, 32, 'dinas', 'D1BB6B808', 'ba26c39815411ecc5411ecc041bec0b8bdc8d3ba26c39', '2017-12-26 19:27:15'),
(54, 33, 'dinas', 'EECB240CC', '85e23c74fcb87dcfcb87dcf195efd9b8cb5bf885e23c7', '2017-12-26 19:27:36'),
(55, 34, 'dinas', '5B31D40EB', 'e61273c592e4b7102e4b7103c8a76dd75596eae61273c', '2017-12-26 19:27:49'),
(56, 35, 'dinas', '325D09397', 'bac1909592649e502649e508d9f2fc7a063e42bac1909', '2017-12-26 19:28:08'),
(57, 36, 'dinas', 'E405E0970', '206454be9a0907bca0907bc45d2a9a6dffecaa206454b', '2017-12-26 19:28:21'),
(58, 37, 'dinas', '06A07DB04', 'fca93dcad78cb94378cb943d325adad571f7cbfca93dc', '2017-12-26 19:28:32'),
(59, 38, 'dinas', '50227FA35', '5d3d1e740bef5697bef5697f12d1b82d3613ae5d3d1e7', '2017-12-26 19:28:45'),
(60, 39, 'dinas', '21335D531', '618c3442c231d887231d8873ae15b02db467db618c344', '2017-12-26 19:28:55'),
(61, 40, 'dinas', '2D325AD34', 'c9b3cb3355497b435497b437033be7f81b2595c9b3cb3', '2017-12-26 19:29:06'),
(62, 41, 'dinas', '097D91D80', '82ff563da34653083465308cf5f654415d24e182ff563', '2017-12-26 19:29:19'),
(63, 42, 'dinas', 'B85FB4047', '617f265363f8dd613f8dd61504693752c10864617f265', '2017-12-26 19:29:29'),
(64, 43, 'dinas', '6C8DA9BB1', '7a9e979ce7b92e637b92e63647b63e7ebebd397a9e979', '2017-12-26 19:29:40'),
(65, 44, 'dinas', '504B5641F', '865495e54357e123357e12397f2c55af273fbf865495e', '2017-12-26 19:29:50'),
(66, 45, 'dinas', '09C92AB6A', '0c288011bdff548fdff548fbebecdb6ce966070c28801', '2017-12-26 19:29:59'),
(67, 46, 'dinas', 'ECC740164', '46bffdbb511b698d11b698d5cd06fd7283615f46bffdb', '2017-12-26 19:30:13'),
(68, 47, 'dinas', '1142E0FCD', '188604eaa4d4678d4d4678dbafa4189b3390ac188604e', '2017-12-26 19:30:23'),
(69, 48, 'dinas', '0CC6C3D44', '186f3d1970d662810d662810b1f6b9bff62e21186f3d1', '2017-12-26 19:30:35'),
(70, 49, 'dinas', '12DF6E4F5', 'a16124be1a3b4d43a3b4d43601f20b92713366a16124b', '2017-12-26 19:30:47'),
(71, 50, 'dinas', 'A4ED9F39E', '9d5d3f1fe08a66fe08a66fe3159adddb7b67629d5d3f1', '2017-12-26 19:30:58'),
(72, 51, 'dinas', '8B3B0C95F', '8838a799dadb6f61adb6f61acdf850b7596b0b8838a79', '2017-12-26 19:31:09'),
(73, 52, 'dinas', 'B0B089B99', 'c7eddb2a027048a127048a17fb929101a643bdc7eddb2', '2017-12-26 19:31:19'),
(74, 53, 'dinas', '90990F17F', '4e354b6f5ef01ca5ef01ca5238b3230a2f41114e354b6', '2017-12-26 19:31:29'),
(75, 54, 'dinas', '82B78BB7F', '9b1b0d22f958cefb958cefbe2b6f0a1c6d39459b1b0d2', '2017-12-26 19:31:39'),
(76, 55, 'dinas', '2B521B4E7', '40acab57d6f68c246f68c24cef456682be2bd740acab5', '2017-12-26 19:31:51'),
(77, 56, 'dinas', '0B63E1B03', '870398c679fe94279fe94276f023f2a2ff05b3870398c', '2017-12-26 19:31:59'),
(78, 57, 'dinas', '929CCD062', '013028108164bd68164bd68e13bc4b19bc53640130281', '2017-12-26 19:32:09'),
(79, 58, 'dinas', 'B44046B4A', 'fd0ec94a1392951a392951a595e04c9d0229c0fd0ec94', '2017-12-26 19:32:19'),
(80, 59, 'dinas', 'C8D4F8059', 'e985d1f1fea8dc05ea8dc05c976b24fe22edf3e985d1f', '2017-12-26 19:32:30'),
(81, 60, 'dinas', '76738C09C', 'eb4a8b81c7f52ed77f52ed7467ef3ea02a88e1eb4a8b8', '2017-12-26 19:32:41'),
(82, 61, 'dinas', 'AC0FC5835', '093ac25e90f4be000f4be008c050f9fcb5d88a093ac25', '2017-12-26 19:32:50'),
(83, 62, 'dinas', 'A8FC43108', 'a35532f8c42b40a542b40a5c548b47ef42f6e1a35532f', '2017-12-26 19:33:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_attachment`
--
ALTER TABLE `tb_attachment`
  ADD PRIMARY KEY (`attachment_id`);

--
-- Indexes for table `tb_attachment_type`
--
ALTER TABLE `tb_attachment_type`
  ADD PRIMARY KEY (`at_id`);

--
-- Indexes for table `tb_biodata`
--
ALTER TABLE `tb_biodata`
  ADD PRIMARY KEY (`biodata_id`);

--
-- Indexes for table `tb_dinas`
--
ALTER TABLE `tb_dinas`
  ADD PRIMARY KEY (`dinas_id`);

--
-- Indexes for table `tb_eizin`
--
ALTER TABLE `tb_eizin`
  ADD PRIMARY KEY (`eizin_id`);

--
-- Indexes for table `tb_notif`
--
ALTER TABLE `tb_notif`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_attachment`
--
ALTER TABLE `tb_attachment`
  MODIFY `attachment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_attachment_type`
--
ALTER TABLE `tb_attachment_type`
  MODIFY `at_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tb_biodata`
--
ALTER TABLE `tb_biodata`
  MODIFY `biodata_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_dinas`
--
ALTER TABLE `tb_dinas`
  MODIFY `dinas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `tb_eizin`
--
ALTER TABLE `tb_eizin`
  MODIFY `eizin_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_notif`
--
ALTER TABLE `tb_notif`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
