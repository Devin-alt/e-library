<?php
    include "header.php";
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-2" style="min-height: 500px;">
            <div class="card">
                <div class="card-header">
                    Tambah Mahasiswa
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <form action="simpan_mahasiswa.php" method="POST">
                                <div class="form-group mt-3">
                                    <label for="nim">NIM</label>
                                    <input type="text" class="form-control" placeholder="NIM" name="nim" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="nama_mahasiswa">Nama Mahasiswa</label>
                                    <input type="text" class="form-control" placeholder="Nama Mahasiswa" name="nama_mahasiswa" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control" name="jenis_kelamin" required>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tgl_lahir" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" placeholder="Alamat" name="alamat" required></textarea>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="no_hp">Nomor HP</label>
                                    <input type="text" class="form-control" placeholder="Nomor HP" name="no_hp" required>
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
