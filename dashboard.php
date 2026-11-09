<?php
require_once 'config.php';
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}
include 'header.php';

$query = "SELECT * FROM mobil_001 ORDER BY no_id DESC";
$result = mysqli_query($koneksi, $query);
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Data Mobil Rental</h3>
    <a href="mobil_tambah.php" class="btn btn-success">+ Tambah Mobil</a>
</div>

<div class="card shadow">
    <div class="card-body">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No ID</th>
                    <th>Nomor Kendaraan</th>
                    <th>Jenis Kendaraan</th>
                    <th>Pemilik</th>
                    <th>Tahun Pembuatan</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= $row['no_id']; ?></td>
                    <td><?= htmlspecialchars($row['nomor_kendaraan']); ?></td>
                    <td><span class="badge bg-info text-dark"><?= $row['jenis_kendaraan']; ?></span></td>
                    <td><?= htmlspecialchars($row['pemilik']); ?></td>
                    <td><?= $row['tahun_pembuatan']; ?></td>
                    <td>
                        <a href="mobil_edit.php?id=<?= $row['no_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="mobil_hapus.php?id=<?= $row['no_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>