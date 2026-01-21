<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Videograph Template">
    <meta name="keywords" content="Videograph, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Videograph | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/main.css">
</head>
<style>
  
    body {
    background: linear-gradient(to bottom, #121212 85%, #5c0a0a);
    
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


  </style>
<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="header__nav__option">
                        <nav class="header__nav__menu mobile-menu">
                            <ul>
                                <li class="active"><a href="./index.html">Home</a></li>
                                <li><a href="./about.html">About</a></li>
                                <li><a href="./portfolio.html">Portfolio</a></li>
                                <li><a href="./services.html">Services</a></li>
                                <li><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="./about.html">About</a></li>
                                        <li><a href="./portfolio.html">Portfolio</a></li>
                                        <li><a href="./blog.html">Blog</a></li>
                                        <li><a href="./blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="./contact.html">Contact</a></li>
                            </ul>
                        </nav>
                        <div class="header__nav__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero">
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

   <section class="about py-5 spotlight" id="about" style="position: relative; overflow: hidden; background: linear-gradient(
  to bottom,
  #22252B 0%,       /* abu kehitaman lembut di atas */
  #111111 65%,      /* transisi ke hitam pekat di tengah */
  rgba(160, 21, 62, 0.2) 85%, /* merah samar di bawah */
  rgba(160, 21, 62, 0.4) 100% /* sedikit lebih terang di dasar */
);
color: #fff;
">
  <div class="container">
    <div class="row align-items-center gy-5">

      <!-- Kolom Gambar -->
      <div class="col-lg-6">
        <div class="position-relative d-flex justify-content-center align-items-center" style="min-height: 400px;">
          <div class="about-img img-left"></div>
          <div class="about-img img-center"></div>
          <div class="about-img img-right"></div>
        </div>
      </div>

      <!-- Kolom Teks -->
      <div class="col-lg-6">
        <div class="ps-lg-4">
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

          <a href="#" class="btn btn-danger mt-3 px-4 py-2" style="border-radius: 30px; font-weight: 600; background: #E63946; border: none;">
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

<section class="all-programs py-5" id="programs" style="background: linear-gradient(135deg, #0b0b0b, #1a0a0a, #5c0a0a); color: #fff;">
  <div class="container text-center" data-aos="fade-up" data-aos-duration="1000">

    <!-- Section Title -->
    <div class="section-header mb-5" data-aos="zoom-in" data-aos-delay="200">
      <span class="subtitle">Our Programs</span>
      <h2 class="section-title">All Fitness Programs</h2>
      <p class="section-desc">Pilih program latihan yang sesuai dengan level dan tujuan kebugaranmu.</p>
    </div>

    <!-- Filter Buttons -->
    <div class="program-filters mb-5">
      <button class="btn btn-program active">All Programs</button>
      <button class="btn btn-program">Beginner</button>
      <button class="btn btn-program">Intermediate</button>
      <button class="btn btn-program">Advanced</button>
      <button class="btn btn-program">Nutrition</button>
    </div>

    <!-- Program Cards -->
    <div class="row g-4 justify-content-center">

      <!-- Card 1 -->
      <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
        <div class="program-card">
          <div class="program-img-wrapper">
            <img src="img/program/1.jpg" alt="Muscle Forge Program">
          </div>
          <div class="program-content">
            <div class="program-header">
              <span class="tag">Strength</span>
              <span class="rating"><i class="bi bi-star-fill text-warning"></i> 4.9</span>
            </div>
            <h5 class="program-title">Muscle Forge Program</h5>
            <p class="program-desc">Bangun otot dan tingkatkan kekuatanmu dengan program berbasis progresif overload.</p>
            <div class="program-features">
              <span class="feature">Weightlifting</span>
              <span class="feature">Protein Plan</span>
              <span class="feature">Endurance</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="200">
        <div class="program-card">
          <div class="program-img-wrapper">
            <img src="img/program/2.jpg" alt="HIIT & Fat Burn">
          </div>
          <div class="program-content">
            <div class="program-header">
              <span class="tag">Cardio</span>
              <span class="rating"><i class="bi bi-star-fill text-warning"></i> 4.8</span>
            </div>
            <h5 class="program-title">HIIT & Fat Burn</h5>
            <p class="program-desc">Latihan intensitas tinggi untuk membakar kalori secara cepat dan efisien.</p>
            <div class="program-features">
              <span class="feature">HIIT</span>
              <span class="feature">Treadmill</span>
              <span class="feature">Speed</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="300">
        <div class="program-card">
          <div class="program-img-wrapper">
            <img src="img/program/concentrated-young-sportsman-make-sport-exercises.jpg" alt="Yoga & Mind Balance">
          </div>
          <div class="program-content">
            <div class="program-header">
              <span class="tag">Flexibility</span>
              <span class="rating"><i class="bi bi-star-fill text-warning"></i> 5.0</span>
            </div>
            <h5 class="program-title">Yoga & Mind Balance</h5>
            <p class="program-desc">Raih keseimbangan tubuh dan pikiran melalui latihan yoga dan meditasi harian.</p>
            <div class="program-features">
              <span class="feature">Yoga</span>
              <span class="feature">Mindfulness</span>
              <span class="feature">Relaxation</span>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
<section class="trainers-section py-5" id="pelatih">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold section-title">Trainer & Ahli Kebugaran Kami</h2>
      <p class="section-subtitle">Dipandu oleh pelatih profesional dan ahli kesehatan terbaik</p>
    </div>

    <div class="row g-4">
      <!-- Trainer 1 -->
      <div class="col-12 col-md-6 col-lg-4">
        <div class="trainer-card">
          <div class="trainer-avatar">
            <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=200&h=200&fit=crop" alt="Trainer 1">
            <span class="status-dot online"></span>
          </div>
          <h5 class="trainer-name">Dr. Jennifer Morgan</h5>
          <p class="trainer-role">Ahli Kardiologi & Fitness Coach</p>
          <span class="badge-level">Elite Trainer</span>
          <p class="trainer-exp">18 Tahun Pengalaman</p>
          <div class="rating">
            <span class="stars">★★★★★</span>
            <span class="rating-value">4.9</span>
          </div>
          <div class="trainer-actions">
            <button class="btn btn-outline-custom">Profil</button>
            <button class="btn btn-primary-custom">Konsultasi</button>
          </div>
        </div>
      </div>

      <!-- Trainer 2 -->
      <div class="col-12 col-md-6 col-lg-4">
        <div class="trainer-card">
          <div class="trainer-avatar">
            <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?w=200&h=200&fit=crop" alt="Trainer 2">
            <span class="status-dot online"></span>
          </div>
          <h5 class="trainer-name">Robert Kim</h5>
          <p class="trainer-role">Ahli Nutrisi & Strength Coach</p>
          <span class="badge-level">Master Trainer</span>
          <p class="trainer-exp">12 Tahun Pengalaman</p>
          <div class="rating">
            <span class="stars">★★★★☆</span>
            <span class="rating-value">4.8</span>
          </div>
          <div class="trainer-actions">
            <button class="btn btn-outline-custom">Profil</button>
            <button class="btn btn-primary-custom">Jadwalkan</button>
          </div>
        </div>
      </div>

      <!-- Trainer 3 -->
      <div class="col-12 col-md-6 col-lg-4">
        <div class="trainer-card">
          <div class="trainer-avatar">
            <img src="https://images.unsplash.com/photo-1594824476967-48c8b964273f?w=200&h=200&fit=crop" alt="Trainer 3">
            <span class="status-dot online"></span>
          </div>
          <h5 class="trainer-name">Sarah Thompson</h5>
          <p class="trainer-role">Pelatih Yoga & Rehabilitasi</p>
          <span class="badge-level">Pro Trainer</span>
          <p class="trainer-exp">10 Tahun Pengalaman</p>
          <div class="rating">
            <span class="stars">★★★★★</span>
            <span class="rating-value">5.0</span>
          </div>
          <div class="trainer-actions">
            <button class="btn btn-outline-custom">Profil</button>
            <button class="btn btn-primary-custom">Pesan</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="komentar-pertanyaan" style="
  padding: 60px 0 100px; 
  background: linear-gradient(135deg, #0a0a0a, #1a1a1a, #3b0d0d);
  font-family: 'Poppins', sans-serif;
  overflow: hidden;
  position: relative;
  z-index: 1;
  min-height: 100vh;
">
  <div class="container" >
    <!-- Judul -->
    <div class="row">
      <div class="col-lg-12 text-center mb-4">
        <div class="section-title center-title">
          <span style="color:#ff2e2e; font-weight:600;">Komentar dan Pertanyaan</span>
          <h2 style="font-weight:700; color:#fff;">Ayo Berkomentar dan Bertanya yang Baik</h2>
        </div>
      </div>
    </div>

    <!-- Dua Kolom -->
    <div class="comments-wrapper" style="
      display: flex; 
      flex-wrap: wrap; 
      gap: 30px; 
      justify-content: center; 
      align-items: flex-start;
    ">

      <!-- KOMENTAR -->
      <section id="comments" style="
        flex: 1 1 350px; 
        max-width: 500px; 
        background: #ffffff; 
        padding: 25px; 
        border-radius: 18px; 
        color: #333; 
        box-shadow: 0 8px 20px rgba(0,0,0,0.25);
      ">
        <h2 class="comments-title" style="
          text-align:center; 
          margin-bottom:20px; 
          color:#A0153E; 
          font-weight:700;
        ">💬 Komentar Member</h2>

        <form id="commentForm" style="margin-bottom:20px;">
          <div class="form-group" style="margin-bottom:15px;">
            <label for="name" style="font-weight:600;">Nama</label>
            <input type="text" id="name" placeholder="Masukkan nama Anda" required
              style="width:100%; padding:10px; border-radius:10px; border:1px solid #ccc; background:#f9f9f9; color: black;">
          </div>

          <div class="form-group" style="margin-bottom:15px;">
            <label for="comment" style="font-weight:600;">Komentar</label>
            <textarea id="comment" placeholder="Tulis komentar Anda..." required
              style="width:100%; padding:10px; border-radius:10px; border:1px solid #ccc; background:#f9f9f9; min-height:70px; color: black;"></textarea>
          </div>

          <button type="submit" style="
            background:#A0153E; 
            color:#fff; 
            border:none; 
            border-radius:10px; 
            padding:12px 0; 
            cursor:pointer; 
            transition:0.3s; 
            width:100%; 
            font-weight:600;
          ">
            Kirim Komentar
          </button>
        </form>

        <div id="commentList" style="
          margin-top:10px; 
          display:flex; 
          flex-direction:column; 
          gap:14px; 
          max-height:270px; 
          overflow-y:auto; 
          padding-right:6px;
        "></div>
      </section>

      <!-- TANYA AI -->
      <section id="qaGymSection" style="
        flex: 1 1 350px; 
        max-width: 500px; 
        background: #ffffff; 
        padding: 25px; 
        border-radius: 18px; 
        box-shadow: 0 8px 20px rgba(0,0,0,0.25); 
        color: #333;
      ">
        <h2 style="text-align:center; color:#A0153E; margin-bottom:20px;">🤔 Tanya AI</h2>

        <form id="qaGymForm" style="display:flex; flex-direction:column; gap:14px;">
          <label for="qaGymQuestion" style="color:#A0153E; font-weight:600;">Tulis Pertanyaan Anda:</label>
          <textarea id="qaGymQuestion" rows="6" required
            placeholder="Contoh: Bagaimana cara membangun otot lengan dalam 3 minggu?"
            style="width:100%; padding:14px; border-radius:10px; border:1px solid #ccc; background:#f9f9f9; font-size:15px; resize:vertical;"></textarea>
          <button type="submit" style="
            width:100%; 
            background:#A0153E; 
            color:#fff; 
            padding:12px 0; 
            border:none; 
            border-radius:10px; 
            font-weight:bold; 
            font-size:16px; 
            cursor:pointer; 
            transition:0.3s;
          ">
            Kirim Pertanyaan
          </button>
        </form>

        <div id="qaGymResponseContainer" style="
          margin-top:25px; 
          padding:20px; 
          border-radius:12px; 
          background:#fff8e5; 
          border:1px solid #ffdd99;
        ">
          <h3 style="
            color:#A0153E; 
            font-size:17px; 
            font-weight:600; 
            border-bottom:1px solid #ffdd99; 
            padding-bottom:8px;
          ">Jawaban AI:</h3>
          <div id="qaGymResponseBox" style="
            margin-top:14px; 
            padding:12px; 
            background:#fff; 
            border-radius:10px; 
            min-height:100px; 
            max-height:300px; 
            overflow-y:auto; 
            font-size:15px; 
            line-height:1.6; 
            border-left:4px solid #A0153E;
          ">
            Jawaban akan muncul di sini...
          </div>
        </div>
      </section>
    </div>

    <!-- KARTU MOTIVASI -->
    <div class="cards-wrapper" style="
      display:grid; 
      grid-template-columns:repeat(auto-fit,minmax(220px,1fr)); 
      gap:25px; 
      margin-top:60px;
    ">
      <div class="shine-card">
        <div class="card-icon">💪</div>
        <h4>Tip #1</h4>
        <p>Lakukan pemanasan sebelum latihan untuk mengurangi cedera.</p>
      </div>
      <div class="shine-card">
        <div class="card-icon">🔥</div>
        <h4>Motivasi</h4>
        <p>Push yourself because no one else is going to do it for you.</p>
      </div>
      <div class="shine-card">
        <div class="card-icon">💧</div>
        <h4>Tip #2</h4>
        <p>Minum cukup air agar tubuh tetap terhidrasi selama latihan.</p>
      </div>
      <div class="shine-card">
        <div class="card-icon">🥗</div>
        <h4>Tips Nutrisi</h4>
        <p>Penuhi protein dan sayuran untuk hasil latihan optimal.</p>
      </div>
    </div>
  </div>
</section>

<footer style="
  background: linear-gradient(135deg, #0a0a0a, #1a1a1a, #3b0d0d);
  color: #fff;
  text-align: center;
  padding: 60px 20px 40px;
  font-family: 'Poppins', sans-serif;
  position: relative;
  bottom: 0;
  width: 100%;
  border-top: 2px solid #A0153E;
  box-shadow: 0 -2px 15px rgba(160,21,62,0.4);
  overflow: hidden;
">

  <!-- Efek Glow di atas footer -->
  <div style="
    position: absolute;
    top: -40px;
    left: 50%;
    transform: translateX(-50%);
    width: 200px;
    height: 80px;
    background: radial-gradient(circle, rgba(160,21,62,0.6) 0%, transparent 70%);
    filter: blur(25px);
    z-index: 0;
  "></div>

  <div style="position: relative; z-index: 1; max-width: 1100px; margin: 0 auto;">
    <!-- Logo / Judul -->
    <h2 style="
      font-size: 28px; 
      color:#ff2e2e; 
      margin-bottom: 10px; 
      letter-spacing: 1px;
      text-shadow: 0 0 10px rgba(255,46,46,0.4);
    ">
      🏋️‍♂️ GymZone
    </h2>

    <!-- Motto -->
    <p style="
      margin-bottom: 28px; 
      font-size: 16px; 
      color:#ccc; 
      line-height: 1.6;
      max-width: 700px; 
      margin-left: auto; 
      margin-right: auto;
    ">
      "Dedikasi, Disiplin, dan Determinasi — Kunci menuju tubuh impianmu.  
      Jadilah versi terbaik dari dirimu setiap hari!"
    </p>

    <!-- Social Media Links -->
    <div style="
      display:flex; 
      justify-content:center; 
      gap:18px; 
      margin-bottom:25px;
      flex-wrap: wrap;
    ">
      <a href="#" title="Instagram" style="
        background: #1a1a1a;
        border: 2px solid #A0153E;
        color: #ff2e2e;
        width: 42px;
        height: 42px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        text-decoration: none;
        font-size: 18px;
        transition: all 0.3s ease;
        box-shadow: 0 0 8px rgba(160,21,62,0.3);
      " onmouseover="this.style.background='#A0153E'; this.style.color='#fff'; this.style.boxShadow='0 0 15px #A0153E';" 
         onmouseout="this.style.background='#1a1a1a'; this.style.color='#ff2e2e'; this.style.boxShadow='0 0 8px rgba(160,21,62,0.3)';">
        <i class="fab fa-instagram"></i>
      </a>

      <a href="#" title="Facebook" style="
        background: #1a1a1a;
        border: 2px solid #A0153E;
        color: #ff2e2e;
        width: 42px;
        height: 42px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        text-decoration: none;
        font-size: 18px;
        transition: all 0.3s ease;
        box-shadow: 0 0 8px rgba(160,21,62,0.3);
      " onmouseover="this.style.background='#A0153E'; this.style.color='#fff'; this.style.boxShadow='0 0 15px #A0153E';" 
         onmouseout="this.style.background='#1a1a1a'; this.style.color='#ff2e2e'; this.style.boxShadow='0 0 8px rgba(160,21,62,0.3)';">
        <i class="fab fa-facebook-f"></i>
      </a>

      <a href="#" title="YouTube" style="
        background: #1a1a1a;
        border: 2px solid #A0153E;
        color: #ff2e2e;
        width: 42px;
        height: 42px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        text-decoration: none;
        font-size: 18px;
        transition: all 0.3s ease;
        box-shadow: 0 0 8px rgba(160,21,62,0.3);
      " onmouseover="this.style.background='#A0153E'; this.style.color='#fff'; this.style.boxShadow='0 0 15px #A0153E';" 
         onmouseout="this.style.background='#1a1a1a'; this.style.color='#ff2e2e'; this.style.boxShadow='0 0 8px rgba(160,21,62,0.3)';">
        <i class="fab fa-youtube"></i>
      </a>
    </div>

    <!-- Garis Pembatas -->
    <hr style="width:80%; margin:20px auto; border: none; border-top:1px solid rgba(255,255,255,0.1);">

    <!-- Hak Cipta -->
    <p style="font-size: 13px; color:#777;">
      © 2025 <span style="color:#ff2e2e;">GymZone</span>. All Rights Reserved.
    </p>
  </div>
</footer>

<!-- FontAwesome untuk ikon -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


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
<script>
const form = document.getElementById("commentForm");
const commentList = document.getElementById("commentList");

// 🔹 Ambil data komentar dari localStorage
function loadComments() {
  const savedComments = JSON.parse(localStorage.getItem("comments")) || [];
  commentList.innerHTML = "";
  savedComments.forEach(c => {
    // Jika tidak ada time (data lama), isi dengan waktu saat ini
    const time = c.time 
      ? c.time 
      : new Date().toLocaleString("id-ID", { dateStyle: "medium", timeStyle: "short" });
    renderComment(c.name, c.text, time, false);
  });
}

// 🔹 Simpan ke localStorage
function saveCommentToLocalStorage(name, text, time) {
  const savedComments = JSON.parse(localStorage.getItem("comments")) || [];
  savedComments.unshift({ name, text, time });
  localStorage.setItem("comments", JSON.stringify(savedComments));
}

// 🔹 Render komentar ke layar
function renderComment(name, text, time, showNotif = true) {
  // Ambil huruf pertama saja dari nama (hilangkan simbol/emoji)
  const cleanName = name.replace(/[^A-Za-z\u00C0-\u024F\u1E00-\u1EFF]/g, "").trim();
  const initial = cleanName.charAt(0).toUpperCase() || "👤";

  const commentBox = document.createElement("div");
  commentBox.classList.add("comment-card");
  commentBox.innerHTML = `
    <div class="comment-header">
      <div class="avatar" style="
        background:#A0153E;
        color:#fff;
        font-weight:700;
        font-size:18px;
        width:40px;
        height:40px;
        border-radius:50%;
        display:flex;
        align-items:center;
        justify-content:center;
        box-shadow:0 0 6px rgba(160,21,62,0.5);
      ">${initial}</div>
      <div class="comment-info" style="margin-left:10px;">
        <strong class="comment-name" style="display:block;">${name}</strong>
        <span class="comment-time" style="font-size:12px; color:#777;">${time}</span>
      </div>
    </div>
    <p class="comment-text" style="margin-top:8px; line-height:1.6;">${text}</p>
  `;
  commentList.prepend(commentBox);

  // 🔔 Notifikasi sukses
  if (showNotif) {
    const notif = document.createElement("div");
    notif.textContent = "✅ Komentar berhasil dikirim!";
    notif.classList.add("notif");
    notif.style.position = "fixed";
    notif.style.bottom = "20px";
    notif.style.right = "20px";
    notif.style.background = "#A0153E";
    notif.style.color = "#fff";
    notif.style.padding = "10px 16px";
    notif.style.borderRadius = "10px";
    notif.style.fontWeight = "600";
    notif.style.boxShadow = "0 0 10px rgba(160,21,62,0.6)";
    notif.style.zIndex = "999";
    document.body.appendChild(notif);
    setTimeout(() => notif.remove(), 2500);
  }
}

// 🔹 Event submit form
form.addEventListener("submit", e => {
  e.preventDefault();

  const name = document.getElementById("name").value.trim();
  const text = document.getElementById("comment").value.trim();
  if (!name || !text) return;

  const time = new Date().toLocaleString("id-ID", { dateStyle: "medium", timeStyle: "short" });
  renderComment(name, text, time);
  saveCommentToLocalStorage(name, text, time);

  // Reset form
  form.reset();
});

// 🔹 Saat halaman dimuat, tampilkan komentar lama
window.addEventListener("DOMContentLoaded", loadComments);
</script>



<!-- ...gunakan struktur HTML sebelumnya... -->





    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <!-- <script src="js1/tiny-slider.js"></script>
    <script src="js1/custom.js"></script>
    <script src="js1/aos.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</body>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 900,
    easing: 'ease-in-out',
    once: true
  });
</script>
<!-- AOS CSS (di dalam <head>) -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<!-- AOS JS (sebelum penutup </body>) -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000, // durasi animasi (ms)
    once: true,     // animasi hanya jalan sekali
    offset: 100,    // jarak muncul animasi dari viewport
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

</body>
</html>