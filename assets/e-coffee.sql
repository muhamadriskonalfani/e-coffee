-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Nov 2023 pada 14.13
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-coffee`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tanggal_pendaftaran` date DEFAULT NULL,
  `peran` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `nama_lengkap`, `email`, `tanggal_pendaftaran`, `peran`) VALUES
(1, 'admin', 'admin', 'Alexander Kurniawan', 'muhamadriskonalfani@gmail.com', '2023-11-04', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_pesanan`
--

CREATE TABLE `tb_detail_pesanan` (
  `id_detail_pesanan` int(11) NOT NULL,
  `id_pesanan` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `tanggal_pembuatan` datetime DEFAULT NULL,
  `tanggal_perubahan` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_depan` varchar(50) DEFAULT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  `alamat_email` varchar(100) NOT NULL,
  `alamat_pengiriman` varchar(255) DEFAULT NULL,
  `nomor_telepon` varchar(15) DEFAULT NULL,
  `tanggal_registrasi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `username`, `password`, `nama_depan`, `nama_belakang`, `alamat_email`, `alamat_pengiriman`, `nomor_telepon`, `tanggal_registrasi`) VALUES
(1, 'user1', 'password1', 'budi', 'santoso', 'budi@example.com', 'jl. mawar no. 123', '081234567890', '2023-11-04'),
(2, 'user2', 'password2', 'ani', 'wijaya', 'ani@example.com', 'jl. melati no. 456', '081234567891', '2023-11-04'),
(3, 'user3', 'password3', 'dewi', 'kusuma', 'dewi@example.com', 'jl. anggrek no. 789', '081234567892', '2023-11-04'),
(4, 'user4', 'password4', 'eko', 'purnomo', 'eko@example.com', 'jl. dahlia no. 1011', '081234567893', '2023-11-04'),
(5, 'user5', 'password5', 'fita', 'lestari', 'fita@example.com', 'jl. sakura no. 1213', '081234567894', '2023-11-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `alamat_pengiriman` varchar(255) DEFAULT NULL,
  `alamat_penagihan` varchar(255) DEFAULT NULL,
  `tanggal_pesanan` datetime DEFAULT NULL,
  `jumlah_total` int(11) DEFAULT NULL,
  `status_pesanan` varchar(50) DEFAULT NULL,
  `metode_pembayaran` varchar(50) DEFAULT NULL,
  `status_pembayaran` varchar(50) DEFAULT NULL,
  `metode_pengiriman` varchar(50) DEFAULT NULL,
  `nomor_pelacakan` varchar(30) DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id_pesanan`, `id_pengguna`, `alamat_pengiriman`, `alamat_penagihan`, `tanggal_pesanan`, `jumlah_total`, `status_pesanan`, `metode_pembayaran`, `status_pembayaran`, `metode_pengiriman`, `nomor_pelacakan`, `catatan`) VALUES
(1, 1, 'Jl. Pahlawan No. 123, Surabaya', 'Jl. Pahlawan No. 123, Surabaya', '2023-11-04 10:00:00', 100000, 'Dalam Proses', 'Kartu Kredit', 'Dibayar', 'Kurir Cepat', '123456', 'Catatan 1'),
(2, 2, 'Jl. Gatot Subroto No. 45, Jakarta', 'Jl. Gatot Subroto No. 45, Jakarta', '2023-11-05 09:30:00', 75000, 'Dikirim', 'PayPal', 'Dibayar', 'Pos Standar', '789012', 'Catatan 2'),
(3, 3, 'Jl. Malioboro No. 78, Yogyakarta', 'Jl. Malioboro No. 78, Yogyakarta', '2023-11-06 14:15:00', 120000, 'Selesai', 'Kartu Debit', 'Dibayar', 'Kurir Ekspres', '345678', 'Catatan 3'),
(4, 4, 'Jl. Diponegoro No. 22, Bandung', 'Jl. Diponegoro No. 22, Bandung', '2023-11-07 16:45:00', 50000, 'Dalam Proses', 'Kartu Kredit', 'Belum Dibayar', 'Kurir Reguler', '901234', 'Catatan 4'),
(5, 5, 'Jl. Raya Kuta No. 10, Bali', 'Jl. Raya Kuta No. 10, Bali', '2023-11-08 12:20:00', 90000, 'Dikirim', 'Transfer Bank', 'Dibayar', 'Pos Standar', '567890', 'Catatan 5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `gambar_produk` varchar(255) DEFAULT NULL,
  `deskripsi` longtext NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `gambar_produk`, `deskripsi`, `harga`, `stok`) VALUES
(1, 'Kopi Arabika', 'kopi_arabika.jpg', '', 10000, 1000),
(2, 'Kopi Robusta', 'kopi_robusta.jpg', '', 8000, 75),
(3, 'Kopi Espresso', 'kopi_espresso.jpg', '', 12000, 50),
(4, 'Kopi Latte', 'kopi_latte.jpg', '', 15000, 60),
(5, 'Kopi Kopi Tubruk', 'kopi_tubruk.jpg', '', 6000, 400);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indeks untuk tabel `tb_detail_pesanan`
--
ALTER TABLE `tb_detail_pesanan`
  ADD PRIMARY KEY (`id_detail_pesanan`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indeks untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_pesanan`
--
ALTER TABLE `tb_detail_pesanan`
  MODIFY `id_detail_pesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_detail_pesanan`
--
ALTER TABLE `tb_detail_pesanan`
  ADD CONSTRAINT `tb_detail_pesanan_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `tb_pesanan` (`id_pesanan`),
  ADD CONSTRAINT `tb_detail_pesanan_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD CONSTRAINT `tb_keranjang_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`),
  ADD CONSTRAINT `tb_keranjang_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
