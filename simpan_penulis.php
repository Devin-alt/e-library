<?php
   include "koneksi.php";
   $nama_penulis=$_POST['nama_penulis'];
   $query=mysqli_query($koneksi, "insert into penulis value (null, '$nama_penulis')");
   header('location:data_penulis.php');