<?php
include "koneksi.php";

// Mendapatkan data dari form
$id_kembali = $_POST['id_kembali'];
$id_peminjam = $_POST['id_peminjam'];
$tgl_kembali = $_POST['tgl_kembali'];
$id_admin = $_POST['id_admin'];
$denda = $_POST['denda'];

// Query untuk memasukkan data ke dalam tabel pengembalian
$query = mysqli_query($koneksi, "INSERT INTO pengembalian (id_kembali, id_peminjam, tgl_kembali, id_admin, denda) VALUES ('$id_kembali', '$id_peminjam', '$tgl_kembali', '$id_admin', '$denda')");

// Mengarahkan kembali ke halaman data_pengembalian.php setelah data berhasil dimasukkan
header('Location: data_pengembalian.php');
?>
