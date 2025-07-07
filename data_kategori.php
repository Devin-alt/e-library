<?php
    include "header.php"; // Pastikan header.php berisi semua link CSS glassmorphism
    include "koneksi.php";
?>

<div class="main-content">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                <i class="fas fa-tags me-3"></i>Data Kategori
            </h1>
            <p class="page-subtitle">Kelola dan pantau kategori buku</p>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="stats-card">
                    <?php
                        $query_count = mysqli_query($koneksi, "SELECT COUNT(*) AS total_kategori FROM kategori");
                        $total_kategori = mysqli_fetch_assoc($query_count)['total_kategori'];
                    ?>
                    <div class="stats-number"><?php echo $total_kategori; ?></div>
                    <div class="stats-label">Total Kategori Tercatat</div>
                </div>
            </div>
        </div>

        <div class="glass-card">
            <div class="action-bar">
                <div>
                    <button class="modern-btn" data-bs-toggle="modal" data-bs-target="#tambahKategoriModal">
                        <i class="fas fa-plus"></i>
                        Tambah Kategori
                    </button>
                </div>
                <div class="search-form">
                    <form action="" method="GET" class="d-flex gap-2">
                        <input type="text" class="search-input" placeholder="Cari berdasarkan nama kategori..." name="keyword" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>">
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
                            <th>Kode Kategori</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Logic pencarian
                            if (isset($_GET['cari'])) {
                                $keyword = mysqli_real_escape_string($koneksi, $_GET['keyword']);
                                $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE nama_kategori LIKE '%$keyword%' OR id_kategori LIKE '%$keyword%'");
                            } else {
                                $query = mysqli_query($koneksi, "SELECT * FROM kategori");
                            }

                            $no = 1;
                            if (mysqli_num_rows($query) > 0) {
                                while ($ambil_data = mysqli_fetch_array($query)) {
                        ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $ambil_data['id_kategori']; ?></td>
                                    <td><?php echo $ambil_data['nama_kategori']; ?></td>
                                    <td>
                                        <a href="edit_kategori.php?id=<?php echo $ambil_data['id_kategori']; ?>" class="btn btn-warning btn-sm me-2" title="Edit Kategori">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="hapus_kategori.php?id=<?php echo $ambil_data['id_kategori']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" title="Hapus Kategori">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                        <?php
                                }
                            } else {
                        ?>
                            <tr>
                                <td colspan="4" class="text-center py-4">Tidak ada data kategori ditemukan.</td>
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

<div class="modal fade" id="tambahKategoriModal" tabindex="-1" aria-labelledby="tambahKategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahKategoriModalLabel">
                    <i class="fas fa-plus me-2"></i>Tambah Data Kategori
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="tambah_kategori.php"> <div class="modal-body">
                    <div class="mb-3">
                        <label for="id_kategori" class="form-label">ID Kategori</label>
                        <input type="text" class="form-control" id="id_kategori" name="id_kategori" required placeholder="Contoh: KAT001">
                    </div>
                    <div class="mb-3">
                        <label for="nama_kategori" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required placeholder="Masukkan nama kategori">
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