<?php
include 'koneksi.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "ID tidak ditemukan.";
    exit;
}

$result = mysqli_query($koneksi, "SELECT gambar FROM destinasi_wisata WHERE id = $id");
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Data tidak ditemukan.";
    exit;
}

$gambar_path = 'uploads/' . $data['gambar'];
if (file_exists($gambar_path)) {
    unlink($gambar_path);
}

$hapus = mysqli_query($koneksi, "DELETE FROM destinasi_wisata WHERE id = $id");

if ($hapus) {
    header("Location: index.php");
    exit;
} else {
    echo "Gagal menghapus data.";
}
?>
