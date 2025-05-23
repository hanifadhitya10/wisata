<?php
include 'koneksi.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "<h2>Destinasi tidak ditemukan.</h2>";
    exit;
}

$stmt = $koneksi->prepare("SELECT * FROM destinasi_wisata WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<h2>Destinasi tidak ditemukan.</h2>";
    exit;
}

$data = $result->fetch_assoc();

$tempat = [
    "nama" => $data['nama'],
    "gambar" => "admin/uploads/" . $data['gambar'],
    "deskripsi" => $data['deskripsi'],
    "harga_tiket" => $data['harga_tiket'],
    "harga_paket" => $data['harga_paket'],
    "paket_wisata" => [
        "nama_paket" => $data['nama_paket'],
        "daftar_paket" => $data['daftar_paket'], // ini teks biasa
        "cocok_untuk" => $data['cocok_untuk']
    ]
];

$stmt->close();
$koneksi->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?php echo htmlspecialchars($tempat['nama']); ?> - Detail</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(#08374b, #7e4e4b);
      color: white;
      padding: 20px;
    }
    .detail-container {
      max-width: 700px;
      margin: auto;
      background-color: rgba(0,0,0,0.4);
      padding: 30px;
      border-radius: 10px;
    }
    img {
      width: 100%;
      border-radius: 10px;
    }
    a.back, a.belitiket {
      display: inline-block;
      padding: 8px 15px;
      border-radius: 20px;
      text-decoration: none;
      font-weight: bold;
    }
    a.back {
      background: white;
      color: black;
    }
    a.belitiket {
      background: yellow;
      color: black;
    }
    a.back:hover {
      background-color: #d9d9d9;
    }
    a.belitiket:hover {
      background-color: #f2c100;
    }
    .button-bar {
      margin-top: 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
  </style>
</head>
<body>
  <div class="detail-container">
    <img src="<?php echo htmlspecialchars($tempat['gambar']); ?>" alt="<?php echo htmlspecialchars($tempat['nama']); ?>">
    <h1><?php echo htmlspecialchars($tempat['nama']); ?></h1>
    <p><?php echo nl2br(htmlspecialchars($tempat['deskripsi'])); ?></p>
    <p><strong>Harga Tiket:</strong> Rp <?php echo number_format($tempat['harga_tiket'], 0, ',', '.'); ?></p>
    <p><strong>Harga Paket:</strong> Rp <?php echo number_format($tempat['harga_paket'], 0, ',', '.'); ?></p>

    <div class="paket-container">
      <h3>Rekomendasi Paket:</h3>
      <p><strong><?php echo htmlspecialchars($tempat['paket_wisata']['nama_paket']); ?></strong></p>
      <p><?php echo nl2br(htmlspecialchars($tempat['paket_wisata']['daftar_paket'])); ?></p>
      <p><strong>Cocok untuk:</strong> <?php echo htmlspecialchars($tempat['paket_wisata']['cocok_untuk']); ?></p>
    </div>

    <div class="button-bar">
      <a href="javascript:history.back()" class="back">Kembali</a>
      <div>
        <a href="form pesan.php?jenis=tiket&id=<?php echo $id; ?>&nama=<?php echo urlencode($tempat['nama']); ?>&harga=<?php echo $tempat['harga_tiket']; ?>" class="belitiket">Beli Tiket</a>
        <a href="form pesan.php?jenis=paket&id=<?php echo $id; ?>&nama=<?php echo urlencode($tempat['nama']); ?>&harga=<?php echo $tempat['harga_paket']; ?>" class="belitiket">Beli Paket</a>
      </div>
    </div>
  </div>
</body>
</html>
