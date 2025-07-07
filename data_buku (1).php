<?php
include "header.php";
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-2" style="min-height: 500px;">
            <div class="card">
                <div class="card-header">
                    Data Buku
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
                                Tambah Data
                            </button>
                        </div>
                        <div class="col">
                            <form action="" class="form-inline float-right" method="GET">
                                <input type="text" class="form-control" name="keyword">
                                <input type="submit" class="btn btn-primary ml-2" name="cari" value="Cari">
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>No</th>
                                    <th>ID Buku</th>
                                    <th>ISBN</th>
                                    <th>Judul</th>
                                    <th>ID Penulis</th>
                                    <th>ID Penerbit</th>
                                    <th>ID Kategori</th>
                                    <th>Tahun Terbit</th>
                                    <th>Jumlah</th>
                                    <th>Aksi</th>
                                </tr>
                                <?php
                                if (isset($_GET['cari'])) {
                                    $keyword = $_GET['keyword'];
                                    $query = mysqli_query($koneksi, "SELECT * FROM buku WHERE judul LIKE '%$keyword%'");
                                } else {
                                    $query = mysqli_query($koneksi, "SELECT * FROM buku");
                                }
                                $no = 1;
                                while ($ambil_data = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $ambil_data['id_buku']; ?></td>
                                    <td><?php echo $ambil_data['isbn']; ?></td>
                                    <td><?php echo $ambil_data['judul']; ?></td>
                                    <td><?php echo $ambil_data['id_penulis']; ?></td>
                                    <td><?php echo $ambil_data['id_penerbit']; ?></td>
                                    <td><?php echo $ambil_data['id_kategori']; ?></td>
                                    <td><?php echo $ambil_data['tahun_terbit']; ?></td>
                                    <td><?php echo $ambil_data['jumlah']; ?></td>
                                    <td>
                                        <a href="edit_buku.php?id=<?php echo $ambil_data['id_buku']; ?>" class="btn btn-warning">Edit</a>
                                        <a href="hapus_buku.php?id=<?php echo $ambil_data['id_buku']; ?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Data Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_buku">ID Buku</label>
                        <input type="text" class="form-control" id="id_buku" name="id_buku" required>
                    </div>
                    <div class="form-group">
                        <label for="isbn">ISBN</label>
                        <input type="text" class="form-control" id="isbn" name="isbn" required>
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>
                    <div class="form-group">
                        <label for="id_penulis">ID Penulis</label>
                        <input type="text" class="form-control" id="id_penulis" name="id_penulis" required>
                    </div>
                    <div class="form-group">
                        <label for="id_penerbit">ID Penerbit</label>
                        <input type="text" class="form-control" id="id_penerbit" name="id_penerbit" required>
                    </div>
                    <div class="form-group">
                        <label for="id_kategori">ID Kategori</label>
                        <input type="text" class="form-control" id="id_kategori" name="id_kategori" required>
                    </div>
                    <div class="form-group">
                        <label for="tahun_terbit">Tahun Terbit</label>
                        <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="tambah" class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include "footer.html";
?>
