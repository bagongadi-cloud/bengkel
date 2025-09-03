<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container-fluid">
      <span class="navbar-brand">📊 Dashboard Bengkel</span>
      <a href="logout.php" class="btn btn-outline-light">Logout</a>
    </div>
  </nav>

  <div class="container">
    <div class="row text-center">
      <div class="col-md-4 mb-3">
        <div class="card border-success">
          <div class="card-body">
            <h5 class="card-title">Servis Masuk</h5>
            <p class="fs-4 text-success"><?= $masuk ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card border-warning">
          <div class="card-body">
            <h5 class="card-title">Sedang Proses</h5>
            <p class="fs-4 text-warning"><?= $proses ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card border-primary">
          <div class="card-body">
            <h5 class="card-title">Selesai</h5>
            <p class="fs-4 text-primary"><?= $selesai ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>