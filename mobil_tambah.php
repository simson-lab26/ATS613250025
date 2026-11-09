<?php
require_once 'config.php';
if (!isset($_SESSION['id'])) { header("Location: index.php"); exit(); }

if (isset($_POST['submit'])) {
    $nomor = mysqli_real_escape_string($koneksi, $_POST['nomor_kendaraan']);
    $jenis = mysqli_real_escape_string($koneksi, $_POST['jenis_kendaraan']);
    $pemilik = mysqli_real_escape_string($koneksi, $_POST['pemilik']);
    $tahun = mysqli_real_escape_string($koneksi, $_POST['tahun_pembuatan']);

    // Perhatikan `nomor_kendaraan` disesuaikan dengan kolom database
    $query = "INSERT INTO mobil_001 (nomor_kendaraan, jenis_kendaraan, pemilik, tahun_pembuatan) 
              VALUES ('$nomor', '$jenis', '$pemilik', '$tahun')";
              
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Gagal menambah data: " . mysqli_error($koneksi);
    }
}
include 'header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-success text-white">Tambah Data Mobil</div>
            <div class="card-body">
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?= $error; ?></div>
                <?php endif; ?>
                <form method="POST">
                    <div class="mb-3">
                        <label>Nomor Kendaraan</label>
                        <input type="text" name="nomor_kendaraan" class="form-control" required placeholder="Contoh: D 1234 ABC">
                    </div>
                    <div class="mb-3">
                        <label>Jenis Kendaraan</label>
                        <select name="jenis_kendaraan" class="form-select" required>
                            <option value="Sedan">Sedan</option>
                            <option value="Pickup">Pickup</option>
                            <option value="Truk">Truk</option>
                            <option value="Bemo">Bemo</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Pemilik</label>
                        <input type="text" name="pemilik" class="form-control" required placeholder="Nama pemilik">
                    </div>
                    <div class="mb-3">
                        <label>Tahun Pembuatan</label>
                        <input type="text" maxlength="4" name="tahun_pembuatan" class="form-control" required placeholder="2026">
                    </div>
                    <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                    <a href="dashboard.php" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>