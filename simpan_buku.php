<?php
   include "koneksi.php";
   
   // Mendapatkan data dari form
   $id_buku = $_POST['id_buku'];
   $isbn = $_POST['isbn'];
   $judul = $_POST['judul'];
   $id_penulis = $_POST['id_penulis'];
   $id_penerbit = $_POST['id_penerbit'];
   $id_kategori = $_POST['id_kategori'];
   $tahun_terbit = $_POST['tahun_terbit'];
   $jumlah = $_POST['jumlah'];
   
   // Query untuk memasukkan data ke dalam tabel buku
   $query = mysqli_query($koneksi, "INSERT INTO buku (id_buku, isbn, judul, id_penulis, id_penerbit, id_kategori, tahun_terbit, jumlah) VALUES ('$id_buku', '$isbn', '$judul', '$id_penulis', '$id_penerbit', '$id_kategori', '$tahun_terbit', '$jumlah')");
   
   // Mengarahkan kembali ke halaman data_buku.php setelah data berhasil dimasukkan
   header('Location: data_buku.php');
?>