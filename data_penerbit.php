<?php
    include "header.php"; // Pastikan header.php berisi semua link CSS glassmorphism
    include "koneksi.php";
?>

<div class="main-content">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                <i class="fas fa-building me-3"></i>Data Penerbit
            </h1>
            <p class="page-subtitle">Kelola dan pantau data penerbit buku</p>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="stats-card">
                    <?php
                        $query_count = mysqli_query($koneksi, "SELECT COUNT(*) AS total_penerbit FROM penerbit");
                        $total_penerbit = mysqli_fetch_assoc($query_count)['total_penerbit'];
                    ?>
                    <div class="stats-number"><?php echo $total_penerbit; ?></div>
                    <div class="stats-label">Total Penerbit Tercatat</div>
                </div>
            </div>
        </div>

        <div class="glass-card">
            <div class="action-bar">
                <div>
                    <button class="modern-btn" data-bs-toggle="modal" data-bs-target="#tambahPenerbitModal">
                        <i class="fas fa-plus"></i>
                        Tambah Penerbit
                    </button>
                </div>
                <div class="search-form">
                    <form action="" method="GET" class="d-flex gap-2">
                        <input type="text" class="search-input" placeholder="Cari berdasarkan nama penerbit..." name="keyword" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>">
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
                            <th>Kode Penerbit</th>
                            <th>Nama Penerbit</th>
                            <th>Kota</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Logic pencarian
                            if (isset($_GET['cari'])) {
                                $keyword = mysqli_real_escape_string($koneksi, $_GET['keyword']);
                                $query = mysqli_query($koneksi, "SELECT * FROM penerbit WHERE nama_penerbit LIKE '%$keyword%' OR id_penerbit LIKE '%$keyword%' OR kota LIKE '%$keyword%'");
                            } else {
                                $query = mysqli_query($koneksi, "SELECT * FROM penerbit");
                            }

                            $no = 1;
                            if (mysqli_num_rows($query) > 0) {
                                while ($ambil_data = mysqli_fetch_array($query)) {
                        ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $ambil_data['id_penerbit']; ?></td>
                                    <td><?php echo $ambil_data['nama_penerbit']; ?></td>
                                    <td><?php echo $ambil_data['kota']; ?></td>
                                    <td>
                                        <a href="edit_penerbit.php?id=<?php echo $ambil_data['id_penerbit']; ?>" class="btn btn-warning btn-sm me-2" title="Edit Penerbit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="hapus_penerbit.php?id=<?php echo $ambil_data['id_penerbit']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" title="Hapus Penerbit">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                        <?php
                                }
                            } else {
                        ?>
                            <tr>
                                <td colspan="5" class="text-center py-4">Tidak ada data penerbit ditemukan.</td>
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

<div class="modal fade" id="tambahPenerbitModal" tabindex="-1" aria-labelledby="tambahPenerbitModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPenerbitModalLabel">
                    <i class="fas fa-plus me-2"></i>Tambah Data Penerbit
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="tambah_penerbit.php"> <div class="modal-body">
                    <div class="mb-3">
                        <label for="id_penerbit" class="form-label">ID Penerbit</label>
                        <input type="text" class="form-control" id="id_penerbit" name="id_penerbit" required placeholder="Contoh: PBT001">
                    </div>
                    <div class="mb-3">
                        <label for="nama_penerbit" class="form-label">Nama Penerbit</label>
                        <input type="text" class="form-control" id="nama_penerbit" name="nama_penerbit" required placeholder="Masukkan nama penerbit">
                    </div>
                    <div class="mb-3">
                        <label for="kota" class="form-label">Kota</label>
                        <input type="text" class="form-control" id="kota" name="kota" required placeholder="Masukkan kota penerbit">
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