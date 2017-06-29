-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2017 at 11:37 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scm`
--

-- --------------------------------------------------------

--
-- Table structure for table `scm_about_page`
--

CREATE TABLE `scm_about_page` (
  `about_page` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scm_about_page`
--

INSERT INTO `scm_about_page` (`about_page`) VALUES
('<div><h1>Manajemen rantai suplai</h1><div><div>Dari Wikipedia bahasa Indonesia, ensiklopedia bebas</div><div><span>(Dialihkan dari&nbsp;Supply chain management)</span><div><div></div></div></div><div><a target="_blank" rel="nofollow" href="https://id.wikipedia.org/wiki/Manajemen_rantai_suplai#mw-head"></a><a target="_blank" rel="nofollow" href="https://id.wikipedia.org/wiki/Manajemen_rantai_suplai#p-search"></a></div><div><p><b>Manajemen Rantai Suplai</b>&nbsp;(<i>Supply chain management</i>) adalah sebuah ‘proses payung’ di mana&nbsp;<a target="_blank" rel="nofollow" href="https://id.wikipedia.org/wiki/Produk">produk</a>&nbsp;diciptakan dan disampaikan kepada&nbsp;<a target="_blank" rel="nofollow" href="https://id.wikipedia.org/wiki/Konsumen" title="Link: https://id.wikipedia.org/wiki/Konsumen">konsumen</a>&nbsp;dari sudut struktural. Sebuah&nbsp;<i>supply chain</i>&nbsp;(rantai&nbsp;<a target="_blank" rel="nofollow" href="https://id.wikipedia.org/w/index.php?title=Suplai&amp;action=edit&amp;redlink=1">suplai</a>) merujuk kepada&nbsp;<a target="_blank" rel="nofollow" href="https://id.wikipedia.org/wiki/Jaringan">jaringan</a>&nbsp;yang rumit dari hubungan yang mempertahankan&nbsp;<a target="_blank" rel="nofollow" href="https://id.wikipedia.org/wiki/Organisasi">organisasi</a>&nbsp;dengan rekan&nbsp;<a target="_blank" rel="nofollow" href="https://id.wikipedia.org/wiki/Bisnis">bisnisnya</a>&nbsp;untuk mendapatkan sumber produksi dalam menyampaikan kepada konsumen. (Kalakota, 2000, h197)</p><p>Tujuan yang hendak dicapai dari setiap rantai suplai adalah untuk memaksimalkan nilai yang dihasilkan secara keseluruhan (Chopra, 2001, h5). Rantai suplai yang terintegrasi akan meningkatkan keseluruhan nilai yang dihasilkan oleh rantai suplai tersebut.</p></div></div></div>');

-- --------------------------------------------------------

--
-- Table structure for table `scm_agen`
--

CREATE TABLE `scm_agen` (
  `id_agen` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_agen` varchar(50) NOT NULL,
  `nama_agen` varchar(50) NOT NULL,
  `no_telp_agen` varchar(30) NOT NULL,
  `alamat_agen` text NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scm_agen`
--

INSERT INTO `scm_agen` (`id_agen`, `id_user`, `kode_agen`, `nama_agen`, `no_telp_agen`, `alamat_agen`, `kota`, `kelurahan`, `created`, `modified`, `deleted`) VALUES
(1, 1, 'AGEN001', 'PT MITRA GASINDO PERSADA', '081804910101', 'Kp. Bakomsari Jl. Mayjen HE. Sukma RT 01/12 Harjasari Bogor Selatan', 'Kodya Bogor', 'Harjasari', '2017-04-23 17:15:14', '2017-04-23 17:17:32', '2017-04-23 17:19:34'),
(2, 1, 'AGEN002', 'PT NOVITA SURYA PRATAMA', '0251-8242535', 'Jl. Mayjen HE. Sukma Kp. Tajur Pugag Rt 03 Ciawi Bogor', 'Kab. Bogor', 'Banjarwaru', '2017-04-23 17:32:48', '2017-04-23 17:46:59', NULL),
(3, 1, 'AGEN003', 'PT MITRA GASINDO PERSADA', '081804910101', 'Kp. Bakomsari Jl. Mayjen HE. Sukma RT 01/12 Harjasari Bogor Selatan', 'Kodya Bogor', 'Harjasari', '2017-04-23 17:47:51', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scm_barang`
--

CREATE TABLE `scm_barang` (
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `harga_jual` decimal(10,0) NOT NULL,
  `harga_beli` decimal(10,0) NOT NULL,
  `diskon` decimal(10,0) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scm_barang`
--

INSERT INTO `scm_barang` (`id_barang`, `id_user`, `id_kategori`, `id_status`, `id_satuan`, `kode_barang`, `nama_barang`, `stock`, `harga_jual`, `harga_beli`, `diskon`, `keterangan`, `gambar`, `created`, `modified`, `deleted`) VALUES
(13, 1, 1, 1, 1, 'K001', 'LPG 3 Kilogram', 0, '16000', '10000', '0', 'Tabung Elpiji ukuran 3 kilogram untuk masyarakat', 'lpg3kg.PNG', '2017-04-15 17:27:14', '2017-05-03 11:40:01', NULL),
(14, 1, 1, 1, 1, 'K002', 'LPG 12 Kilogram', 0, '23000', '17000', '0', 'tabung 12 kilogram', 'elpiji12kg.PNG', '2017-04-15 17:30:32', '2017-05-03 11:39:55', NULL),
(17, 1, 1, 1, 1, 'K003', 'LPG Bright Gas 5,5 kg', 0, '55000', '45000', '0', 'Bright Gas mempunyai beberapa keunggulan yang tidak dimiliki oleh produk ELPIJI Pertamina lainnya. Seluruh tabung Bright Gas telah dilengkapi dengan katup pengaman ganda (Double Spindle Valve System) yang membuatnya 2x lebih aman dari kebocoran. Sehingga jika salah satu katupnya rusak, gas tidak akan langsung keluar dari tabung tetapi akan tertahan oleh katup pengaman yang lain.\r\n \r\nYang sangat menarik, tabung Bright Gas hadir dengan dua pilihan warna, yaitu ungu dan merah muda, sehingga keberadaannya akan mempercantik suasana dapur Anda dan menjadikan memasak lebih ceria dan menyenangkan. Dan untuk memahami tata cara menggunakan dan mememasang Bright Gas tidaklah sulit, karena untuk Bright Gas seluruh tabungnya dilengkapi dengan sticker petunjuk penggunaan yang dapat mempermudah konsumen dalam menggunakan produk ini.', 'brightgas5,5.JPG', '2017-04-15 17:33:00', '2017-05-03 11:39:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scm_barang_kategori`
--

CREATE TABLE `scm_barang_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(200) NOT NULL,
  `kode_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scm_barang_kategori`
--

INSERT INTO `scm_barang_kategori` (`id_kategori`, `nama_kategori`, `kode_kategori`) VALUES
(1, 'Gas Elpiji / LPG', 'K001'),
(2, 'Peralatan / Aksesoris Gas', 'K002'),
(3, 'Aksesoris Kompor / Dapur', 'K003'),
(4, 'Kompor gas', 'K004');

-- --------------------------------------------------------

--
-- Table structure for table `scm_barang_satuan`
--

CREATE TABLE `scm_barang_satuan` (
  `id_satuan` int(11) NOT NULL,
  `tipe_satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scm_barang_satuan`
--

INSERT INTO `scm_barang_satuan` (`id_satuan`, `tipe_satuan`) VALUES
(1, 'Tabung'),
(2, 'Unit'),
(3, 'Bungkus');

-- --------------------------------------------------------

--
-- Table structure for table `scm_barang_stock`
--

CREATE TABLE `scm_barang_stock` (
  `id_stock` int(11) NOT NULL,
  `id_agen` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `stock_agen` int(11) NOT NULL,
  `tanggal_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scm_barang_stock`
--

INSERT INTO `scm_barang_stock` (`id_stock`, `id_agen`, `id_barang`, `stock_agen`, `tanggal_update`) VALUES
(3, 3, 13, 600, '2017-05-03'),
(4, 3, 17, 600, '2017-05-03'),
(5, 3, 17, 300, '2017-05-03'),
(6, 2, 17, 400, '2017-05-03');

-- --------------------------------------------------------

--
-- Table structure for table `scm_inbox`
--

CREATE TABLE `scm_inbox` (
  `id_inbox` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scm_inbox`
--

INSERT INTO `scm_inbox` (`id_inbox`, `id_user`, `name`, `email`, `subject`, `message`) VALUES
(1, 0, 'Hekky', 'nhekky@gmail.com', 'Informasi pemesanan di supply chain management', 'Untuk pemasok:\r\nMembantu dalam memberikan yang jelas instruksi\r\ndata online mentransfer mengurangi kertas kerja\r\nPersediaan Ekonomi:\r\n\r\nbiaya rendah penanganan persediaan\r\n\r\nbiaya rendah outage saham dengan memutuskan ukuran optimal dari perintah pengisian\r\n\r\nMencapai kinerja logistik yang sangat baik seperti hanya dalam waktu\r\n\r\nTitik Distribusi:\r\n\r\ndistributor puas dan seluruh penjual memastikan bahwa produk yang tepat mencapai tempat yang tepat pada waktu yang tepat\r\n\r\nJelas proses bisnis tunduk kesalahan lebih sedikit\r\n\r\nMudah akuntansi saham dan biaya saham');

-- --------------------------------------------------------

--
-- Table structure for table `scm_menu_link`
--

CREATE TABLE `scm_menu_link` (
  `id_menu_link` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `link` text NOT NULL,
  `id_group` int(11) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scm_menu_link`
--

INSERT INTO `scm_menu_link` (`id_menu_link`, `id_status`, `nama_menu`, `icon`, `link`, `id_group`, `position`) VALUES
(1, 1, 'Transaksi', 'fa fa-calendar', 'menu/transaksi', 1, 0),
(2, 1, 'Penyaluran', 'fa fa-refresh', 'menu/penyaluran', 1, 0),
(3, 1, 'Laporan', 'fa fa-history', 'menu/laporan', 1, 0),
(4, 1, 'Master Data', 'fa fa-inbox', 'menu/masterdata', 1, 0),
(5, 1, 'Management', 'fa fa-users', 'menu/management', 1, 0),
(6, 1, 'Transaksi', 'fa fa-calendar', 'pembelian/create_transaksi_pembelian_konsumen', 7, 0),
(7, 1, 'Laporan', 'fa fa-history', 'pembelian/laporan_for_konsumen', 7, 0),
(8, 1, 'Master Data', 'fa fa-inbox', 'scm_barang/list_barang', 7, 0),
(9, 1, 'Profile', 'fa fa-user', 'account', 7, 0),
(11, 1, 'Master Data', 'fa fa-inbox', 'menu/masterdata', 4, 4),
(12, 1, 'Penyaluran', 'fa fa-refresh', 'menu/penyaluran', 4, 3),
(13, 1, 'Laporan', 'fa fa-history', 'menu/laporan', 4, 2),
(14, 1, 'Management', 'fa fa-users', 'menu/management', 4, 5),
(15, 1, 'Master Data', 'fa fa-inbox', 'menu/masterdata', 3, 1),
(16, 1, 'Laporan', 'fa fa-history', 'menu/laporan', 3, 2),
(17, 1, 'Management', 'fa fa-users', 'menu/management', 3, 5),
(18, 1, 'Master Data', 'fa fa-inbox', 'menu/masterdata', 2, 1),
(19, 1, 'Laporan', 'fa fa-history', 'menu/laporan', 2, 2),
(20, 1, 'Input Pengiriman', 'fa fa-truck', 'pengiriman/create', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `scm_pangkalan`
--

CREATE TABLE `scm_pangkalan` (
  `id_pangkalan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_pangkalan` varchar(50) NOT NULL,
  `kode_agen` varchar(50) NOT NULL,
  `nama_pangkalan` varchar(225) NOT NULL,
  `alamat_pangkalan` text NOT NULL,
  `kelurahan` varchar(225) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `deleted_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scm_pangkalan`
--

INSERT INTO `scm_pangkalan` (`id_pangkalan`, `id_user`, `kode_pangkalan`, `kode_agen`, `nama_pangkalan`, `alamat_pangkalan`, `kelurahan`, `no_telp`, `created_date`, `deleted_date`) VALUES
(1, 1, 'PNKLN', 'AGEN003', 'E. Munandar', 'Jl. Raya Sukabumi Km 1 No.72 Rt 003/009 Bogor', 'Harjasari', '2147483647', '2017-04-23 17:15:14', '2017-04-23 17:15:14'),
(2, 19, '316841493003', 'AGEN003', 'H Abdullah Baraja', 'Jl. Pancasan Bawah Rt 01/07', 'Pasir Jaya', '2147483647', '2017-05-03 12:38:51', NULL),
(3, 19, '316841493004', 'AGEN003', 'H Naning', 'Kp. Cipaku Babakan Rt 02/12', 'Cipaku', '2147483647', '2017-05-03 12:42:15', NULL),
(4, 19, '316841493005', 'AGEN003', 'Hartono', 'Kp. Indahsari Rt 01/01', 'Harjasari', '2147483647', '2017-05-03 12:43:48', NULL),
(5, 19, '316841493006', 'AGEN003', 'Ir Ferry Hadian Ahmad', 'Jl. Rimba II No.4 Rt 04/06', 'Tajur', '2147483647', '2017-05-03 12:45:33', NULL),
(6, 19, '316841493007', 'AGEN003', 'Mumun Rachman', 'Kp. Cipaku Haji Rt 03/07', 'Cipaku', '2147483647', '2017-05-03 12:48:10', NULL),
(7, 19, '316841493008', 'AGEN003', 'Rizky Agustianto Pena', 'Jl. Roda No. 106 Rt 02/04', 'Babakan Pasar', '08179009567', '2017-05-03 12:49:01', NULL),
(8, 19, '316841493009', 'AGEN003', 'Yuli Riswanda', 'Kp. Babakan Rt 01/08', 'Cimahpar', '081310902727', '2017-05-03 12:49:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scm_pembelian`
--

CREATE TABLE `scm_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `kode_pembelian` varchar(100) NOT NULL,
  `tanggal_pembelian` datetime NOT NULL,
  `keterangan` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scm_pembelian`
--

INSERT INTO `scm_pembelian` (`id_pembelian`, `id_user`, `id_status`, `kode_pembelian`, `tanggal_pembelian`, `keterangan`, `created`, `modified`, `deleted`) VALUES
(6, 17, 0, 'DJAGT-20170501-001', '2017-05-01 00:00:00', 'Pembelian gas LPG 3KG jumlah 10 tabung', '2017-05-01 14:28:17', NULL, NULL),
(7, 17, 0, 'POXGV-20170501-002', '2017-05-01 00:00:00', 'Pemesanan LPG 3 Kilo', '2017-05-01 14:48:07', NULL, NULL),
(8, 22, 0, 'INUKN-20170529-003', '2017-05-29 00:00:00', 'Pemesanan Gas LPG 3 Kilo', '2017-05-29 11:19:54', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scm_pembelian_item`
--

CREATE TABLE `scm_pembelian_item` (
  `id_pembelian_item` int(11) NOT NULL,
  `kode_pembelian` varchar(100) NOT NULL,
  `kode_item` varchar(100) NOT NULL,
  `jumlah_item` int(11) NOT NULL,
  `harga_item` decimal(10,0) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scm_pembelian_item`
--

INSERT INTO `scm_pembelian_item` (`id_pembelian_item`, `kode_pembelian`, `kode_item`, `jumlah_item`, `harga_item`, `created`, `modified`, `deleted`) VALUES
(1, 'TIOY6-20170430-001', 'K001', 5, '16000', '2017-04-30 19:53:30', NULL, NULL),
(2, 'RN2G9-20170430-001', 'K001', 5, '16000', '2017-04-30 19:57:58', NULL, NULL),
(3, '0U77C-20170430-001', 'K001', 444, '16000', '2017-04-30 19:59:18', NULL, NULL),
(4, '0U77C-20170430-001', 'K002', 23423, '23000', '2017-04-30 19:59:18', NULL, NULL),
(5, 'GCUCO-20170430-002', 'K001', 4, '16000', '2017-04-30 20:12:45', NULL, NULL),
(6, '8ADNR-20170430-003', 'K002', 1, '23000', '2017-04-30 20:16:39', NULL, NULL),
(7, '8ADNR-20170430-003', 'K001', 3, '16000', '2017-04-30 20:16:40', NULL, NULL),
(8, '3JZWU-20170430-004', 'K001', 3, '16000', '2017-04-30 20:18:16', NULL, NULL),
(9, '2F8LB-20170430-005', 'K001', 3, '16000', '2017-04-30 20:19:25', NULL, NULL),
(10, 'DJAGT-20170501-001', 'K001', 10, '16000', '2017-05-01 14:28:17', NULL, NULL),
(11, 'POXGV-20170501-002', 'K001', 20, '16000', '2017-05-01 14:48:07', NULL, NULL),
(12, 'INUKN-20170529-003', 'K001', 10, '16000', '2017-05-29 11:19:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scm_pembelian_pengiriman`
--

CREATE TABLE `scm_pembelian_pengiriman` (
  `kode_pembelian` varchar(128) NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `alamat_penerima` text NOT NULL,
  `kota_penerima` varchar(100) NOT NULL,
  `telp_penerima` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scm_pembelian_pengiriman`
--

INSERT INTO `scm_pembelian_pengiriman` (`kode_pembelian`, `nama_penerima`, `alamat_penerima`, `kota_penerima`, `telp_penerima`) VALUES
('RN2G9-20170430-001', 'Hekky Nurhikmat', 'akshdkjahskjdakjsd', 'Bogor', '019283019823'),
('0U77C-20170430-001', 'kajskjab', 'kajsdkajbsd', 'jashbdkjba', '192830198'),
('GCUCO-20170430-002', 'Anisa', 'Bogor', 'Bogor', '087298713982'),
('8ADNR-20170430-003', 'Anisa', 'Bogor', 'Bogor', '18273918723'),
('3JZWU-20170430-004', 'sdvs', 'dv', 'sdvs', 'dvsdv'),
('2F8LB-20170430-005', 'sdc', 'sdc', 'csdc', 'sdcsd'),
('DJAGT-20170501-001', 'Anisa', 'Bogor', 'Bogor', '08907129837'),
('POXGV-20170501-002', 'Test', 'Bogor ', 'Bogor', '01928301909'),
('INUKN-20170529-003', 'Anisa', 'Bogor', 'Bogor', '085718450395');

-- --------------------------------------------------------

--
-- Table structure for table `scm_pengiriman`
--

CREATE TABLE `scm_pengiriman` (
  `Id` int(11) NOT NULL,
  `tanggal_pengiriman` date DEFAULT NULL,
  `kode_sppbe` varchar(255) DEFAULT NULL,
  `kode_agen` varchar(255) DEFAULT NULL,
  `plant` varchar(255) DEFAULT NULL,
  `no_lo` varchar(255) DEFAULT NULL,
  `qty_pcs` int(11) DEFAULT NULL,
  `qty_kg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scm_pengiriman`
--

INSERT INTO `scm_pengiriman` (`Id`, `tanggal_pengiriman`, `kode_sppbe`, `kode_agen`, `plant`, `no_lo`, `qty_pcs`, `qty_kg`) VALUES
(1, '2017-06-29', 'SPPBE001', 'AGEN002', 'G24F', '', 400, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `scm_penjualan`
--

CREATE TABLE `scm_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `kode_penjualan` varchar(100) NOT NULL,
  `tanggal_penjualan` datetime NOT NULL,
  `keterangan` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `scm_penjualan_item`
--

CREATE TABLE `scm_penjualan_item` (
  `id_penjualan` int(11) NOT NULL,
  `kode_penjualan` varchar(100) NOT NULL,
  `kode_item` varchar(100) NOT NULL,
  `jumlah_item` int(11) NOT NULL,
  `harga_item` decimal(10,0) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `scm_penyaluran_barang`
--

CREATE TABLE `scm_penyaluran_barang` (
  `id_penyaluran_barang` int(11) NOT NULL,
  `id_penyaluran_kondisi` int(11) NOT NULL,
  `kode_penyaluran` varchar(128) NOT NULL,
  `kode_pangkalan` varchar(50) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `tanggal_penyaluran` date NOT NULL,
  `jumlah_penyaluran` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scm_penyaluran_barang`
--

INSERT INTO `scm_penyaluran_barang` (`id_penyaluran_barang`, `id_penyaluran_kondisi`, `kode_penyaluran`, `kode_pangkalan`, `kode_barang`, `tanggal_penyaluran`, `jumlah_penyaluran`, `id_user`, `created`, `modified`, `deleted`) VALUES
(9, 1, 'PEUQYV-20170528001', '316841493009', 'K001', '2017-05-01', 20, 20, '2017-05-28 11:32:00', NULL, NULL),
(11, 1, 'PTIOY6-20170528003', '316841493009', 'K001', '2017-05-02', 30, 20, '2017-05-28 11:34:03', NULL, NULL),
(12, 1, 'P09P97-20170528004', '316841493009', 'K001', '2017-05-03', 50, 20, '2017-05-28 11:34:45', NULL, NULL),
(13, 1, 'PJH9KA-20170528005', '316841493008', 'K001', '2017-05-01', 90, 20, '2017-05-28 11:35:10', NULL, NULL),
(14, 2, 'PPSVDU-20170613006', '316841493009', 'K003', '2017-06-13', 0, 20, '2017-06-13 13:17:45', NULL, NULL),
(15, 2, 'PLPMIS-20170629007', '316841493009', 'K003', '2017-06-29', 0, 20, '2017-06-29 09:46:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scm_penyaluran_kondisi`
--

CREATE TABLE `scm_penyaluran_kondisi` (
  `id_penyaluran_kondisi` int(11) NOT NULL,
  `tipe_penyaluran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scm_penyaluran_kondisi`
--

INSERT INTO `scm_penyaluran_kondisi` (`id_penyaluran_kondisi`, `tipe_penyaluran`) VALUES
(1, 'Realisasi'),
(2, 'Rencana');

-- --------------------------------------------------------

--
-- Table structure for table `scm_sppbe`
--

CREATE TABLE `scm_sppbe` (
  `id_spbbe` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_sppbe` varchar(200) NOT NULL,
  `nama_sppbe` varchar(200) NOT NULL,
  `alamat_sppbe` text NOT NULL,
  `telp_sppbe` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scm_sppbe`
--

INSERT INTO `scm_sppbe` (`id_spbbe`, `id_user`, `kode_sppbe`, `nama_sppbe`, `alamat_sppbe`, `telp_sppbe`, `created`, `modified`, `deleted`) VALUES
(2, 1, 'SPPBE001', 'INTI RAYA TRI ABADI', 'Jl. Veteran II No. 1 Ciawi - Bogor 16720 Kelurahan Ciawi', '0251-8240918', '2017-04-23 17:01:28', NULL, NULL),
(3, 1, 'SPPBE002', 'Kopontren Ni Matul Jawahi', 'Kp. Lengis Ds. Warung Menteng, Jl. Mayjen HE. Sukma, Cijeruk - Bogor', '', '2017-04-23 17:02:32', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scm_status`
--

CREATE TABLE `scm_status` (
  `id_status` int(11) NOT NULL,
  `tipe_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scm_status`
--

INSERT INTO `scm_status` (`id_status`, `tipe_status`) VALUES
(1, 'tersedia'),
(2, 'tidak tersedia'),
(3, 'Pemesanan di terima'),
(4, 'Pemesanan di tolak'),
(5, 'Pemesanan di kirim'),
(6, 'aktif'),
(7, 'non-aktif');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `kode_user` varchar(20) NOT NULL,
  `kode_akses_position` varchar(128) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `id_group`, `id_status`, `kode_user`, `kode_akses_position`, `nama_lengkap`, `no_telp`, `email`, `username`, `password`, `created`, `modified`) VALUES
(1, 1, 6, 'M0001', '', 'Hekky Nurhikmat', '2147483647', '', 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', '2017-04-03 00:00:00', '2017-05-03 10:23:26'),
(19, 4, 6, 'U002', 'AGEN003', 'Agen Mitra Gasindo', '001920918209', '', 'gasindo', 'c4c2372e582cd749bafc3f5403375905', '2017-05-01 15:49:47', '2017-05-03 13:03:15'),
(20, 4, 6, 'U003', 'AGEN002', 'Novita Surya', '01273981789127', '', 'novita', '463f4921608f04a290b70bb391c2b74d', '2017-05-01 16:41:17', '2017-05-03 10:26:40'),
(21, 5, 6, 'U004', 'AGEN002', 'novitauser', '019283019283', '', 'novitauser', '95819d29c748bdcf56d46e3de715862f', '2017-05-01 17:11:50', NULL),
(22, 7, 6, 'U005', '', 'Anisa', '09820391823', 'anisa@gmail.com', 'anisa', '40cc8f68f52757aff1ad39a006bfbf11', '2017-05-01 17:50:29', '2017-05-11 14:19:29'),
(23, 7, 7, 'U006', '', 'Hekky Nurhikmat', '085718450395', 'nhekky@gmail.com', 'hekky', '0169a868750db8d5106ed024b9116a4c', '2017-05-01 17:55:01', NULL),
(24, 7, 7, 'U007', '', 'Anisa', '085718450395', 'nhekky@gmail.com', 'anisa', '40cc8f68f52757aff1ad39a006bfbf11', '2017-05-11 14:18:38', NULL),
(25, 3, 6, 'U008', 'SPPBE001', 'Admin SPPBE', '09801928309', '', 'adminsppbe', '7d13ce9d74c088a2e8a4c9b76bb008cc', '2017-06-17 13:56:01', NULL),
(26, 2, 6, 'U009', 'SPPBE001', 'User SPPBE', '09182903810', '', 'usersppbe', '5877d71aa774049e9bf536ac99e4297e', '2017-06-17 14:41:30', NULL),
(28, 6, 6, 'U010', '316841493009', 'Pangkalan', '09182039182', '', 'pangkalan', '6e6bb6ef15e71de0346b7f5d8185072f', '2017-06-18 06:12:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_group`
--

CREATE TABLE `users_group` (
  `id_group` int(11) NOT NULL,
  `form_access` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_group`
--

INSERT INTO `users_group` (`id_group`, `form_access`) VALUES
(1, 'Super Admin'),
(2, 'User SPPBE'),
(3, 'Admin SPPBE'),
(4, 'Admin Agen'),
(5, 'User Agen'),
(6, 'Pangkalan'),
(7, 'Konsumen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `scm_agen`
--
ALTER TABLE `scm_agen`
  ADD PRIMARY KEY (`id_agen`);

--
-- Indexes for table `scm_barang`
--
ALTER TABLE `scm_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `scm_barang_kategori`
--
ALTER TABLE `scm_barang_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `scm_barang_satuan`
--
ALTER TABLE `scm_barang_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `scm_barang_stock`
--
ALTER TABLE `scm_barang_stock`
  ADD PRIMARY KEY (`id_stock`);

--
-- Indexes for table `scm_inbox`
--
ALTER TABLE `scm_inbox`
  ADD PRIMARY KEY (`id_inbox`);

--
-- Indexes for table `scm_menu_link`
--
ALTER TABLE `scm_menu_link`
  ADD PRIMARY KEY (`id_menu_link`);

--
-- Indexes for table `scm_pangkalan`
--
ALTER TABLE `scm_pangkalan`
  ADD PRIMARY KEY (`id_pangkalan`);

--
-- Indexes for table `scm_pembelian`
--
ALTER TABLE `scm_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `scm_pembelian_item`
--
ALTER TABLE `scm_pembelian_item`
  ADD PRIMARY KEY (`id_pembelian_item`);

--
-- Indexes for table `scm_pengiriman`
--
ALTER TABLE `scm_pengiriman`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `scm_penjualan`
--
ALTER TABLE `scm_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `scm_penjualan_item`
--
ALTER TABLE `scm_penjualan_item`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `scm_penyaluran_barang`
--
ALTER TABLE `scm_penyaluran_barang`
  ADD PRIMARY KEY (`id_penyaluran_barang`);

--
-- Indexes for table `scm_penyaluran_kondisi`
--
ALTER TABLE `scm_penyaluran_kondisi`
  ADD PRIMARY KEY (`id_penyaluran_kondisi`);

--
-- Indexes for table `scm_sppbe`
--
ALTER TABLE `scm_sppbe`
  ADD PRIMARY KEY (`id_spbbe`);

--
-- Indexes for table `scm_status`
--
ALTER TABLE `scm_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `users_group`
--
ALTER TABLE `users_group`
  ADD PRIMARY KEY (`id_group`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `scm_agen`
--
ALTER TABLE `scm_agen`
  MODIFY `id_agen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `scm_barang`
--
ALTER TABLE `scm_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `scm_barang_kategori`
--
ALTER TABLE `scm_barang_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `scm_barang_satuan`
--
ALTER TABLE `scm_barang_satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `scm_barang_stock`
--
ALTER TABLE `scm_barang_stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `scm_inbox`
--
ALTER TABLE `scm_inbox`
  MODIFY `id_inbox` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `scm_menu_link`
--
ALTER TABLE `scm_menu_link`
  MODIFY `id_menu_link` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `scm_pangkalan`
--
ALTER TABLE `scm_pangkalan`
  MODIFY `id_pangkalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `scm_pembelian`
--
ALTER TABLE `scm_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `scm_pembelian_item`
--
ALTER TABLE `scm_pembelian_item`
  MODIFY `id_pembelian_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `scm_pengiriman`
--
ALTER TABLE `scm_pengiriman`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `scm_penjualan`
--
ALTER TABLE `scm_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `scm_penjualan_item`
--
ALTER TABLE `scm_penjualan_item`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `scm_penyaluran_barang`
--
ALTER TABLE `scm_penyaluran_barang`
  MODIFY `id_penyaluran_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `scm_penyaluran_kondisi`
--
ALTER TABLE `scm_penyaluran_kondisi`
  MODIFY `id_penyaluran_kondisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `scm_sppbe`
--
ALTER TABLE `scm_sppbe`
  MODIFY `id_spbbe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `scm_status`
--
ALTER TABLE `scm_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `users_group`
--
ALTER TABLE `users_group`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
