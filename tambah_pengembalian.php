<?php
    include "header.php";
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-2" style="min-height: 500px;">
            <div class="card">
                <div class="card-header">
                    Tambah Pengembalian
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <form action="simpan_pengembalian.php" method="POST">
                                <div class="form-group mt-3">
                                    <label for="id_kembali">ID Kembali</label>
                                    <input type="text" class="form-control" placeholder="ID Kembali" name="id_kembali" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="id_peminjam">ID Peminjam</label>
                                    <input type="text" class="form-control" placeholder="ID Peminjam" name="id_peminjam" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="tgl_kembali">Tanggal Kembali</label>
                                    <input type="date" class="form-control" name="tgl_kembali" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="id_admin">ID Admin</label>
                                    <input type="text" class="form-control" placeholder="ID Admin" name="id_admin" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="denda">Denda (Rp)</label>
                                    <input type="number" step="0.01" class="form-control" placeholder="Denda" name="denda" required>
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
