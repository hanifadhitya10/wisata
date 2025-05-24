<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "wisata";

$koneksi = new mysqli($host, $user, $pass, $dbname);
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$id = $_SESSION['user_id'];

// Perhatikan di sini: saya menggunakan kolom 'id' bukan 'user_id'
// Sesuaikan dengan struktur tabelmu
$stmt = $koneksi->prepare("SELECT email, username, no_hp, password FROM users WHERE user_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    echo "User tidak ditemukan!";
    exit;
}

$user_data = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Halaman Akun</title>
  <style>
    body {
      background: linear-gradient(#08374b, #7e4e4b);
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .card {
      background: white;
      padding: 30px;
      border-radius: 10px;
      width: 350px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.2);
      text-align: center;
      position: relative;
    }
    .avatar {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      background: #ccc;
      margin: -70px auto 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 40px;
      color: white;
    }
    .form-group {
      margin-bottom: 15px;
      text-align: left;
    }
    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }
    .form-group input {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    .btn {
      background-color: #f1c40f;
      border: none;
      padding: 12px;
      width: 100%;
      font-weight: bold;
      border-radius: 5px;
      cursor: pointer;
    }
    .btn:hover {
      background-color: #f39c12;
    }
  </style>
</head>
<body>

  <div class="card">
    <div class="avatar">👤</div>

    <div class="form-group">
      <label>Email</label>
      <input type="email" value="<?= htmlspecialchars($user_data['email']); ?>" readonly>
    </div>

    <div class="form-group">
      <label>Username</label>
      <input type="text" value="<?= htmlspecialchars($user_data['username']); ?>" readonly>
    </div>

    <div class="form-group">
      <label>No. HP</label>
      <input type="text" value="<?= htmlspecialchars($user_data['no_hp']); ?>" readonly>
    </div>

    <div class="form-group">
      <label>Password</label>
      <input type="password" value="********" readonly>
    </div>

    <button class="btn" type="button" onclick="history.back()">Kembali</button>
  </div>

</body>
</html>
