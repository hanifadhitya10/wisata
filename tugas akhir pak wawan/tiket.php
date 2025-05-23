<?php
include 'koneksi.php';
session_start();


$id_tiket     = $_SESSION['order_id'] ?? '';
$nama         = $_SESSION['nama_pelanggan'] ?? '';
$wisata       = $_SESSION['wisata'] ?? '';
$jumlah       = $_SESSION['jumlah'] ?? 0;
$total_harga  = $_SESSION['total_harga'] ?? 0;
$status       = $_SESSION['status'] ?? 'Belum bayar';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $order_id = $_POST['order_id'];
  $nama = $_POST['nama_pelanggan'];
  $wisata = $_POST['wisata'];
  $jumlah = $_POST['jumlah'];
  $total = $_POST['total_harga'];
  $status = $_POST['status'];

  $_SESSION['order_id'] = $order_id;
  $_SESSION['nama_pelanggan'] = $nama;
  $_SESSION['wisata'] = $wisata;
  $_SESSION['jumlah'] = $jumlah;
  $_SESSION['total_harga'] = $total;
  $_SESSION['status'] = $status;


  $query = "INSERT INTO tiket (order_id, nama_pelanggan, wisata, jumlah, total_harga, status)
            VALUES ('$order_id', '$nama', '$wisata', '$jumlah', '$total', '$status')";
  mysqli_query($koneksi, $query);

  header('Location: tiket.php');
  exit;
}
?>



<!DOCTYPE html>

<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contoh e-Tiket</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f0f3f5;
      padding: 20px;
    }
    .eticket {
      max-width: 500px;
      margin: auto;
      background-color: #ffffff;
      border: 2px dashed #00b894;
      border-radius: 15px;
      padding: 20px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    h2 {
      color: #2d3436;
      text-align: center;
    }
    p {
      font-size: 16px;
      margin: 8px 0;
    }
    .kode {
      font-weight: bold;
      font-size: 18px;
      color: #d63031;
    }
    .home-button {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 25px;
      background: yellow;
      color: black;
      text-decoration: none;
      border-radius: 5px;
    }

.home-button:hover {
  background: #f2c100;
}

  </style>
</head>
<body>
  <div class="eticket">
    <h2>🎟 e-Tiket Anda</h2>
    <p><strong>Id Tiket:</strong> <?= htmlspecialchars($id_tiket); ?></p>
    <p><strong>Wisata:</strong> <?= htmlspecialchars($wisata); ?></p>
    <p><strong>Nama:</strong> <?= htmlspecialchars($nama); ?></p>
    <p><strong>Jumlah Tiket:</strong> <?= htmlspecialchars($jumlah); ?></p>
    <p><strong>Biaya:</strong> Rp<?= number_format($total_harga, 0, ',', '.'); ?></p>
    <p><strong>Status:</strong> <?= htmlspecialchars($status); ?></p>
    <p>📌 Harap tunjukkan tiket ini saat masuk ke lokasi wisata.</p>
    <a href="home.php" class="home-button">Kembali ke Beranda</a>
  </div>
</body>
</html>