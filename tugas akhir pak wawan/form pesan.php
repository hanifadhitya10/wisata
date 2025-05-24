<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // kalau belum login, redirect ke login atau berikan notifikasi
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

$jenis = $_GET['jenis'] ?? '';
$nama_wisata = $_GET['nama'] ?? '';
$harga_satuan = intval($_GET['harga'] ?? 0);

function generateOrderID() {
    return 'ORD' . time();
}

function format_rupiah($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

$order_id = generateOrderID();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pemesanan Wisata</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
            color: #fff;
            margin: 0;
            padding: 20px;
        }
        form {
            max-width: 700px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            font-size: 24px;
            padding: 15px;
            background-color: #1abc9c;
            color: #fff;
            border-radius: 8px 8px 0 0;
        }
        td {
            padding: 12px;
            vertical-align: top;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 6px;
            margin-top: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        input[readonly] {
            background-color: #eee;
            color: #333;
        }
        input[type="submit"],
        .btn-kembali {
            padding: 12px 20px;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"] {
            background-color: #27ae60;
            color: #fff;
        }
        input[type="submit"]:hover {
            background-color: #1e8449;
        }
        .btn-kembali {
            background-color: #e74c3c;
            color: #fff;
        }
        .btn-kembali:hover {
            background-color: #c0392b;
        }
        .submit-row {
            padding-top: 20px;
        }
        .button-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        @media (max-width: 768px) {
            .button-row {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
            }
        }
    </style>
</head>
<body>

<form action="halaman bayar.php" method="POST">
    <table>
        <tr>
            <th colspan="2">Form Pemesanan Wisata</th>
        </tr>
        <tr>
            <td>Order ID</td>
            <td><input type="text" name="order_id" value="<?php echo $order_id; ?>" readonly></td>
        </tr>
        <tr>
    <td>User ID</td>
    <td><input type="text" value="<?php echo htmlspecialchars($user_id); ?>" readonly></td>
</tr>
<input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>">

        <tr>
            <td>Nama Pelanggan</td>
            <td><input type="text" name="nama_pelanggan" required></td>
        </tr>
        <tr>
            <td>Wisata</td>
            <td><input type="text" name="wisata" value="<?php echo htmlspecialchars($nama_wisata); ?>" readonly></td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td><input type="number" id="jumlah" name="jumlah" value="1" min="1" required></td>
        </tr>
        <tr>
            <td>Harga Satuan</td>
            <td>
                <input type="hidden" id="harga" name="harga" value="<?php echo $harga_satuan; ?>">
                <input type="text" value="<?php echo format_rupiah($harga_satuan); ?>" readonly>
            </td>
        </tr>
        <tr>
            <td>Total Harga</td>
            <td>
                <input type="text" id="total_harga_view" value="<?php echo format_rupiah($harga_satuan); ?>" readonly>
                <input type="hidden" id="total_harga" name="total_harga" value="<?php echo $harga_satuan; ?>">
            </td>
        </tr>
        <tr>
            <td>Status</td>
            <td><input type="text" name="status" value="Belum Dibayar" readonly></td>
        </tr>
        <tr class="submit-row">
            <td colspan="2">
                <div class="button-row">
                    <button type="button" class="btn-kembali" onclick="window.history.back()">← Kembali</button>
                    <input type="submit" value="Simpan Pemesanan">
                </div>
            </td>
        </tr>
    </table>
</form>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const jumlahInput = document.getElementById("jumlah");
        const hargaInput = document.getElementById("harga");
        const totalHargaInput = document.getElementById("total_harga");
        const totalHargaView = document.getElementById("total_harga_view");

        function formatRupiah(angka) {
            return 'Rp ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

        function hitungTotal() {
            const jumlah = parseInt(jumlahInput.value) || 0;
            const harga = parseInt(hargaInput.value) || 0;
            const total = jumlah * harga;
            totalHargaInput.value = total;
            totalHargaView.value = formatRupiah(total);
        }

        jumlahInput.addEventListener("input", hitungTotal);
        hitungTotal();
    });
</script>

</body>
</html>
