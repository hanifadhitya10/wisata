<?php  
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? intval($_POST['id']) : null;

    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $harga_tiket = mysqli_real_escape_string($koneksi, $_POST['harga_tiket']);
    $harga_paket = mysqli_real_escape_string($koneksi, $_POST['harga_paket']);
    $nama_paket = mysqli_real_escape_string($koneksi, $_POST['nama_paket']);
    $daftar_paket = mysqli_real_escape_string($koneksi, $_POST['daftar_paket']);
    $cocok_untuk = mysqli_real_escape_string($koneksi, $_POST['cocok_untuk']);

    $upload_dir = "uploads/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $gambar = null;

    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['gambar']['tmp_name'];
        $nama_file = basename($_FILES['gambar']['name']);
        $upload_path = $upload_dir . $nama_file;

        if (move_uploaded_file($tmp_name, $upload_path)) {
            $gambar = $nama_file;
        } else {
            echo "Gagal upload gambar.";
            exit;
        }
    }

    if ($id) {
        
        $result = mysqli_query($koneksi, "SELECT gambar FROM destinasi_wisata WHERE id = $id");
        $old = mysqli_fetch_assoc($result);
        $gambar_lama = $old['gambar'];

        if (!$gambar) {
            $gambar = $gambar_lama;
        } elseif ($gambar_lama && $gambar_lama !== $gambar && file_exists("uploads/$gambar_lama")) {
            unlink("uploads/$gambar_lama"); 
        }

        $stmt = $koneksi->prepare("UPDATE destinasi_wisata SET nama=?, gambar=?, deskripsi=?, harga_tiket=?, harga_paket=?, nama_paket=?, daftar_paket=?, cocok_untuk=? WHERE id=?");
        $stmt->bind_param("ssssssssi", $nama, $gambar, $deskripsi, $harga_tiket, $harga_paket, $nama_paket, $daftar_paket, $cocok_untuk, $id);
    } else {
        // TAMBAH
        if (!$gambar) {
            echo "Gambar wajib diunggah saat menambahkan data baru.";
            exit;
        }

        $stmt = $koneksi->prepare("INSERT INTO destinasi_wisata (nama, gambar, deskripsi, harga_tiket, harga_paket, nama_paket, daftar_paket, cocok_untuk) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $nama, $gambar, $deskripsi, $harga_tiket, $harga_paket, $nama_paket, $daftar_paket, $cocok_untuk);
    }

    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menyimpan data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Metode request tidak valid.";
}

$koneksi->close();
