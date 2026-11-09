<?php
require_once 'config.php';
if (isset($_SESSION['id'])) {
    header("Location: dashboard.php");
    exit();
}
include 'header.php';
?>

<div class="row justify-content-center mt-5">
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <h4>Login System</h4>
            </div>
            <div class="card-body">
                <?php if (isset($_GET['pesan']) && $_GET['pesan'] == 'gagal'): ?>
                    <div class="alert alert-danger">Email/Password salah atau akun tidak aktif!</div>
                <?php endif; ?>
                <form action="login_process.php" method="POST">
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required placeholder="admin@gmail.com">
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required placeholder="admin123">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>