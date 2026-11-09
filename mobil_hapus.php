<?php
require_once 'config.php';
if (!isset($_SESSION['id'])) { header("Location: index.php"); exit(); }

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM mobil_001 WHERE no_id='$id'");
}
header("Location: dashboard.php");
?>