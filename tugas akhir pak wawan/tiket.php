<?php
include 'koneksi.php';

$id_tiket = '';
$user_id = '';
$nama = '';
$wisata = '';
$jumlah = 0;
$total_harga = 0;
$status = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_tiket = $_POST['order_id'];
    $user_id = $_POST['user_id'];
    $nama = $_POST['nama_pelanggan'];
    $wisata = $_POST['wisata'];
    $jumlah = (int)$_POST['jumlah'];
    $total_harga = (int)$_POST['total_harga'];
    $status = $_POST['status'];

    $stmt = $koneksi->prepare("INSERT INTO tiket (order_id, user_id, nama_pelanggan, wisata, jumlah, total_harga, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sisssis", $id_tiket, $user_id, $nama, $wisata, $jumlah, $total_harga, $status);

    if (!$stmt->execute()) {
        die("Gagal menyimpan data: " . $stmt->error);
    }

    $stmt->close();
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
    <p><strong>Nama:</strong> <?= htmlspecialchars($nama) ?></p>
    <p><strong>Jumlah Tiket:</strong> <?= htmlspecialchars((string)$jumlah) ?></p>
    <p><strong>Biaya:</strong> Rp<?= number_format($total_harga, 0, ',', '.') ?></p>
    <p><strong>Status:</strong> <?= htmlspecialchars($status) ?></p>
    <p>📌 Harap tunjukkan tiket ini saat masuk ke lokasi wisata.</p>
    <a href="home.php" class="home-button">Kembali ke Beranda</a>
  </div>
</body>
</html>
