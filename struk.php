<?php
session_start();
include 'koneksi.php';

if (!isset($_POST['nama']) || !isset($_POST['metode'])) {
  echo "<script>alert('Data tidak lengkap!'); window.location='checkout.php';</script>";
  exit;
}

// data checkout
$nama = $_POST['nama'];
$metode = $_POST['metode'];
$items = $_SESSION['keranjang'];
$total = 0;

foreach ($items as $item) {
  $total += $item['harga'];
}


// kosongin keranjang
unset($_SESSION['keranjang']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Struk Pembayaran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2 class="mb-4">Struk Pembayaran</h2>
  <div class="card p-4">
    <p><strong>Nama:</strong> <?= htmlspecialchars($nama); ?></p>
    <p><strong>Metode Pembayaran:</strong> <?= htmlspecialchars($metode); ?></p>
    <p><strong>Total Dibayar:</strong> Rp <?= number_format($total); ?></p>
    <p class="text-success fw-bold">Terima kasih sudah menyewa kamera disini!</p>
    <a href="index.php" class="btn btn-dark">Kembali ke Beranda</a>
  </div>
</div>
</body>
</html>
