<?php
    include "header.php"; // Pastikan header.php berisi semua link CSS glassmorphism
    include "koneksi.php"; // Pastikan koneksi.php di-include
?>

<div class="main-content">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                <i class="fas fa-pen me-3"></i>Data Penulis
            </h1>
            <p class="page-subtitle">Kelola dan pantau data penulis buku</p>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="stats-card">
                    <?php
                        $query_count = mysqli_query($koneksi, "SELECT COUNT(*) AS total_penulis FROM penulis");
                        $total_penulis = mysqli_fetch_assoc($query_count)['total_penulis'];
                    ?>
                    <div class="stats-number"><?php echo $total_penulis; ?></div>
                    <div class="stats-label">Total Penulis Tercatat</div>
                </div>
            </div>
        </div>

        <div class="glass-card">
            <div class="action-bar">
                <div>
                    <button class="modern-btn" data-bs-toggle="modal" data-bs-target="#tambahPenulisModal">
                        <i class="fas fa-plus"></i>
                        Tambah Penulis
                    </button>
                </div>
                <div class="search-form">
                    <form action="" method="GET" class="d-flex gap-2">
                        <input type="text" class="search-input" placeholder="Cari berdasarkan nama penulis..." name="keyword" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>">
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
                            <th>Kode Penulis</th>
                            <th>Nama Penulis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Logic pencarian
                            if (isset($_GET['cari'])) {
                                $keyword = mysqli_real_escape_string($koneksi, $_GET['keyword']);
                                $query = mysqli_query($koneksi, "SELECT * FROM penulis WHERE nama_penulis LIKE '%$keyword%' OR id_penulis LIKE '%$keyword%'");
                            } else {
                                $query = mysqli_query($koneksi, "SELECT * FROM penulis");
                            }

                            $no = 1;
                            if (mysqli_num_rows($query) > 0) {
                                while ($ambil_data = mysqli_fetch_array($query)) {
                        ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $ambil_data['id_penulis']; ?></td>
                                    <td><?php echo $ambil_data['nama_penulis']; ?></td>
                                    <td>
                                        <a href="edit_penulis.php?id=<?php echo $ambil_data['id_penulis']; ?>" class="btn btn-warning btn-sm me-2" title="Edit Penulis">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="hapus_penulis.php?id=<?php echo $ambil_data['id_penulis']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" title="Hapus Penulis">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                        <?php
                                }
                            } else {
                        ?>
                            <tr>
                                <td colspan="4" class="text-center py-4">Tidak ada data penulis ditemukan.</td>
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

<div class="modal fade" id="tambahPenulisModal" tabindex="-1" aria-labelledby="tambahPenulisModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPenulisModalLabel">
                    <i class="fas fa-plus me-2"></i>Tambah Data Penulis
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="tambah_penulis.php"> <div class="modal-body">
                    <div class="mb-3">
                        <label for="id_penulis" class="form-label">ID Penulis</label>
                        <input type="text" class="form-control" id="id_penulis" name="id_penulis" required placeholder="Contoh: PNL001">
                    </div>
                    <div class="mb-3">
                        <label for="nama_penulis" class="form-label">Nama Penulis</label>
                        <input type="text" class="form-control" id="nama_penulis" name="nama_penulis" required placeholder="Masukkan nama penulis">
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