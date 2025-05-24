<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "wisata";


$koneksi = new mysqli($host, $user, $pass, $dbname);
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_input = $_POST['email'] ?? ''; 
    $password = $_POST['password'] ?? '';

    if (empty($user_input) || empty($password)) {
        header("Location: index.php?pesan=" . urlencode("Email/Username dan password harus diisi."));
        exit;
    }

    $stmt = $koneksi->prepare("SELECT user_id, password, role FROM users WHERE email = ? OR username = ?");
    $stmt->bind_param("ss", $user_input, $user_input);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($user_id, $password_db, $role);
        $stmt->fetch();

        $valid_login = false;

        if ($role === 'admin') {
            if ($password === $password_db) {
                $valid_login = true;
            }
        } else {
            if (password_verify($password, $password_db)) {
                $valid_login = true;
            }
        }

        if ($valid_login) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['role'] = $role;

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
        header("Location: index.php?pesan=" . urlencode("Username atau Email tidak ditemukan."));
        exit;
    }
}

