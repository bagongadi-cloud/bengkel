<?php
include 'db.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM servis WHERE id='$id'"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Nota Thermal</title>
    <style>
        body {
            font-family: monospace;
            font-size: 12px;
            width: 58mm;
            margin: auto;
        }
        .center { text-align: center; }
        .bold { font-weight: bold; }
        .line { border-top: 1px dashed #000; margin: 5px 0; }
        @media print {
            body { width: auto; margin: 0; }
            .print-btn { display: none; }
        }
    </style>
</head>
<body>
    <div class="center bold">BENGKEL LAPTOP & KOMPUTER</div>
    <div class="center">Jl. Teknologi No. 123, Purwokerto</div>
    <div class="line"></div>

    <div>ID Servis: <?= $data['id'] ?></div>
    <div>Nama: <?= htmlspecialchars($data['nama']) ?></div>
    <div>Perangkat: <?= htmlspecialchars($data['perangkat']) ?></div>
    <div>Kerusakan: <?= htmlspecialchars($data['kerusakan']) ?></div>
    <div>Status: <?= $data['status'] ?></div>
    <div>Tanggal: <?= $data['tanggal'] ?></div>

    <div class="line"></div>
    <div class="center">Terima kasih 🙏</div>
    <div class="center">Scan QR untuk cek status</div>

    <div class="center">
        <?php
        include 'assets/phpqrcode/qrlib.php';
        $url = "http://localhost/bengkel-app/cek_servis.php?keyword=" . $data['id'];
        QRcode::png($url, "qrcode_temp.png");
        echo "<img src='qrcode_temp.png' width='100'>";
        ?>
    </div>

    <div class="print-btn center" style="margin-top:10px;">
        <button onclick="window.print()">🖨️ Cetak</button>
    </div>
</body>
</html>