<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Kamera</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <style>

    body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .hero {
      background-image: url('kamerahero.png'); 
      background-size: cover;
      background-position: center;
      height: 90vh;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
    }
  </style>
</head>
<body>

    

<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="logokamera.png" alt="Logo" width="40" height="40" class="me-2">
      <span>Rental Kamera</span>
    </a>
    <ul class="navbar-nav ms-auto">
  <li class="nav-item"><a class="nav-link active" href="index.php">Beranda</a></li>
  <li class="nav-item"><a class="nav-link" href="keranjang.php">Keranjang</a></li>

  <?php if (isset($_SESSION['login'])): ?>
    <li class="nav-item"><a class="nav-link" href="#">Halo, <?= $_SESSION['user']; ?></a></li>
    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
  <?php else: ?>
    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
  <?php endif; ?>
</ul>

  </div>
</nav>

<!-- hero banner -->
<div class="hero">
  <div>
    <h1>Selamat Datang di Rental Kamera </h1>
    <p class="lead mt-3">Capture Every Moment • Rent a Camera</p>
  </div>
</div>


<!-- kamera section -->
<div class="container mt-5" id="kamera">
  <h2 class="mb-4 text-center">Daftar Kamera</h2>
  <div class="row">
    <?php
    $result = mysqli_query($conn, "SELECT * FROM siap");
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <div class="col-md-4 mb-4">
      <div class="card camera-card shadow">
      <a href="beli.php?id=<?= $row['id']; ?>">
        <img src="images/<?= $row['image']; ?>" class="card-img-top" alt="<?= $row['model']; ?>">
      </a>
    <div class="card-body">
      <h5 class="card-title"><?= $row['model']; ?></h5>
      <p class="card-text">Lensa: <?= $row['lensa']; ?></p>
      <p class="card-text text-success fw-semibold">Rp <?= number_format($row['harga']); ?>/day</p>
    </div>
  </div>
</div>
    <?php } ?>
  </div>
</div>

<!-- footer -->
<footer class="bg-dark text-white py-4 mt-5">
  <div class="container">
    <div class="row text-center text-md-start">
      <div class="col-md-4 mb-3">
        <h5 class="mb-3">Rental Kamera</h5>
        <p>Sewa kamera dengan harga terjangkau dan kualitas terbaik untuk kebutuhan fotografi dan videografi kamu.</p>
      </div>
      <div class="col-md-4 mb-3">
        <h5 class="mb-3">Kontak Kami</h5>
        <p>Email: </p>
        <p>Telepon: </p>
        <p>Alamat: </p>
      </div>
      <div class="col-md-4 mb-3">
        <h5 class="mb-3">Ikuti Kami</h5>
        <a href="#" class="text-white me-3 fs-4"><i class="bi bi-facebook"></i></a>
        <a href="#" class="text-white me-3 fs-4"><i class="bi bi-instagram"></i></a>
        <a href="#" class="text-white me-3 fs-4"><i class="bi bi-twitter"></i></a>
        <a href="#" class="text-white fs-4"><i class="bi bi-youtube"></i></a>
      </div>
    </div>
  </div>
</footer>


</body>
</html>
