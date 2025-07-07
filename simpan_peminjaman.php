<?php
include "koneksi.php";

// Mendapatkan data dari form
$id_peminjaman = $_POST['id_peminjaman'];
$nim = $_POST['nim'];
$tgl_peminjaman = $_POST['tgl_peminjaman'];
$tgl_harus_dikembalikan = $_POST['tgl_harus_dikembalikan'];
$id_admin = $_POST['id_admin'];
$status_buku = $_POST['status_buku'];

// Query untuk memasukkan data ke dalam tabel buku
$query = mysqli_query($koneksi, "INSERT INTO peminjaman (id_peminjaman, nim, tgl_pinjam, tgl_harus_dikembalikan, id_admin, status_buku) VALUES ('$id_peminjaman', '$nim', '$tgl_pinjam', '$tgl_harus_dikembalikan', '$id_admin', '$status_buku')");

// Mengarahkan kembali ke halaman data_buku.php setelah data berhasil dimasukkan
header('Location: data_peminjaman.php');
?>
