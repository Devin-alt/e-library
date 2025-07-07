<?php
    include "header.php";
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-2" style="min-height: 500px;">
            <div class="card">
                <div class="card-header">
                    Tambah Peminjaman
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <form action="simpan_peminjaman.php" method="POST">
                                <div class="form-group mt-3">
                                    <label for="id_peminjaman">ID Peminjaman</label>
                                    <input type="text" class="form-control" placeholder="ID Peminjaman" name="id_peminjaman" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="nim">NIM</label>
                                    <input type="text" class="form-control" placeholder="NIM" name="nim" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="tgl_peminjaman">Tanggal Peminjaman</label>
                                    <input type="date" class="form-control" name="tgl_peminjaman" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="tgl_harus_dikembalikan">Tanggal Harus Dikembalikan</label>
                                    <input type="date" class="form-control" name="tgl_harus_dikembalikan" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="id_admin">ID Admin</label>
                                    <input type="text" class="form-control" placeholder="ID Admin" name="id_admin" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="status_buku">Status Buku</label>
                                    <select class="form-control" name="status_buku" required>
                                        <option value="Pinjam">Pinjam</option>
                                        <option value="Dikembalikan">Dikembalikan</option>
                                    </select>
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
