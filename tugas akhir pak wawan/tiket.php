<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order_id = $_POST['order_id'] ?? '';
    $user_id = $_POST['user_id'] ?? '';
    $nama_pelanggan = $_POST['nama_pelanggan'] ?? '';
    $wisata = $_POST['wisata'] ?? '';
    $jumlah = $_POST['jumlah'] ?? 0;
    $total_harga = $_POST['total_harga'] ?? 0;
    $status = $_POST['status'] ?? '';
    $metode_pembayaran = $_POST['payment_method'] ?? '';

  $stmt = $koneksi->prepare("INSERT INTO tiket (order_id, user_id, nama_pelanggan, wisata, jumlah, total_harga, status, payment_method) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssiiss", $order_id, $user_id, $nama_pelanggan, $wisata, $jumlah, $total_harga, $status, $metode_pembayaran);

   if ($stmt->execute()) {
    $id_tiket = $koneksi->insert_id; 

}

    $stmt->close();
    $koneksi->close();
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
       background: linear-gradient(#08374b, #7e4e4b);
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
    <p><strong>Id Tiket:</strong> <?= htmlspecialchars($id_tiket) ?></p>
    <p><strong>Wisata:</strong> <?= htmlspecialchars($wisata) ?></p>
    <p><strong>Nama:</strong> <?= htmlspecialchars($nama_pelanggan) ?></p>
    <p><strong>Jumlah Tiket:</strong> <?= htmlspecialchars((string)$jumlah) ?></p>
    <p><strong>Biaya:</strong> Rp<?= number_format($total_harga, 0, ',', '.') ?></p>
    <p><strong>Status:</strong> <?= htmlspecialchars($status) ?></p>
    <p>📌 Harap tunjukkan tiket ini saat masuk ke lokasi wisata.</p>
    <a href="home.php" class="home-button">Kembali ke Beranda</a>
  </div>
</body>
</html>
