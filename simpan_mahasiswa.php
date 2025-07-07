<?php
include "koneksi.php";

// Mendapatkan data dari form
$nim = $_POST['nim'];
$nama_mahasiswa = $_POST['nama_mahasiswa'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tempat_lahir = $_POST['tempat_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];

// Query untuk memasukkan data ke dalam tabel mahasiswa
$query = mysqli_query($koneksi, "INSERT INTO mahasiswa (nim, nama_mahasiswa, jenis_kelamin, tempat_lahir, tgl_lahir, alamat, no_hp) VALUES ('$nim', '$nama_mahasiswa', '$jenis_kelamin', '$tempat_lahir', '$tgl_lahir', '$alamat', '$no_hp')");

// Mengarahkan kembali ke halaman data_mahasiswa.php setelah data berhasil dimasukkan
header('Location: data_mahasiswa.php');
?>
