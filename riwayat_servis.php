<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Riwayat Servis</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container py-5">
    <h3 class="mb-4">📋 Riwayat Servis Anda</h3>
    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Perangkat</th>
          <th>Kerusakan</th>
          <th>Status</th>
          <th>Tanggal</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'db.php';
        $email = $_SESSION['user']['email'];
        $query = mysqli_query($conn, "SELECT * FROM servis WHERE email='$email'");
        while ($row = mysqli_fetch_assoc($query)) {
          echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['perangkat']}</td>
            <td>{$row['kerusakan']}</td>
            <td><span class='badge bg-".($row['status']=='Selesai'?'success':($row['status']=='Proses'?'warning':'secondary'))."'>{$row['status']}</span></td>
            <td>{$row['tanggal']}</td>
          </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>