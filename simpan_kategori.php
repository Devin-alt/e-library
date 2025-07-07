<?php
   include "koneksi.php";
   $nama_kategori=$_POST['nama_kategori'];
   
   $query=mysqli_query($koneksi, "insert into kategori value (null, '$nama_kategori')");
   header('location:data_kategori.php');