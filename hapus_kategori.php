<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori='$id'");
    header('Location: data_kategori.php');
}
?>
