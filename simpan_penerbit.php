<?php
   include "koneksi.php";
   $nama_penerbit=$_POST['nama_penerbit'];
   $kota=$_POST['kota'];
   $query=mysqli_query($koneksi, "insert into penerbit value (null, '$nama_penerbit', 'kota')");
   header('location:data_penerbit.php');