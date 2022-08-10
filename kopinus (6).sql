-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Agu 2022 pada 17.21
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kopinus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `username` varchar(50) NOT NULL,
  `pwd` varchar(32) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `user_group` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`username`, `pwd`, `last_login`, `user_group`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', '2022-03-26 04:27:41', 'admin'),
('dian', 'f97de4a9986d216a6e0fea62b0450da9', '2022-06-15 11:36:01', 'pemilik'),
('teguh', 'f5cd3a020bc94866049206a7cf14e266', '2022-06-15 11:23:49', 'pemilik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `coa`
--

CREATE TABLE `coa` (
  `kode_coa` int(11) NOT NULL,
  `nama_coa` varchar(50) NOT NULL,
  `header_akun` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `coa`
--

INSERT INTO `coa` (`kode_coa`, `nama_coa`, `header_akun`) VALUES
(1, 'Asset', '1-1000'),
(2, 'Current Asset', '1-2000'),
(3, 'Fixed Asset', '1-3000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal`
--

CREATE TABLE `jurnal` (
  `id_jurnal` int(11) NOT NULL,
  `kode_akun` int(11) NOT NULL,
  `nama_akun` varchar(100) NOT NULL,
  `tgl_jurnal` date NOT NULL,
  `posisi_d_c` varchar(10) NOT NULL,
  `nominal` double NOT NULL,
  `transaksi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jurnal`
--

INSERT INTO `jurnal` (`id_jurnal`, `kode_akun`, `nama_akun`, `tgl_jurnal`, `posisi_d_c`, `nominal`, `transaksi`) VALUES
(3, 111, 'Kas', '2022-04-15', 'Debet', 50000, 'Penjualan'),
(4, 411, 'Penjualan', '2022-04-15', 'Kredit', 50000, 'Penjualan'),
(5, 111, 'Kas', '2022-03-30', 'Debet', 5000000, 'Pemodalan'),
(6, 311, 'modal', '2022-03-30', 'Kredit', 5000000, 'Pemodalan'),
(7, 513, 'Beban Gaji', '2022-04-15', 'Debet', 5000000, 'Penggajian'),
(8, 111, 'Kas', '2022-04-15', 'Kredit', 5000000, 'Penggajian'),
(9, 511, 'Beban', '2022-04-28', 'Debet', 10000, 'Pembebanan'),
(10, 411, 'Kas', '2022-04-28', 'Kredit', 10000, 'Pembebanan'),
(11, 111, 'Kas', '2022-06-10', 'Debet', 150000, 'Penjualan'),
(12, 411, 'Penjualan', '2022-06-10', 'Kredit', 150000, 'Penjualan'),
(13, 111, 'Kas', '2022-07-01', 'Debet', 510000, 'Penjualan'),
(14, 411, 'Penjualan', '2022-07-01', 'Kredit', 510000, 'Penjualan'),
(15, 111, 'Kas', '2022-06-17', 'Debet', 75000, 'Penjualan'),
(16, 411, 'Penjualan', '2022-06-17', 'Kredit', 75000, 'Penjualan'),
(17, 111, 'Kas', '2022-06-08', 'Debet', 185000, 'Penjualan'),
(18, 411, 'Penjualan', '2022-06-08', 'Kredit', 185000, 'Penjualan'),
(19, 111, 'Kas', '2022-06-03', 'Debet', 836000, 'Penjualan'),
(20, 411, 'Penjualan', '2022-06-03', 'Kredit', 836000, 'Penjualan'),
(21, 111, 'Kas', '2022-06-04', 'Debet', 195000, 'Penjualan'),
(22, 411, 'Penjualan', '2022-06-04', 'Kredit', 195000, 'Penjualan'),
(23, 111, 'Kas', '2022-06-11', 'Debet', 119000, 'Penjualan'),
(24, 411, 'Penjualan', '2022-06-11', 'Kredit', 119000, 'Penjualan'),
(25, 111, 'Kas', '2022-06-04', 'Debet', 105000, 'Penjualan'),
(26, 411, 'Penjualan', '2022-06-04', 'Kredit', 105000, 'Penjualan'),
(27, 111, 'Kas', '2022-06-04', 'Debet', 1050000, 'Penjualan'),
(28, 411, 'Penjualan', '2022-06-04', 'Kredit', 1050000, 'Penjualan'),
(29, 111, 'Kas', '2022-06-11', 'Debet', 75000, 'Penjualan'),
(30, 411, 'Penjualan', '2022-06-11', 'Kredit', 75000, 'Penjualan'),
(31, 111, 'Kas', '2022-06-28', 'Debet', 2109000, 'Penjualan'),
(32, 411, 'Penjualan', '2022-06-28', 'Kredit', 2109000, 'Penjualan'),
(33, 111, 'Kas', '2022-06-28', 'Debet', 16650000, 'Penjualan'),
(34, 411, 'Penjualan', '2022-06-28', 'Kredit', 16650000, 'Penjualan'),
(35, 511, 'Beban', '2022-06-28', 'Debet', 1000000, 'Pembebanan'),
(36, 411, 'Kas', '2022-06-28', 'Kredit', 1000000, 'Pembebanan'),
(37, 111, 'Kas', '2022-06-28', 'Debet', 50000000, 'Pemodalan'),
(38, 311, 'Modal', '2022-06-28', 'Kredit', 50000000, 'Pemodalan'),
(39, 513, 'Beban Gaji', '2022-06-28', 'Debet', 1000000, 'Penggajian'),
(40, 111, 'Kas', '2022-06-28', 'Kredit', 1000000, 'Penggajian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_produk`, `nama_produk`, `harga_produk`) VALUES
(1, 'Shampo Kopi Ekstra Lemon', 15000),
(2, 'Shampo Kopi Ekstra Menthol', 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `alamat`, `no_telp`) VALUES
(1, 'Teguh', 'Jl.PGA 2', '0812-6070-8717'),
(2, 'Maulana H', 'Jl.Sukabirus ', '0821-7421-8462'),
(3, 'Ulfa', 'Padang', '0812-6070-8999'),
(4, 'Yolanda', 'Suka Pura', '0812-4910-2482'),
(5, 'Ayla', 'Suka Pura', '0802-1412-4214');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `no_telp`) VALUES
(1, 'Dian', 'Jl.Farmasi Medan', '022734412234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembebanan`
--

CREATE TABLE `pembebanan` (
  `id_beban` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_beban` varchar(100) CHARACTER SET utf8 NOT NULL,
  `biaya` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembebanan`
--

INSERT INTO `pembebanan` (`id_beban`, `id_produk`, `nama_beban`, `biaya`, `tgl_bayar`) VALUES
(1, 1, 'Beban Bahan Pembuatan', 50000, '2022-06-07'),
(2, 10, 'BEBAN LISTRIK', 10000, '2022-06-13'),
(3, 10, 'BEBAN AIR', 10000, '2022-06-05'),
(4, 2, 'shampoo', 25000, '2022-06-05'),
(5, 1, 'Beban Pembuatan', 1000000, '2022-06-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilik`
--

CREATE TABLE `pemilik` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemilik`
--

INSERT INTO `pemilik` (`id`, `username`, `id_produk`) VALUES
(1, 'teguh', 1),
(2, 'dian', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemodalan`
--

CREATE TABLE `pemodalan` (
  `id_transaksi` int(11) NOT NULL,
  `besar` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `waktu` datetime NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemodalan`
--

INSERT INTO `pemodalan` (`id_transaksi`, `besar`, `nama`, `waktu`, `id_produk`) VALUES
(2, 7000000, 'Tujuh juta rupiah\r\n', '2022-04-14 00:00:00', 10),
(3, 1000000, 'satu juta rupiah', '2022-04-25 00:00:00', 1),
(4, 2000000, 'Dua juta rupiah', '2022-05-13 00:00:00', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggajian`
--

CREATE TABLE `penggajian` (
  `id_gaji` int(10) NOT NULL,
  `id_pegawai` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tgl_penggajian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penggajian`
--

INSERT INTO `penggajian` (`id_gaji`, `id_pegawai`, `jumlah`, `tgl_penggajian`) VALUES
(1, 3, 500000, '2022-04-01'),
(2, 1, 500000, '2022-04-01'),
(3, 2, 500000, '2022-04-01'),
(4, 5, 500000, '2022-05-01'),
(5, 2, 1000000, '2022-06-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_jual` int(11) NOT NULL,
  `id_sampo` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tgl_jual` date NOT NULL,
  `qty` int(30) NOT NULL,
  `harga_jual` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_jual`, `id_sampo`, `id_pelanggan`, `tgl_jual`, `qty`, `harga_jual`) VALUES
(1, 1, 1, '2022-06-10', 10, 150000),
(2, 2, 1, '2022-07-01', 30, 510000),
(3, 1, 1, '2022-06-17', 5, 75000),
(4, 3, 1, '2022-06-08', 10, 185000),
(5, 6, 1, '2022-06-03', 44, 836000),
(6, 1, 1, '2022-06-04', 13, 195000),
(7, 2, 1, '2022-06-11', 7, 119000),
(8, 5, 1, '2022-06-04', 6, 105000),
(9, 1, 1, '2022-06-04', 70, 1050000),
(10, 1, 1, '2022-06-11', 5, 75000),
(11, 6, 1, '2022-06-28', 111, 2109000),
(12, 3, 1, '2022-06-28', 900, 16650000);

--
-- Trigger `penjualan`
--
DELIMITER $$
CREATE TRIGGER `update_stok` AFTER INSERT ON `penjualan` FOR EACH ROW BEGIN
   UPDATE sampo SET stok = stok - NEW.qty WHERE id_sampo = NEW.id_sampo;
  
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sampo`
--

CREATE TABLE `sampo` (
  `id_sampo` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `ukuran` varchar(11) NOT NULL,
  `harga` varchar(30) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sampo`
--

INSERT INTO `sampo` (`id_sampo`, `id_produk`, `ukuran`, `harga`, `stok`) VALUES
(1, 1, '250ml', '15000', 192),
(2, 1, '500ml', '17000', 263),
(3, 1, '750ml', '18500', -610),
(4, 2, '250ml', '15000', 200),
(5, 2, '500ml', '17500', 194),
(6, 2, '750ml', '19000', -55);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`, `no_telp`) VALUES
(1, 'Riski', 'Priuk', '0227-3441-2234');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `coa`
--
ALTER TABLE `coa`
  ADD PRIMARY KEY (`kode_coa`);

--
-- Indeks untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id_jurnal`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembebanan`
--
ALTER TABLE `pembebanan`
  ADD PRIMARY KEY (`id_beban`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `pemodalan`
--
ALTER TABLE `pemodalan`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `penggajian`
--
ALTER TABLE `penggajian`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_jual`),
  ADD KEY `id_sampo` (`id_sampo`,`id_pelanggan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `sampo`
--
ALTER TABLE `sampo`
  ADD PRIMARY KEY (`id_sampo`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `coa`
--
ALTER TABLE `coa`
  MODIFY `kode_coa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id_jurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembebanan`
--
ALTER TABLE `pembebanan`
  MODIFY `id_beban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pemodalan`
--
ALTER TABLE `pemodalan`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penggajian`
--
ALTER TABLE `penggajian`
  MODIFY `id_gaji` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `sampo`
--
ALTER TABLE `sampo`
  MODIFY `id_sampo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  ADD CONSTRAINT `pemilik_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `menu` (`id_produk`),
  ADD CONSTRAINT `pemilik_ibfk_2` FOREIGN KEY (`username`) REFERENCES `akun` (`username`);

--
-- Ketidakleluasaan untuk tabel `penggajian`
--
ALTER TABLE `penggajian`
  ADD CONSTRAINT `penggajian_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_sampo`) REFERENCES `sampo` (`id_sampo`),
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

--
-- Ketidakleluasaan untuk tabel `sampo`
--
ALTER TABLE `sampo`
  ADD CONSTRAINT `sampo_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `menu` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
