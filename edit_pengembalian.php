<?php
include "header.php";

// Menghapus data buku
if (isset($_GET['hapus'])) {
    $id_kembali = $_GET['hapus'];
    $query = "DELETE FROM pengembalian WHERE id_kembali=$id_kembali";
    if ($conn->query($query)) {
        echo "Data buku berhasil dihapus.";
    } else {
        echo "Gagal menghapus data buku.";
    }
    header("Location: data_pengembalian.php");
}

// Mengedit data buku
if (isset($_POST['update'])) {
    $id_kembali = $_POST['id_kembali'];
    $id_peminjam = $_POST['id_peminjam'];
    $tgl_kembali = $_POST['tgl_kembali'];
    $id_admin = $_POST['id_admin'];
    $denda = $_POST['denda'];
    $query = "UPDATE pengembalian SET id_kembali='$id_kembali', id_peminjam='$id_peminjam', tgl_kembali='$tgl_kembali', id_admin='$id_admin', denda='$denda' WHERE id_kembali=$id_kembali";
    if ($conn->query($query)) {
        echo "Data buku berhasil diperbarui.";
    } else {
        echo "Gagal memperbarui data buku.";
    }
    header("Location: data_pengembalian.php");
}

// Ambil data buku untuk ditampilkan di formulir edit
if (isset($_GET['edit'])) {
    $id_kembali = $_GET['edit'];
    $result = $conn->query("SELECT * FROM pengembalian WHERE id_kembali=$id_kembali");
    $row = $result->fetch_assoc();
}

// Ambil semua data buku untuk ditampilkan di tabel
$result = $conn->query("SELECT * FROM pengembalian");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Perpustakaan</title>
</head>
<body>
    <h1>Daftar Buku</h1>
    <table border="1">
        <tr>
            <th>ID Kembali</th>
            <th>ID Peminjam</th>
            <th>Tanggal Kembali</th>
            <th>ID Admin</th>
            <th>Denda</th>
            <th>Aksi</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id_kembali']; ?></td>
            <td><?php echo $row['id_peminjam']; ?></td>
            <td><?php echo $row['tgl_kembali']; ?></td>
            <td><?php echo $row['id_admin']; ?></td>
            <td><?php echo $row['denda']; ?></td>
            <td>
                <a href="edit_pengembalian.php?edit=<?php echo $row['id_kembali']; ?>">Edit</a>
                <a href="edir pengenmbalian.php?hapus=<?php echo $row['id_kembali']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <?php if (isset($_GET['edit'])): ?>
    <h1>Edit Buku</h1>
    <form method="POST" action="perpustakaan.php">
        <input type="hidden" name="id_kembali" value="<?php echo $row['id_kembali']; ?>">
        <label>ID Kembali:</label>
        <input type="text" name="id_peminjam" value="<?php echo $row['id_peminjam']; ?>" required><br>
        <label>ID peminjam:</label>
        <input type="text" name=tanggal_kembali" value="<?php echo $row['tanggal kembali']; ?>" required><br>
        <label>Tahun Terbit:</label>
        <input type="text" name="tahun_terbit" value="<?php echo $row['tahun_terbit']; ?>" required><br>
        <button type="submit" name="update">Update</button>
    </form>
    <?php endif; ?>
</body>
</html>
