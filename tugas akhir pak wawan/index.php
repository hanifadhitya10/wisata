<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Wisata</title>
  <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: linear-gradient(to right, #08374b, #7e4e4b);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .wrapper {
      background-color: #f5f5f5;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 400px;
    }

    .login-header span {
      font-size: 2rem;
      font-weight: bold;
      color: #333;
      display: block;
      text-align: center;
      margin-bottom: 30px;
    }

    .input_box {
      position: relative;
      margin-bottom: 25px;
    }

    .input-field {
      width: 100%;
      padding: 12px 40px 12px 15px;
      border: 1px solid #ccc;
      border-radius: 8px;
      outline: none;
      font-size: 16px;
      background-color: #fff;
    }

    .label {
      position: absolute;
      left: 15px;
      top: 12px;
      color: #999;
      pointer-events: none;
      transition: 0.2s ease all;
    }

    .input-field:focus + .label,
    .input-field:not(:placeholder-shown) + .label {
      top: -12px;
      left: 10px;
      background: #f5f5f5;
      padding: 0 5px;
      font-size: 12px;
      color: #333;
    }

    .icon {
      position: absolute;
      right: 15px;
      top: 12px;
      font-size: 20px;
      color: #555;
    }

    .remember-forgot {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
      font-size: 14px;
    }

    .remember-me label {
      margin-left: 5px;
    }

    .forgot a {
      color: #1d5fe4;
      text-decoration: none;
    }

    .forgot a:hover {
      text-decoration: underline;
    }

    .input-submit {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 8px;
      background-color: #1d5fe4;
      color: #fff;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s;
    }

    .input-submit:hover {
      background-color: #154ab0;
    }

    .register {
      text-align: center;
      font-size: 14px;
      margin-top: 20px;
    }

    .register a {
      color: #1d5fe4;
      text-decoration: none;
      font-weight: 500;
    }

    .register a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="login_box">
      <div class="login-header">
        <span>Login</span>
      </div>

      <!-- FORM LOGIN -->
      <form action="proses_login.php" method="POST">
        <div class="input_box">
          <input type="text" id="email" name="email" class="input-field" placeholder=" " required>
          <label for="email" class="label">Email</label>
          <i class="bx bx-user icon"></i>
        </div>

        <div class="input_box">
          <input type="password" id="password" name="password" class="input-field" placeholder=" " required>
          <label for="password" class="label">Password</label>
          <i class="bx bx-lock-alt icon"></i>
        </div>

      

        <div class="input_box">
          <input type="submit" class="input-submit" value="Login">
        </div>
      </form>

      <div class="register">
        <span>Don't have an account? <a href="register.php">Register</a></span>
      </div>
    </div>
  </div>
</body>
</html>
