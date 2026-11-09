<?php
require_once 'config.php';
if (!isset($_SESSION['id'])) { header("Location: index.php"); exit(); }

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM mobil_001 WHERE no_id='$id'"));

if (isset($_POST['update'])) {
    $nomor = mysqli_real_escape_string($koneksi, $_POST['nomor_kendaraan']);
    $jenis = mysqli_real_escape_string($koneksi, $_POST['jenis_kendaraan']);
    $pemilik = mysqli_real_escape_string($koneksi, $_POST['pemilik']);
    $tahun = mysqli_real_escape_string($koneksi, $_POST['tahun_pembuatan']);

    mysqli_query($koneksi, "UPDATE mobil_001 SET nomor_kendaraan='$nomor', jenis_kendaraan='$jenis', pemilik='$pemilik', tahun_pembuatan='$tahun' WHERE no_id='$id'");
    header("Location: dashboard.php");
}
include 'header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-warning">Edit Data Mobil</div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label>Nomor Kendaraan</label>
                        <input type="text" name="nomor_kendaraan" value="<?= $data['nomor_kendaraan']; ?>" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Jenis Kendaraan</label>
                        <select name="jenis_kendaraan" class="form-select" required>
                            <?php foreach(['Sedan','Pickup','Truk','Bemo'] as $j): ?>
                                <option value="<?= $j; ?>" <?= ($data['jenis_kendaraan'] == $j)?'selected':''; ?>><?= $j; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Pemilik</label>
                        <input type="text" name="pemilik" value="<?= $data['pemilik']; ?>" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Tahun Pembuatan</label>
                        <input type="text" maxlength="4" name="tahun_pembuatan" value="<?= $data['tahun_pembuatan']; ?>" class="form-control" required>
                    </div>
                    <button type="submit" name="update" class="btn btn-warning">Update</button>
                    <a href="dashboard.php" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>