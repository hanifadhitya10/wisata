<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "wisata";

// Koneksi ke database
$koneksi = new mysqli($host, $user, $pass, $dbname);
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        header("Location: index.php?pesan=" . urlencode("Email dan password harus diisi."));
        exit;
    }

    // Ambil data user berdasarkan email
    $stmt = $koneksi->prepare("SELECT id, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $password_db, $role);
        $stmt->fetch();

        // Cek password sesuai role
        $valid_login = false;

        if ($role === 'admin') {
            // Admin: password disimpan biasa (plain text)
            if ($password === $password_db) {
                $valid_login = true;
            }
        } elseif ($role === 'user') {
            // User: password disimpan dalam hash
            if (password_verify($password, $password_db)) {
                $valid_login = true;
            }
        }

        if ($valid_login) {
            // Set session
            $_SESSION['id'] = $id;
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $role;

            // Redirect berdasarkan role
            if ($role === 'admin') {
                header("Location: admin/dashboard.php");
            } else {
                header("Location: home.php");
            }
            exit;
        } else {
            header("Location: index.php?pesan=" . urlencode("Password salah."));
            exit;
        }
    } else {
        header("Location: index.php?pesan=" . urlencode("Email tidak ditemukan."));
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
