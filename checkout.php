<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['keranjang']) || count($_SESSION['keranjang']) == 0) {
    echo "<script>alert('Keranjang masih kosong'); location='index.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Checkout</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f9f9f9;
    }
  </style>
</head>
<body>
<div class="container mt-5">
  <h2 class="mb-4">Checkout & Pembayaran</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Model</th>
        <th>Lensa</th>
        <th>Harga per Hari</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $total = 0;
      foreach ($_SESSION['keranjang'] as $item) {
        echo "<tr>
                <td>{$item['model']}</td>
                <td>{$item['lensa']}</td>
                <td>Rp " . number_format($item['harga']) . "</td>
              </tr>";
        $total += $item['harga'];
      }
      ?>
      <tr>
        <td colspan="2" class="text-end fw-bold">Total</td>
        <td class="fw-bold text-success">Rp <?= number_format($total); ?></td>
      </tr>
    </tbody>
  </table>

  <form action="struk.php" method="post">
    <div class="mb-3">
      <label for="nama" class="form-label">Nama Lengkap</label>
      <input type="text" class="form-control" id="nama" name="nama" required>
    </div>
    <div class="mb-3">
      <label for="metode" class="form-label">Metode Pembayaran</label>
      <select name="metode" id="metode" class="form-select" required>
        <option value="cash">Cash</option>
        <option value="transfer">Transfer Bank</option>
      </select>
    </div>
    <button type="submit" class="btn btn-success">Bayar Sekarang</button>
  </form>
</div>
</body>
</html>
