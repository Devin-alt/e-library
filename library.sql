-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 07 Jul 2025 pada 09.28
-- Versi server: 8.0.30
-- Versi PHP: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(10) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `id_penulis` varchar(10) NOT NULL,
  `id_penerbit` varchar(10) NOT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `tahun_terbit` year NOT NULL,
  `jumlah` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `isbn`, `judul`, `id_penulis`, `id_penerbit`, `id_kategori`, `tahun_terbit`, `jumlah`) VALUES
('B001', '978-602-03-3295-5', 'Laskar Pelangi', 'PEN001', 'PNB001', 'KAT001', '2005', 10),
('B002', '978-602-03-3296-2', 'Pulang', 'PEN002', 'PNB002', 'KAT001', '2017', 8),
('B003', '978-602-03-3297-9', 'Supernova: Ksatria, Puteri, dan Bintang Jatuh', 'PEN003', 'PNB003', 'KAT001', '2001', 5),
('B004', '978-979-1110-98-7', 'Bumi Manusia', 'PEN004', 'PNB001', 'KAT002', '1980', 7),
('B005', '978-0-7475-3274-1', 'Harry Potter and the Sorcerer\'s Stone', 'PEN005', 'PNB004', 'KAT005', '1997', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('KAT001', 'Fiksi Ilmiah'),
('KAT002', 'Sejarah'),
('KAT003', 'Teknologi'),
('KAT004', 'Biografi'),
('KAT005', 'Fantasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(20) NOT NULL,
  `nama_mahasiswa` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mahasiswa`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamat`, `no_hp`) VALUES
('2023001', 'Budi Santoso', 'L', 'Surabaya', '2003-05-10', 'Jl. Merdeka No. 10', '081234567890'),
('2023002', 'Siti Aminah', 'P', 'Malang', '2002-11-20', 'Jl. Sudirman No. 5', '085678901234'),
('2023003', 'Agus Salim', 'L', 'Bandung', '2004-01-15', 'Jl. Pahlawan No. 22', '087812345678'),
('2023004', 'Dewi Lestari', 'P', 'Yogyakarta', '2003-07-25', 'Jl. Kartini No. 8', '081324354657'),
('2023005', 'Rudi Hartono', 'L', 'Jakarta', '2002-09-01', 'Jl. Gajah Mada No. 15', '089987654321');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` varchar(10) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_harus_dikembalikan` date NOT NULL,
  `id_admin` varchar(10) NOT NULL,
  `status_buku` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `nim`, `tgl_pinjam`, `tgl_harus_dikembalikan`, `id_admin`, `status_buku`) VALUES
('PJ001', '2023001', '2025-06-25', '2025-07-02', 'ADM001', 'Dipinjam'),
('PJ002', '2023002', '2025-06-26', '2025-07-03', 'ADM001', 'Dipinjam'),
('PJ003', '2023003', '2025-06-27', '2025-07-04', 'ADM002', 'Dipinjam'),
('PJ004', '2023001', '2025-06-28', '2025-07-05', 'ADM001', 'Dipinjam'),
('PJ005', '2023005', '2025-07-01', '2025-07-08', 'ADM002', 'Dipinjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` varchar(10) NOT NULL,
  `nama_penerbit` varchar(255) NOT NULL,
  `kota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `kota`) VALUES
('PNB001', 'Gramedia Pustaka Utama', 'Jakarta'),
('PNB002', 'Mizan Pustaka', 'Bandung'),
('PNB003', 'Bentang Pustaka', 'Yogyakarta'),
('PNB004', 'Erlangga', 'Jakarta'),
('PNB005', 'Andi Publisher', 'Yogyakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_kembali` varchar(10) NOT NULL,
  `id_peminjam` varchar(10) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `id_admin` varchar(10) NOT NULL,
  `denda` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`id_kembali`, `id_peminjam`, `tgl_kembali`, `id_admin`, `denda`) VALUES
('PB001', 'PJ001', '2025-07-02', 'ADM001', 0.00),
('PB002', 'PJ002', '2025-07-04', 'ADM002', 5000.00),
('PB003', 'PJ003', '2025-07-04', 'ADM001', 0.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penulis`
--

CREATE TABLE `penulis` (
  `id_penulis` varchar(10) NOT NULL,
  `nama_penulis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `penulis`
--

INSERT INTO `penulis` (`id_penulis`, `nama_penulis`) VALUES
('PEN001', 'Andrea Hirata'),
('PEN002', 'Tere Liye'),
('PEN003', 'Dewi Lestari (Dee)'),
('PEN004', 'Pramoedya Ananta Toer'),
('PEN005', 'J.K. Rowling');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD UNIQUE KEY `isbn` (`isbn`),
  ADD KEY `id_penulis` (`id_penulis`),
  ADD KEY `id_penerbit` (`id_penerbit`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `nim` (`nim`);

--
-- Indeks untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_kembali`),
  ADD KEY `id_peminjam` (`id_peminjam`);

--
-- Indeks untuk tabel `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id_penulis`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_penulis`) REFERENCES `penulis` (`id_penulis`),
  ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit` (`id_penerbit`),
  ADD CONSTRAINT `buku_ibfk_3` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Ketidakleluasaan untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`id_peminjam`) REFERENCES `peminjaman` (`id_peminjaman`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
