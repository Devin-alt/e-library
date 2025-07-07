<?php
    include "header.php"; // Pastikan header.php berisi semua link CSS glassmorphism
    include "koneksi.php";
?>

<div class="main-content">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                <i class="fas fa-undo me-3"></i>Data Pengembalian
            </h1>
            <p class="page-subtitle">Kelola dan pantau data pengembalian buku perpustakaan</p>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="stats-card">
                    <?php
                        $query_count = mysqli_query($koneksi, "SELECT COUNT(*) AS total_pengembalian FROM pengembalian");
                        $total_pengembalian = mysqli_fetch_assoc($query_count)['total_pengembalian'];
                    ?>
                    <div class="stats-number"><?php echo $total_pengembalian; ?></div>
                    <div class="stats-label">Total Pengembalian Tercatat</div>
                </div>
            </div>
        </div>

        <div class="glass-card">
            <div class="action-bar">
                <div>
                    <button class="modern-btn" data-bs-toggle="modal" data-bs-target="#tambahPengembalianModal">
                        <i class="fas fa-plus"></i>
                        Tambah Pengembalian
                    </button>
                </div>
                <div class="search-form">
                    <form action="" method="GET" class="d-flex gap-2">
                        <input type="text" class="search-input" placeholder="Cari berdasarkan ID Peminjam..." name="keyword" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>">
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
                            <th>ID Kembali</th>
                            <th>ID Peminjam</th>
                            <th>Tanggal Kembali</th>
                            <th>ID Admin</th>
                            <th>Denda (Rp)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Logic pencarian
                            if (isset($_GET['cari'])) {
                                $keyword = mysqli_real_escape_string($koneksi, $_GET['keyword']);
                                $query = mysqli_query($koneksi, "SELECT * FROM pengembalian WHERE id_peminjam LIKE '%$keyword%' OR id_kembali LIKE '%$keyword%'");
                            } else {
                                $query = mysqli_query($koneksi, "SELECT * FROM pengembalian");
                            }

                            $no = 1;
                            if (mysqli_num_rows($query) > 0) {
                                while ($ambil_data = mysqli_fetch_array($query)) {
                        ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $ambil_data['id_kembali']; ?></td>
                                    <td><?php echo $ambil_data['id_peminjam']; ?></td>
                                    <td><?php echo $ambil_data['tgl_kembali']; ?></td>
                                    <td><?php echo $ambil_data['id_admin']; ?></td>
                                    <td><?php echo number_format($ambil_data['denda'], 2, ',', '.'); ?></td>
                                    <td>
                                        <a href="edit_pengembalian.php?id=<?php echo $ambil_data['id_kembali']; ?>" class="btn btn-warning btn-sm me-2" title="Edit Pengembalian">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="hapus_pengembalian.php?id=<?php echo $ambil_data['id_kembali']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" title="Hapus Pengembalian">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                        <?php
                                }
                            } else {
                        ?>
                            <tr>
                                <td colspan="7" class="text-center py-4">Tidak ada data pengembalian ditemukan.</td>
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

<div class="modal fade" id="tambahPengembalianModal" tabindex="-1" aria-labelledby="tambahPengembalianModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPengembalianModalLabel">
                    <i class="fas fa-plus me-2"></i>Tambah Data Pengembalian
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="tambah_pengembalian.php"> <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="id_kembali" class="form-label">ID Kembali</label>
                            <input type="text" class="form-control" id="id_kembali" name="id_kembali" required placeholder="Contoh: KMB001">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="id_peminjam" class="form-label">ID Peminjam</label>
                            <input type="text" class="form-control" id="id_peminjam" name="id_peminjam" required placeholder="Contoh: PJM001">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                        <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="id_admin" class="form-label">ID Admin</label>
                            <input type="text" class="form-control" id="id_admin" name="id_admin" required placeholder="Contoh: ADM001">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="denda" class="form-label">Denda (Rp)</label>
                            <input type="number" class="form-control" id="denda" name="denda" required value="0" min="0">
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