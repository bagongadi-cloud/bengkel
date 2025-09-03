<form method="POST">
    <input type="text" name="nama" placeholder="Nama Lengkap" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit" name="daftar">Daftar</button>
</form>

<?php
include 'db.php';
if (isset($_POST['daftar'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $cek = mysqli_query($conn, "SELECT * FROM akun_pelanggan WHERE email='$email'");
    if (mysqli_num_rows($cek) > 0) {
        echo "Email sudah terdaftar!";
    } else {
        mysqli_query($conn, "INSERT INTO akun_pelanggan (nama, email, password) VALUES ('$nama', '$email', '$pass')");
        echo "Registrasi berhasil! Silakan login.";
    }
}
?>