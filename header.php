<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Rental Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand font-weight-bold" href="dashboard.php">Rental Mobil Simson Wattilete</a>
    <?php if (isset($_SESSION['id'])): ?>
      <div class="d-flex align-items-center text-white">
        <span class="me-3">Halo, <strong>Simson</strong></span>
        <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
      </div>
    <?php endif; ?>
  </div>
</nav>
<div class="container mb-5"></div>