<?php
session_start();
include 'db.php';
if (!isset($_SESSION['pelanggan'])) {
    header("Location: login_pelanggan.php");
    exit;
}
$nama = $_SESSION['pelanggan']['nama'];
?>

<h2>Selamat datang, <?= $nama ?>!</h2>

<?php
$masuk = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM servis WHERE nama='$nama' AND status='Masuk'"));
$proses = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM servis WHERE nama='$nama' AND status='Proses'"));
$selesai = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM servis WHERE nama='$nama' AND status='Selesai'"));
?>

<ul>
    <li>Servis Masuk: <?= $masuk ?></li>
    <li>Servis Proses: <?= $proses ?></li>
    <li>Servis Selesai: <?= $selesai ?></li>
</ul>

<a href="riwayat_servis.php">Lihat Riwayat Servis</a> | <a href="logout.php">Logout</a>