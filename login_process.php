<?php
require_once 'config.php';

$email = mysqli_real_escape_string($koneksi, $_POST['email']);
$password = md5($_POST['password']);

// Mencocokkan email, password, dan status aktive = '1'
$query = "SELECT * FROM member_001 WHERE email='$email' AND password='$password' AND aktive='1'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // Menyimpan session id, email, dan nama
    $_SESSION['id'] = $row['id'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['nama'] = $row['nama'];
    
    header("Location: dashboard.php");
} else {
    header("Location: index.php?pesan=gagal");
}
?>