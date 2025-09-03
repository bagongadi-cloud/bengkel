<?php
include 'db.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM servis WHERE id='$id'"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Nota Servis Inkjet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #000;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
        }
        .info {
            margin-bottom: 20px;
        }
        .info p {
            margin: 4px 0;
        }
        .qr {
            text-align: center;
            margin-top: 30px;
        }
        .footer {
            margin-top: 40px;
            text-align: right;
        }
        @media print {
            .print-btn { display: none; }
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>BENGKEL LAPTOP & KOMPUTER</h2>
        <p>Jl. Teknologi No. 123, Purwokerto | Telp: 0812-3456-7890</p>
    </div>

    <div class="info">
        <p><strong>ID Servis:</strong> <?= $data['id'] ?></p>
        <p><strong>Nama Pelanggan:</strong> <?= htmlspecialchars($data['nama']) ?></p>
        <p><strong>Perangkat:</strong> <?= htmlspecialchars($data['perangkat']) ?></p>
        <p><strong>Kerusakan:</strong> <?= htmlspecialchars($data['kerusakan']) ?></p>
        <p><strong>Status:</strong> <?= $data['status'] ?></p>
        <p><strong>Tanggal Servis:</strong> <?= $data['tanggal'] ?></p>
    </div>

    <div class="qr">
        <p>Scan QR untuk cek status servis:</p>
        <?php
        include 'assets/phpqrcode/qrlib.php';
        $url = "http://localhost/bengkel-app/cek_servis.php?keyword=" . $data['id'];
        QRcode::png($url, "qrcode_inkjet.png");
        echo "<img src='qrcode_inkjet.png' width='150'>";
        ?>
    </div>

    <div class="footer">
        <p>Purwokerto, <?= date('d-m-Y') ?></p>
        <p><strong>Teknisi:</strong> ____________________</p>
    </div>

    <div class="print-btn" style="text-align:center; margin-top:20px;">
        <button onclick="window.print()">🖨️ Cetak Nota</button>
    </div>
</body>
</html>