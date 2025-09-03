<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login BengkelApp</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="card mx-auto" style="max-width: 400px;">
      <div class="card-body">
        <h4 class="card-title text-center mb-4">🔐 Login</h4>
        <form method="POST">
          <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <button name="login" class="btn btn-primary w-100">Masuk</button>
        </form>
        <hr>
        <a href="google-login.php" class="btn btn-outline-danger w-100">Login dengan Google</a>
      </div>
    </div>
  </div>
</body>
</html>