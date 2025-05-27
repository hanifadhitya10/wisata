<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Wisata Lokal Lampung</title>
  <style>
    /* Mengatur scroll halaman menjadi smooth */
    html {
      scroll-behavior: smooth;
    }

    /* Styling dasar body: tanpa margin, font Arial, latar gradient dan warna tulisan putih */
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(#08374b, #7e4e4b);
      color: white;
    }

    /* Styling untuk navbar: background hitam, flexbox untuk layout, sticky di atas */
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

    /* Logo di navbar dengan font tebal dan ukuran font */
    nav .logo {
      font-weight: bold;
      font-size: 1.2rem;
    }

    /* Styling link di navbar: warna putih, margin kiri dan bold */
    nav a {
      color: white;
      text-decoration: none;
      margin-left: 20px;
      font-weight: bold;
    }

    /* Header dengan background gambar, ukuran cover, posisi tengah, padding, dan teks tengah */
    header {
    background: linear-gradient(#08374b, #7e4e4b);
      background-size: cover;
      background-position: center;
      padding: 120px 20px 40px;
      text-align: center;
    }

    /* Judul header dengan ukuran font lebih besar dan margin */
    header h1 {
      font-size: 2rem;
      margin: 10px 0;
    }

    /* Container utama dengan latar semi transparan hitam, margin atas negatif untuk overlap, padding dan border radius */
    .container {
      background-color: rgba(0, 0, 0, 0.3);
      margin: -20px auto 0;
      padding: 40px;
      max-width: 900px;
      border-radius: 10px;
    }

    /* Grid menggunakan CSS Grid, kolom otomatis minimal 250px dan gap antar item */
    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
    }

    /* Gambar di grid dengan transisi saat hover, kursor pointer, border radius */
    .grid img {
      transition: transform 0.3s ease-in-out;
      cursor: pointer;
      border-radius: 8px;
    }

    /* Efek hover gambar memperbesar (scale) */
    .grid img:hover {
      transform: scale(1.05);
    }

    /* Kartu destinasi dengan latar warna biru kehijauan, padding, border-radius, dan teks tengah */
    .card {
      background-color: #447880;
      padding: 10px;
      border-radius: 10px;
      text-align: center;
    }

    /* Gambar di kartu dengan lebar penuh, tinggi tetap 150px, cover dan border radius */
    .card img {
      width: 100%;
      height: 150px;
      object-fit: cover;
      border-radius: 8px;
    }

    /* Judul pada kartu dengan margin atas dan bawah */
    .card h3 {
      margin: 10px 0;
    }

    /* Tombol dengan background kuning, warna hitam, padding, border-radius, tanpa garis bawah, margin atas, dan transisi */
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

    /* Hover tombol ganti warna menjadi kuning keemasan */
    .btn:hover {
      background-color: #f2c100;
    }

    /* Footer dengan latar biru tua, warna putih, padding, dan teks tengah */
    footer.site-footer {
      background-color: #002b49;
      color: #fff;
      padding: 30px 20px;
      text-align: center;
    }

    /* Konten footer dengan margin nol dan ukuran font */
    .footer-content p {
      margin: 0;
      font-size: 1rem;
    }

    /* Small text di footer dengan margin atas, font lebih kecil dan warna abu-abu */
    .footer-content small {
      display: block;
      margin-top: 5px;
      font-size: 0.8rem;
      color: #ccc;
    }

    /* Responsif navbar pada layar kecil: arah flex column dan teks tengah */
    @media (max-width: 600px) {
      nav {
        flex-direction: column;
        text-align: center;
      }

      nav a {
        margin: 10px 5px 0;
      }
    }

    /* Animasi fadeSlideIn: dari opacity 0 dan geser ke kanan menjadi terlihat */
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

    /* Tombol mengambang di pojok kanan bawah, flex layout dengan jarak antar tombol, animasi fadeSlideIn */
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

    /* Tombol WhatsApp dengan warna khas hijau, bulat, padding, shadow dan transisi transform */
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

    /* Margin kanan ikon WhatsApp */
    .wa-btn img {
      margin-right: 8px;
    }

    /* Tombol scroll ke atas dengan background abu, lingkaran, ukuran 40px, teks putih, cursor pointer dan animasi */
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

    /* Jika tombol scroll-top muncul, opacity 1 dan transform ke posisi normal */
    .scroll-top-btn.show {
      opacity: 1;
      transform: translateX(0);
    }

    /* Menu navigasi link dengan flex dan posisi relative */
    .nav-links {
      display: flex;
      align-items: center;
      position: relative;
    }

    /* Dropdown menu dengan posisi relative dan inline-block */
    .dropdown {
      position: relative;
      display: inline-block;
    }

    /* Tombol menu hamburger tanpa background, putih, ukuran font besar, tanpa border, dan cursor pointer */
    .menu-btn {
      background: none;
      color: white;
      font-size: 24px;
      border: none;
      cursor: pointer;
      margin-left: 20px;
    }

    /* Konten dropdown tersembunyi default, posisi absolute di kanan, background gelap, box shadow, dan border radius */
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

    /* Link dropdown berwarna putih, padding, tanpa garis bawah, blok display, border radius, dan transisi background */
    .dropdown-content a {
      color: white;
      padding: 10px 15px;
      text-decoration: none;
      display: block;
      border-radius: 8px;
      transition: background-color 0.2s ease;
    }

    /* Hover link dropdown dengan background lebih terang */
    .dropdown-content a:hover {
      background-color: #444;
    }

    /* Saat dropdown aktif, tampilkan kontennya */
    .dropdown.show .dropdown-content {
      display: block;
    }

    /* Bagian about dengan padding, latar translucent putih, flex untuk tengah horizontal dan vertikal */
    #about {
      padding: 60px 20px;
      background-color: rgba(255, 255, 255, 0.05);
      display: flex;
      justify-content: center;
      align-items: center;
    }

    /* Container about dengan maksimal lebar, latar translucent putih, padding, border-radius, dan warna teks putih */
    #about .container {
      max-width: 900px;
      background-color: #ffffff15;
      padding: 40px 30px;
      border-radius: 10px;
      color: white;
    }

    /* Text about rata tengah */
    .about-text {
      text-align: center;
    }

    /* Judul about dengan ukuran font besar dan margin bawah */
    .about-text h2 {
      font-size: 2rem;
      margin-bottom: 10px;
    }

    /* Span dalam judul about berwarna kuning */
    .about-text h2 span {
      color: yellow;
    }

    /* Garis horizontal kuning dengan ukuran dan margin */
    .about-text hr {
      width: 60px;
      height: 4px;
      background-color: yellow;
      border: none;
      margin: 20px auto;
    }

    /* Paragraf about dengan ukuran font, line-height, warna teks abu muda, margin bawah */
    .about-text p {
      font-size: 16px;
      line-height: 1.8;
      color: #eee;
      margin-bottom: 15px;
    }

    /* Responsif judul dan paragraf about pada layar lebih kecil */
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
    <!-- Tombol WhatsApp untuk bantuan -->
    <a href="https://wa.me/6282186682694" class="wa-btn" target="_blank">
      <img src="https://img.icons8.com/ios-filled/20/ffffff/whatsapp.png" alt="WA" />
      <span>Need help?</span>
    </a>
    <!-- Tombol scroll ke atas dengan ikon panah -->
    <button class="scroll-top-btn" onclick="scrollToTop()" aria-label="Kembali ke atas">
      <svg viewBox="0 0 24 24" fill="none">
        <path d="M18 15l-6-6-6 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </button>
  </div>

  <nav>
    <div class="logo">Wisata Lokal Lampung</div>
    <div class="nav-links">
      <a href="home.php">Beranda</a>
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

      // Query untuk mengambil 6 destinasi terbaru berdasarkan id descending
      $query = "SELECT id, nama, gambar FROM destinasi_wisata ORDER BY id DESC LIMIT 6";
      $result = mysqli_query($koneksi, $query);

      if ($result && mysqli_num_rows($result) > 0) {
        $index = 0;
        while ($row = mysqli_fetch_assoc($result)) {
          $delay = $index * 0.2; // untuk animasi delay tiap kartu berbeda
          $gambar = "admin/uploads/" . htmlspecialchars($row['gambar']); 
          $nama = htmlspecialchars($row['nama']);
          $id = (int)$row['id'];

          // Menampilkan kartu destinasi dengan gambar, nama, dan tombol detail
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

      // Menutup koneksi database
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
        </div> 
      </div> 
    </div> 
  </div> 

  <footer class="site-footer">
    <div class="footer-content">
      <p>© 2025 wisata lampung. All Rights Reserved.</p>
      <small>Designed by Kelompok 8.</small>
    </div>
  </footer>

  <script>
    // Mendapatkan tombol scroll-top
    const scrollBtn = document.querySelector('.scroll-top-btn');

    // Menambahkan event listener scroll, untuk menampilkan tombol saat scroll > 100px
    window.addEventListener('scroll', () => {
      if (window.scrollY > 100) {
        scrollBtn.classList.add('show');
      } else {
        scrollBtn.classList.remove('show');
      }
    });

    // Fungsi scroll ke atas dengan animasi smooth
    function scrollToTop() {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }
  </script>

  <script>
    // Event listener tombol menu hamburger untuk toggle dropdown
    document.querySelector('.menu-btn').addEventListener('click', function () {
      document.querySelector('.dropdown').classList.toggle('show');
    });

    // Menutup dropdown jika klik di luar tombol menu
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
