<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>BengkelApp</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="text-center mb-4">
      <h1 class="fw-bold">🛠️ Bengkel Laptop & Komputer</h1>
      <p class="lead">Solusi cepat dan terpercaya untuk servis perangkat Anda</p>
    </div>

    <div class="d-flex justify-content-center gap-3 mb-4">
      <a href="login.php" class="btn btn-primary">Login</a>
      <a href="register_pelanggan.php" class="btn btn-outline-secondary">Daftar Pelanggan</a>
    </div>

    <div class="card mx-auto" style="max-width: 500px;">
      <div class="card-body">
        <h5 class="card-title">🔍 Cek Status Servis</h5>
        <form action="cek_servis.php" method="get">
          <div class="mb-3">
            <input type="text" name="keyword" class="form-control" placeholder="Masukkan ID atau Nama">
          </div>
          <button class="btn btn-success w-100">Cari</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>