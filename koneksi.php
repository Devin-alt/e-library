<?php
    $koneksi=mysqli_connect("localhost","root","","library");
    if (!$koneksi) {
        echo "koneksi gagal";
    }
    