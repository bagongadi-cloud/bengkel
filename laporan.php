<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Laporan Keuangan</title>
    <style>
        table { border-collapse: collapse; width: 80%; margin: 20px auto; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
        .total { font-weight: bold; background-color: #e0ffe0; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Laporan Keuangan Bengkel</h2>

    <table>
        <tr>
            <th>Tanggal</th>
            <th>Jenis</th>
            <th>Keterangan</th>
            <th>Jumlah (Rp)</th>
        </tr>

        <?php
        $result = mysqli_query($conn, "SELECT * FROM transaksi ORDER BY tanggal DESC");
        $total_pemasukan = 0;
        $total_pengeluaran = 0;

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['tanggal']}</td>
                    <td>{$row['jenis']}</td>
                    <td>{$row['keterangan']}</td>
                    <td>" . number_format($row['jumlah'], 0, ',', '.') . "</td>
                  </tr>";

            if ($row['jenis'] == 'Pemasukan') {
                $total_pemasukan += $row['jumlah'];
            } else {
                $total_pengeluaran += $row['jumlah'];
            }
        }

        $laba = $total_pemasukan - $total_pengeluaran;
        ?>

        <tr class="total">
            <td colspan="3">Total Pemasukan</td>
            <td><?= number_format($total_pemasukan, 0, ',', '.') ?></td>
        </tr>
        <tr class="total">
            <td colspan="3">Total Pengeluaran</td>
            <td><?= number_format($total_pengeluaran, 0, ',', '.') ?></td>
        </tr>
        <tr class="total">
            <td colspan="3">Laba Bersih</td>
            <td><?= number_format($laba, 0, ',', '.') ?></td>
        </tr>
    </table>
    <h4 class="mt-5 text-center">📊 Grafik Keuangan Bulanan</h4>
<canvas id="grafikKeuangan" height="100"></canvas>

<script>
const ctx = document.getElementById('grafikKeuangan').getContext('2d');
const grafik = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [<?php
      $bulan = mysqli_query($conn, "SELECT DISTINCT MONTH(tanggal) AS bln FROM transaksi ORDER BY bln");
      while ($b = mysqli_fetch_assoc($bulan)) {
        echo "'Bulan " . $b['bln'] . "',";
      }
    ?>],
    datasets: [{
      label: 'Pemasukan',
      backgroundColor: '#4CAF50',
      data: [<?php
        $bulan = mysqli_query($conn, "SELECT DISTINCT MONTH(tanggal) AS bln FROM transaksi ORDER BY bln");
        while ($b = mysqli_fetch_assoc($bulan)) {
          $bln = $b['bln'];
          $total = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(jumlah) AS total FROM transaksi WHERE jenis='Pemasukan' AND MONTH(tanggal)=$bln"));
          echo $total['total'] . ",";
        }
      ?>]
    }, {
      label: 'Pengeluaran',
      backgroundColor: '#F44336',
      data: [<?php
        $bulan = mysqli_query($conn, "SELECT DISTINCT MONTH(tanggal) AS bln FROM transaksi ORDER BY bln");
        while ($b = mysqli_fetch_assoc($bulan)) {
          $bln = $b['bln'];
          $total = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(jumlah) AS total FROM transaksi WHERE jenis='Pengeluaran' AND MONTH(tanggal)=$bln"));
          echo $total['total'] . ",";
        }
      ?>]
    }]
  },
  options: {
    responsive: true,
    scales: {
      y: { beginAtZero: true }
    }
  }
});
</script>
</body>
</html>