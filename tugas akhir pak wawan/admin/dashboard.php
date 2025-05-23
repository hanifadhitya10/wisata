<?php
include 'sidebar.php';

// Ambil semua data tiket dari database
$result = mysqli_query($koneksi, "SELECT * FROM destinasi_wisata ORDER BY id DESC");



$destinasi = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $destinasi[] = $row;
    }
}

mysqli_close($koneksi); 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daftar Wisata</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <style>
        /* Style seperti kode sebelumnya */
        .tambah-btn {
            display: inline-block;
            margin-bottom: 15px;
            background-color: #2ecc71;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .tambah-btn:hover {
            background-color: #27ae60;
        }
        .table-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #2c3e50;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .aksi-buttons {
            display: flex;
            gap: 8px;
        }
        .action-btn {
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }
        .edit-btn {
            background-color: #3498db;
        }
        .edit-btn:hover {
            background-color: #2980b9;
        }
        .delete-btn {
            background-color: #e74c3c;
        }
        .delete-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
 <div class="main-content">
    <h1>Selamat Datang di Dashboard</h1>
    
  </div>

<div class="main-content">
    <h1>Daftar Wisata</h1>

    <div class="table-container">
        <a href="form_wisata.php" class="tambah-btn"><i class="fa fa-plus"></i> Tambah Wisata</a>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Wisata</th>
                    <th>Gambar</th>
                    <th>Harga Tiket</th>
                    <th>Harga Paket</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($destinasi) > 0): ?>
                    <?php foreach ($destinasi as $i => $d): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= htmlspecialchars($d['nama']) ?></td>
                            <td>
                                <img src="uploads/<?= htmlspecialchars($d['gambar']) ?>" alt="<?= htmlspecialchars($d['nama']) ?>" style="width:100px; height:auto; border-radius:5px;">
                            </td>
                         
                            <td>Rp <?= number_format($d['harga_tiket'], 0, ',', '.') ?></td>
                            <td>Rp <?= number_format($d['harga_paket'], 0, ',', '.') ?></td>
                          
                            <td>
                                <div class="aksi-buttons">
                                    <a href="form_edit.php?id=<?= $d['id'] ?>" class="action-btn edit-btn">Edit</a>
                                    <a href="hapus.php?id=<?= $d['id'] ?>" class="action-btn delete-btn" onclick="return confirm('Yakin hapus wisata ini?');">Hapus</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="10" style="text-align:center;">Data wisata belum tersedia.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>


</body>
</html>
