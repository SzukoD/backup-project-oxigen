<?php
session_start(); // pastikan ini di paling atas page

// Ambil data session user
$id_member = $_SESSION['id_member'] ?? null;
$nama_member = $_SESSION['nama_member'] ?? null;
$foto_member = $_SESSION['foto'] ?? null;

// Fallback avatar jika foto kosong
if (!$foto_member) {
    $foto_member = 'https://i.pravatar.cc/150?img=68';
}

// Ambil data session user
// $id_member = $_SESSION['id_member'] ?? null;
// $nama_member = $_SESSION['nama_member'] ?? null;

// Foto default jika Google account tidak punya foto
$default_foto = 'https://i.pravatar.cc/150?img=68';
$foto_member = $_SESSION['foto'] ?? $default_foto;
if (empty($foto_member)) {
    $foto_member = $default_foto;
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Videograph Template">
    <meta name="keywords" content="Videograph, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Videograph | Template</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<style>
  
    body {
    background: linear-gradient(to bottom, #121212 85%, #5c0a0a);
    background-attachment: fixed;
      color: #fff;
      font-family: 'Poppins', sans-serif;
    }

    h2 {
      color: #fff;
    }

    .about-img {
  background-size: cover;
  background-position: center;
  border-radius: 16px;
  position: absolute;
  transition: all 0.5s ease;
  cursor: pointer;
}

/* Posisi gambar */
.img-left {
  background-image: url('img/program/1.jpg');
  width: 220px;
  height: 280px;
  left: 0;
  bottom: 0;
  box-shadow: 0 8px 25px rgba(230, 57, 70, 0.4);
  transform: rotate(-3deg);
}

.img-center {
  background-image: url('img/program/2.jpg');
  width: 260px;
  height: 340px;
  z-index: 2;
  box-shadow: 0 10px 30px rgba(230, 57, 70, 0.45);
}

.img-right {
  background-image: url('img/program/3.jpg');
  width: 200px;
  height: 250px;
  right: 0;
  top: 0;
  box-shadow: 0 8px 25px rgba(230, 57, 70, 0.35);
  transform: rotate(3deg);
}

/* Hover efek gambar */
.about-img:hover {
  transform: scale(1.1) rotate(0deg);
  box-shadow: 0 14px 50px rgba(230, 57, 70, 0.6);
  z-index: 3;
  filter: brightness(1.05);
}
.about-card {
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 20px;
  transition: all 0.4s ease;
  backdrop-filter: blur(10px);
  box-shadow: 0 0 10px rgba(230, 57, 70, 0.05);
  position: relative;
  overflow: hidden;
}

.about-card::before {
  content: "";
  position: absolute;
  top: 0;
  left: -75%;
  width: 50%;
  height: 100%;
  background: linear-gradient(120deg, transparent, rgba(230,57,70,0.2), transparent);
  transform: skewX(-20deg);
  transition: 0.75s;
}

.about-card:hover::before {
  left: 125%;
}

.about-card:hover {
  transform: translateY(-10px);
  border-color: #E63946;
  box-shadow: 0 10px 30px rgba(230, 57, 70, 0.3);
}

.icon-circle {
  width: 70px;
  height: 70px;
  margin: 0 auto;
  border-radius: 50%;
  background: radial-gradient(circle at 30% 30%, #E63946, #8B1E2D);
  display: flex;
  justify-content: center;
  align-items: center;
  box-shadow: 0 0 20px rgba(230, 57, 70, 0.4);
}

.icon-circle i {
  font-size: 32px;
  color: #fff;
  transition: 0.3s;
}

.about-card:hover .icon-circle i {
  transform: scale(1.1);
}

/* Navbar menu */
.header__nav__menu ul {
    display: flex;
    gap: 20px;
    list-style: none;
    margin: 0;
    padding: 0;
}

.header__nav__menu ul li a {
    text-decoration: none;
    color: white;
    font-weight: 600;
    transition: 0.3s;
}

.header__nav__menu ul li a:hover {
    color: #ff2e2e;
}

/* Tombol Login */
.btn-login {
    padding: 8px 18px;
    background: #A0153E;
    color: #fff;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    white-space: nowrap;
    transition: 0.3s;
}

.btn-login:hover {
    background: #ff2e2e;
}

/* Profil User */
.profile-container {
    display: flex;
    align-items: center;
    gap: 8px;
    position: relative;
    max-width: 200px;
}

.profile-img {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    object-fit: cover;
    flex-shrink: 0;
}

.profile-img-placeholder {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background: #A0153E;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    flex-shrink: 0;
}

.profile-btn {
    color: white;
    font-weight: 600;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 120px;
}

/* Dropdown */
.profile-dropdown {
    position: absolute;
    top: 100%;
    right: 0;
    background: #fff;
    min-width: 140px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.25);
    display: none;
    flex-direction: column;
    z-index: 100;
}

.profile-dropdown a {
    padding: 10px 15px;
    text-decoration: none;
    color: #333;
    transition: 0.2s;
}

.profile-dropdown a:hover {
    background: #f1f1f1;
}

.profile-container:hover .profile-dropdown {
    display: flex;
}

/* Pastikan user mentok kanan */
.ms-auto {
    margin-left: auto !important;
}

/* Responsif */
@media (max-width: 991px) {
    .header__nav__menu ul {
        flex-direction: column;
        gap: 10px;
        align-items: flex-start;
    }
    .profile-container {
        max-width: 150px;
    }
    .profile-btn {
        max-width: 100px;
    }
}

  </style>
<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Header Section Begin -->



  <header class="header">
      <div class="container">
          <div class="row align-items-center">
              <!-- Logo -->
              <div class="col-lg-2 col-6">
                  <div class="header__logo">
                      <a href="./index.php" style="font-weight:bold;font-size:xx-large;color:red;">FitForge</a>
                  </div>
              </div>

              <!-- Navbar + Social + Login/Profile -->
              <div class="col-lg-10 col-6">
                  <div class="d-flex align-items-center justify-content-start header__nav__option">

                      <!-- Navbar -->
                      <nav class="header__nav__menu mobile-menu me-3">
                          <ul class="d-flex gap-3 mb-0">
                              <li class="active"><a href="#home" style="color: white;">Home</a></li>
                              <li><a href="#about" style="color: white;">About</a></li>
                              <li><a href="#programs" style="color: white;">Programs</a></li>
                              <li><a href="#pelatih" style="color: white;">Pelatih</a></li>
                              <li><a href="#komentar-pertanyaan" style="color: white;">Komentar</a></li>
                          </ul>
                      </nav>

                      <!-- Social Media -->
                      <!-- <div class="header__nav__social d-flex gap-2 me-3">
                          <a href="#"><i class="fa fa-facebook"></i></a>
                          <a href="#"><i class="fa fa-twitter"></i></a>
                          <a href="#"><i class="fa fa-dribbble"></i></a>
                          <a href="#"><i class="fa fa-instagram"></i></a>
                          <a href="#"><i class="fa fa-youtube-play"></i></a>
                      </div> -->

                      <!-- Tombol Login / Profil -->
                      <div id="userMenu" class="ms-auto">
                          <?php if(isset($_SESSION['id_member'])): ?>
                              <?php
                                  // Ambil foto dan nama dari session langsung
                                  $nama_member = $_SESSION['nama_member'];
                                  $foto_member = $_SESSION['foto'] ?: 'https://i.pravatar.cc/150?img=68';
                              ?>
                              <div class="profile-container" style="position:relative;">
                                  <img src="<?= htmlspecialchars($foto_member); ?>" alt="User" class="profile-img" style="width:40px;height:40px;border-radius:50%;object-fit:cover;">
                                  <div class="profile-btn" style="cursor:pointer;" title="<?= htmlspecialchars($nama_member); ?>">
                                      <?= htmlspecialchars($nama_member); ?> &#x25BC;
                                  </div>
                                  <div class="profile-dropdown" style="display:none; position:absolute; top:100%; right:0; flex-direction:column; background:#fff; border:1px solid #ccc; border-radius:6px; min-width:120px; z-index:10;">
                                      <a href="./profile.php" style="padding:8px 12px; text-decoration:none; color:#333;">Profil</a>
                                      <a href="./logout.php" style="padding:8px 12px; text-decoration:none; color:#333;">Logout</a>
                                  </div>
                              </div>

                              <script>
                                  const profileBtn = document.querySelector('.profile-btn');
                                  const dropdown = document.querySelector('.profile-dropdown');
                                  profileBtn.addEventListener('click', () => {
                                      dropdown.style.display = dropdown.style.display === 'flex' ? 'none' : 'flex';
                                  });
                                  document.addEventListener('click', function(e){
                                      if(!profileBtn.contains(e.target) && !dropdown.contains(e.target)){
                                          dropdown.style.display = 'none';
                                      }
                                  });
                              </script>
                          <?php else: ?>
                              <a href="../dist/member/login.php" class="btn-login" style="padding:6px 12px;background:#A0153E;color:#fff;border-radius:6px;text-decoration:none;">Login</a>
                          <?php endif; ?>
                      </div>

                  </div>
              </div>
          </div>
          <div id="mobile-menu-wrap"></div>
      </div>
  </header>


    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero" id="home">
        <div class="hero__slider owl-carousel">
            <div class="hero__item set-bg" data-setbg="img/hero/1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <span>for health and resilience</span>
                                <h2>No Excuses. Just Results.</h2>
                                <a href="#about" class="primary-btn">See more about us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__item set-bg" data-setbg="img/hero/2.jpg" style="background-position: center; background-size: cover;" >
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <span>for health and resilience</span>
                                <h2>Earn It. Don’t Wish For It</h2>
                                <a href="#about" class="primary-btn">See more about us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__item set-bg" data-setbg="img/hero/3.jpg" style="background-position: center;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <span>for health and resilience</span>
                                <h2>Smart Fitness. Stronger You</h2>
                                <a href="#about" class="primary-btn">See more about us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

   <section class="about py-5 spotlight" data-aos="zoom-in" data-aos-delay="100"  data-aos="fade-up" data-aos-duration="1000" id="about" style="position: relative; overflow: hidden; background: linear-gradient(
  to bottom,
  #22252B 0%,       /* abu kehitaman lembut di atas */
  #111111 65%,      /* transisi ke hitam pekat di tengah */
  rgba(160, 21, 62, 0.2) 85%, /* merah samar di bawah */
  rgba(160, 21, 62, 0.4) 100% /* sedikit lebih terang di dasar */
);
color: #fff;
">
  <div class="container"  data-aos="fade-up" data-aos-duration="1000">
    <div class="row align-items-center gy-5">

      <!-- Kolom Gambar -->
      <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
        <div class="position-relative d-flex justify-content-center align-items-center" style="min-height: 400px;">
          <div class="about-img img-left"></div>
          <div class="about-img img-center"></div>
          <div class="about-img img-right"></div>
        </div>
      </div>

      <!-- Kolom Teks -->
      <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
        <div class="ps-lg-4" data-aos="zoom-in" data-aos-delay="100">
          <div class="section-title mb-4">
            <span style="color: #E63946; font-weight: 600;">About FitForge</span>
            <h2 style="font-size: 36px; font-weight: 700; line-height: 1.3; color: #fff;">
              Train Hard. Eat Smart. Live Strong.
            </h2>
          </div>

          <p style="color: #f0f0f0; line-height: 1.8;">
            Di <strong>FitForge</strong>, kami percaya bahwa kekuatan sejati tidak hanya dibangun di gym, 
            tapi juga melalui gaya hidup seimbang. Kami membimbingmu untuk berlatih lebih efektif, makan lebih bijak, dan hidup lebih kuat.
          </p>

          <div class="row mt-4">
            <div class="col-md-6 mb-4">
              <div class="d-flex align-items-start">
                <i class="bi bi-fire me-3" style="font-size: 40px; color: #E63946;"></i>
                <div>
                  <h5 class="fw-bold mb-1 text-white">Forge Your Strength</h5>
                  <p class="mb-0" style="font-size: 14px; color: #f1c0c0;">
                    Tempa kekuatanmu dan capai hasil maksimal untuk tubuhmu.
                  </p>
                </div>
              </div>
            </div>

            <div class="col-md-6 mb-4">
              <div class="d-flex align-items-start">
                <i class="bi bi-activity me-3" style="font-size: 40px; color: #E63946;"></i>
                <div>
                  <h5 class="fw-bold mb-1 text-white">Balance & Nutrition</h5>
                  <p class="mb-0" style="font-size: 14px; color: #f1c0c0;">
                    Keseimbangan latihan dan nutrisi adalah kunci hasil yang nyata.
                  </p>
                </div>
              </div>
            </div>
          </div>

          <a href="../dist/member/index.php" class="btn btn-danger mt-3 px-4 py-2" style="border-radius: 30px; font-weight: 600; background: #E63946; border: none;">
            Join FitForge Today
          </a>
        </div>
      </div>
    </div>

    <!-- ===== Card Tambahan (lebih estetik) ===== -->
    <div class="row mt-5 g-4">
      <div class="col-md-4">
        <div class="about-card text-center p-4 h-100">
          <div class="icon-circle mb-3">
            <i class="bi bi-heart-pulse"></i>
          </div>
          <h5 class="fw-bold text-white mb-2">Personal Coaching</h5>
          <p class="mb-0" style="font-size: 14px; color: #ddd;">
            Latihan pribadi dengan pelatih profesional untuk hasil maksimal sesuai targetmu.
          </p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="about-card text-center p-4 h-100">
          <div class="icon-circle mb-3">
            <i class="bi bi-cup-hot"></i>
          </div>
          <h5 class="fw-bold text-white mb-2">Nutrition Plans</h5>
          <p class="mb-0" style="font-size: 14px; color: #ddd;">
            Panduan nutrisi dan meal plan untuk menunjang performa latihan serta pemulihan tubuhmu.
          </p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="about-card text-center p-4 h-100">
          <div class="icon-circle mb-3">
            <i class="bi bi-lightning-charge"></i>
          </div>
          <h5 class="fw-bold text-white mb-2">Motivation & Support</h5>
          <p class="mb-0" style="font-size: 14px; color: #ddd;">
            Bergabunglah dengan komunitas FitForge dan dapatkan semangat baru setiap hari.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="container my-5" id="popular" data-aos="zoom-in" data-aos-delay="200" >
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Popular Highlights</h2>
    <a href="#populars" class="btn btn-primary rounded-pill px-4"
      style="background: linear-gradient(135deg, #660022, #A0153E, #C62E65); border: none;">
      View All Populars
    </a>
  </div>

  <!-- SLIDER -->
  <div class="slider-container" data-aos="fade-up" data-aos-delay="200">
    <div class="slider-track" id="sliderTrack">

      <!-- Card 1 -->
      <div class="popular-card">
        <div class="popular-img">
          <img src="img/program/1.jpg" alt="Popular 1">
        </div>
        <div class="popular-info">
          <h5 class="popular-title">Muscle Forge Program</h5>
          <p class="popular-desc">Bangun otot dan kekuatan maksimal dengan latihan progresif.</p>
          <div class="popular-meta">
            <span><i class="bi bi-lightning-charge"></i> Strength</span>
            <span><i class="bi bi-star-fill text-warning"></i> 4.9</span>
          </div>
          <a href="#" class="btn btn-popular">See Details</a>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="popular-card">
        <div class="popular-img">
          <img src="img/program/2.jpg" alt="Popular 2">
        </div>
        <div class="popular-info">
          <h5 class="popular-title">HIIT & Fat Burn</h5>
          <p class="popular-desc">Latihan intensitas tinggi untuk membakar kalori cepat.</p>
          <div class="popular-meta">
            <span><i class="bi bi-heart-pulse"></i> Cardio</span>
            <span><i class="bi bi-star-fill text-warning"></i> 4.8</span>
          </div>
          <a href="#" class="btn btn-popular">See Details</a>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="popular-card">
        <div class="popular-img">
          <img src="img/program/concentrated-young-sportsman-make-sport-exercises.jpg" alt="Popular 3">
        </div>
        <div class="popular-info">
          <h5 class="popular-title">Yoga & Mind Balance</h5>
          <p class="popular-desc">Raih keseimbangan tubuh dan pikiran dengan yoga harian.</p>
          <div class="popular-meta">
            <span><i class="bi bi-flower1"></i> Flexibility</span>
            <span><i class="bi bi-star-fill text-warning"></i> 5.0</span>
          </div>
          <a href="#" class="btn btn-popular">See Details</a>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="popular-card">
        <div class="popular-img">
          <img src="https://images.unsplash.com/photo-1599423300746-b62533397364?auto=format&fit=crop&w=800&q=80" alt="Popular 4">
        </div>
        <div class="popular-info">
          <h5 class="popular-title">Crossfit Challenge</h5>
          <p class="popular-desc">Latihan eksplosif untuk membangun daya tahan dan kekuatan penuh.</p>
          <div class="popular-meta">
            <span><i class="bi bi-lightning-charge"></i> Crossfit</span>
            <span><i class="bi bi-star-fill text-warning"></i> 4.7</span>
          </div>
          <a href="#" class="btn btn-popular">See Details</a>
        </div>
      </div>

    </div>
  </div>

  <!-- Navigation Buttons -->
  <div class="d-flex justify-content-center gap-3 mt-4">
    <div class="nav-btn" id="prevBtn"><i class="bi bi-chevron-left"></i></div>
    <div class="nav-btn" id="nextBtn"><i class="bi bi-chevron-right"></i></div>
  </div>
</section>

<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "gym");

// Cek koneksi
if ($koneksi->connect_error) {
  die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil data dari tabel program
$query = "SELECT nama_program, level, thumbnail, durasi FROM program";
$result = $koneksi->query($query);
?>

<section class="all-programs py-5" id="programs" style="background: linear-gradient(135deg, #0b0b0b, #1a0a0a, #5c0a0a); color: #fff;">
  <div class="container text-center" data-aos="fade-up" data-aos-duration="1000">

    <!-- Section Title -->
    <div class="section-header mb-5" data-aos="zoom-in" data-aos-delay="200">
      <span class="subtitle">Our Programs</span>
      <h2 class="section-title">All Fitness Programs</h2>
      <p class="section-desc">Pilih program latihan yang sesuai dengan level dan tujuan kebugaranmu.</p>
    </div>

    <!-- Filter Buttons -->
    <!-- Filter Buttons -->
<div class="program-filters mb-5">
  <button class="btn btn-program active" data-filter="all" >Semua Program</button>
  <button class="btn btn-program" data-filter="Pemula" style="background: white;">Pemula</button>
  <button class="btn btn-program" data-filter="Menengah" style="background: white;">Menengah</button>
  <button class="btn btn-program" data-filter="Lanjut" style="background: white;">Lanjut</button>
</div>

<!-- Program Cards (hasil PHP dari database) -->
<div class="row g-4 justify-content-center">

  <?php
  // Ubah query agar level di database juga pakai kata Bahasa Indonesia
  $query = "SELECT nama_program, level, thumbnail FROM program";
  $result = $koneksi->query($query);

  if ($result->num_rows > 0):
    while ($row = $result->fetch_assoc()):
  ?>
      <div class="col-md-6 col-lg-4 program-item" data-level="<?php echo htmlspecialchars($row['level']); ?>">
        <div class="program-card" data-aos="zoom-in" data-aos-delay="100">
          <div class="program-img-wrapper">
            <img src="../dist/uploads/<?php echo htmlspecialchars($row['thumbnail']); ?>" alt="<?php echo htmlspecialchars($row['nama_program']); ?>">
          </div>
          <div class="program-content">
            <div class="program-header">
              <span class="tag"><?php echo htmlspecialchars($row['level']); ?></span>
              <span class="rating"><i class="bi bi-star-fill text-warning"></i> 5.0</span>
            </div>
            <h5 class="program-title"><?php echo htmlspecialchars($row['nama_program']); ?></h5>
            <p class="program-desc">Program level <?php echo htmlspecialchars($row['level']); ?> untuk meningkatkan kebugaranmu.</p>
          </div>
        </div>
      </div>
  <?php
    endwhile;
 else: ?>
        <!-- Pesan Jika Tidak Ada Data -->
        <div class="col-12">
          <div class="no-data" style="padding:50px; background:#1b1b1b; border-radius:16px; box-shadow:0 6px 15px rgba(0,0,0,0.4);">
            <i class="bi bi-exclamation-circle" style="font-size:40px; color:#ff6b6b;"></i>
            <h4 class="mt-3">Belum ada program yang tersedia</h4>
            <p style="color:#ccc;">Silakan tambahkan data program di database untuk menampilkannya di sini.</p>
          </div>
        </div>
      <?php endif; ?>
    </div>
 
</div>

    <!-- Program Cards -->
    <div class="row g-4 justify-content-center">

      <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="program-card" data-level="<?php echo htmlspecialchars($row['level']); ?>">
              <div class="program-img-wrapper">
                <img src="../dist/uploads/<?php echo htmlspecialchars($row['thumbnail']); ?>" alt="<?php echo htmlspecialchars($row['nama_program']); ?>">
              </div>
              <div class="program-content">
                <div class="program-header">
                  <span class="tag"><?php echo htmlspecialchars($row['level']); ?></span>
                  <span class="rating"><i class="bi bi-star-fill text-warning"></i> 5.0</span>
                </div>
                <h5 class="program-title"><?php echo htmlspecialchars($row['nama_program']); ?></h5>
                <p class="program-desc">Program <?php echo htmlspecialchars($row['level']); ?> untuk meningkatkan performa dan kebugaran.</p>
              <div class="program-features">
              <span class="feature"><?php echo htmlspecialchars($row['durasi']); ?> menit</span>
              <!-- <span class="feature">Treadmill</span>
              <span class="feature">Speed</span> -->
            </div>
              </div>
              
            </div>
            
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p>Tidak ada program yang tersedia saat ini.</p>
      <?php endif; ?>

    </div>
  </div>
</section>

<?php
$koneksi->close();
?>

<section class="trainers-section py-5" id="pelatih" style="overflow:visible;">
  <div class="container" data-aos="zoom-in" data-aos-delay="100">
    <div class="text-center mb-5">
      <h2 class="fw-bold section-title">Trainer & Ahli Kebugaran Kami</h2>
      <p class="section-subtitle">Dipandu oleh pelatih profesional dan ahli kesehatan terbaik</p>
    </div>
    <div class="row g-4 justify-content-center" data-aos="fade-up" data-aos-delay="100">
      <?php
      include '../koneksi.php';
      $query = "SELECT * FROM pelatih WHERE status = 'Aktif' ORDER BY nama_pelatih ASC";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $foto = trim($row['foto_pelatih']);
          $fotoPath = !empty($foto) ? "../dist/uploads/pelatih/" . $foto : "https://via.placeholder.com/140?text=No+Image";
          $id_pelatih = $row['id_pelatih'];
          $tanggal_join = date('d M Y', strtotime($row['tanggal_ditambahkan']));
      ?>
          <div class="col-12 col-sm-6 col-lg-4 d-flex justify-content-center">
            <div class="trainer-card text-center p-4 d-flex flex-column align-items-center"
                 style="background:#fff; border-radius:18px; color:#000;
                        box-shadow:0 6px 18px rgba(0,0,0,0.15);
                        transition:all 0.3s ease; width:100%; max-width:340px; height:100%;">
              
              <!-- Foto Pelatih -->
              <div class="trainer-avatar mb-3 position-relative">
                <img src="<?php echo htmlspecialchars($fotoPath); ?>"
                     alt="<?php echo htmlspecialchars($row['nama_pelatih']); ?>"
                     onerror="this.src='https://via.placeholder.com/140?text=No+Image'"
                     style="width:140px; height:140px; border-radius:50%; object-fit:cover; border:4px solid #A0153E; box-shadow:0 0 10px rgba(0,0,0,0.2);">
                <?php if ($row['status'] == 'Aktif'): ?>
                <span class="position-absolute bottom-0 end-0 translate-middle badge rounded-pill bg-success"
                      style="font-size:0.7rem; padding:5px 10px;">
                  <i class="bi bi-check-circle-fill me-1"></i> Aktif
                </span>
                <?php endif; ?>
              </div>

              <!-- Nama & Info -->
              <h5 class="fw-bold mb-1" style="font-size:1.2rem;"><?php echo htmlspecialchars($row['nama_pelatih']); ?></h5>
              <p class="text-muted mb-2" style="font-size:0.95rem;">
                <?php echo !empty($row['spesialisasi']) ? htmlspecialchars($row['spesialisasi']) : 'Pelatih Umum'; ?>
              </p>

              <span class="badge-level mb-2"
                    style="background:#A0153E; color:white; padding:6px 16px; border-radius:25px; font-size:0.9rem;">
                Pelatih Profesional
              </span>
              <p class="trainer-exp mb-3" style="font-size:0.95rem;">
                <strong><?php echo htmlspecialchars($row['pengalaman_tahun']); ?></strong> Tahun Pengalaman
              </p>

              <div class="rating mb-3">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-half text-warning"></i>
                <span style="font-size:0.9rem;">4.9</span>
              </div>

              <div class="trainer-actions d-flex justify-content-center gap-3 mt-auto flex-wrap">
                <button class="btn btn-outline-dark px-4 py-2" 
                        style="border-radius:25px;"
                        data-bs-toggle="modal" 
                        data-bs-target="#modalProfil<?php echo $id_pelatih; ?>">
                  <i class="bi bi-person-circle me-1"></i> Profil
                </button>
                <button class="btn btn-danger px-4 py-2" style="border-radius:25px;">
                  <i class="bi bi-telephone-fill me-1"></i> Kontak
                </button>
              </div>
            </div>
          </div>

          <!-- Modal Profil -->
          <div class="modal fade" id="modalProfil<?php echo $id_pelatih; ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content" style="border-radius:20px; overflow:hidden;">
                <div class="modal-header border-0"
                     style="background:linear-gradient(135deg,#A0153E 0%,#7a0f2e 100%); color:white; padding:2rem;">
                  <div class="d-flex align-items-center gap-3 w-100">
                    <img src="<?php echo htmlspecialchars($fotoPath); ?>"
                         alt="<?php echo htmlspecialchars($row['nama_pelatih']); ?>"
                         style="width:100px; height:100px; border-radius:50%; object-fit:cover;
                                border:4px solid white; box-shadow:0 4px 15px rgba(0,0,0,0.3);">
                    <div class="flex-grow-1">
                      <h4 class="mb-1 fw-bold"><?php echo htmlspecialchars($row['nama_pelatih']); ?></h4>
                      <p class="mb-0"><?php echo htmlspecialchars($row['spesialisasi'] ?: 'Pelatih Umum'); ?></p>
                      <div class="mt-2">
                        <span class="badge bg-light text-dark px-3 py-2 rounded-pill">
                          <i class="bi bi-star-fill text-warning me-1"></i> 4.9 Rating
                        </span>
                        <span class="badge bg-<?php echo $row['status'] == 'Aktif' ? 'success' : 'secondary'; ?> px-3 py-2 rounded-pill ms-2">
                          <i class="bi bi-circle-fill" style="font-size:0.5rem;"></i> <?php echo htmlspecialchars($row['status']); ?>
                        </span>
                      </div>
                    </div>
                  </div>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-4">
                  <div class="row g-4">
                    <!-- Info Pribadi -->
                    <div class="col-md-6">
                      <div class="info-card p-3 rounded" style="background:#f8f9fa;">
                        <h6 class="fw-bold mb-3" style="color:#A0153E;">
                          <i class="bi bi-person-vcard me-2"></i>Informasi Pribadi
                        </h6>
                        <p><i class="bi <?php echo $row['jenis_kelamin'] == 'Laki-laki' ? 'bi-gender-male text-primary' : 'bi-gender-female text-danger'; ?> me-2"></i><?php echo htmlspecialchars($row['jenis_kelamin']); ?></p>
                        <p><i class="bi bi-telephone-fill text-success me-2"></i><?php echo htmlspecialchars($row['no_telepon'] ?: '-'); ?></p>
                        <p><i class="bi bi-envelope-at-fill text-primary me-2"></i><?php echo htmlspecialchars($row['email'] ?: '-'); ?></p>
                        <p><i class="bi bi-geo-alt-fill text-danger me-2"></i><?php echo htmlspecialchars($row['alamat'] ?: '-'); ?></p>
                      </div>
                    </div>

                    <!-- Keahlian -->
                    <div class="col-md-6">
                      <div class="info-card p-3 rounded" style="background:#f8f9fa;">
                        <h6 class="fw-bold mb-3" style="color:#A0153E;">
                          <i class="bi bi-award-fill me-2"></i>Keahlian & Pengalaman
                        </h6>
                        <p><i class="bi bi-lightning-fill text-warning me-2"></i><?php echo htmlspecialchars($row['spesialisasi'] ?: 'Pelatih Umum'); ?></p>
                        <p><i class="bi bi-briefcase-fill text-secondary me-2"></i><?php echo htmlspecialchars($row['pengalaman_tahun']); ?> Tahun Pengalaman</p>
                        <p><i class="bi bi-calendar2-check text-info me-2"></i>Bergabung Sejak <?php echo $tanggal_join; ?></p>
                      </div>
                    </div>

                    <!-- Jadwal -->
                    <div class="col-12">
                      <div class="info-card p-3 rounded" style="background:#f8f9fa;">
                        <h6 class="fw-bold mb-3" style="color:#A0153E;">
                          <i class="bi bi-calendar-week-fill me-2"></i>Jadwal Tersedia
                        </h6>
                        <?php
                        $jadwal = trim($row['jadwal_available']);
                        if (!empty($jadwal)) {
                          $jadwal_array = explode(',', $jadwal);
                          echo '<div class="d-flex flex-wrap gap-2">';
                          foreach ($jadwal_array as $j) {
                            $jadwal_format = date('D, d M Y - H:i', strtotime(trim($j)));
                            echo '<span class="badge bg-light text-dark border px-3 py-2" style="font-size:0.9rem;">';
                            echo '<i class="bi bi-clock-fill me-1 text-danger"></i>' . htmlspecialchars($jadwal_format);
                            echo '</span>';
                          }
                          echo '</div>';
                        } else {
                          echo '<p class="text-muted mb-0"><i class="bi bi-info-circle-fill me-2"></i>Jadwal akan diatur setelah konsultasi.</p>';
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal-footer border-0 p-4" style="background:#f8f9fa;">
                  <button type="button" class="btn btn-light px-4 py-2" data-bs-dismiss="modal" style="border-radius:25px;">
                    <i class="bi bi-x-circle me-2"></i>Tutup
                  </button>
                  <a href="tel:<?php echo $row['no_telepon']; ?>" class="btn px-4 py-2" style="background:#25D366; color:white; border-radius:25px;">
                    <i class="bi bi-whatsapp me-2"></i>WhatsApp
                  </a>
                  <a href="mailto:<?php echo $row['email']; ?>" class="btn px-4 py-2" style="background:#A0153E; color:white; border-radius:25px;">
                    <i class="bi bi-envelope-fill me-2"></i>Email
                  </a>
                </div>
              </div>
            </div>
          </div>
      <?php
        }
      } else {
        echo '<div class="col-12 text-center">';
        echo '<div class="alert alert-info p-4" style="background:#f8f9fa; border:2px dashed #A0153E; color:#333;">';
        echo '<i class="bi bi-info-circle-fill me-2 fs-4"></i><br>Belum ada data pelatih aktif.';
        echo '</div></div>';
      }
      ?>
    </div>
  </div>
</section>


<section class="calendar-container py-5" id="jadwal-section" data-aos="fade-up" data-aos-delay="100" style="background: #1b1b1b;">
  <div class="container">
    <!-- Header -->
    <div class="text-center mb-5">
      <h2 class="fw-bold" style="color: #ff3b3b;">
        <i class="bi bi-calendar-week me-2"></i>
        Jadwal Pelatih Kami
      </h2>
      <p class="text-light fs-5">Lihat jadwal ketersediaan pelatih profesional kami</p>
    </div>

    <!-- Filter Pelatih -->
    <div class="row mb-4 justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-sm border-0" style="border-radius: 20px; background: #fff; transition: transform 0.3s, box-shadow 0.3s;">
          <div class="card-body p-4 text-center">
            <label for="pelatih-select" class="form-label fw-bold mb-3 d-block" style="font-size: 1.25rem; color: #ff3b3b;">
              <i class="bi bi-person-check me-2"></i>Pilih Pelatih
            </label>
            <select id="pelatih-select" class="form-select form-select-lg mx-auto" style="
              border-radius: 12px; 
              background: #fff; 
              color: #1b1b1b; 
              border: 2px solid #ff3b3b; 
              padding: 10px 15px; 
              font-size: 1rem;
              width: 100%;
              max-width: 400px;
              transition: all 0.3s;">
              <option value="" disabled selected>-- Pilih Pelatih --</option>
              <?php
              include '../koneksi.php';
              $query = "SELECT id_pelatih, nama_pelatih, spesialisasi FROM pelatih WHERE status = 'Aktif' ORDER BY nama_pelatih ASC";
              $result = mysqli_query($conn, $query);
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row['id_pelatih'] . '">';
                echo htmlspecialchars($row['nama_pelatih']) ;
                echo '</option>';
              }
              ?>
            </select>
          </div>
        </div>
      </div>
    </div>

    <!-- Status Message -->
    <!-- Status Message -->
<!-- Status Message -->
<div class="d-flex justify-content-center mb-4">
  <div id="status-message" class="alert text-center" style="
    border-radius: 15px; 
    background: #fff; 
    color: #ff3b3b; 
    border: 2px solid #ff3b3b; 
    font-weight: 500; 
    padding: 15px 20px;
    font-size: 1rem;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    min-height: 60px;
    max-width: 500px;
    width: 100%;
    visibility: visible;
  ">
    <i class="bi bi-exclamation-circle me-2" style="font-size: 1.2rem;"></i>
    <span id="status-text">Silakan pilih pelatih untuk melihat jadwal</span>
  </div>
</div>



    <!-- Calendar -->
    <div class="card shadow-lg mt-4 mx-auto" style="border-radius: 20px; overflow: hidden; display: none; background: #2a2a2a; border: 2px solid #ff3b3b; max-width: 900px;" id="calendar-card">
      <div class="card-body p-4">
        <div id="calendar"></div>
      </div>
    </div>
  </div>
</section>

<!-- Modal Detail Jadwal -->
<div class="modal fade" id="jadwalModal" tabindex="-1" aria-labelledby="jadwalModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius: 15px;">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="jadwalModalLabel"><i class="bi bi-calendar-check me-2"></i>Detail Jadwal</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><strong>Pelatih:</strong> <span id="modal-pelatih"></span></p>
        <p><strong>Spesialisasi:</strong> <span id="modal-spesialisasi"></span></p>
        <p><strong>Tanggal:</strong> <span id="modal-tanggal"></span></p>
        <p><strong>Jam:</strong> <span id="modal-jam"></span></p>
        <p><strong>Catatan:</strong> <span id="modal-catatan"></span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>




<!-- Tambahkan Font Awesome jika belum ada -->






<!-- Tambahkan Font Awesome jika belum ada -->




  <!-- SECTION: KOMENTAR & PERTANYAAN -->

<?php
// Tentukan foto untuk form komentar (hanya form input)
$formFoto = isset($_SESSION['id_member']) 
    ? ($_SESSION['foto'] ?? 'https://i.pravatar.cc/150?img=68') 
    : 'https://i.pravatar.cc/150?img=68';
?>
<section id="komentar-pertanyaan" style="
  padding:60px 0 100px;
  background:linear-gradient(135deg,#0a0a0a,#1a1a1a,#3b0d0d);
  font-family:'Poppins',sans-serif;
  min-height:100vh;
">
<div class="container">
  <!-- Judul -->
  <div class="row">
    <div class="col-lg-12 text-center mb-4">
      <div class="section-title center-title">
        <span style="color:#ff2e2e;font-weight:600;">Komentar dan Pertanyaan</span>
        <h2 style="font-weight:700;color:#fff;">Ayo Berkomentar dan Bertanya yang Baik</h2>
      </div>
    </div>
  </div>

  <!-- Wrapper Dua Kolom -->
  <div class="comments-wrapper" style="
    display:flex;
    flex-wrap:wrap;
    gap:30px;
    justify-content:center;
    align-items:flex-start;
  ">
    <!-- KOLOM KOMENTAR -->
    <section id="comments" style="
      flex:1 1 350px;
      max-width:500px;
      background:#fff;
      padding:25px;
      border-radius:18px;
      color:#333;
      box-shadow:0 8px 20px rgba(0,0,0,0.25);
    ">
      <h2 class="comments-title" style="
        text-align:center;
        margin-bottom:20px;
        color:#A0153E;
        font-weight:700;
      ">💬 Komentar Member</h2>

      <!-- FORM KOMENTAR -->
      <form id="commentForm" method="POST" action="<?= isset($_SESSION['id_member']) ? 'proses_komentar.php' : 'login.php' ?>" style="margin-bottom:20px;">
        <div class="form-group" style="margin-bottom:15px; display:flex; align-items:center; gap:10px;">
          <img src="<?= htmlspecialchars($formFoto) ?>" alt="Profil"
               style="width:40px;height:40px;border-radius:50%;object-fit:cover;">
          <input type="text" id="name" 
                 value="<?= htmlspecialchars($_SESSION['nama_member'] ?? '') ?>" 
                 placeholder="<?= isset($_SESSION['id_member']) ? '' : 'Silakan login dulu' ?>" 
                 readonly
                 style="flex:1;padding:10px;border-radius:10px;border:1px solid #ccc;
                        background:<?= isset($_SESSION['id_member']) ? '#f1f1f1' : '#f9f9f9' ?>; color:#333;">
        </div>

        <div class="form-group" style="margin-bottom:15px;">
          <textarea id="comment" name="komentar" placeholder="Tulis komentar Anda..." required
                    style="width:100%;padding:10px;border-radius:10px;border:1px solid #ccc;
                           background:#f9f9f9;min-height:70px;color:#333;"></textarea>
        </div>

        <button type="submit" style="
              background:#A0153E;color:#fff;border:none;border-radius:10px;padding:12px 0;
              cursor:pointer;transition:0.3s;width:100%;font-weight:600;">
          <?= isset($_SESSION['id_member']) ? 'Kirim Komentar' : 'Login untuk Berkomentar' ?>
        </button>
      </form>

      <!-- LIST KOMENTAR -->
      <div id="commentList" style="
        margin-top:10px;display:flex;flex-direction:column;gap:14px;
        max-height:400px;overflow-y:auto;word-wrap:break-word;white-space:normal;padding-right:6px;
      ">
        <?php
        $conn = new mysqli("localhost","root","","gym");
        if($conn->connect_error) die("Koneksi gagal: ".$conn->connect_error);

        // Ambil semua komentar terbaru
        $komentarQuery = $conn->query("SELECT * FROM komentar ORDER BY created_at DESC");
        while($row = $komentarQuery->fetch_assoc()):
            // Gunakan foto dari kolom komentar, fallback ke avatar online jika kosong
            $fotoKomentar = $row['foto'] ?: 'https://i.pravatar.cc/150?img=68';
        ?>
          <div style="display:flex;align-items:flex-start;gap:10px;">
            <img src="<?= htmlspecialchars($fotoKomentar) ?>" style="width:40px;height:40px;border-radius:50%;object-fit:cover;">
            <div style="background:#f1f1f1;padding:10px;border-radius:10px;flex:1;">
              <b><?= htmlspecialchars($row['nama']) ?></b><br>
              <?= nl2br(htmlspecialchars($row['komentar'])) ?>
              <div style="font-size:12px;color:#555;margin-top:5px;">
                <?= date('d M Y H:i', strtotime($row['created_at'])) ?>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </section>

    <!-- KOLOM TANYA AI -->
    <section id="qaGymSection" style="
      flex:1 1 350px;
      max-width:500px;
      background:#fff;
      padding:25px;
      border-radius:18px;
      box-shadow:0 8px 20px rgba(0,0,0,0.25);
      color:#333;
    ">
      <h2 style="text-align:center;color:#A0153E;margin-bottom:20px;">🤔 Tanya AI</h2>
      <form id="qaGymForm" style="display:flex;flex-direction:column;gap:14px;">
        <textarea id="qaGymQuestion" rows="6" required
          placeholder="Contoh: Bagaimana cara membangun otot lengan dalam 3 minggu?"
          style="width:100%;padding:14px;border-radius:10px;border:1px solid #ccc;background:#f9f9f9;font-size:15px;resize:vertical;"></textarea>
        <button type="submit" style="
          width:100%;background:#A0153E;color:#fff;padding:12px 0;border:none;border-radius:10px;font-weight:bold;font-size:16px;cursor:pointer;transition:0.3s;
        ">Kirim Pertanyaan</button>
      </form>

      <div id="qaGymResponseContainer" style="
        margin-top:25px;padding:20px;border-radius:12px;background:#fff8e5;border:1px solid #ffdd99;
      ">
        <h3 style="
          color:#A0153E;font-size:17px;font-weight:600;border-bottom:1px solid #ffdd99;padding-bottom:8px;
        ">Jawaban AI:</h3>
        <div id="qaGymResponseBox" style="
          margin-top:14px;padding:12px;background:#fff;border-radius:10px;min-height:100px;
          max-height:300px;overflow-y:auto;font-size:15px;line-height:1.6;border-left:4px solid #A0153E;
        ">Jawaban akan muncul di sini...</div>
      </div>
    </section>
  </div>
</div>
</section>










<footer class="footer-01 text-light" style="background-image: linear-gradient(to bottom, #5c0a0a, #111111); padding-top: 3rem; padding-bottom: 3rem;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                <h2 class="footer-heading" >FitForge Gym</h2>
                <p>Misi kami adalah membantu Anda mencapai target kebugaran dengan fasilitas terbaik, pelatih profesional, dan komunitas yang suportif.</p>
                <ul class="ftco-footer-social p-0">
                    <li class="ftco-animate" >
                        <a href="#" style="background: #A0153E;" data-toggle="tooltip" data-placement="top" title="YouTube" class="d-flex align-items-center justify-content-center">
                            <i class="bi bi-youtube"></i>
                        </a>
                    </li>
                    <li class="ftco-animate">
                        <a href="#" style="background: #A0153E;" data-toggle="tooltip" data-placement="top" title="Facebook" class="d-flex align-items-center justify-content-center">
                            <i class="bi bi-facebook"></i>
                        </a>
                    </li>
                    <li class="ftco-animate">
                        <a href="#" style="background: #A0153E;" data-toggle="tooltip" data-placement="top" title="Instagram" class="d-flex align-items-center justify-content-center">
                            <i class="bi bi-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                <h2 class="footer-heading">Blog Kebugaran</h2>
                <div class="block-21 mb-4 d-flex">
                    <a class="img mr-4 rounded" style="background-image: url(img/program/1.jpg);"></a>
                    <div class="text">
                        <h3 class="heading"><a href="#">5 Tips Membangun Massa Otot dengan Cepat</a></h3>
                        <div class="meta">
                            <div class="d-flex"><a href="#"><i class="bi bi-calendar-event mr-1"></i> Oct. 20, 2024</a></div>
                            <div class="d-flex"><a href="#"><i class="bi bi-person-fill mr-1"></i> Coach</a></div>
                            <div class="d-flex"><a href="#"><i class="bi bi-chat-dots-fill mr-1"></i> 25</a></div>
                        </div>
                    </div>
                </div>
                <div class="block-21 mb-4 d-flex">
                    <a class="img mr-4 rounded" style="background-image: url(img/program/2.jpg);"></a>
                    <div class="text">
                        <h3 class="heading"><a href="#">Pentingnya Pemanasan Sebelum Latihan</a></h3>
                        <div class="meta">
                            <div class="d-flex"><a href="#"><i class="bi bi-calendar-event mr-1"></i> Oct. 18, 2024</a></div>
                            <div class="d-flex"><a href="#"><i class="bi bi-person-fill mr-1"></i> Coach</a></div>
                            <div class="d-flex"><a href="#"><i class="bi bi-chat-dots-fill mr-1"></i> 12</a></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pl-lg-5 mb-4 mb-md-0">
                <h2 class="footer-heading">Navigasi Cepat</h2>
                <ul class="list-unstyled">
                    <li><a href="#home" class="py-2 d-block">Home</a></li>
                    <li><a href="#about" class="py-2 d-block">About</a></li>
                    <li><a href="#programs" class="py-2 d-block">Program</a></li>
                    <li><a href="#pelatih" class="py-2 d-block">Pelatih</a></li>
                    <li><a href="#komentar-pertanyaan" class="py-2 d-block">Komentar</a></li>
                </ul>
            </div>

            <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                <h2 class="footer-heading">Hubungi Kami</h2>
                <div class="block-23 mb-3">
                    <ul>
                        <li class="d-flex">
                            <i class="bi bi-geo-alt-fill mr-3"></i>
                            <span class="text">Jl. Kebugaran No. 1, Jakarta, Indonesia</span>
                        </li>
                        <li class="d-flex">
                            <a href="#">
                                <i class="bi bi-telephone-fill mr-3"></i>
                                <span class="text">+62 21 555 1234</span>
                            </a>
                        </li>
                        <li class="d-flex">
                            <a href="#">
                                <i class="bi bi-envelope-fill mr-3"></i>
                                <span class="text">info@fitflexgym.com</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12 text-center">
                <p class="copyright">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Template ini dibuat dengan <i class="bi bi-heart-pulse-fill" aria-hidden="true"></i> oleh <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                </p>
            </div>
        </div>
    </div>
</footer>


<!-- <script>
document.addEventListener("DOMContentLoaded", function() {
  const commentForm = document.getElementById('commentForm');
  const commentList = document.getElementById('commentList');
  const isLoggedIn = commentForm.dataset.loggedin === '1'; // cek login

  // Fungsi load komentar
  function loadComments() {
    fetch('load_komentar.php')
      .then(res => res.json())
      .then(data => {
        commentList.innerHTML = '';
        data.forEach(c => {
          const div = document.createElement('div');
          div.style.display = 'flex';
          div.style.alignItems = 'flex-start';
          div.style.gap = '10px';
          div.innerHTML = `
            <img src="${c.foto}" style="width:40px;height:40px;border-radius:50%;object-fit:cover;">
            <div style="background:#f1f1f1;padding:10px;border-radius:10px;flex:1;">
              <b>${c.nama}</b><br>${c.komentar}
            </div>
          `;
          commentList.appendChild(div);
        });
      });
  }

  loadComments();

  // Event submit form komentar
  commentForm.addEventListener('submit', function(e) {
    e.preventDefault();

    // Jika belum login, arahkan ke halaman login
    if(!isLoggedIn){
      window.location.href = 'login.php';
      return;
    }

    // Ambil value komentar
    const komentar = document.getElementById('comment').value.trim();
    if(!komentar) return alert('Komentar tidak boleh kosong');

    // Kirim komentar via fetch
    fetch('proses_komentar.php', {
      method: 'POST',
      headers: { 'Content-Type':'application/x-www-form-urlencoded' },
      body: 'komentar=' + encodeURIComponent(komentar)
    })
    .then(res => res.json())
    .then(res => {
      if(res.error) return alert(res.error);
      document.getElementById('comment').value = '';
      loadComments();
    })
    .catch(err => console.error('Error:', err));
  });
});
</script> -->




<script>
  const buttons = document.querySelectorAll(".btn-program");
  const programs = document.querySelectorAll(".program-item");

  buttons.forEach(btn => {
    btn.addEventListener("click", () => {
      // Hilangkan class aktif di semua tombol
      buttons.forEach(b => b.classList.remove("active"));
      // Tambahkan class aktif ke tombol yang diklik
      btn.classList.add("active");

      const filter = btn.getAttribute("data-filter");

      programs.forEach(card => {
        const level = card.getAttribute("data-level");
        if (filter === "all" || level === filter) {
          card.style.display = "block";
        } else {
          card.style.display = "none";
        }
      });
    });
  });
</script>
<!-- FontAwesome untuk ikon -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Footer Section End -->
 <script>
// === SLIDER FUNCTIONALITY ===
const sliderTrack = document.getElementById('sliderTrack');
const nextBtn = document.getElementById('nextBtn');
const prevBtn = document.getElementById('prevBtn');
const cards = document.querySelectorAll('.popular-card');

let index = 0;
const visibleCards = 3; // jumlah kartu terlihat sekaligus
const totalCards = cards.length;
const cardWidth = 344; // width + gap

function updateSlider() {
  sliderTrack.style.transform = `translateX(-${index * cardWidth}px)`;
}

// Tombol next
nextBtn.addEventListener('click', () => {
  index = (index + 1) % (totalCards - visibleCards + 1);
  updateSlider();
});

// Tombol prev
prevBtn.addEventListener('click', () => {
  index = (index - 1 + (totalCards - visibleCards + 1)) % (totalCards - visibleCards + 1);
  updateSlider();
});

// Auto-slide setiap 4 detik
setInterval(() => {
  index = (index + 1) % (totalCards - visibleCards + 1);
  updateSlider();
}, 4000);
</script>
    <!-- Footer Section End -->
<script>
    // === Count Up Animation ===
const counters = document.querySelectorAll('.counter-value');

counters.forEach(counter => {
  const updateCount = () => {
    const target = +counter.getAttribute('data-target');
    const count = +counter.innerText;
    const increment = target / 200; // kecepatan animasi

    if (count < target) {
      counter.innerText = Math.ceil(count + increment);
      setTimeout(updateCount, 15);
    } else {
      counter.innerText = target + (target > 100 ? "+" : "");
    }
  };

  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        updateCount();
        observer.unobserve(counter);
      }
    });
  }, { threshold: 0.5 });

  observer.observe(counter);
});

</script>
<script>
  // Tambahkan class "scrolled" saat user menggulir
  window.addEventListener('scroll', function() {
    const header = document.querySelector('.header');
    if (window.scrollY > 80) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }
  });

  // Scroll Spy untuk update menu aktif
  document.addEventListener("scroll", () => {
    const sections = document.querySelectorAll("section[id]");
    const scrollPos = window.scrollY + 150;
    const navItems = document.querySelectorAll(".header__nav__menu ul li");

    sections.forEach(section => {
      const top = section.offsetTop;
      const height = section.offsetHeight;
      const id = section.getAttribute("id");

      if (scrollPos >= top && scrollPos < top + height) {
        navItems.forEach(li => li.classList.remove("active"));
        const currentLink = document.querySelector(`.header__nav__menu ul li a[href="#${id}"]`);
        if (currentLink) {
          currentLink.parentElement.classList.add("active");
        }
      }
    });
  });
</script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
  $(document).ready(function(){
    $(".hero__slider").owlCarousel({
      items: 1,           // 1 slide per tampilan
      loop: false,        // ❌ Tidak menggandakan slide
      autoplay: true,     // ✅ Tetap otomatis berganti
      autoplayTimeout: 5000,
      smartSpeed: 800,
      dots: true,
      nav: false,
      animateOut: 'fadeOut',
      animateIn: 'fadeIn'
    });
  });
</script>

<!-- ai  -->
<script>
const GEMINI_API_KEY = "AIzaSyALLmKkqsOMmIeh6rrwn2LzMzDwC3spGoc";
const API_URL = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=" + GEMINI_API_KEY;

const qaForm = document.getElementById('qaGymForm');
const questionTextarea = document.getElementById('qaGymQuestion');
const responseBox = document.getElementById('qaGymResponseBox');

// Cache sederhana di localStorage
function getCache(question) {
    return localStorage.getItem('qaGymCache_' + question);
}
function setCache(question, answer) {
    localStorage.setItem('qaGymCache_' + question, answer);
}

// Fungsi typing effect
function typeText(element, text, speed = 20) {
    element.textContent = '';
    let i = 0;
    const interval = setInterval(() => {
        if (i < text.length) {
            element.textContent += text[i];
            element.scrollTop = element.scrollHeight; // scroll otomatis
            i++;
        } else {
            clearInterval(interval);
        }
    }, speed);
}

qaForm.addEventListener('submit', async function(event){
    event.preventDefault();
    const prompt = questionTextarea.value.trim();
    if(!prompt){ alert("Mohon masukkan pertanyaan."); return; }

    // Cek cache dulu
    const cached = getCache(prompt);
    if(cached){
        typeText(responseBox, cached, 15);
        return;
    }

    // Loading
    responseBox.innerHTML = '<p style="text-align:center; color:#ff3860; font-style:italic;">Memproses pertanyaan, mohon tunggu...</p>';

    try{
        const payload = { contents:[{ parts:[{ text: prompt }] }] };
        const res = await fetch(API_URL, {
            method: 'POST',
            headers: { 'Content-Type':'application/json' },
            body: JSON.stringify(payload)
        });

        if(!res.ok){
            const errData = await res.json().catch(()=>({}));
            throw new Error(errData.error?.message || 'Terjadi kesalahan API');
        }

        const data = await res.json();
        const answer = data?.candidates?.[0]?.content?.parts?.[0]?.text || "Jawaban kosong";

        // Tampilkan jawaban dengan typing effect
        typeText(responseBox, answer, 15);

        // simpan ke cache
        setCache(prompt, answer);

    } catch(err){
        console.error(err);
        responseBox.innerHTML = `<strong>Terjadi Kesalahan:</strong> Gagal mendapatkan jawaban.<br>Pesan Error: ${err.message}<br>Pastikan Kunci API & billing aktif.`;
    }

    questionTextarea.value = '';
});
</script>



<!-- ...gunakan struktur HTML sebelumnya... -->

<!-- FullCalendar CSS & JS -->
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/main.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/locales/id.global.min.js'></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const calendarEl = document.getElementById('calendar');
  const calendarCard = document.getElementById('calendar-card');
  const statusMessage = document.getElementById('status-message');
  const statusText = document.getElementById('status-text');
  const pelatihSelect = document.getElementById('pelatih-select');
  
  let calendar = null;

  function initCalendar() {
    if (calendar) calendar.destroy();

    calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale: 'id',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,listWeek'
      },
      buttonText: { today: 'Hari Ini', month: 'Bulan', week: 'Minggu', list: 'Daftar' },
      height: 'auto',
      dayMaxEvents: true,
      events: [],
      eventClick: function(info) {
        const pelatih = info.event.extendedProps.pelatih || pelatihSelect.options[pelatihSelect.selectedIndex].text;
        const spesialisasi = info.event.extendedProps.spesialisasi || '-';
        const tanggal = info.event.start ? info.event.start.toLocaleDateString('id-ID') : '-';
        const jam = info.event.extendedProps.jam || '-';
        const catatan = info.event.extendedProps.catatan || '-';

        // Set konten modal
        document.getElementById('modal-pelatih').innerText = pelatih;
        document.getElementById('modal-spesialisasi').innerText = spesialisasi;
        document.getElementById('modal-tanggal').innerText = tanggal;
        document.getElementById('modal-jam').innerText = jam;
        document.getElementById('modal-catatan').innerText = catatan;

        // Tampilkan modal
        const jadwalModal = new bootstrap.Modal(document.getElementById('jadwalModal'));
        jadwalModal.show();
      },
      eventDidMount: function(info) {
        info.el.title = info.event.title + ' - ' + info.event.start.toLocaleString('id-ID');
      },
      datesSet: function() {
        calendar.updateSize();
      }
    });

    calendar.render();
  }

  function loadJadwal(pelatihId) {
    if (!pelatihId) {
      calendarCard.style.display = 'none';
      statusMessage.style.display = 'block';
      statusText.textContent = 'Silakan pilih pelatih untuk melihat jadwal';
      return;
    }

    statusMessage.style.display = 'block';
    statusText.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Memuat jadwal pelatih...';
    calendarCard.style.display = 'none';

    fetch(`../dist/php/jadwal_pelatih.php?id=${pelatihId}`)
      .then(res => res.json())
      .then(data => {
        if (!data.success || data.jadwal.length === 0) {
          statusMessage.innerHTML = '<i class="bi bi-calendar-x me-2"></i>Pelatih belum memiliki jadwal tersedia';
          calendarCard.style.display = 'none';
          return;
        }

        const events = data.jadwal.map(item => ({
          title: item.title || 'Training Session',
          start: `${item.tanggal}T${item.waktu}:00`,
          allDay: false,
          backgroundColor: '#A0153E',
          borderColor: '#7a0f2e',
          extendedProps: {
            pelatih: item.nama_pelatih,
            spesialisasi: item.spesialisasi,
            jam: item.waktu,
            catatan: item.catatan || '-'
          }
        }));

        calendarCard.style.display = 'block';
        if (!calendar) initCalendar();
        else calendar.removeAllEvents();

        calendar.addEventSource(events);

        statusMessage.innerHTML = `<i class="bi bi-check-circle me-2"></i>Berhasil memuat ${data.jadwal.length} jadwal untuk ${data.nama_pelatih}`;
        setTimeout(() => { statusMessage.style.display = 'none'; }, 2000);
      })
      .catch(err => {
        console.error(err);
        statusMessage.innerHTML = '<i class="bi bi-x-circle me-2"></i>Gagal memuat jadwal. Silakan coba lagi.';
        calendarCard.style.display = 'none';
      });
  }

  pelatihSelect.addEventListener('change', function() {
    loadJadwal(this.value);
  });

  const urlParams = new URLSearchParams(window.location.search);
  const urlPelatihId = urlParams.get('id');
  if (urlPelatihId) {
    pelatihSelect.value = urlPelatihId;
    loadJadwal(urlPelatihId);
  }

  calendarCard.style.display = 'block';
  initCalendar();
});

</script>


<script>
  const statusMessage = document.getElementById('status-message');
const statusText = document.getElementById('status-text');

function showStatus(message) {
  statusText.innerText = message;
  statusMessage.style.visibility = 'visible';
}

function hideStatus() {
  statusMessage.style.visibility = 'hidden';
}

</script>

<!-- <script>
function renderUserMenu() {
    const userMenu = document.getElementById('userMenu');
    const username = localStorage.getItem('username'); // nama user saat login
    const isLoggedIn = localStorage.getItem('isLoggedIn') === 'true';

    if(isLoggedIn && username){
        // jika sudah login, tampilkan profil dengan dropdown
        userMenu.innerHTML = `
            <div class="profile-container" style="position:relative;">
                <div class="profile-btn">${username} &#x25BC;</div>
                <div class="profile-dropdown">
                    <a href="./profile.html">Profil</a>
                    <a href="#" id="logoutBtn">Logout</a>
                </div>
            </div>
        `;

        const profileBtn = userMenu.querySelector('.profile-btn');
        const dropdown = userMenu.querySelector('.profile-dropdown');
        profileBtn.addEventListener('click', () => {
            dropdown.style.display = dropdown.style.display === 'flex' ? 'none' : 'flex';
        });

        // Logout
        document.getElementById('logoutBtn').addEventListener('click', () => {
            localStorage.removeItem('isLoggedIn');
            localStorage.removeItem('username');
            window.location.reload();
        });

    } else {
        // jika belum login, tampilkan tombol login
        userMenu.innerHTML = `<a href="login.php" class="btn-login">Login</a>`;
    }
}

// jalankan saat halaman load
document.addEventListener('DOMContentLoaded', renderUserMenu);
</script> -->





<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <!-- <script src="js/owl.carousel.min.js"></script> -->
    <script src="js/main.js"></script>
    <!-- <script src="js1/tiny-slider.js"></script>
    <script src="js1/custom.js"></script>
    <script src="js1/aos.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 900,
    easing: 'ease-in-out',
    once: true
  });
</script>


<script>
document.querySelectorAll('.header__nav__menu a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    const headerHeight = document.querySelector('.header').offsetHeight;
    const offset = target.offsetTop - headerHeight + 10; // +10 biar ada jarak kecil
    window.scrollTo({
      top: offset,
      behavior: 'smooth'
    });
  });
});
</script>

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>