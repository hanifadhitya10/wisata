<?php
include 'koneksi.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "ID tidak ditemukan.";
    exit;
}

$result = mysqli_query($koneksi, "SELECT * FROM destinasi_wisata WHERE id = $id");
$data = mysqli_fetch_assoc($result);
if (!$data) {
    echo "Data tidak ditemukan.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Edit Destinasi Wisata</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      padding: 20px;
    }
    table {
      width: 100%;
      max-width: 800px;
      margin: auto;
      border-collapse: collapse;
      background: #fff;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    th, td {
      padding: 12px;
      text-align: left;
    }
    input[type="text"],
    input[type="file"],
    textarea {
      width: 100%;
      padding: 8px;
      box-sizing: border-box;
    }
    textarea {
      resize: vertical;
    }
    .gambar-preview {
      margin-top: 10px;
    }
    .gambar-preview img {
      max-width: 200px;
      border-radius: 5px;
    }
    .button-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding-top: 20px;
    }
    .back-btn {
      background: #ccc;
      color: black;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 5px;
      display: inline-block;
    }
    .back-btn:hover {
      background: #bbb;
    }
    .save-btn {
      padding: 10px 20px;
      background: #3498db;
      color: white;
      border: none;
      cursor: pointer;
      border-radius: 5px;
    }
    .save-btn:hover {
      background: #2980b9;
    }
  </style>
</head>
<body>

  <form action="simpan.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= htmlspecialchars($data['id']) ?>">
    <table>
      <tr>
        <th colspan="2">Edit Destinasi Wisata</th>
      </tr>
      <tr>
        <td><label for="nama">Nama Destinasi</label></td>
        <td><input type="text" name="nama" id="nama" value="<?= htmlspecialchars($data['nama']) ?>" required></td>
      </tr>
      <tr>
        <td><label for="gambar">Gambar (kosongkan jika tidak diubah)</label></td>
        <td>
          <input type="file" name="gambar" id="gambar" accept="image/*" />
          <div class="gambar-preview">
            <img src="uploads/<?= htmlspecialchars($data['gambar']) ?>" alt="Gambar Saat Ini" />
          </div>
        </td>
      </tr>
      <tr>
        <td><label for="deskripsi">Deskripsi</label></td>
        <td><textarea name="deskripsi" id="deskripsi" rows="5" required><?= htmlspecialchars($data['deskripsi']) ?></textarea></td>
      </tr>
      <tr>
        <td><label for="harga_tiket">Harga Tiket</label></td>
        <td><input type="text" name="harga_tiket" id="harga_tiket" value="<?= htmlspecialchars($data['harga_tiket']) ?>" required></td>
      </tr>
      <tr>
        <td><label for="harga_paket">Harga Paket</label></td>
        <td><input type="text" name="harga_paket" id="harga_paket" value="<?= htmlspecialchars($data['harga_paket']) ?>" required></td>
      </tr>
      <tr>
        <td><label for="nama_paket">Nama Paket Wisata</label></td>
        <td><input type="text" name="nama_paket" id="nama_paket" value="<?= htmlspecialchars($data['nama_paket']) ?>" required></td>
      </tr>
      <tr>
        <td><label for="deskripsi">Fasilitas</label></td>
        <td><textarea name="daftar_paket" id="daftar_paket" rows="5" required></textarea></td>
      </tr>
      <tr>
        <td><label for="cocok_untuk">Cocok Untuk</label></td>
        <td><input type="text" name="cocok_untuk" id="cocok_untuk" value="<?= htmlspecialchars($data['cocok_untuk']) ?>" required></td>
      </tr>
      <tr>
        <td colspan="2">
          <div class="button-bar">
            <a href="javascript:history.back()" class="back-btn">← Kembali</a>
            <input type="submit" value="Simpan Perubahan" class="save-btn" />
          </div>
        </td>
      </tr>
    </table>
  </form>

</body>
</html>
