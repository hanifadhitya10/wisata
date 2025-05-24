<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Wisata Lokal Lampung</title>
  <style>
   body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(#08374b, #7e4e4b);
      color: white;
    }

    nav {
      background-color: #000;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 30px;
      border-bottom: 1px solid #fff;
      position: sticky;
      top: 0;
      z-index: 999;
    }

    nav .logo {
      font-weight: bold;
      font-size: 1.2rem;
    }

    nav a {
      color: white;
      text-decoration: none;
      margin-left: 20px;
      font-weight: bold;
    }

    header {
      background-image: url('https://i.ibb.co/BnWvqM8/coral.jpg');
      background-size: cover;
      background-position: center;
      padding: 120px 20px 40px;
      text-align: center;
    }

    header h1 {
      font-size: 2rem;
      margin: 10px 0;
    }

    .container {
      background-color: rgba(0, 0, 0, 0.3);
      margin: -20px auto 0;
      padding: 40px;
      max-width: 900px;
      border-radius: 10px;
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
    }

    .grid img {
      transition: transform 0.3s ease-in-out;
      cursor: pointer;
      border-radius: 8px;
    }

    .grid img:hover {
      transform: scale(1.05);
    }

    .card {
      background-color: #447880;
      padding: 10px;
      border-radius: 10px;
      text-align: center;
    }

    .card img {
      width: 100%;
      height: 150px;
      object-fit: cover;
      border-radius: 8px;
    }

    .card h3 {
      margin: 10px 0;
    }

    .btn {
      display: inline-block;
      background-color: yellow;
      color: black;
      padding: 8px 15px;
      font-weight: bold;
      border-radius: 20px;
      text-decoration: none;
      margin-top: 10px;
      transition: 0.2s;
    }

    .btn:hover {
      background-color: #f2c100;
    }

    footer.site-footer {
      background-color: #002b49;
      color: #fff;
      padding: 30px 20px;
      text-align: center;
    }

    .footer-content p {
      margin: 0;
      font-size: 1rem;
    }

    .footer-content small {
      display: block;
      margin-top: 5px;
      font-size: 0.8rem;
      color: #ccc;
    }

    @media (max-width: 600px) {
      nav {
        flex-direction: column;
        text-align: center;
      }

      nav a {
        margin: 10px 5px 0;
      }
    }

    @keyframes fadeSlideIn {
      from {
        opacity: 0;
        transform: translateX(40px);
      }
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    .floating-buttons {
      position: fixed;
      bottom: 20px;
      right: 20px;
      display: flex;
      gap: 10px;
      align-items: center;
      z-index: 1000;
      opacity: 0;
      animation: fadeSlideIn 0.8s ease forwards;
    }

    .wa-btn {
      background-color: #25d366;
      color: white;
      border-radius: 30px;
      padding: 10px 15px;
      display: flex;
      align-items: center;
      text-decoration: none;
      font-weight: bold;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      transition: transform 0.3s ease;
    }

    .wa-btn img {
      margin-right: 8px;
    }

    .scroll-top-btn {
      background-color: #666;
      color: white;
      border: none;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      transform: translateX(40px);
      transition: all 0.4s ease;
    }

    .scroll-top-btn.show {
      opacity: 1;
      transform: translateX(0);
    }

    .nav-links {
      display: flex;
      align-items: center;
      position: relative;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .menu-btn {
      background: none;
      color: white;
      font-size: 24px;
      border: none;
      cursor: pointer;
      margin-left: 20px;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      right: 0;
      background-color: #222;
      min-width: 170px;
      box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
      z-index: 1;
      border-radius: 5px;
    }

    .dropdown-content a {
      color: white;
      padding: 10px 15px;
      text-decoration: none;
      display: block;
      border-radius: 8px;
      transition: background-color 0.2s ease;
    }

    .dropdown-content a:hover {
      background-color: #444;
    }

    .dropdown.show .dropdown-content {
      display: block;
    }

    #about {
      padding: 60px 20px;
      background-color: rgba(255, 255, 255, 0.05);
      display: flex;
      justify-content: center;
      align-items: center;
    }

    #about .container {
      max-width: 900px;
      background-color: #ffffff15;
      padding: 40px 30px;
      border-radius: 10px;
      color: white;
    }

    .about-text {
      text-align: center;
    }

    .about-text h2 {
      font-size: 2rem;
      margin-bottom: 10px;
    }

    .about-text h2 span {
      color: yellow;
    }

    .about-text hr {
      width: 60px;
      height: 4px;
      background-color: yellow;
      border: none;
      margin: 20px auto;
    }

    .about-text p {
      font-size: 16px;
      line-height: 1.8;
      color: #eee;
      margin-bottom: 15px;
    }

    @media (max-width: 768px) {
      .about-text h2 {
        font-size: 1.5rem;
      }

      .about-text p {
        font-size: 15px;
      }
    }

  </style>
</head>
<body>

  <div class="floating-buttons">
    <a href="https://wa.me/6282186682694" class="wa-btn" target="_blank">
      <img src="https://img.icons8.com/ios-filled/20/ffffff/whatsapp.png" alt="WA" />
      <span>Need help?</span>
    </a>
    <button class="scroll-top-btn" onclick="scrollToTop()" aria-label="Kembali ke atas">
      <svg viewBox="0 0 24 24" fill="none">
        <path d="M18 15l-6-6-6 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </button>
  </div>

 <nav>
  <div class="logo">Wisata Lokal Lampung</div>
  <div class="nav-links">
    <a href="index.php">Beranda</a>
    <a href="#about" class="page-scroll">Tentang kami</a>
    <a href="wisata.php">Wisata</a>
    <div class="dropdown">
      <button class="menu-btn">☰</button>
      <div class="dropdown-content">
        <a href="akun.php">akun</a>
        <a href="logout.php">Logout</a>
        <a href="cek_tiket.php">Cek Tiket</a>
      </div>
    </div>
  </div>
</nav>


  <header>
    <h1>Destinasi</h1>
    <p>Beranda</p>
  </header>

  <div class="container">
    <div class="grid">
    <?php
include 'koneksi.php'; 

$query = "SELECT id, nama, gambar FROM destinasi_wisata ORDER BY id DESC LIMIT 6";
$result = mysqli_query($koneksi, $query);

if ($result && mysqli_num_rows($result) > 0) {
  $index = 0;
  while ($row = mysqli_fetch_assoc($result)) {
    $delay = $index * 0.2;
    $gambar = "admin/uploads/" . htmlspecialchars($row['gambar']); 
    $nama = htmlspecialchars($row['nama']);
    $id = (int)$row['id'];

    echo "<div class='card' style='opacity: 1; animation: fadeIn 0.6s ease forwards; animation-delay: {$delay}s;'>
            <img src='{$gambar}' alt='{$nama}'>
            <h3>{$nama}</h3>
            <a href='detail.php?id={$id}' class='btn'>Detail →</a>
          </div>";

    $index++;
  }
} else {
  echo "<p>Tidak ada data destinasi wisata.</p>";
}

mysqli_close($koneksi);
?>

    </div>
  </div>

  <div id="about">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-6">
        <div class="about-text">
            <h2>TENTANG KAMI</h2>
          <h2>Selamat Datang di <span>Wisata Lampung</span></h2>
          <hr>
          <p>panduan digital Anda untuk menjelajahi pesona alam dan budaya Lampung!
Kami hadir untuk membantu Anda menemukan tempat-tempat wisata terbaik di Lampung, mulai dari pantai-pantai eksotis, air terjun tersembunyi, hingga kekayaan budaya dan kuliner lokal yang menggoda selera. Semua informasi kami rangkum dalam satu aplikasi yang mudah digunakan dan selalu diperbarui.
Dengan fitur rekomendasi destinasi, panduan perjalanan, ulasan pengunjung, dan info event lokal, Wisata Lampung siap menjadi teman setia Anda dalam merencanakan liburan yang seru dan berkesan.
Dibuat oleh tim yang mencintai Lampung, aplikasi ini adalah wujud semangat kami untuk memperkenalkan keindahan daerah ini kepada dunia, sekaligus mendukung pariwisata lokal.</p>
          <p>Ayo, temukan keajaiban Lampung bersama kami. Karena setiap sudut Lampung punya cerita yang layak untuk dijelajahi!</p>
  
      </div>
  <footer class="site-footer">
    <div class="footer-content">
      <p>© 2025 wisata lampung. All Rights Reserved.</p>
      <small>Design by Kelompok 8.</small>
    </div>
  </footer>

  <script>
    const scrollBtn = document.querySelector('.scroll-top-btn');

    window.addEventListener('scroll', () => {
      if (window.scrollY > 100) {
        scrollBtn.classList.add('show');
      } else {
        scrollBtn.classList.remove('show');
      }
    });

    function scrollToTop() {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }
  </script>

  <script>
  
  document.querySelector('.menu-btn').addEventListener('click', function () {
    document.querySelector('.dropdown').classList.toggle('show');
  });

  window.onclick = function(event) {
    if (!event.target.matches('.menu-btn')) {
      let dropdowns = document.getElementsByClassName("dropdown");
      for (let i = 0; i < dropdowns.length; i++) {
        let openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  };
</script>

</body>
</html>