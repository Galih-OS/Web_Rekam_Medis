-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23 Apr 2015 pada 03.52
-- Versi Server: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tambah_beras`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `beras`
--

CREATE TABLE IF NOT EXISTS `beras` (
  `id_beras` int(11) NOT NULL AUTO_INCREMENT,
  `nama_beras` varchar(100) NOT NULL,
  `harga_beras` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  PRIMARY KEY (`id_beras`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `beras`
--

INSERT INTO `beras` (`id_beras`, `nama_beras`, `harga_beras`, `stock`, `id_supplier`) VALUES
(1, 'Beras Rojowali', 51000, 39, 1),
(2, 'Beras Tawon', 45000, 30, 1),
(3, 'Beras Ijoe', 40000, 31, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detil_transaksi`
--

CREATE TABLE IF NOT EXISTS `detil_transaksi` (
  `id_trans` varchar(10) NOT NULL,
  `id_beras` int(11) NOT NULL,
  `jumlah_beras` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detil_transaksi`
--

INSERT INTO `detil_transaksi` (`id_trans`, `id_beras`, `jumlah_beras`) VALUES
('TRA00001', 1, 2),
('TRA00003', 2, 5),
('TRA00004', 1, 1);

--
-- Trigger `detil_transaksi`
--
DROP TRIGGER IF EXISTS `tambah`;
DELIMITER //
CREATE TRIGGER `tambah` AFTER INSERT ON `detil_transaksi`
 FOR EACH ROW begin 
update beras set stock = stock+ new.jumlah_beras
where id_beras = new.id_beras;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id_supplier` int(11) NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(100) NOT NULL,
  `almt_supplier` varchar(100) NOT NULL,
  `telp_supplier` varchar(13) NOT NULL,
  `kota_supplier` varchar(50) NOT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `almt_supplier`, `telp_supplier`, `kota_supplier`) VALUES
(1, 'PT. VINZ SEJAHTERAH', 'Jl. Gajah Mada No 2', '083832600097', 'Sidoarjo'),
(2, 'PT. MAJU JAYA', 'Jl. Pegangsaan Timur No 105', '081546782761', 'Surabaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id_trans` varchar(10) NOT NULL,
  `tgl_trans` datetime NOT NULL,
  PRIMARY KEY (`id_trans`),
  KEY `no` (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`no`, `id_trans`, `tgl_trans`) VALUES
(2, 'TRA00001', '2015-04-23 00:35:16'),
(3, 'TRA00003', '2015-04-23 00:41:23'),
(4, 'TRA00004', '2015-04-23 01:15:54');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
