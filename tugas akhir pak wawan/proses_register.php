<?php

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
    $username = $_POST['username']; 
    $no_hp = $_POST['no_hp'];       

    if (empty($email) || empty($password) || empty($username) || empty($no_hp)) {
        header("Location: register.php?pesan=" . urlencode("Email, password, username, dan no hp harus diisi."));
        exit;
    }

    $stmt = $koneksi->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        header("Location: register.php?pesan=" . urlencode("Email sudah terdaftar."));
    } else {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $koneksi->prepare("INSERT INTO users (email, password, username, no_hp) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $email, $password_hash, $username, $no_hp);

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
