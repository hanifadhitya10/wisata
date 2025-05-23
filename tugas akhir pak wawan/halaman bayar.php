<?php
include 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST')

$order_id = $_POST['order_id'] ?? '';
$nama_pelanggan = $_POST['nama_pelanggan'] ?? '';
$wisata = $_POST['wisata'] ?? '';
$jumlah = $_POST['jumlah'] ?? 0;
$harga = $_POST['harga'] ?? 0;
$total_harga = $_POST['total_harga'] ?? 0;
$status = $_POST['status'] ?? '';
?>
<!DOCTYPE html>
<html lang="id">
 
<head>
  <meta charset="UTF-8">
  <title>Metode Pembayaran</title>
  <style>
    body {
    font-family: Arial, sans-serif;
    background: linear-gradient(#08374b, #7e4e4b);
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
  }
  
  .container {
    background-color: #d9d9d9;
    border-radius: 10px;
    padding: 40px;
    width: 700px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
  }
  
  h2 {
    margin-bottom: 10px;
    font-size: 28px;
    color: black;
  }
  
  p.sub {
    margin-top: 0;
    color: #555;
    font-size: 14px;
  }
  
  .order-info {
    background-color: #eee;
    padding: 20px;
    border-radius: 10px;
    margin-top: 20px;
    margin-bottom: 30px;
  }
  
  .order-info p {
    margin: 5px 0;
    font-size: 16px;
    color: black;
  }
  
  .payment-options {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
    gap: 20px;
    justify-content: center;
    margin-bottom: 20px;
  }
  
  .card-radio {
  border: 2px solid transparent;
  border-radius: 10px;
  padding: 10px;
  background-color: white;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  cursor: pointer;
  transition: transform 0.2s ease, box-shadow 0.2s ease, border 0.2s ease;
  text-align: center;
  }

  
  .card-radio img {
    max-height: 50px;
    width: auto;
    object-fit: contain;
  }
  
  .card-radio input[type="radio"] {
    display: none;
  }
    
  .card-radio:has(input[type="radio"]:checked) {
    box-shadow: 0 0 10px rgba(29, 95, 228, 0.5);
    background-color: rgb(234, 241, 255);
    border: 2px solid #1d5fe4;
  }
  .card-radio:hover {
  transform: scale(1.05);
  box-shadow: 0 0 12px rgba(0, 123, 255, 0.3);
}

.card-radio:has(input[type="radio"]:checked) {
  border: 2px solid #1d5fe4;
  background-color: rgb(234, 241, 255);
  box-shadow: 0 0 15px rgba(0, 123, 255, 0.6);
}

.card-radio.ewallet {
  width: 200px; 
  margin: 0 auto;
}

    .buttons {
    display: flex;
    justify-content: space-between;
  }
  
  .btn {
  text-decoration: none; 
  padding: 12px 30px;
  border: none;
  border-radius: 10px;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
  display: inline-block; 
}

  .cancel {
    background-color: white;
    color: black;
  }
  
  .pay {
    background-color: #1d5fe4;
    color: white;
  }
  
  .footer-logos {
    display: flex;
    justify-content: center;
    gap: 40px;
    margin-top: 30px;
  }
  
  .footer-logos img {
    height: 40px;
    object-fit: contain;
  }
  
  .logo-midtrans {
    filter: brightness(0) saturate(100%) invert(26%) sepia(97%) saturate(747%) hue-rotate(193deg) brightness(94%) contrast(94%);
  }
  
  .section-label {
    text-align: center;
    font-weight: bold;
    margin: 20px 0 10px;
    font-size: 16px;
    color: #333;
  }
  
  </style>
</head>


<body>
  <div class="container">
    <h2>Metode Pembayaran</h2>
    <p class="sub">Pilih metode pembayaran yang anda inginkan dibawah ini</p>

    <div class="order-info">
      <p><strong>Order ID:</strong> <?= htmlspecialchars($order_id); ?></p>
      <p><strong>Wisata:</strong> <?= htmlspecialchars($wisata); ?></p>
      <p><strong>Nama pelanggan:</strong> <?= htmlspecialchars($nama_pelanggan); ?></p>
      <p><strong>Jumlah:</strong> <?= htmlspecialchars($jumlah); ?></p>
      <p><strong>Biaya:</strong> Rp<?= number_format($total_harga, 0, ',', '.'); ?></p>
      <p><strong>Status:</strong> <?= htmlspecialchars($status); ?></p>
    </div>

   
    <p class="section-label">Bank Transfer</p>
    <div class="payment-options bank-transfer">
      <label class="card-radio bank">
        <input type="radio" name="payment" value="bca">
        <img src="asset/BCA.png" alt="BCA">
      </label>
      <label class="card-radio bank">
        <input type="radio" name="payment" value="bri">
        <img src="asset/BRI.png" alt="BRI">
      </label>
    </div>

    <p class="section-label">E-Wallet</p>
    <div class="payment-options">
      <label class="card-radio ewallet">
        <input type="radio" name="payment" value="dana">
        <img src="asset/Logo Dana.png" alt="Dana">
      </label>
    </div>

    <div class="buttons">
  <a href="index.php" class="btn cancel">Batalkan</a>

  <form action="tiket.php" method="POST">
    <input type="hidden" name="order_id" value="<?= htmlspecialchars($order_id); ?>">
    <input type="hidden" name="nama_pelanggan" value="<?= htmlspecialchars($nama_pelanggan); ?>">
    <input type="hidden" name="wisata" value="<?= htmlspecialchars($wisata); ?>">
    <input type="hidden" name="jumlah" value="<?= htmlspecialchars($jumlah); ?>">
    <input type="hidden" name="total_harga" value="<?= htmlspecialchars($total_harga); ?>">
    <input type="hidden" name="status" value="Sudah bayar">
   <button type="submit" class="btn pay" id="bayarButton" disabled>Bayar</button>

  </form>
    </div>
    <div class="footer-logos">
      <img src="asset/midtrans.png" alt="Midtrans" class="logo-midtrans">
      <img src="asset/xendit.png" alt="Xendit">
      <img src="asset/doku.png" alt="Doku">
    </div>
  </div>
</body>
<script>
  const bayarBtn = document.getElementById('bayarButton');
  const paymentOptions = document.querySelectorAll('input[name="payment"]');

  paymentOptions.forEach(option => {
    option.addEventListener('change', () => {
      bayarBtn.disabled = false;
    });
  });
</script>
</html>