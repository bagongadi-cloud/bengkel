<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit;
}

function only($role) {
  if ($_SESSION['user']['role'] !== $role) {
    echo "Akses ditolak.";
    exit;
  }
}
?>