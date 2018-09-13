-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03 Apr 2018 pada 13.14
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akuntansi1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatankas`
--

CREATE TABLE `catatankas` (
  `id_catatankas` varchar(8) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan_jurnal` varchar(50) NOT NULL,
  `debet` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` varchar(8) NOT NULL,
  `tgl_gaji` date NOT NULL,
  `nm_karyawan` varchar(35) NOT NULL,
  `jml_gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal_umum`
--

CREATE TABLE `jurnal_umum` (
  `no` int(12) NOT NULL,
  `tgl` date NOT NULL,
  `rekening` varchar(15) NOT NULL,
  `ref` varchar(1) NOT NULL,
  `debit` int(11) NOT NULL,
  `kredit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kartugudang`
--

CREATE TABLE `kartugudang` (
  `id_kartu_gudang` varchar(8) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_persediaan` enum('Gelas Produksi','Gelas Beli','Bahan Baku') DEFAULT NULL,
  `unit_masuk` int(11) NOT NULL,
  `unit_keluar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasok`
--

CREATE TABLE `pemasok` (
  `id_pemasok` varchar(8) NOT NULL,
  `email` varchar(25) NOT NULL,
  `nm_pemasok` varchar(35) NOT NULL,
  `no_telp` char(14) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemasok`
--

INSERT INTO `pemasok` (`id_pemasok`, `email`, `nm_pemasok`, `no_telp`, `alamat`) VALUES
('SU000001', 'www', 'a', '6545', 'b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_beli` varchar(11) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `id_pemasok` varchar(8) NOT NULL,
  `jenis_pembelian` enum('gelas','bahan baku') DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerimaankas`
--

CREATE TABLE `penerimaankas` (
  `id_penerimaan_kas` varchar(8) NOT NULL,
  `tgl` date NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `debet` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluarankas`
--

CREATE TABLE `pengeluarankas` (
  `id_pengeluaran_kas` varchar(8) NOT NULL,
  `tgl_pengeluarankas` date NOT NULL,
  `penerima_kas` varchar(35) NOT NULL,
  `jenis_keperluan` varchar(50) NOT NULL,
  `nominal_kas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` varchar(8) NOT NULL,
  `tgl_jual` date NOT NULL,
  `nm_pelanggan` varchar(35) NOT NULL,
  `qty_jual` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `total_penjualan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perencanaanusaha`
--

CREATE TABLE `perencanaanusaha` (
  `id_rencana` varchar(8) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` int(4) NOT NULL,
  `minggu_ke` int(1) NOT NULL,
  `kas_tersedia` int(11) NOT NULL,
  `gelas_tersedia` int(11) NOT NULL,
  `pdp_tersedia` int(11) NOT NULL,
  `bb_tersedia` int(11) NOT NULL,
  `jml_target` int(11) NOT NULL,
  `jml_realisasi` int(11) NOT NULL,
  `beli_target` int(11) NOT NULL,
  `beli_realisasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaanbb`
--

CREATE TABLE `permintaanbb` (
  `id_permintaan_bb` varchar(8) NOT NULL,
  `id_rencana` varchar(8) NOT NULL,
  `tgl_permintaan` date NOT NULL,
  `nm_brg` varchar(50) NOT NULL,
  `satuan_brg` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaanpembelian`
--

CREATE TABLE `permintaanpembelian` (
  `id` int(11) NOT NULL,
  `no_form` varchar(8) NOT NULL,
  `tgl_permintaan_pembelian` date NOT NULL,
  `nominal_permintaan_pembelian` int(11) NOT NULL,
  `jenis_pembelian` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi`
--

CREATE TABLE `produksi` (
  `id_produksi` varchar(8) NOT NULL,
  `tgl_produksi` date NOT NULL,
  `pdp_i` int(11) NOT NULL,
  `bb_i` int(11) NOT NULL,
  `gelas_o` int(11) NOT NULL,
  `pdp_o` int(11) NOT NULL,
  `bb_o` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_bank`
--

CREATE TABLE `transaksi_bank` (
  `id_tb` varchar(8) NOT NULL,
  `tgl` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `nama_penyetor` varchar(50) NOT NULL,
  `nama_teller` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(60) NOT NULL,
  `Jabatan` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `Jabatan`) VALUES
(11, 'akuntansi', 'akuntansi', '1139f90d50ba3bb7ff4b2602ad03aa26', 'akuntansi'),
(9, 'direktur', 'direktur', '4fbfd324f5ffcdff5dbf6f019b02eca8', 'direktur'),
(8, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(12, 'gudang', 'gudang', '202446dd1d6028084426867365b0c7a1', 'gudang'),
(13, 'keuangan', 'keuangan', 'a4151d4b2856ec63368a7c784b1f0a6e', 'keuangan'),
(14, 'pembelian', 'pembelian', '025b94c9e65037bb7317c8e25389155d', 'pembelian'),
(15, 'penjualan', 'penjualan', '13bf2c8effae21d17a277520aa9b9277', 'penjualan'),
(16, 'personalia', 'personalia', '2d7b9ddba458f0199b69f8bd9607c036', 'personalia'),
(17, 'produksi', 'produksi', 'edf3017a2946290b95c783bd1a7f0ba7', 'produksi'),
(18, 'ayu', 'ayu', '29c65f781a1068a41f735e1b092546de', 'direktur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catatankas`
--
ALTER TABLE `catatankas`
  ADD PRIMARY KEY (`id_catatankas`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `jurnal_umum`
--
ALTER TABLE `jurnal_umum`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `kartugudang`
--
ALTER TABLE `kartugudang`
  ADD PRIMARY KEY (`id_kartu_gudang`);

--
-- Indexes for table `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`id_pemasok`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_beli`),
  ADD KEY `id_pemasok` (`id_pemasok`);

--
-- Indexes for table `penerimaankas`
--
ALTER TABLE `penerimaankas`
  ADD PRIMARY KEY (`id_penerimaan_kas`);

--
-- Indexes for table `pengeluarankas`
--
ALTER TABLE `pengeluarankas`
  ADD PRIMARY KEY (`id_pengeluaran_kas`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `perencanaanusaha`
--
ALTER TABLE `perencanaanusaha`
  ADD PRIMARY KEY (`id_rencana`);

--
-- Indexes for table `permintaanbb`
--
ALTER TABLE `permintaanbb`
  ADD PRIMARY KEY (`id_permintaan_bb`),
  ADD KEY `id_rencana` (`id_rencana`);

--
-- Indexes for table `permintaanpembelian`
--
ALTER TABLE `permintaanpembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id_produksi`);

--
-- Indexes for table `transaksi_bank`
--
ALTER TABLE `transaksi_bank`
  ADD PRIMARY KEY (`id_tb`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permintaanpembelian`
--
ALTER TABLE `permintaanpembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_pemasok`) REFERENCES `pemasok` (`id_pemasok`);

--
-- Ketidakleluasaan untuk tabel `permintaanbb`
--
ALTER TABLE `permintaanbb`
  ADD CONSTRAINT `permintaanbb_ibfk_1` FOREIGN KEY (`id_rencana`) REFERENCES `perencanaanusaha` (`id_rencana`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
