<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        img {
            width: 150px;
            height: auto;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4 text-center">Keranjang Kamu</h2>

    <?php if (empty($_SESSION['keranjang'])) : ?>
        <div class="alert alert-warning text-center">
            Keranjang masih kosong.
        </div>
        <div class="text-center">
            <a href="index.php" class="btn btn-dark">Kembali ke Beranda</a>
        </div>
    <?php else : ?>
        <table class="table table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>Gambar</th>
                    <th>Model</th>
                    <th>Lensa</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['keranjang'] as $id => $kamera) : ?>
                <tr>
                    <td><img src="images/<?= $kamera['image']; ?>" alt="<?= $kamera['model']; ?>" width="150"></td>
                    <td><?= $kamera['model']; ?></td>
                    <td><?= $kamera['lensa']; ?></td>
                    <td>Rp <?= number_format($kamera['harga']); ?></td>
                    <td><a href="hapus_keranjang.php?id=<?= $id; ?>" class="btn btn-danger btn-sm">Hapus</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-end">
            <a href="checkout.php" class="btn btn-success">Checkout</a>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
