<?php
// koneksi database
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "wisata";

$koneksi = new mysqli($host, $user, $pass, $dbname);
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // validasi
    if (empty($email) || empty($password)) {
        header("Location: register.php?pesan=" . urlencode("email dan password harus diisi."));
        exit;
    }

    // cek username
    $stmt = $koneksi->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        header("Location: register.php?pesan=" . urlencode("email sudah terdaftar."));
    } else {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $koneksi->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $password_hash);

        if ($stmt->execute()) {
            header("Location: register.php?pesan=" . urlencode("Registrasi berhasil!"));
        } else {
            header("Location: register.php?pesan=" . urlencode("Terjadi kesalahan: " . $stmt->error));
        }
    }

    $stmt->close();
    $koneksi->close();
    exit;
} else {
    header("Location: register.php");
    exit;
}
