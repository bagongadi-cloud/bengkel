<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Nota Servis</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    @media print {
      .no-print { display: none; }
    }
  </style>
</head>
<body class="p-5">
  <?php
  include 'db.php';
  $id = $_GET['id'];
  $data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM servis WHERE id='$id'"));
  ?>
  <div class="border p-4 rounded shadow-sm">
    <h4 class="mb-3">🧾 Tanda Terima Servis</h4>
    <p><strong>ID Servis:</strong> <?= $data['id'] ?></p>
    <p><strong>Nama:</strong> <?= $data['nama'] ?></p>
    <p><strong>Perangkat:</strong> <?= $data['perangkat'] ?></p>
    <p><strong>Kerusakan:</strong> <?= $data['kerusakan'] ?></p>
    <p><strong>Status:</strong> <?= $data['status'] ?></p>
    <p><strong>Tanggal:</strong> <?= $data['tanggal'] ?></p>
    <hr>
    <?php
include 'assets/phpqrcode/qrlib.php';
$id_servis = $data['id'];
$url = "http://localhost/bengkel-app/cek_servis.php?keyword=$id_servis";
QRcode::png($url, "assets/qrcode/qrcode_$id_servis.png");
echo "<img src='assets/qrcode/qrcode_$id_servis.png' width='120'>";
?>
    <p>Terima kasih telah menggunakan layanan kami.</p>
    <button onclick="window.print()" class="btn btn-primary no-print">🖨️ Cetak Nota</button>
  </div>
</body>
</html>