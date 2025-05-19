<?php
session_start();
include 'koneksi.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM siap WHERE id = $id");
$kamera = mysqli_fetch_assoc($result);

// simpan ke session keranjang
$_SESSION['keranjang'][$id] = $kamera;

header("Location: keranjang.php");
exit;
?>
