-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06 Agu 2018 pada 14.19
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sisprodiif`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_datakp`
--

CREATE TABLE `t_datakp` (
  `id_kp` int(111) NOT NULL,
  `nama_mahasiswa` varchar(60) DEFAULT NULL,
  `npm` varchar(10) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `alamat` text,
  `telepon` varchar(14) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `topik_kp` text,
  `nid` varchar(30) DEFAULT NULL,
  `pembimbing_kp` varchar(50) DEFAULT NULL,
  `nama_perusahaan` varchar(50) DEFAULT NULL,
  `alamat_perusahaan` text,
  `pembimbinglap` varchar(50) DEFAULT NULL,
  `tanggal_peng` date DEFAULT NULL,
  `tanggal_awal` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `status` enum('Dalam Bimbingan','Perpanjang','Lulus') DEFAULT NULL,
  `status_selesai` enum('Pembimbing Ok','Lulus') DEFAULT NULL,
  `tanggal_laporan` date DEFAULT NULL,
  `semester_akhir` int(11) DEFAULT NULL,
  `nilai` int(111) DEFAULT NULL,
  `topik_kp_sebelum` text,
  `perusahaan_sebelum` varchar(50) DEFAULT NULL,
  `tahun_akademik_peng` varchar(9) DEFAULT NULL,
  `tahun_akademik_lulus` varchar(9) DEFAULT NULL,
  `semesterh_lulus` enum('Ganjil','Genap') DEFAULT NULL,
  `nilaih` varchar(1) DEFAULT NULL,
  `lampiran_foto` text,
  `nidn` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_datakp`
--

INSERT INTO `t_datakp` (`id_kp`, `nama_mahasiswa`, `npm`, `semester`, `alamat`, `telepon`, `email`, `topik_kp`, `nid`, `pembimbing_kp`, `nama_perusahaan`, `alamat_perusahaan`, `pembimbinglap`, `tanggal_peng`, `tanggal_awal`, `tanggal_akhir`, `status`, `status_selesai`, `tanggal_laporan`, `semester_akhir`, `nilai`, `topik_kp_sebelum`, `perusahaan_sebelum`, `tahun_akademik_peng`, `tahun_akademik_lulus`, `semesterh_lulus`, `nilaih`, `lampiran_foto`, `nidn`) VALUES
(1, 'Muhammad Ihsan Fadhil', '0613u049', 10, 'Komplek Manglayang Sari A9B8 RT02 RW13, Kelurahan Palasari, Kecamatan Cibiru, Kota Bandung', '08561117503', 'mif23wd@gmail.com', 'Sistem Pengajuan Kerja Praktek dan Tugas Akhir di Program Studi Universitas Widyatama', '01011021009', 'Dosen 9', 'Prodi Teknik Infromatika Universitas Widyatama', 'Jln Cikutra No.211A, Bandung', 'Dhani Indra Gunawan', '2018-04-26', '2018-02-10', '2018-08-10', 'Dalam Bimbingan', '', NULL, NULL, NULL, 'Sistem Borang Akreditasi PMW Universitas Widyatama', 'Penjamin Mutu Widyatama', '2017/2018', '', NULL, NULL, '3x4.jpg', '01011021001009'),
(2, 'Julian Faubert', '0613u048', 11, 'Samarinda, Kalimantan', '081234567890', 'faubert@gmail.com', 'Cara tidak tidur ketika di bench', '01011021010', 'Dosen 10', 'Real Madrid', 'Madrid, Spain', 'Juande Ramos', '2018-04-26', '2018-02-10', '2018-08-10', 'Dalam Bimbingan', '', NULL, NULL, NULL, '', '', '2017/2018', '', NULL, NULL, 'Legends_BryanRobson_ashx.jpg', '01011021001010'),
(3, 'Son Goku', '0613u091', 7, 'Rumahnya di bumi', '081222222222', 'goku@gmail.com', 'Mengalahkan semua orang kuat di setiap universe', '01011021003', 'Dosen 3', 'Universe 7', 'Dunia ke 7', 'Beerus', '2015-11-10', '2015-08-10', '2016-02-10', 'Lulus', '', '2016-01-12', 8, 96, '', '', '2015/2016', '2015/2016', 'Genap', 'A', 'goku_ssgss_face_dbs_by_jaredsongohan-da8hm0c.png', '01011021001003'),
(4, 'Juan Manuel Mata Garcia', '0613u047', 8, 'Madrid, Spain', '081234564434', 'mata8@gmail.com', 'Main sebagai AMF di Manchester United F.C', '01011021094', 'Dosen 94', 'Manchester United F.C', 'Sir Bobby Charlton Street, Manchester, UK', 'Jose Mourinho', '2018-04-27', '2018-02-10', '2018-08-10', 'Dalam Bimbingan', NULL, NULL, NULL, NULL, NULL, NULL, '2017/2018', NULL, NULL, NULL, 'mata.jpg', '01011021001094'),
(5, 'Muhammad fadillah', '0615101038', 7, 'bandung', '081234567890', 'lupa@hotmail.com', 'jgjgjgjgjgjhgjhgjh', '01011021001', 'Dosen 1', 'hkhk', 'gjgjgjhg', 'ibenk', '2018-05-09', '2018-02-10', '2018-08-10', 'Dalam Bimbingan', NULL, NULL, NULL, NULL, NULL, NULL, '2017/2018', NULL, NULL, NULL, 'SpongeBob_(5).png', '01011021001001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_datata`
--

CREATE TABLE `t_datata` (
  `id_ta` int(111) NOT NULL,
  `nama_mahasiswa` varchar(60) DEFAULT NULL,
  `npm` varchar(10) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `alamat` text,
  `telepon` varchar(14) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `topik_ta` text,
  `nid` varchar(30) DEFAULT NULL,
  `pembimbing_ta` varchar(50) DEFAULT NULL,
  `tanggal_peng` date DEFAULT NULL,
  `tanggal_awal` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `status` enum('Dalam Bimbingan','Lulus') DEFAULT NULL,
  `topik_ta_sebelum` text,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_panjang` date DEFAULT NULL,
  `batas_waktu` varchar(50) DEFAULT NULL,
  `ipk` float DEFAULT NULL,
  `penguji1` varchar(50) DEFAULT NULL,
  `penguji2` varchar(50) DEFAULT NULL,
  `tanggal_sidang` date DEFAULT NULL,
  `waktu_sidang` varchar(5) DEFAULT NULL,
  `tempat_sidang` varchar(50) DEFAULT NULL,
  `keterangan` text,
  `tanggal_yudisium` date DEFAULT NULL,
  `konsentrasi` varchar(30) DEFAULT NULL,
  `tanggal_pra_sid` date DEFAULT NULL,
  `status_pra_sid` varchar(30) DEFAULT NULL,
  `waktu_pra_sid` varchar(5) DEFAULT NULL,
  `penguji_pra_sid` varchar(50) DEFAULT NULL,
  `tahun_akademik_peng` varchar(9) DEFAULT NULL,
  `tahun_akademik_lulus` varchar(9) DEFAULT NULL,
  `semesterh_lulus` enum('Ganjil','Genap') DEFAULT NULL,
  `lampiran_foto` text,
  `lampiran_proposal` text,
  `nidn` varchar(30) DEFAULT NULL,
  `tempat_pra_sid` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_datata`
--

INSERT INTO `t_datata` (`id_ta`, `nama_mahasiswa`, `npm`, `semester`, `alamat`, `telepon`, `email`, `topik_ta`, `nid`, `pembimbing_ta`, `tanggal_peng`, `tanggal_awal`, `tanggal_akhir`, `status`, `topik_ta_sebelum`, `tanggal_lahir`, `tempat_lahir`, `tanggal_panjang`, `batas_waktu`, `ipk`, `penguji1`, `penguji2`, `tanggal_sidang`, `waktu_sidang`, `tempat_sidang`, `keterangan`, `tanggal_yudisium`, `konsentrasi`, `tanggal_pra_sid`, `status_pra_sid`, `waktu_pra_sid`, `penguji_pra_sid`, `tahun_akademik_peng`, `tahun_akademik_lulus`, `semesterh_lulus`, `lampiran_foto`, `lampiran_proposal`, `nidn`, `tempat_pra_sid`) VALUES
(1, 'Nathan Drake', '0613u051', 8, 'Kuala Lumpur, Malaysia', '081234567666', 'uncharted@gmail.com', 'Mencari harta karun bajak laut avery, dan bersaing dengan teman lama', '01011021011', 'Dosen 11', '2018-04-26', '2018-02-10', '2018-08-10', 'Dalam Bimbingan', '', '1994-12-16', 'New York', NULL, NULL, NULL, '', '', NULL, '', '', '', NULL, 'Information Technology', NULL, '', '', '', '2017/2018', '', '', 'Digivolving_Alphamon_Ouryuken_Gallantmon_Crimson_Mode_-_Cyber_Sleuth-_Hackers_Memory_MKV_snapshot_00_40.jpg', 'LAPORAN_PERKEMBANGAN_PROYEK_INTERNET_OF_THINGS_UNTUK_DISERTAKAN_MENGIKUTI_LOMBA_GEMASTIK_2017.docx', '01011021001011', NULL),
(2, 'Altair Ibn La\'Ahad', '0613u046', 8, 'Masyaf Castle, Syria', '08123456099', 'ac@ubi.com', 'Membuat pondasi dan tujuan Persaudaraan Assassin lebih terarah dan demi masyarakat', '01011021008', 'Dosen 8', '2018-04-26', '2018-02-10', '2018-08-10', 'Lulus', 'Menjadi Assassin yang sembrono', '1996-07-17', 'Masyaf', '2018-08-24', '6 Bualan', 4.01, 'Al-Mualim', 'Abas Sofyan', '2018-12-22', '21:45', 'Masyaf Castle', 'Legend of Assassin', '2018-10-27', 'Game dan Multimedia', '2018-10-20', 'Ya', '21:00', 'Ezio Auditore da FIrenze', '2017/2018', '2018/2019', 'Ganjil', 'images.jpg', '', '01011021001008', NULL),
(3, 'Noriaki Kakyoin', '0613u002', 9, 'Tokyo, Japan', '081234567976', 'hierrophant_green@yahoo.co.jp', 'Menyelamatkan ibu temanku', '01011021005', 'Dosen 5', '2018-04-27', '2018-02-10', '2018-08-10', 'Dalam Bimbingan', NULL, '1994-09-07', 'Shizuoka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Game dan Multimedia', NULL, NULL, NULL, NULL, '2017/2018', NULL, NULL, 'nk.jpg', 'Perbandingan_Microcontroller_AVR_STK1.docx', '01011021001005', NULL),
(4, 'Danny Drinkwater', '0613u090', 8, 'London, UK', '082312231111', 'drinkwater@yahoo.uk', 'Mengulang kejayaan menjadi juara liga premier inggris bersama Chelsea ', '01011021003', 'Dosen 3', '2017-02-08', '2018-02-10', '2018-08-10', 'Lulus', 'Juara bersama Leicester City', '1991-07-19', 'Manchester', '2017-11-17', '6 Bulan', 3.12, 'Claudio Ranieri', 'Nigel Pearson', '2018-04-09', '09:15', 'Ruang Sidang Lt2', 'kl', '2018-04-09', 'Applied Database', '2018-04-08', 'Ya', '10:00', 'Sam Allerdyce', '2016/2017', '2017/2018', 'Genap', 'drink.jpg', 'Compact_Cassette.docx', '01011021001003', NULL),
(5, 'Alberto Gilardino', '0614u029', 8, 'Napoli, Italia', '08121111111', 'gilardino11@yahoo.it', 'Main bola di Italia', '01011021005', 'Dosen 5', '2018-01-16', '2018-02-10', '2018-08-10', 'Dalam Bimbingan', '', '1994-08-27', 'Milano', NULL, NULL, NULL, '', '', NULL, '', '', '', NULL, 'Applied Database', NULL, 'Tidak', '', '', '2016/2017', '', '', 'wpid-img20150828_084624-740x431.jpg', 'Instalasi_Game.docx', '01011021001005', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_dosen`
--

CREATE TABLE `t_dosen` (
  `id_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(50) DEFAULT NULL,
  `nid` varchar(30) DEFAULT NULL,
  `jenis_bimbingan` enum('Kerja Praktek','Tugas Akhir','Both') DEFAULT NULL,
  `nidn` varchar(30) DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_dosen`
--

INSERT INTO `t_dosen` (`id_dosen`, `nama_dosen`, `nid`, `jenis_bimbingan`, `nidn`, `status`) VALUES
(1, 'Dosen 1', '01011021001', 'Kerja Praktek', '01011021001001', 'Aktif'),
(2, 'Dosen 2', '01011021002', 'Tugas Akhir', '01011021001002', 'Aktif'),
(3, 'Dosen 3', '01011021003', 'Both', '01011021001003', 'Aktif'),
(4, 'Dosen 4', '01011021004', 'Tugas Akhir', '01011021001004', 'Aktif'),
(5, 'Dosen 5', '01011021005', 'Tugas Akhir', '01011021001005', 'Aktif'),
(6, 'Dosen 6', '01011021006', 'Both', '01011021001006', 'Aktif'),
(7, 'Dosen 7', '01011021007', 'Kerja Praktek', '01011021001007', 'Aktif'),
(8, 'Dosen 8', '01011021008', 'Both', '01011021001008', 'Aktif'),
(9, 'Dosen 9', '01011021009', 'Kerja Praktek', '01011021001009', 'Aktif'),
(10, 'Dosen 10', '01011021010', 'Kerja Praktek', '01011021001010', 'Aktif'),
(11, 'Dosen 11', '01011021011', 'Tugas Akhir', '01011021001011', 'Aktif'),
(13, 'Dosen 94', '01011021094', 'Kerja Praktek', '01011021001094', 'Aktif'),
(14, 'Dosen 117', '01011021117', 'Tugas Akhir', '010110210010117', 'Tidak Aktif'),
(15, 'Dosen 73', '01011021073', 'Both', '01011021001073', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_frontkp`
--

CREATE TABLE `t_frontkp` (
  `id` int(11) NOT NULL,
  `npm` varchar(10) DEFAULT NULL,
  `nama_mahasiswa` varchar(60) DEFAULT NULL,
  `topik_kp` text,
  `status` enum('Diterima','Ditolak','Tunggu') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_frontkp`
--

INSERT INTO `t_frontkp` (`id`, `npm`, `nama_mahasiswa`, `topik_kp`, `status`) VALUES
(1, '0613u049', 'Muhammad Ihsan Fadhil', 'Sistem Pengajuan Kerja Praktek dan Tugas Akhir di Program Studi Universitas Widyatama', 'Diterima'),
(2, '0613u050', 'Alberto Aquilani', 'Cara main tetap di sebuah klub lebih dari 2 tahun', 'Ditolak'),
(3, '0613u047', 'Lukas Podolski', 'Cara dapat karir klub yang bagus sebagus karir timnas', 'Ditolak'),
(4, '0613u001', 'Gyro Zeppeli', 'Menghentikan usaha presiden amerika untuk menguasai tulang suci', 'Ditolak'),
(5, '0613u002', 'Levi Ackerman', 'Slice Titan... Slice Titan... Slice Titan... Slice Titan... Slice Titan... Slice Titan...', 'Ditolak'),
(6, '0613u047', 'Juan Manuel Mata Garcia', 'Main sebagai AMF di Manchester United F.C', 'Diterima'),
(8, '0615101038', 'Muhammad fadillah', 'jgjgjgjgjgjhgjhgjh', 'Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_frontta`
--

CREATE TABLE `t_frontta` (
  `id` int(111) NOT NULL,
  `npm` varchar(10) DEFAULT NULL,
  `nama_mahasiswa` varchar(60) DEFAULT NULL,
  `topik_ta` text,
  `konsentrasi` varchar(30) DEFAULT NULL,
  `status` enum('Diterima','Tunggu','Ditolak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_frontta`
--

INSERT INTO `t_frontta` (`id`, `npm`, `nama_mahasiswa`, `topik_ta`, `konsentrasi`, `status`) VALUES
(1, '0613u051', 'Jonathan Joestar', 'Cara agar tidak terlena dengan kemenangan dengan cara melihat kondisi musuh yang sudah dikalahkan.', 'Information Technology', 'Ditolak'),
(2, '0613u089', 'Dummy', 'asdasds', 'Applied Database', 'Ditolak'),
(3, '0613u051', 'Nathan Drake', 'Mencari harta karun bajak laut avery', 'Information Technology', 'Ditolak'),
(4, '0612u049', 'Shay Patrick Cormac', 'Melenyapkan persaudaraan Assassin yang SENTOLOP', 'Applied Networking', 'Ditolak'),
(5, '0613u002', 'Noriaki Kakyoin', 'Menyelamatkan ibu temanku', 'Game dan Multimedia', 'Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pengajuankp`
--

CREATE TABLE `t_pengajuankp` (
  `id` int(111) NOT NULL,
  `npm` varchar(10) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `alamat` text,
  `telepon` varchar(14) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `topik_kp` text,
  `nid1` varchar(30) DEFAULT NULL,
  `nid2` varchar(30) DEFAULT NULL,
  `pembimbing1` varchar(50) DEFAULT NULL,
  `pembimbing2` varchar(50) DEFAULT NULL,
  `nama_perusahaan` varchar(50) DEFAULT NULL,
  `alamat_perusahaan` text,
  `pembimbinglap` varchar(50) DEFAULT NULL,
  `lampiran1` text,
  `lampiran2` text,
  `lampiran3` text,
  `tanggal_peng` date DEFAULT NULL,
  `jumlah_sks` int(111) DEFAULT NULL,
  `pass` enum('Ya','Tunggu') DEFAULT NULL,
  `tahun_akademik_peng` varchar(9) DEFAULT NULL,
  `status` enum('Diterima','Tunggu') DEFAULT NULL,
  `nama_mahasiswa` varchar(60) DEFAULT NULL,
  `nidn1` varchar(30) DEFAULT NULL,
  `nidn2` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_pengajuankp`
--

INSERT INTO `t_pengajuankp` (`id`, `npm`, `semester`, `alamat`, `telepon`, `email`, `topik_kp`, `nid1`, `nid2`, `pembimbing1`, `pembimbing2`, `nama_perusahaan`, `alamat_perusahaan`, `pembimbinglap`, `lampiran1`, `lampiran2`, `lampiran3`, `tanggal_peng`, `jumlah_sks`, `pass`, `tahun_akademik_peng`, `status`, `nama_mahasiswa`, `nidn1`, `nidn2`) VALUES
(6, '0613u047', 8, 'Madrid, Spain', '081234564434', 'mata8@gmail.com', 'Main sebagai AMF di Manchester United F.C', '01011021001', '01011021010', 'Dosen 1', 'Dosen 10', 'Manchester United F.C', 'Sir Bobby Charlton Street, Manchester, UK', 'Jose Mourinho', 'AWSubs_Handa-kun_-_03_480p7E035DC4_mkv_snapshot_23_42_2016_08_05_21_59_51.jpg', '10__teori_permainan.pdf', 'mata.jpg', '2018-04-27', 120, 'Ya', '2017/2018', 'Diterima', 'Juan Manuel Mata Garcia', '01011021001', '01011021010'),
(8, '0615101038', 7, 'bandung', '081234567890', 'lupa@hotmail.com', 'jgjgjgjgjgjhgjhgjh', '01011021001', '01011021010', 'Dosen 1', 'Dosen 10', 'hkhk', 'gjgjgjhg', 'ibenk', 'AWSubs_Digimon_Adventure_tri_-_15_480pBE7795C4_mkv_snapshot_19_19_2017_02_25_11_48_51.jpg', 'AWSubs_Digimon_Adventure_tri_-_15_480pBE7795C4_mkv_snapshot_19_19_2017_02_25_11_48_51.jpg', 'SpongeBob_(5).png', '2018-05-09', 120, 'Ya', '2017/2018', 'Diterima', 'Muhammad fadillah', '01011021001001', '01011021001010');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pengajuanproposal`
--

CREATE TABLE `t_pengajuanproposal` (
  `id` bigint(20) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `npm` varchar(20) NOT NULL,
  `konsentrasi` varchar(50) NOT NULL,
  `topik_ta` text NOT NULL,
  `latar_belakang` mediumtext NOT NULL,
  `r_latar` mediumtext NOT NULL,
  `rumusan_masalah` mediumtext NOT NULL,
  `r_rumusan` mediumtext NOT NULL,
  `tujuan` mediumtext NOT NULL,
  `r_tujuan` mediumtext NOT NULL,
  `batasan_masalah` mediumtext NOT NULL,
  `r_batasan` mediumtext NOT NULL,
  `metodologi_penelitian` mediumtext NOT NULL,
  `r_metodologi` mediumtext NOT NULL,
  `landasan_teori_alur_kerja` mediumtext NOT NULL,
  `r_landasan` mediumtext NOT NULL,
  `status` enum('Tunggu','Diterima','Revisi') NOT NULL,
  `nid` varchar(30) NOT NULL,
  `dosen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_pengajuanproposal`
--

INSERT INTO `t_pengajuanproposal` (`id`, `nama_mahasiswa`, `npm`, `konsentrasi`, `topik_ta`, `latar_belakang`, `r_latar`, `rumusan_masalah`, `r_rumusan`, `tujuan`, `r_tujuan`, `batasan_masalah`, `r_batasan`, `metodologi_penelitian`, `r_metodologi`, `landasan_teori_alur_kerja`, `r_landasan`, `status`, `nid`, `dosen`) VALUES
(1, 'Muhammad Fadillah', '0615101038', 'Applied Database', 'Businness Inteligence', 'In an earlier chapter, we discussed the numerous steps required for most data warehouse projects. No matter how the data was captured initially or what storage format was used, few data sources are constructed for use in BI. The typical enterprise has multiple data sources and archived information that may be required to put together the information needed for analysis. The steps typically look like those shown in Figure 7-1.\r\n\r\nThe diagram implies a cycle. Some illustrations used by vendors today show a path that leads from the first process to final delivery. The implication is that you do this dance one time and you\'re finished. This is seldom, if ever, a one-way series of events. Things change. New data is added. New systems are purchased (e.g., ERP, CRM). Mergers and acquisitions happen. Most of all, the business needs change. We have to account for all of these in order to provide an effective BI strategy.\r\n', '', 'The top-down approach is nearly impossible to deliver in many cases due to the sheer amount of time it would take to implement it. Enterprises that were early adapters of relational database systems have the best chance to complete such ambitious efforts due to their knowledge of data and the many tools used to build, load, move, tune, and copy information. You have to provide a database that is malleable, or you simply cannot be fleet of foot to handle change.\r\nThe bottom-up approach tends to deliver solutions faster due to the reduced scale of data and effort required. The problem normally associated with this approach is that the marts seldom get to the enterprise roll-up phase, and you often wind up with multiple marts with redundant information.\r\nThe most important thing to decide regardless of either approach is what the impact will be on the business and what the goals are when creating any new data source. If you decide at the onset that you will create a value as the \"parent\" for all permutations of the data, then the planned roll-out will allow you the maximum flexibility.', '', 'returns of the item for quality purposes or may want to have accurate information on how many of the item went out the door and did not come back.\r\nIn such a scenario, we will have different \"adjustments\" made for gross sales, net sales, returns, etc. If the core value of sales is used in multiple areas, it is a candidate for a warehouse. If, however, many areas use gross sales, net sales, and returns (or whatever) in their reporting and BI applications, then all these values should be maintained in a central store.\r\nIf we don\'t spend time understanding how a seemingly common value is used in the enterprise, we wind up with BI anarchy. We also wind up with multiple, disparate reports and results because returns may be calculated at a different time than the latest sales figures were updated, and we have to account for matching dates and more.', '', 'I have been in many meetings in which there were multiple, disparate values stored or derived for the same data. The vigorous discussions among users and IT as to who is holding the real value and why are awkward for the participants and painful to witness. There are often multiple derivations of the same value strictly due to timing or some differences in business processes.\r\nAs a former marine biologist, this modus operandi reminds me of how a jellyfish is constructed. Jellyfish are not single organisms with a body per se. Rather, they are colonies of cells that specialize and somehow work together. Many enterprises operate their BI environment that way. Somehow, they arrive at the same place and survive, but they have little or no direct communication or coordination among all the parts. Most jellyfish wind up on the shore drying out, because they simply cannot swim strongly enough to remain at sea.\r\n', '0', 'They resolve discrepancies with \"on-the-fly\" fixes to the new RDB based on business knowledge from their Customer Relations and Sales departments. They have not integrated some of the newer, advanced data cleansing technologies, so they are performing asynchronous data scrubbing.\r\nIf they clean out the defunct customers, they have less information and smaller volumes of data. However, they also want to use buying patterns, product sales, and market analysis such that some of the defunct information might be of value to them. They face these issues in such a scenario:\r\n•	The sheer size of the data\r\n•	Multiple forms and formats of the same data\r\n•	Different users of parts of the data, making a universal delete or adjustment difficult\r\n•	New data constantly being added so they can\'t \"stop the presses\"\r\n•	Many manual adjustments\r\n', '', 'Summary_chapter_71.docx', '', 'Revisi', '', ''),
(2, 'Narita Naomi', '0615101022', 'Applied Database', 'Data Warehouse', 'Untuk menyiasati terhadap kondisi kendaraan yang mogok, sedangkan rumitnya service/perbaikan yang harus mencari terlebih dahulu bengkel kendaraan motor lalu mendorong kendaraan sampai bengkel tujuan. Kita perlu melakukan suatu langkah terobosan untuk mengatasi kondisi tersebut. Sebagai contoh jika sebuah kendaraan bermotor mogok lalu jauh dari bengkel, pengguna kendaraan bermotor tersebut pasti akan bingung untuk membawa kemana kendaraan tersebut untuk di service/perbaikan. Maka dengan keadaan seperti ini, Apabila dibuatkan sebuah aplikasi yang membantu untuk mencari seorang montir akan mempermudah untuk situasi seperti ini.\r\n	Berdasarkan pada hal tersebut diatas maka kami terinspirasi  untuk membuat suatu aplikasi berbasis mobile yang dapat mencarikan seorang montir yang dapat datang ke tempat kendaraan yang mogok tersebut, sehingga pengguna kendaraan tidak perlu lagi mendorong kendaraannya dan mencari bengkel yang dapat mengeluarkan banyak tenaga.\r\n', '', 'Berdasarkan uraian latar belakang diatas, maka penulis mengidentifikasi dan merumuskan masalah yang ada adalah bagaimana membuat suatu program aplikasi untuk membantu  mencari seorang montir kendaraan bermotor yang dapat datang ke lokasi kendaraan mogok tersebut.', '', 'Produk yang akan kami rancang adalah produk yang berupa program aplikasi pencari montir yang berbasis mobile sehingga dapat digunakan di smartphone. Aplikasi tersebut adalah original produk baru hasil pemikiran kami, karena produk tersebut belum ditemukan dan belum ada dipasaran umum. Produk ini mempunyai keunggulan dari sisi manfaat, adapun untuk penjelasannya sebagai berikut.\r\n1.	Sangat cocok untuk pengguna yang mempunyai mobilitas yang tinggi, karena sang montir akan menghampiri pengguna dan tidak perlu lagi mencari sebuah bengkel.\r\n2.	Pemakaian yang mudah sehingga tidak perlu repot untuk menggunakannya.\r\n3.	Berbasis mobile, sehingga bisa digunakan di smartphone.\r\n', '', 'Decision support systems (DSS) atau bisa juga disebut Sistem pendukung keputusan adalah sistem berbasis software yang dimaksudkan untuk membantu manajer dalam pengambilan keputusan dengan mengakses sejumlah besar informasi yang dihasilkan dari berbagai sistem informasi terkait yang terlibat dalam proses bisnis organisasi, seperti sistem automatis kantor, sistem pemrosesan transaksi, dll.\r\n 	DSS menggunakan ringkasan informasi, pengecualian, pola, dan tren menggunakan model analisis. Sistem pendukung keputusan membantu dalam pembuatan keputusan namun tidak harus memberikan keputusan itu sendiri. Para pengambil keputusan mengumpulkan informasi yang berguna dari data mentah, dokumen, pengetahuan pribadi, dan / atau model bisnis untuk mengidentifikasi dan memecahkan masalah dan membuat keputusan.\r\n', '0', 'Metode ARAS (Additive Ratio Assessment) pertama kali diperkenalkan oleh Zavadskas dan Turksis (2010). Metode ini menentukan kinerja alternatif dan membandingkan nilai alternatif dengan alternatif ideal. Dikatakan bahwa rasio jumlah nilai normalisasi tertimbang dari alternatif terhadap jumlah nilai tertimbang yang dinormalisasi dari alternatif optimal karena semua kriteria adalah tingkat optimalitas alternatif yang dibandingkan (Turskis dan Zavadskas, 2010). Dalam literatur ada banyak implementasi metode ARAS yang berhasil. Zavadskas dan Turskis (2010) pertama kali memperkenalkan metode ARAS dan mengevaluasi iklim mikro di ruang kantor untuk menggambarkan metode ini. Zavadskas dkk. (2010) memilih alternatif cicilan pondasi dalam membangun kembali bangunan dengan metode ARAS. Tupenaite (2010) mengevaluasi proyek renovasi warisan budaya di Bulgaria dengan menggunakan metode SAW, TOPSIS, COPRAS dan ARAS. Bakshi dan Sarkar (2011) memilih proyek ekspansi serat optik untuk sektor telekomunikasi dengan metode ARAS. Balezentiene dan Kusta (2012) menggunakan metode ARAS untuk mengurangi emisi gas rumah kaca di ekosistem padang rumput di Lithuania tengah. Stanujkic dan Jovanovic (2012) menerapkan metode ARAS untuk mengevaluasi kualitas situs fakultas. Kaklauskas dkk.', '', 'Latar_Belakang,Identifikasi,manfaat.docx', '', 'Diterima', '', ''),
(3, 'Galang Subagja', '0615101028', 'Applied Database', 'Data Mining', 'Untuk menyiasati terhadap kondisi kendaraan yang mogok, sedangkan rumitnya service/perbaikan yang harus mencari terlebih dahulu bengkel kendaraan motor lalu mendorong kendaraan sampai bengkel tujuan. Kita perlu melakukan suatu langkah terobosan untuk mengatasi kondisi tersebut. Sebagai contoh jika sebuah kendaraan bermotor mogok lalu jauh dari bengkel, pengguna kendaraan bermotor tersebut pasti akan bingung untuk membawa kemana kendaraan tersebut untuk di service/perbaikan. Maka dengan keadaan seperti ini, Apabila dibuatkan sebuah aplikasi yang membantu untuk mencari seorang montir akan mempermudah untuk situasi seperti ini.\r\n	Berdasarkan pada hal tersebut diatas maka kami terinspirasi  untuk membuat suatu aplikasi berbasis mobile yang dapat mencarikan seorang montir yang dapat datang ke tempat kendaraan yang mogok tersebut, sehingga pengguna kendaraan tidak perlu lagi mendorong kendaraannya dan mencari bengkel yang dapat mengeluarkan banyak tenaga.\r\n', 'ada yang salah', 'Berdasarkan uraian latar belakang diatas, maka penulis mengidentifikasi dan merumuskan masalah yang ada adalah bagaimana membuat suatu program aplikasi untuk membantu  mencari seorang montir kendaraan bermotor yang dapat datang ke lokasi kendaraan mogok tersebut.', 'ada yang salah', 'Produk yang akan kami rancang adalah produk yang berupa program aplikasi pencari montir yang berbasis mobile sehingga dapat digunakan di smartphone. Aplikasi tersebut adalah original produk baru hasil pemikiran kami, karena produk tersebut belum ditemukan dan belum ada dipasaran umum. Produk ini mempunyai keunggulan dari sisi manfaat, adapun untuk penjelasannya sebagai berikut.\r\n1.	Sangat cocok untuk pengguna yang mempunyai mobilitas yang tinggi, karena sang montir akan menghampiri pengguna dan tidak perlu lagi mencari sebuah bengkel.\r\n2.	Pemakaian yang mudah sehingga tidak perlu repot untuk menggunakannya.\r\n3.	Berbasis mobile, sehingga bisa digunakan di smartphone.\r\n', 'ada yang salah ', 'Decision support systems (DSS) atau bisa juga disebut Sistem pendukung keputusan adalah sistem berbasis software yang dimaksudkan untuk membantu manajer dalam pengambilan keputusan dengan mengakses sejumlah besar informasi yang dihasilkan dari berbagai sistem informasi terkait yang terlibat dalam proses bisnis organisasi, seperti sistem automatis kantor, sistem pemrosesan transaksi, dll.\r\n 	DSS menggunakan ringkasan informasi, pengecualian, pola, dan tren menggunakan model analisis. Sistem pendukung keputusan membantu dalam pembuatan keputusan namun tidak harus memberikan keputusan itu sendiri. Para pengambil keputusan mengumpulkan informasi yang berguna dari data mentah, dokumen, pengetahuan pribadi, dan / atau model bisnis untuk mengidentifikasi dan memecahkan masalah dan membuat keputusan.\r\n', '0', 'Metode ARAS (Additive Ratio Assessment) pertama kali diperkenalkan oleh Zavadskas dan Turksis (2010). Metode ini menentukan kinerja alternatif dan membandingkan nilai alternatif dengan alternatif ideal. Dikatakan bahwa rasio jumlah nilai normalisasi tertimbang dari alternatif terhadap jumlah nilai tertimbang yang dinormalisasi dari alternatif optimal karena semua kriteria adalah tingkat optimalitas alternatif yang dibandingkan (Turskis dan Zavadskas, 2010). Dalam literatur ada banyak implementasi metode ARAS yang berhasil. Zavadskas dan Turskis (2010) pertama kali memperkenalkan metode ARAS dan mengevaluasi iklim mikro di ruang kantor untuk menggambarkan metode ini. Zavadskas dkk. (2010) memilih alternatif cicilan pondasi dalam membangun kembali bangunan dengan metode ARAS. Tupenaite (2010) mengevaluasi proyek renovasi warisan budaya di Bulgaria dengan menggunakan metode SAW, TOPSIS, COPRAS dan ARAS. Bakshi dan Sarkar (2011) memilih proyek ekspansi serat optik untuk sektor telekomunikasi dengan metode ARAS. Balezentiene dan Kusta (2012) menggunakan metode ARAS untuk mengurangi emisi gas rumah kaca di ekosistem padang rumput di Lithuania tengah. Stanujkic dan Jovanovic (2012) menerapkan metode ARAS untuk mengevaluasi kualitas situs fakultas. Kaklauskas dkk.', 'ada yang salah ', 'Latar_Belakang,Identifikasi,manfaat1.docx', 'formatnya salah', 'Revisi', '', ''),
(4, 'Muhammad Fadillah', '0615101038', 'Applied Database', 'Businness Inteligence', 'In an earlier chapter, we discussed the numerous steps required for most data warehouse projects. No matter how the data was captured initially or what storage format was used, few data sources are constructed for use in BI. The typical enterprise has multiple data sources and archived information that may be required to put together the information needed for analysis. The steps typically look like those shown in Figure 7-1.\r\n\r\nThe diagram implies a cycle. Some illustrations used by vendors today show a path that leads from the first process to final delivery. The implication is that you do this dance one time and you\'re finished. This is seldom, if ever, a one-way series of events. Things change. New data is added. New systems are purchased (e.g., ERP, CRM). Mergers and acquisitions happen. Most of all, the business needs change. We have to account for all of these in order to provide an effective BI strategy.\r\n', 'tes', 'The top-down approach is nearly impossible to deliver in many cases due to the sheer amount of time it would take to implement it. Enterprises that were early adapters of relational database systems have the best chance to complete such ambitious efforts due to their knowledge of data and the many tools used to build, load, move, tune, and copy information. You have to provide a database that is malleable, or you simply cannot be fleet of foot to handle change.\r\nThe bottom-up approach tends to deliver solutions faster due to the reduced scale of data and effort required. The problem normally associated with this approach is that the marts seldom get to the enterprise roll-up phase, and you often wind up with multiple marts with redundant information.\r\nThe most important thing to decide regardless of either approach is what the impact will be on the business and what the goals are when creating any new data source. If you decide at the onset that you will create a value as the ', 'tes', 'returns of the item for quality purposes or may want to have accurate information on how many of the item went out the door and did not come back.\r\nIn such a scenario, we will have different ', 'tes', 'I have been in many meetings in which there were multiple, disparate values stored or derived for the same data. The vigorous discussions among users and IT as to who is holding the real value and why are awkward for the participants and painful to witness. There are often multiple derivations of the same value strictly due to timing or some differences in business processes.\r\nAs a former marine biologist, this modus operandi reminds me of how a jellyfish is constructed. Jellyfish are not single organisms with a body per se. Rather, they are colonies of cells that specialize and somehow work together. Many enterprises operate their BI environment that way. Somehow, they arrive at the same place and survive, but they have little or no direct communication or coordination among all the parts. Most jellyfish wind up on the shore drying out, because they simply cannot swim strongly enough to remain at sea.\r\n', 'tes', 'They resolve discrepancies with ', 'tes', 'Summary_chapter_72.docx', 'tes', 'Revisi', '01011021002', 'Dosen 2'),
(5, 'Muhammad Fadillah', '0615101038', 'Applied Database', 'Business Intelegent', 'tes', '', 'tes', '', 'tes', '', 'tes', '', 'tes', '', 'Format_Matriks.docx', '', 'Tunggu', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pengajuanta`
--

CREATE TABLE `t_pengajuanta` (
  `id` int(111) NOT NULL,
  `npm` varchar(10) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `konsentrasi` varchar(30) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `alamat` text,
  `telepon` varchar(14) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `topik_ta` text,
  `nid1` varchar(30) DEFAULT NULL,
  `nid2` varchar(30) DEFAULT NULL,
  `pembimbing1` varchar(50) DEFAULT NULL,
  `pembimbing2` varchar(50) DEFAULT NULL,
  `lampiran1` text,
  `lampiran2` text,
  `lampiran3` text,
  `lampiran4` text,
  `lampiran5` text,
  `lampiran6` text,
  `status` enum('Diterima','Tunggu') DEFAULT NULL,
  `tanggal_peng` date DEFAULT NULL,
  `jumlah_sks` int(11) DEFAULT NULL,
  `pass` enum('Ya','Tunggu') DEFAULT NULL,
  `tahun_akademik_peng` varchar(9) DEFAULT NULL,
  `nama_mahasiswa` varchar(60) DEFAULT NULL,
  `nidn1` varchar(30) DEFAULT NULL,
  `nidn2` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_pengajuanta`
--

INSERT INTO `t_pengajuanta` (`id`, `npm`, `tanggal_lahir`, `tempat_lahir`, `konsentrasi`, `semester`, `alamat`, `telepon`, `email`, `topik_ta`, `nid1`, `nid2`, `pembimbing1`, `pembimbing2`, `lampiran1`, `lampiran2`, `lampiran3`, `lampiran4`, `lampiran5`, `lampiran6`, `status`, `tanggal_peng`, `jumlah_sks`, `pass`, `tahun_akademik_peng`, `nama_mahasiswa`, `nidn1`, `nidn2`) VALUES
(3, '0613u051', '1994-12-16', 'New York', 'Information Technology', 8, 'Kuala Lumpur, Malaysia', '081234567666', 'uncharted@gmail.com', 'Mencari harta karun bajak laut avery', '01011021002', '01011021011', 'Dosen 2', 'Dosen 11', 'Digimon-Story-Cyber-Sleuth-Hackers-Memory_2017_08-08-17_001.jpg', 'transkrip_2.pdf', 'Perbandingan_Microcontroller_AVR_STK.docx', 'Digimon-Story-Cyber-Sleuth-Hackers-Memory_2017_08-08-17_015.jpg', 'Screenshot_2017-10-24_22_20_34.png', 'Digivolving_Alphamon_Ouryuken_Gallantmon_Crimson_Mode_-_Cyber_Sleuth-_Hackers_Memory_MKV_snapshot_00_40.jpg', 'Diterima', '2018-04-26', 139, 'Ya', '2017/2018', 'Nathan Drake', '01011021002', '01011021011'),
(5, '0613u002', '1994-09-07', 'Shizuoka', 'Game dan Multimedia', 9, 'Tokyo, Japan', '081234567976', 'hierrophant_green@yahoo.co.jp', 'Menyelamatkan ibu temanku', '01011021004', '01011021011', 'Dosen 4', 'Dosen 11', 'YouTube_MKV_snapshot_01_59.jpg', 'ATIKAH_UJIKONTEN.docx', 'Perbandingan_Microcontroller_AVR_STK1.docx', '18158202673-466707728-ticket_2.pdf', 'Screenshot_2017-10-24_22_20_341.png', 'nk.jpg', 'Diterima', '2018-04-27', 139, 'Ya', '2017/2018', 'Noriaki Kakyoin', '01011021004', '01011021011');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `nama_user` varchar(60) DEFAULT NULL,
  `npm` varchar(50) NOT NULL,
  `konsentrasi` varchar(30) DEFAULT NULL,
  `jenis_bimbingan` enum('Tugas Akhir','Kerja Praktek','Both') DEFAULT NULL,
  `nid` varchar(30) DEFAULT NULL,
  `level` enum('Admin','Dosen','Prodi','Kalab','Mhs') DEFAULT NULL,
  `foto` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id`, `username`, `password`, `nama_user`, `npm`, `konsentrasi`, `jenis_bimbingan`, `nid`, `level`, `foto`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Pak Dhani', '', '', NULL, '', 'Admin', 'mata1.jpg'),
(2, 'prodi', '32b404761d910d277789cd91076d1459', 'Prodi Coba', '', '', NULL, '', 'Prodi', 'SpongeBob_(5).png'),
(3, 'dosen1', 'f499263a253447dd5cb68dafb9f13235', 'Dosen 1', '', '', 'Kerja Praktek', '01011021001', 'Dosen', NULL),
(4, 'dosen2', 'ac41c4e0e6ef7ac51f0c8f3895f82ce5', 'Dosen 2', '', 'Applied Database', 'Tugas Akhir', '01011021002', 'Dosen', 'iyus2.jpg'),
(5, 'dosen3', '1192feff42fadff1d7e0aa1210fed1e3', 'Dosen 3', '', '', 'Both', '01011021003', 'Dosen', 'Digimon-Story-Cyber-Sleuth-Hackers-Memory_2017_06-22-17_015_(2).jpg'),
(6, 'prodi2', '5575ef8fb51d0dd67ea3d77a737fb5b9', 'Bu Ka. Prodi', '', '', '', '', 'Prodi', 'cshm_(1).png'),
(7, 'dosen11', '2cf10dca06a03b19936c504fa9372e6b', 'Dosen 11', '', 'Interfacing System', 'Tugas Akhir', '01011021011', 'Dosen', 'nk.jpg'),
(9, 'prodi3', 'd41d8cd98f00b204e9800998ecf8427e', 'prodi3', '', '', '', '', 'Prodi', ''),
(10, 'dosen73', '5335d74cde4117b27579207ab3f8e936', 'Dosen 73', '', 'Game dan Multimedia', 'Both', '01011021073', 'Dosen', 'Melody_Saiki_Kusuo_no_Psi-nan_-_22_480_C913EA1E_2_mkv_snapshot_15_39_2016_12_20_19_28_03_2.jpg'),
(11, 'fadil', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'fadil', '0615101038', 'applied database', NULL, NULL, 'Mhs', 'Desain_Topi.JPG'),
(12, 'kalab', '966676a567d83cf0fbeb8cd5c280a589', 'kalab', '', 'applied database', 'Both', '88845452257', 'Kalab', 'iyus1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_datakp`
--
ALTER TABLE `t_datakp`
  ADD PRIMARY KEY (`id_kp`);

--
-- Indexes for table `t_datata`
--
ALTER TABLE `t_datata`
  ADD PRIMARY KEY (`id_ta`);

--
-- Indexes for table `t_dosen`
--
ALTER TABLE `t_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `t_frontkp`
--
ALTER TABLE `t_frontkp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_frontta`
--
ALTER TABLE `t_frontta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pengajuankp`
--
ALTER TABLE `t_pengajuankp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pengajuanproposal`
--
ALTER TABLE `t_pengajuanproposal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pengajuanta`
--
ALTER TABLE `t_pengajuanta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_datakp`
--
ALTER TABLE `t_datakp`
  MODIFY `id_kp` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_datata`
--
ALTER TABLE `t_datata`
  MODIFY `id_ta` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_dosen`
--
ALTER TABLE `t_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `t_frontkp`
--
ALTER TABLE `t_frontkp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_frontta`
--
ALTER TABLE `t_frontta`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_pengajuankp`
--
ALTER TABLE `t_pengajuankp`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_pengajuanproposal`
--
ALTER TABLE `t_pengajuanproposal`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_pengajuanta`
--
ALTER TABLE `t_pengajuanta`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
