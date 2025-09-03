<?php
session_start();
require_once 'vendor/autoload.php';
include 'db.php';

$client = new Google_Client();
$client->setClientId('YOUR_CLIENT_ID');
$client->setClientSecret('YOUR_CLIENT_SECRET');
$client->setRedirectUri('http://localhost/bengkel-app/google-callback.php');

$client->authenticate($_GET['code']);
$token = $client->getAccessToken();
$client->setAccessToken($token);

$oauth = new Google_Service_Oauth2($client);
$userInfo = $oauth->userinfo->get();

$email = $userInfo->email;
$nama = $userInfo->name;

// Cek apakah user sudah terdaftar
$cek = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
if (mysqli_num_rows($cek) == 0) {
  // Daftarkan sebagai pelanggan baru
  mysqli_query($conn, "INSERT INTO users (nama, email, password, role) VALUES ('$nama', '$email', '', 'pelanggan')");
}

$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE email='$email'"));
$_SESSION['user'] = $user;

header("Location: dashboard_pelanggan.php");
exit;