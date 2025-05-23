<?php
$pesan = isset($_GET['pesan']) ? $_GET['pesan'] : '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Register - Wisata</title>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <style>
    /* ... CSS kamu yang sama persis ... */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }
    body {
      background: linear-gradient(to right, #4facfe, #00f2fe);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    .wrapper {
      background: white;
      padding: 30px 40px;
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(0,0,0,0.2);
      width: 400px;
    }
    .login-header {
      text-align: center;
      margin-bottom: 25px;
    }
    .login-header span {
      font-size: 28px;
      font-weight: 600;
      color: #333;
    }
    .input_box {
      position: relative;
      margin-bottom: 20px;
    }
    .input_box input {
      width: 100%;
      padding: 12px 40px 12px 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
    }
    .input_box label {
      position: absolute;
      left: 12px;
      top: -10px;
      background: white;
      padding: 0 5px;
      font-size: 12px;
      color: #666;
    }
    .icon {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 20px;
      color: #888;
    }
    .input-submit {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 8px;
      background: #007bff;
      color: white;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s;
    }
    .input-submit:hover {
      background: #0056b3;
    }
    .login-link {
      text-align: center;
      margin-top: 15px;
    }
    .login-link a {
      color: #007bff;
      text-decoration: none;
    }
    .login-link a:hover {
      text-decoration: underline;
    }
    /* Tambahan untuk pesan */
    .message {
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 8px;
      font-weight: 600;
      text-align: center;
    }
    .message.error {
      background-color: #f8d7da;
      color: #842029;
      border: 1px solid #f5c2c7;
    }
    .message.success {
      background-color: #d1e7dd;
      color: #0f5132;
      border: 1px solid #badbcc;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="login-header">
      <span>Register</span>
    </div>

    <?php if (!empty($pesan)): ?>
      <?php
        $isSuccess = strpos($pesan, 'berhasil') !== false; // contoh sederhana cek pesan sukses
        $class = $isSuccess ? 'success' : 'error';
      ?>
      <div class="message <?php echo $class; ?>">
        <?php echo htmlspecialchars($pesan); ?>
      </div>
    <?php endif; ?>

    <form action="proses_register.php" method="POST">
      <div class="input_box">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" required>
        <i class="bx bx-user icon"></i>
      </div>

      <div class="input_box">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <i class="bx bx-lock-alt icon"></i>
      </div>

      <input type="submit" value="Daftar" class="input-submit">
    </form>

    <div class="login-link">
      <span>Sudah punya akun? <a href="index.php">Login di sini</a></span>
    </div>
  </div>
</body>
</html>
