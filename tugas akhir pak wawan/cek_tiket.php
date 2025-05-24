<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$query = $koneksi->prepare("SELECT * FROM tiket WHERE user_id = ? ORDER BY order_id DESC");
$query->bind_param("i", $user_id);
$query->execute();
$result = $query->get_result();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Daftar e-Tiket Saya</title>
  <style>
   body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(#08374b, #7e4e4b);
      padding: 20px;
    }
    
    .container {
      max-width: 900px;
      margin: auto;
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
    }
    .eticket-card {
      background-color: #fff;
      border: 2px dashed #00b894;
      border-radius: 15px;
      padding: 20px;
      width: 200px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      display: flex;
      flex-direction: column;
      gap: 10px;
    }
    .eticket-card h2 {
      color: #2d3436;
      text-align: center;
      margin-bottom: 10px;
    }
    .eticket-card p {
      font-size: 15px;
      margin: 0;
    }
    .kode {
      font-weight: bold;
      font-size: 18px;
      color: #d63031;
    }
    .home-button {
      display: inline-block;
      margin-top: 30px;
      padding: 10px 25px;
      background: yellow;
      color: black;
      text-decoration: none;
      border-radius: 5px;
      text-align: center;
    }
    .home-button:hover {
      background: #f2c100;
    }
  </style>
</head>
<body>
  <div class="container">
    <?php while ($row = $result->fetch_assoc()) : ?>
      <div class="eticket-card">
        <h2>🎟 e-Tiket</h2>
        <p><strong>Id Tiket:</strong> <?= htmlspecialchars($row['order_id']); ?></p>
        <p><strong>Wisata:</strong> <?= htmlspecialchars($row['wisata']); ?></p>
        <p><strong>Nama:</strong> <?= htmlspecialchars($row['nama_pelanggan']); ?></p>
        <p><strong>Jumlah Tiket:</strong> <?= htmlspecialchars($row['jumlah']); ?></p>
        <p><strong>Biaya:</strong> Rp<?= number_format($row['total_harga'], 0, ',', '.'); ?></p>
        <p><strong>Status:</strong> <?= htmlspecialchars($row['status']); ?></p>
            <p><strong>Metode_pembayaran:</strong> <?= htmlspecialchars($row['payment_method']); ?></p>
        <?php if (!empty($row['tanggal_pesan'])) : ?>
          <p><strong>Tanggal Pesan:</strong> <?= date("d-m-Y", strtotime($row['tanggal_pesan'])); ?></p>
        <?php endif; ?>
        <p>📌 Harap tunjukkan tiket ini saat masuk ke lokasi wisata.</p>
      </div>
    <?php endwhile; ?>
  </div>

  <div style="text-align:center;">
    <a href="home.php" class="home-button">Kembali ke Beranda</a>
  </div>
</body>
</html>
