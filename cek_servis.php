<?php
include 'db.php';
if (isset($_GET['keyword'])) {
  $keyword = $_GET['keyword'];
  $query = mysqli_query($conn, "SELECT * FROM servis WHERE nama LIKE '%$keyword%' OR id LIKE '%$keyword%'");
}
?>

<form method="GET">
  <input type="text" name="keyword" placeholder="Nama atau ID Servis">
  <button>Cari</button>
</form>

<?php if (isset($query)) {
  while ($row = mysqli_fetch_assoc($query)) {
    echo "<p>{$row['id']} - {$row['nama']} - {$row['status']}</p>";
  }
} ?>