<?php
    include "header.php";
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-2" style="min-height: 500px;">
            <div class="card">
                <div class="card-header">
                    Tambah Buku
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <form action="simpan_buku.php" method="POST">
                                <div class="form-group mt-3">
                                    <label for="id_buku">ID Buku</label>
                                    <input type="text" class="form-control" placeholder="ID Buku" name="id_buku">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="isbn">ISBN</label>
                                    <input type="text" class="form-control" placeholder="ISBN" name="isbn">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" placeholder="Judul" name="judul">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="id_penulis">ID Penulis</label>
                                    <input type="text" class="form-control" placeholder="ID Penulis" name="id_penulis">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="id_penerbit">ID Penerbit</label>
                                    <input type="text" class="form-control" placeholder="ID Penerbit" name="id_penerbit">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="id_kategori">ID Kategori</label>
                                    <input type="text" class="form-control" placeholder="ID Kategori" name="id_kategori">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="tahun_terbit">Tahun Terbit</label>
                                    <input type="text" class="form-control" placeholder="Tahun Terbit" name="tahun_terbit">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="text" class="form-control" placeholder="Jumlah" name="jumlah">
                                </div>
                                <input type="submit" class="btn btn-primary mt-3" value="Simpan">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include "footer.html";
?>
