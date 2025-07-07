<?php
    include "header.php"; // Pastikan header.php berisi semua link CSS glassmorphism
    include "koneksi.php"; // Pastikan koneksi.php di-include
?>

<div class="main-content">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                <i class="fas fa-hand-holding me-3"></i>Data Peminjaman
            </h1>
            <p class="page-subtitle">Kelola dan pantau data peminjaman buku perpustakaan</p>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="stats-card">
                    <?php
                        $query_count = mysqli_query($koneksi, "SELECT COUNT(*) AS total_peminjaman FROM peminjaman");
                        $total_peminjaman = mysqli_fetch_assoc($query_count)['total_peminjaman'];
                    ?>
                    <div class="stats-number"><?php echo $total_peminjaman; ?></div>
                    <div class="stats-label">Total Peminjaman Tercatat</div>
                </div>
            </div>
        </div>

        <div class="glass-card">
            <div class="action-bar">
                <div>
                    <button class="modern-btn" data-bs-toggle="modal" data-bs-target="#tambahPeminjamanModal">
                        <i class="fas fa-plus"></i>
                        Tambah Peminjaman
                    </button>
                </div>
                <div class="search-form">
                    <form action="" method="GET" class="d-flex gap-2">
                        <input type="text" class="search-input" placeholder="Cari berdasarkan NIM atau ID Peminjaman..." name="keyword" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>">
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
                            <th>ID Peminjaman</th>
                            <th>NIM</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Harus Dikembalikan</th>
                            <th>ID Admin</th>
                            <th>Status Buku</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Logic pencarian
                            if (isset($_GET['cari'])) {
                                $keyword = mysqli_real_escape_string($koneksi, $_GET['keyword']);
                                $query = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE nim LIKE '%$keyword%' OR id_peminjaman LIKE '%$keyword%'");
                            } else {
                                $query = mysqli_query($koneksi, "SELECT * FROM peminjaman");
                            }

                            $no = 1;
                            if (mysqli_num_rows($query) > 0) {
                                while ($ambil_data = mysqli_fetch_array($query)) {
                        ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $ambil_data['id_peminjaman']; ?></td>
                                    <td><?php echo $ambil_data['nim']; ?></td>
                                    <td><?php echo $ambil_data['tgl_pinjam']; ?></td>
                                    <td><?php echo $ambil_data['tgl_harus_dikembalikan']; ?></td>
                                    <td><?php echo $ambil_data['id_admin']; ?></td>
                                    <td><?php echo $ambil_data['status_buku']; ?></td>
                                    <td>
                                        <a href="edit_peminjaman.php?id=<?php echo $ambil_data['id_peminjaman']; ?>" class="btn btn-warning btn-sm me-2" title="Edit Peminjaman">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="hapus_peminjaman.php?id=<?php echo $ambil_data['id_peminjaman']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" title="Hapus Peminjaman">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                        <?php
                                }
                            } else {
                        ?>
                            <tr>
                                <td colspan="8" class="text-center py-4">Tidak ada data peminjaman ditemukan.</td>
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

<div class="modal fade" id="tambahPeminjamanModal" tabindex="-1" aria-labelledby="tambahPeminjamanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPeminjamanModalLabel">
                    <i class="fas fa-plus me-2"></i>Tambah Data Peminjaman
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="simpan_peminjaman.php"> <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="id_peminjaman" class="form-label">ID Peminjaman</label>
                            <input type="text" class="form-control" id="id_peminjaman" name="id_peminjaman" required placeholder="Contoh: PJM001">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nim" class="form-label">NIM Mahasiswa</label>
                            <input type="text" class="form-control" id="nim" name="nim" required placeholder="Masukkan NIM mahasiswa">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="tgl_peminjaman" class="form-label">Tanggal Peminjaman</label>
                            <input type="date" class="form-control" id="tgl_peminjaman" name="tgl_peminjaman" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tgl_harus_dikembalikan" class="form-label">Tanggal Harus Dikembalikan</label>
                            <input type="date" class="form-control" id="tgl_harus_dikembalikan" name="tgl_harus_dikembalikan" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="id_admin" class="form-label">ID Admin</label>
                            <input type="text" class="form-control" id="id_admin" name="id_admin" required placeholder="Contoh: ADM001">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status_buku" class="form-label">Status Buku</label>
                            <input type="text" class="form-control" id="status_buku" name="status_buku" required placeholder="Contoh: Dipinjam">
                        </div>
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