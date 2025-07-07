<?php
    include "header.php"; // Pastikan header.php berisi semua link CSS glassmorphism
    include "koneksi.php"; // Pastikan koneksi.php di-include
?>

<div class="main-content">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                <i class="fas fa-user-graduate me-3"></i>Data Mahasiswa
            </h1>
            <p class="page-subtitle">Kelola dan pantau data mahasiswa yang terdaftar</p>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="stats-card">
                    <?php
                        $query_count = mysqli_query($koneksi, "SELECT COUNT(*) AS total_mahasiswa FROM mahasiswa");
                        $total_mahasiswa = mysqli_fetch_assoc($query_count)['total_mahasiswa'];
                    ?>
                    <div class="stats-number"><?php echo $total_mahasiswa; ?></div>
                    <div class="stats-label">Total Mahasiswa Terdaftar</div>
                </div>
            </div>
        </div>

        <div class="glass-card">
            <div class="action-bar">
                <div>
                    <button class="modern-btn" data-bs-toggle="modal" data-bs-target="#tambahMahasiswaModal">
                        <i class="fas fa-plus"></i>
                        Tambah Mahasiswa
                    </button>
                </div>
                <div class="search-form">
                    <form action="" method="GET" class="d-flex gap-2">
                        <input type="text" class="search-input" placeholder="Cari berdasarkan NIM atau Nama..." name="keyword" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>">
                        <button type="submit" class="modern-btn" name="cari">
                            <i class="fas fa-search"></i>
                            Cari
                        </button>
                    </form>
                </div>
            </div>

            <div class="modern-table">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Logic pencarian
                            if (isset($_GET['cari'])) {
                                $keyword = mysqli_real_escape_string($koneksi, $_GET['keyword']);
                                $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim LIKE '%$keyword%' OR nama_mahasiswa LIKE '%$keyword%'");
                            } else {
                                $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
                            }

                            $no = 1;
                            if (mysqli_num_rows($query) > 0) {
                                while ($ambil_data = mysqli_fetch_array($query)) {
                        ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $ambil_data['nim']; ?></td>
                                    <td><?php echo $ambil_data['nama_mahasiswa']; ?></td>
                                    <td><?php echo $ambil_data['jenis_kelamin']; ?></td>
                                    <td><?php echo $ambil_data['tempat_lahir']; ?></td>
                                    <td><?php echo $ambil_data['tgl_lahir']; ?></td>
                                    <td><?php echo $ambil_data['alamat']; ?></td>
                                    <td><?php echo $ambil_data['no_hp']; ?></td>
                                    <td>
                                        <a href="edit_mahasiswa.php?nim=<?php echo $ambil_data['nim']; ?>" class="btn btn-warning btn-sm me-2" title="Edit Mahasiswa">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="hapus_mahasiswa.php?nim=<?php echo $ambil_data['nim']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" title="Hapus Mahasiswa">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                        <?php
                                }
                            } else {
                        ?>
                            <tr>
                                <td colspan="9" class="text-center py-4">Tidak ada data mahasiswa ditemukan.</td>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahMahasiswaModal" tabindex="-1" aria-labelledby="tambahMahasiswaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahMahasiswaModalLabel">
                    <i class="fas fa-plus me-2"></i>Tambah Data Mahasiswa
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="simpan_mahasiswa.php"> <div class="modal-body">
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" required placeholder="Masukkan NIM mahasiswa">
                    </div>
                    <div class="mb-3">
                        <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
                        <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" required placeholder="Masukkan nama mahasiswa">
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required placeholder="Masukkan tempat lahir">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required placeholder="Masukkan alamat lengkap"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">Nomor HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" required placeholder="Contoh: 081234567890">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i>Batal
                    </button>
                    <button type="submit" name="tambah" class="modern-btn">
                        <i class="fas fa-save me-2"></i>Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    include "footer.html"; // Pastikan footer.html berisi script Bootstrap JS
?>