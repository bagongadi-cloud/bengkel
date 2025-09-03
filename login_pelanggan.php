<form method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="login">Login</button>
</form>

<?php
session_start();
include 'db.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass  = md5($_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM akun_pelanggan WHERE email='$email' AND password='$pass'");
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['pelanggan'] = mysqli_fetch_assoc($query);
        header("Location: riwayat_servis.php");
    } else {
        echo "Login gagal!";
    }
}
?>