<?php
include 'sidebar.php'; // asumsi sidebar.php berisi sidebar dan wrapper div

// Ambil semua data tiket dari database
$result = mysqli_query($koneksi, "SELECT * FROM tiket ORDER BY order_id DESC");

$tiketList = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tiketList[] = $row;
    }
}

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daftar e-Tiket</title>
    <style>
        /* Asumsi sidebar dan main-content sudah diatur di sidebar.php */
        
        .main-content {
            flex-grow: 1;
            padding: 30px;
            display: flex;
            justify-content: center; /* supaya anaknya (table-container) di tengah */
            box-sizing: border-box;
        }

        .table-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 900px;
            width: 100%;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #2d3436;
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
            background-color: #00b894;
            color: white;
        }

        tr:hover {
            background-color: #dff9fb;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="table-container">
            <h1>Daftar e-Tiket</h1>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Nama Pelanggan</th>
                        <th>Wisata</th>
                        <th>Jumlah Tiket</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($tiketList) > 0): ?>
                        <?php foreach ($tiketList as $tiket): ?>
                            <tr>
                                <td><?= htmlspecialchars($tiket['order_id']) ?></td>
                                <td><?= htmlspecialchars($tiket['nama_pelanggan']) ?></td>
                                <td><?= htmlspecialchars($tiket['wisata']) ?></td>
                                <td><?= htmlspecialchars($tiket['jumlah']) ?></td>
                                <td>Rp <?= number_format($tiket['total_harga'], 0, ',', '.') ?></td>
                                <td><?= htmlspecialchars($tiket['status']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="6" style="text-align:center;">Belum ada data tiket.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
