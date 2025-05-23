<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Input Destinasi Wisata</title>
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
    <table>
      <tr>
        <th colspan="2">Form Input Destinasi Wisata</th>
      </tr>
      <tr>
        <td><label for="nama">Nama Destinasi</label></td>
        <td><input type="text" name="nama" id="nama" required></td>
      </tr>
      <tr>
        <td><label for="gambar">Gambar (upload)</label></td>
        <td><input type="file" name="gambar" id="gambar" accept="image/*" required></td>
      </tr>
      <tr>
        <td><label for="deskripsi">Deskripsi</label></td>
        <td><textarea name="deskripsi" id="deskripsi" rows="5" required></textarea></td>
      </tr>
      <tr>
        <td><label for="harga_tiket">Harga Tiket</label></td>
        <td><input type="text" name="harga_tiket" id="harga_tiket" required></td>
      </tr>
      <tr>
        <td><label for="harga_paket">Harga Paket</label></td>
        <td><input type="text" name="harga_paket" id="harga_paket" required></td>
      </tr>
      <tr>
        <td><label for="nama_paket">Nama Paket Wisata</label></td>
        <td><input type="text" name="nama_paket" id="nama_paket" required></td>
      </tr>
      <tr>
        <td><label for="deskripsi">Fasilitas</label></td>
        <td><textarea name="daftar_paket" id="daftar_paket" rows="5" required></textarea></td>
      </tr>
      <tr>
        <td><label for="cocok_untuk">Cocok Untuk</label></td>
        <td><input type="text" name="cocok_untuk" id="cocok_untuk" required></td>
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
