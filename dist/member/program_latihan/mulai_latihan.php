<?php
include '../../../koneksi.php';

$id_latihan = intval($_GET['id_latihan'] ?? 0);
// terima keduanya: ?id_program=... atau ?program=...
$id_program_member = intval($_GET['id_program'] ?? $_GET['program'] ?? 0);



// Ambil data latihan beserta kategori + durasi (pakai rest_time dari program_latihan jika ada)
$query = "SELECT l.*, k.nama_kategori, pl.rest_time AS durasi, pl.id_program 
          FROM latihan l
          LEFT JOIN kategori_latihan k ON l.id_kategori = k.id_kategori
          LEFT JOIN program_latihan pl ON pl.id_latihan = l.id_latihan AND pl.id_program = " . $id_program_member . "
          WHERE l.id_latihan = $id_latihan
          LIMIT 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if(!$row){
    echo "Latihan tidak ditemukan!";
    exit;
}

// Gambar tambahan
$images = [];
for($i=1; $i<=4; $i++){
    if(!empty($row['gambar'.$i])){
        $images[] = $row['gambar'.$i];
    }
}

// Durasi latihan (pakai rest_time yang di-alias 'durasi')
$durasi = intval($row['durasi'] ?? 0);
$durasi_display = gmdate("i:s", max($durasi,0));
?>

<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <title>FitForge | Mulai Program Latihan</title>
    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->
    <!--begin::Primary Meta Tags-->
    <meta name="title" content="AdminLTE v4 | Dashboard" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS. Fully accessible with WCAG 2.1 AA compliance."
    />
    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard, accessible admin panel, WCAG compliant"
    />
    <!--end::Primary Meta Tags-->
    <!--begin::Accessibility Features-->
    <!-- Skip links will be dynamically added by accessibility.js -->
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="../../css/adminlte.css" as="style" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <!--end::Accessibility Features-->
    <!--begin::Fonts-->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css" rel="stylesheet">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
      crossorigin="anonymous"
      media="print"
      onload="this.media='all'"
    />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="../../css/adminlte.css" />
    <!--end::Required Plugin(AdminLTE)-->
    <!-- apexcharts -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
      integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
      crossorigin="anonymous"
    />
    <!-- jsvectormap -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
      integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4="
      crossorigin="anonymous"
    />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
/>
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <!-- <div id="loading-screen" class="d-flex flex-column justify-content-center align-items-center vh-100 bg-light position-fixed w-100 top-0 start-0 z-3">
    <div class="spinner-border text-primary mb-3" style="width: 3rem; height: 3rem;" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
    <h5 class="text-primary">Memuat data...</h5>
  </div> -->
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
 <?php
// === Tentukan foto profil yang akan ditampilkan ===
if (!empty($user['foto_profile'])) {
  // Jika file profil dia berupa URL (dari Google)
  if (filter_var($user['foto_profile'], FILTER_VALIDATE_URL)) {
    $profilePhoto = $user['foto_profile'];
  } else {
    // Jika sudah pernah upload lokal
    $profilePhoto = "../../uploads/" . htmlspecialchars($user['foto_profile']);
  }
} else {
  // Default jika belum punya foto sama sekali
  $profilePhoto = "https://cdn-icons-png.flaticon.com/512/1946/1946429.png";
}
?>
<nav class="app-header navbar navbar-expand-lg px-3"
  style="
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1050;
    background: linear-gradient(180deg, #801837 0%, #4a0f23 100%);
    box-shadow:
      inset 0 1px 3px rgba(255,255,255,0.08),
      0 4px 12px rgba(0,0,0,0.5),
      0 0 10px rgba(0,0,0,0.4);
    backdrop-filter: blur(6px);
    border: none;
    height: 75px;
  ">
  <div class="container-fluid d-flex justify-content-between align-items-center py-2">

    <!-- === KIRI: Nama Aplikasi === -->
    <div class="d-flex align-items-center gap-2">
      <h4 class="m-0 fw-bold text-white" style="font-size: 1.3rem;">FitForge Gym</h4>
    </div>

    <!-- === TOMBOL TOGGLER (Mobile) === -->
    <button class="navbar-toggler text-white border-0 p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <i class="bi bi-list fs-2"></i>
    </button>

    <!-- === KONTEN NAVBAR === -->
    <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
      <div class="d-flex flex-column flex-lg-row align-items-lg-center gap-3 text-white p-3 p-lg-0 rounded-3">

        <!-- Jam & Tanggal -->
        <div class="d-flex flex-column align-items-center align-items-lg-start text-center text-lg-start">
          <div class="d-flex align-items-center gap-2">
            <i class="bi bi-clock-fill text-white"></i>
            <span id="clock" class="fw-semibold"></span>
          </div>
          <small id="date" class="text-light opacity-75"></small>
        </div>

        <!-- Progress Level (Sementara statis karena belum ada exp system) -->
        <?php
// Ambil data user
$userQuery = mysqli_query($conn, "
  SELECT nama, level, streak_hari 
  FROM member 
  WHERE id_member = '$id_member'
");
$user = mysqli_fetch_assoc($userQuery);

// Batas untuk naik level (harus sama dengan di update_progress.php)
$levelUpThreshold = 100;
$streakPercent = min(100, round(($user['streak_hari'] / $levelUpThreshold) * 100, 0));
?>

<div class="d-flex flex-column align-items-center align-items-lg-start text-center text-lg-start">
  <span class="fw-bold m-0">
    Level <?= htmlspecialchars($user['level']); ?>
  </span>
  <div class="progress" style="width:150px; height:8px; background:rgba(255,255,255,0.2); border-radius:10px; overflow:hidden;">
    <div class="progress-bar"
      style="
        width: <?= $streakPercent; ?>%;
        background: linear-gradient(90deg, #00ffa3, #00cc88);
        box-shadow: 0 0 6px rgba(0,255,163,0.6);
        transition: width 0.6s ease;
      ">
    </div>
  </div>
  <small class="text-light">
    <?= ($streakPercent < 100) 
      ? "Progress: {$streakPercent}% ({$user['streak_hari']}/{$levelUpThreshold} latihan)"
      : "🎉 Level Up! Keep Going!"; ?>
  </small>
</div>


        <!-- Profil User -->
        <div class="dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center gap-2 text-white p-0" data-bs-toggle="dropdown" href="#">
            <img src="<?= $profilePhoto; ?>"
     alt="Profile" width="38" height="38"
     class="rounded-circle"
     style="object-fit: cover; box-shadow: 0 0 10px rgba(255,255,255,0.25); border: 2px solid rgba(255,255,255,0.25);">
            <span class="fw-semibold" style="font-size: 0.95rem;"><?= htmlspecialchars($user['nama']); ?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="profile.php">Profil Saya</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="logout.php">Keluar</a></li>
          </ul>
        </div>

      </div>
    </div>
  </div>
</nav>

<!-- Biar konten tidak ketimpa navbar -->
<main style="padding-top: 65px;">
  <!-- Konten utama -->
</main>

<script>
  // Jam & Tanggal realtime
  function updateDateTime() {
    const now = new Date();
    document.getElementById("clock").textContent = now.toLocaleTimeString("id-ID", { hour: "2-digit", minute: "2-digit" });
    document.getElementById("date").textContent = now.toLocaleDateString("id-ID", { weekday: "long", day: "numeric", month: "long" });
  }
  setInterval(updateDateTime, 1000);
  updateDateTime();
</script>
      
      <!--end::Header-->
      <!--begin::Sidebar-->
     
      <!--end::Sidebar-->
      <!--begin::App Main-->
      
    <!-- Breadcrumb -->

      
      <!--end::Header-->
      <!--begin::Sidebar-->
     
      <!--end::Sidebar-->
      <!--begin::App Main-->
      <main class="app-main" style="padding-top:70px;">
        <!-- Breadcrumb -->
<div class="breadcrumb">
  <a href="latihan.html" class="breadcrumb-link">Latihan</a>
  <span class="separator">›</span>
  <a href="latihan.html" class="breadcrumb-link">Latihan</a>
  <span class="separator">›</span>
  <span class="current">Push Up</span>
</div>

<style>
 /* 🌟 Breadcrumb Clean Style */
.breadcrumb {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 1.1rem;
  font-weight: 600;
  color: #fff;
  margin-bottom: 1.2rem;
}

/* 🔗 Link Style */
.breadcrumb-link {
  position: relative;
  color: #ffb6c1;
  text-decoration: none;
  transition: all 0.3s ease;
}

.breadcrumb-link::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: -3px;
  width: 0%;
  height: 2px;
  background: linear-gradient(90deg, #ff5f6d, #ffc371);
  border-radius: 2px;
  transition: width 0.3s ease;
}

.breadcrumb-link:hover {
  color: #fff;
}

.breadcrumb-link:hover::after {
  width: 100%;
}

/* › Separator */
.separator {
  color: #f2a2b0;
  font-size: 1.3rem;
  opacity: 0.7;
}

/* Current text */
.current {
  color: #fff;
  font-weight: 500;
  opacity: 0.9;
  transition: opacity 0.3s ease;
}

.breadcrumb:hover .current {
  opacity: 1;
}


</style>

<div class="app-content">
  <!-- DASHBOARD CARDS -->
  <div class="exercise-card">
    <div class="exercise-page">

      <!-- Header -->
      <div class="exercise-header">
        <div class="exercise-title">
          <h2><?= htmlspecialchars($row['nama_latihan']) ?></h2>
          <p class="muscle">
            Muscle: <span><?= htmlspecialchars($row['nama_kategori']) ?></span>
          </p>
        </div>

        <?php if (!empty($row['video'])): ?>
          <button class="video-btn">
            <i class="fas fa-play"></i>
          </button>
        <?php endif; ?>
      </div>

      <?php
        $id_program_member = $_GET['id_program_member'];
        $id_latihan = $_GET['id_latihan'];
        $durasi = isset($_GET['durasi']) ? (int)$_GET['durasi'] : 60; // default 60 detik
        $id_program_member = intval($_GET['id_program_member'] ?? 0);
        $id_program = intval($_GET['id_program'] ?? 0);
        $id_latihan = intval($_GET['id_latihan'] ?? 0);
        $durasi = intval($_GET['durasi'] ?? 60);

        // Ambil data latihan
        $query = mysqli_query($conn, "SELECT * FROM latihan WHERE id_latihan = '$id_latihan'");
        $latihan = mysqli_fetch_assoc($query);
      ?>

      <!-- Timer -->
      <div class="timer-container">
        <div class="timer-label" id="labelT">Timer:</div>
        <div id="timerDisplay" class="timer"><?= $durasi_display ?></div>
      </div>

      <script>
        document.addEventListener("DOMContentLoaded", () => {
          let totalSeconds = <?= (int)$durasi ?>;
          const timerDisplay = document.getElementById("timerDisplay");
          const labelT = document.querySelector(".timer-label");

          // ⚙️ Ambil data dari PHP
          const idProgramMember = <?= (int)$id_program_member ?>;
          const idLatihan = <?= (int)$id_latihan ?>;

          // Format waktu mm:ss
          function formatTime(sec) {
            const m = String(Math.floor(sec / 60)).padStart(2, "0");
            const s = String(sec % 60).padStart(2, "0");
            return `${m}:${s}`;
          }

          // Tampilkan waktu awal
          timerDisplay.textContent = formatTime(totalSeconds);

          // Fungsi yang dijalankan setelah timer selesai
          function finishLatihan() {
            if (timerDisplay) timerDisplay.style.display = "none";
            if (labelT) labelT.style.display = "none";

            const selesaiBtn = document.createElement("button");
            selesaiBtn.textContent = "✅ Latihan Selesai — Klik untuk Simpan";
            selesaiBtn.className = "btn btn-success w-100 mt-3 fw-semibold";

            // Saat tombol diklik
            selesaiBtn.onclick = async () => {
              try {
                const body = `id_program_member=${encodeURIComponent(idProgramMember)}&id_latihan=${encodeURIComponent(idLatihan)}`;
                const res = await fetch("update_progress.php", {
                  method: "POST",
                  headers: { "Content-Type": "application/x-www-form-urlencoded" },
                  body
                });

                const data = await res.json();

                if (data.ok) {
                  alert(`✅ Latihan selesai!\nProgress program sekarang: ${data.progress}%`);
                  window.location.href = `/atmin/dist/member/program_latihan/program_detail.php?id=${data.program_id}`;
                } else {
                  alert(`❌ Gagal memperbarui progress:\n${data.message}`);
                }
              } catch (err) {
                console.error(err);
                alert("⚠️ Terjadi kesalahan koneksi ke server.");
              }
            };

            timerDisplay.parentElement.appendChild(selesaiBtn);
          }

          // Fungsi update timer tiap detik
          function updateTimer() {
            if (totalSeconds <= 0) {
              clearInterval(timerInterval);
              finishLatihan();
              return;
            }

            timerDisplay.textContent = formatTime(totalSeconds);
            totalSeconds--;
          }

          updateTimer();
          const timerInterval = setInterval(updateTimer, 1000);
        });
      </script>

      <!-- Carousel -->
      <div class="exercise-carousel">
        <div class="slides">
          <?php foreach ($images as $idx => $img): ?>
            <div class="slide <?= $idx === 0 ? 'active' : '' ?>">
              <img src="../../uploads/latihan/<?= htmlspecialchars($img) ?>" alt="step<?= $idx + 1 ?>">
            </div>
          <?php endforeach; ?>

          <?php if (!empty($row['video'])): ?>
            <div class="slide">
              <!-- 🔁 Video auto loop, autoplay, muted, dan playsinline -->
              <video autoplay loop muted playsinline preload="metadata" controls>
                <source src="../../uploads/latihan/<?= htmlspecialchars($row['video']) ?>" type="video/mp4">
                Your browser does not support the video tag.
              </video>
            </div>
          <?php endif; ?>
        </div>

        <!-- Tombol navigasi -->
        <button class="carousel-btn prev">&#10094;</button>
        <button class="carousel-btn next">&#10095;</button>

        <!-- Titik indikator -->
        <div class="carousel-dots"></div>
      </div>

      <!-- Step Guide -->
      <div class="exercise-guide">
        <?php 
          $steps = explode("\n", $row['step']); 
          foreach ($steps as $i => $s): 
        ?>
          <div class="guide-step">
            <i class="fas fa-info-circle"></i>
            <div><strong>Step <?= $i + 1 ?>:</strong> <?= htmlspecialchars($s) ?></div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Mobile info icon -->
      <button class="mobile-info-btn">
        <i class="fas fa-info-circle"></i>&nbsp;Steps
      </button>

      <!-- Modal for mobile -->
      <div class="modal" id="guideModal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h3>Exercise Steps</h3>
          <?php foreach ($steps as $i => $s): ?>
            <p><strong>Step <?= $i + 1 ?>:</strong> <?= htmlspecialchars($s) ?></p>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Log Section -->
      <!--  -->

      <!-- <script>
        document.getElementById("addBtn").addEventListener("click", function() {
          const weight = document.getElementById("weightInput").value.trim();
          const reps = document.getElementById("repsInput").value.trim();
          if (weight === "" || reps === "") {
            alert("Isi dulu Weight dan Reps!");
            return;
          }

          fetch("proses_log.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: "action=tambah&id_latihan=<?= $id_latihan ?>&berat=" + weight + "&reps=" + reps
          })
          .then(res => res.text())
          .then(html => {
            document.getElementById("logBody").innerHTML = html;
            document.getElementById("weightInput").value = "";
            document.getElementById("repsInput").value = "";
          });
        });

        document.getElementById("logBody").addEventListener("click", function(e) {
          if (e.target.closest(".delete-btn")) {
            const row = e.target.closest(".log-row");
            const id = row.dataset.id;

            fetch("proses_log.php", {
              method: "POST",
              headers: { "Content-Type": "application/x-www-form-urlencoded" },
              body: "action=hapus&id_log=" + id + "&id_latihan=<?= $id_latihan ?>"
            })
            .then(res => res.text())
            .then(html => {
              document.getElementById("logBody").innerHTML = html;
            });
          }
        });
      </script> -->

    </div>
  </div>

  <br><br><br>
</div>


</main>
      <!--end::App Main-->

      <!--begin::Footer-->
     
      <!--end::Footer-->

      <!--begin::Bottom Navigation-->
<nav class="bottom-nav">
  <div class="wave-shape">
    <!-- <svg viewBox="0 0 500 100" preserveAspectRatio="none">
      <path d="M0,60 C150,90 350,20 500,60 L500,00 L0,0 Z" fill="rgba(255,255,255,0.08)"></path>
    </svg> -->
  </div>

  <a href="index.php" class="nav-item">
    <div class="icon-wrap"><i class="bi bi-speedometer2"></i></div>
    <span class="nav-label">Beranda</span>
  </a>
  <a href="latihan_mandiri/index.php" class="nav-item">
    <div class="icon-wrap"><i class="bi bi-calendar2-check-fill"></i></div>
    <span class="nav-label">Latihan Mandiri</span>
  </a>
  <!-- <a href="video.html" class="nav-item">
    <div class="icon-wrap"><i class="bi bi-play-btn-fill"></i></div>
    <span class="nav-label">Video</span>
  </a> -->
    <a href="program_latihan/index.php" class="nav-item active">
    <div class="icon-wrap"><i class="bi bi-calendar2-check-fill"></i></div>
    <span class="nav-label">Latihan Program</span>
  </a>
  <a href="nutrisi/index.php" class="nav-item">
    <div class="icon-wrap"><i class="bi bi-basket-fill"></i></div>
    <span class="nav-label">Nutrisi</span>
  </a>
   <a href="../statistik/index.php" class="nav-item">
    <div class="icon-wrap"><i class="bi bi-calendar2-check-fill"></i></div>
    <span class="nav-label">Latihan Mandiri</span>
  </a>

  <!-- PROFIL DENGAN MENU -->
  <!-- <div class="nav-item profile-item">
    <div class="icon-wrap"><i class="bi bi-person-circle"></i></div>
    <span class="nav-label">Profil</span> -->

    <!-- Popup menu -->
    <!-- <div class="profile-menu">
      <a href="#"><i class="bi bi-gear"></i> Pengaturan</a>
      <a href="#"><i class="bi bi-person"></i> Akun Saya</a>
      <a href="#"><i class="bi bi-box-arrow-right"></i> Logout</a>
    </div> -->
  </div>
</nav>


<!--end::Bottom Navigation-->

    </div>
   


    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="./js/adminlte.js"></script>
    <script src="./js/datatables-simple-demo.js"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <!-- <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined) {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script> -->
    <!--end::OverlayScrollbars Configure-->
    <!-- OPTIONAL SCRIPTS -->
    <!-- sortablejs -->
    <script
      src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"
      crossorigin="anonymous"
    ></script>
    <!-- sortablejs -->
    <!-- <script>
      new Sortable(document.querySelector('.connectedSortable'), {
        group: 'shared',
        handle: '.card-header',
      });

      const cardHeaders = document.querySelectorAll('.connectedSortable .card-header');
      cardHeaders.forEach((cardHeader) => {
        cardHeader.style.cursor = 'move';
      });
    </script> -->
    <!-- apexcharts -->
    <script
      src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
      integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
      crossorigin="anonymous"
    ></script>
    <!-- ChartJS -->
    <!-- <script>
      // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
      // IT'S ALL JUST JUNK FOR DEMO
      // ++++++++++++++++++++++++++++++++++++++++++

      const sales_chart_options = {
        series: [
          {
            name: 'Digital Goods',
            data: [28, 48, 40, 19, 86, 27, 90],
          },
          {
            name: 'Electronics',
            data: [65, 59, 80, 81, 56, 55, 40],
          },
        ],
        chart: {
          height: 300,
          type: 'area',
          toolbar: {
            show: false,
          },
        },
        legend: {
          show: false,
        },
        colors: ['#0d6efd', '#20c997'],
        dataLabels: {
          enabled: false,
        },
        stroke: {
          curve: 'smooth',
        },
        xaxis: {
          type: 'datetime',
          categories: [
            '2023-01-01',
            '2023-02-01',
            '2023-03-01',
            '2023-04-01',
            '2023-05-01',
            '2023-06-01',
            '2023-07-01',
          ],
        },
        tooltip: {
          x: {
            format: 'MMMM yyyy',
          },
        },
      };

      const sales_chart = new ApexCharts(
        document.querySelector('#revenue-chart'),
        sales_chart_options,
      );
      sales_chart.render();
    </script> -->
    <!-- ✅ Load ApexCharts dari CDN -->



    <!-- jsvectormap -->
    <script
      src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js"
      integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js"
      integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY="
      crossorigin="anonymous"
    ></script>
    <!-- jsvectormap -->
    <!-- <script>
      // World map by jsVectorMap
      new jsVectorMap({
        selector: '#world-map',
        map: 'world',
      });

      // Sparkline charts
      const option_sparkline1 = {
        series: [
          {
            data: [1000, 1200, 920, 927, 931, 1027, 819, 930, 1021],
          },
        ],
        chart: {
          type: 'area',
          height: 50,
          sparkline: {
            enabled: true,
          },
        },
        stroke: {
          curve: 'straight',
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0,
        },
        colors: ['#DCE6EC'],
      };

      const sparkline1 = new ApexCharts(document.querySelector('#sparkline-1'), option_sparkline1);
      sparkline1.render();

      const option_sparkline2 = {
        series: [
          {
            data: [515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921],
          },
        ],
        chart: {
          type: 'area',
          height: 50,
          sparkline: {
            enabled: true,
          },
        },
        stroke: {
          curve: 'straight',
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0,
        },
        colors: ['#DCE6EC'],
      };

      const sparkline2 = new ApexCharts(document.querySelector('#sparkline-2'), option_sparkline2);
      sparkline2.render();

      const option_sparkline3 = {
        series: [
          {
            data: [15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21],
          },
        ],
        chart: {
          type: 'area',
          height: 50,
          sparkline: {
            enabled: true,
          },
        },
        stroke: {
          curve: 'straight',
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0,
        },
        colors: ['#DCE6EC'],
      };

      const sparkline3 = new ApexCharts(document.querySelector('#sparkline-3'), option_sparkline3);
      sparkline3.render();
    </script> -->
    <!--end::Script-->
    <!-- <script>
      // Color Mode Toggler
(() => {
  "use strict";

  const storedTheme = localStorage.getItem("theme");

  const getPreferredTheme = () => {
    if (storedTheme) {
      return storedTheme;
    }

    return window.matchMedia("(prefers-color-scheme: dark)").matches
      ? "dark"
      : "light";
  };

  const setTheme = function (theme) {
    if (
      theme === "auto" &&
      window.matchMedia("(prefers-color-scheme: dark)").matches
    ) {
      document.documentElement.setAttribute("data-bs-theme", "dark");
    } else {
      document.documentElement.setAttribute("data-bs-theme", theme);
    }
  };

  setTheme(getPreferredTheme());

  const showActiveTheme = (theme, focus = false) => {
    const themeSwitcher = document.querySelector("#bd-theme");

    if (!themeSwitcher) {
      return;
    }

    const themeSwitcherText = document.querySelector("#bd-theme-text");
    const activeThemeIcon = document.querySelector(".theme-icon-active i");
    const btnToActive = document.querySelector(
      `[data-bs-theme-value="${theme}"]`
    );
    const svgOfActiveBtn = btnToActive.querySelector("i").getAttribute("class");

    for (const element of document.querySelectorAll("[data-bs-theme-value]")) {
      element.classList.remove("active");
      element.setAttribute("aria-pressed", "false");
    }

    btnToActive.classList.add("active");
    btnToActive.setAttribute("aria-pressed", "true");
    activeThemeIcon.setAttribute("class", svgOfActiveBtn);
    const themeSwitcherLabel = `${themeSwitcherText.textContent} (${btnToActive.dataset.bsThemeValue})`;
    themeSwitcher.setAttribute("aria-label", themeSwitcherLabel);

    if (focus) {
      themeSwitcher.focus();
    }
  };

  window
    .matchMedia("(prefers-color-scheme: dark)")
    .addEventListener("change", () => {
      if (storedTheme !== "light" || storedTheme !== "dark") {
        setTheme(getPreferredTheme());
      }
    });

  window.addEventListener("DOMContentLoaded", () => {
    showActiveTheme(getPreferredTheme());

    for (const toggle of document.querySelectorAll("[data-bs-theme-value]")) {
      toggle.addEventListener("click", () => {
        const theme = toggle.getAttribute("data-bs-theme-value");
        localStorage.setItem("theme", theme);
        setTheme(theme);
        showActiveTheme(theme, true);
      });
    }
  });
})();
    </script> -->
    <!-- ✅ Tambahkan di bawah semua elemen HTML -->
<link
  rel="stylesheet"
  href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>



<script>
    window.addEventListener('load', function() {
      const loader = document.getElementById('loading-screen');
      const mainContent = document.getElementById('main-content');

      // Hilangkan loader setelah sedikit delay agar halus
      setTimeout(() => {
        loader.remove(); // hapus elemen loader sepenuhnya
        mainContent.hidden = false; // tampilkan konten utama
      }, 1000);
    });
  </script>

  
  </body>


<style>
/* ==== NAVBAR 3D SOFT ==== */
.bottom-nav {
  position: fixed;
  bottom: 0;
  left: 0;
  width: 100%;
  background: linear-gradient(180deg, #751335 0%, #5a0d28 100%);
  display: flex;
  justify-content: space-around;
  align-items: center;
  padding: 8px 6px 10px; /* dikurangi dari 14px 8px 16px */
  border-radius: 20px 20px 0 0;
  box-shadow:
    0 -2px 4px rgba(255, 255, 255, 0.1) inset,
    0 -6px 10px rgba(0, 0, 0, 0.45);
  z-index: 999999;
  overflow: visible;
}

.bottom-nav::before {
  content: '';
  position: absolute;
  top: -8px;
  left: 0;
  width: 100%;
  height: 20px;
  background: radial-gradient(circle at 50% 0%, rgba(255,255,255,0.25), transparent 70%);
  opacity: 0.2;
  pointer-events: none;
}

/* ==== GELOMBANG ==== */
.wave-shape {
  position: absolute;
  top: -36px;
  left: 0;
  width: 100%;
  height: 70px;
  pointer-events: none;
  opacity: 0.9;
  z-index: 1;
}

.wave-shape svg {
  width: 120%;
  height: 100%;
  display: block;
  animation: waveFloat 6s ease-in-out infinite;
  transform-origin: center;
  filter: drop-shadow(0 1px 3px rgba(255, 255, 255, 0.2));
}

@keyframes waveFloat {
  0% { transform: translateX(-8%) translateY(0); }
  50% { transform: translateX(0) translateY(-3px); }
  100% { transform: translateX(-10%) translateY(0); }
}

/* ==== ITEM ==== */
.bottom-nav .nav-item {
  position: relative;
  z-index: 2;
  text-decoration: none;
  color: #fff;
  font-size: 13px;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 6px;
  transition: all 0.3s ease;
}

/* ==== ICON WRAP ==== */
.icon-wrap {
  width: 38px; /* semula 48px */
  height: 38px; /* semula 48px */
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(255, 255, 255, 0.12);
  backdrop-filter: blur(8px);
  box-shadow:
    inset 0 2px 3px rgba(255, 255, 255, 0.25),
    0 4px 6px rgba(0, 0, 0, 0.25);
  transition: all 0.35s ease;
}

.icon-wrap i {
  font-size: 18px; /* semula 22px */
  color: #eae7e7;
  transition: all 0.35s ease;
}

/* ==== LABEL ==== */
.nav-label {
  font-size: 11px; /* semula 12px */
  color: #fff;
  font-weight: 500;
  transition: all 0.35s ease;
}
/* ==== ACTIVE ==== */
.bottom-nav .nav-item.active {
  transform: translateY(-6px); /* sedikit lebih kecil dari -8px */
}
.bottom-nav .nav-item.active .icon-wrap {
  background: #fff;
  transform: scale(1.2);
  box-shadow:
    inset 0 2px 3px rgba(255, 255, 255, 0.4),
    0 6px 15px rgba(255, 255, 255, 0.3);
}

.bottom-nav .nav-item.active::before {
  content: '';
  position: absolute;
  bottom: -8px;
  left: 50%;
  transform: translateX(-50%);
  width: 80px;
  /* height: 38px; */
  background: radial-gradient(circle at center top, rgba(255, 70, 110, 0.9) 0%, rgba(90, 13, 40, 1) 90%);
  border-top-left-radius: 60% 80%;
  border-top-right-radius: 60% 80%;
  z-index: 1;
  transition: all 0.4s ease;
  filter: blur(0.5px);
  box-shadow:
    0 -4px 12px rgba(0,0,0,0.4),
    inset 0 3px 4px rgba(255,255,255,0.2);
}

.bottom-nav .nav-item.active i {
  color: #b30000;
  transform: scale(1.15);
}

/* ==== HOVER ==== */
.bottom-nav .nav-item:hover .icon-wrap {
  background: #fff;
  transform: translateY(-5px) scale(1.05);
  box-shadow:
    inset 0 3px 4px rgba(255, 255, 255, 0.3),
    0 4px 10px rgba(255, 255, 255, 0.2);
}

.bottom-nav .nav-item:hover i {
  color: #b30000;
  transform: scale(1.1);
}

.bottom-nav .nav-item:hover .nav-label {
  transform: scale(1.05);
  text-shadow: 0 0 8px rgba(255, 255, 255, 0.5);
}

/* ==== RESPONSIVE UNTUK MOBILE ==== */
@media (max-width: 600px) {
  .bottom-nav {
    padding: 6px 4px 8px; /* lebih kecil di mobile */
  }
  .icon-wrap {
    width: 34px;
    height: 34px;
  }
  .icon-wrap i {
    font-size: 16px;
  }
  .nav-label {
    font-size: 10px;
  }
}



/* ==== PROFIL MENU POPUP ==== */
.profile-item {
  position: relative;
  z-index: 100000;
}

.profile-menu {
  position: absolute;
  bottom: 65px;
  left: 50%;
  transform: translateX(-50%) translateY(15px);
  display: flex;
  flex-direction: column;
  align-items: stretch;
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(14px);
  border-radius: 18px;
  padding: 10px 0;
  min-width: 160px;
  box-shadow:
    inset 0 1px 2px rgba(255,255,255,0.25),
    0 4px 15px rgba(0,0,0,0.4);
  opacity: 0;
  pointer-events: none;
  transition: all 0.35s ease;
  z-index: 100001;
}

.profile-menu a {
  color: #fff;
  font-size: 14px;
  padding: 10px 16px;
  display: flex;
  align-items: center;
  gap: 10px;
  text-decoration: none;
  transition: all 0.3s ease;
}

.profile-menu a:hover {
  background: rgba(255, 255, 255, 0.15);
  transform: translateX(3px);
}

.profile-menu i {
  font-size: 16px;
}

.profile-item:hover .profile-menu {
  opacity: 1;
  transform: translateX(-50%) translateY(0);
  pointer-events: auto;
}

/* ==== BESAR DI DESKTOP ==== */
@media (min-width: 768px) {
  .profile-menu {
    min-width: 200px;
    padding: 14px 0;
  }
  .profile-menu a {
    font-size: 15px;
    padding: 12px 18px;
  }
  .profile-menu i {
    font-size: 18px;
  }
}

/* ==== FRAME CONTENT ==== */
.app-main {
  padding-top: 70px;
  background: radial-gradient(circle at top, #4a0620 0%, #200010 100%);
  min-height: 100vh;
  padding: 50px 95px 70px;
  display: flex;
  justify-content: center;
}

/* ==== APP CONTENT ==== */
.app-content {
  /* width: 100%; */
  /* max-width: 1200px; */
  border-radius: 80px;
  background: rgba(255, 255, 255, 0.05);
  backdrop-filter: blur(12px);
  box-shadow: 0 4px 25px rgba(0, 0, 0, 0.25);
  padding: 30px;
  transition: all 0.3s ease;
}

/* ==== RESPONSIF ==== */
@media (max-width: 480px) {
  .icon-wrap { width: 42px; height: 42px; border-radius: 10px; }
  .icon-wrap i { font-size: 20px; }
  .nav-label { font-size: 11px; }
  .app-content { border-radius: 24px; padding: 20px 16px; }

  /* Popup profil agar muat di layar kecil */
  .profile-menu {
    min-width: 120px;
    bottom: 70px;
    padding: 6px 0;
  }
  .profile-menu a {
    font-size: 12px;
    padding: 7px 12px;
    gap: 6px;
  }
  .profile-menu i {
    font-size: 14px;
  }
}

/* CARD PUTIH LEBAR UNTUK DESKTOP */
.exercise-card {
  background: #fff;
  border-radius: 24px;
  padding: 28px;
  box-shadow: 0 6px 24px rgba(0,0,0,0.08);
  color: #5a0d28;
  max-width: 1100px; /* diperlebar */
  margin: 40px auto;
  transition: all 0.3s ease;
}

/* KONTEN DALAM CARD */
.exercise-page {
  display: flex;
  flex-direction: column;
  gap: 24px;
}

/* HEADER */
.exercise-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.exercise-header h2 {
  margin: 0;
  font-size: 1.8rem;
  color: #5a0d28;
}
.muscle span {
  color: #b30000;
  font-weight: 600;
}
.video-btn {
  background: #b30000;
  color: #fff;
  border: none;
  border-radius: 50%;
  width: 48px;
  height: 48px;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 20px;
  cursor: pointer;
  box-shadow: 0 3px 8px rgba(0,0,0,0.25);
  transition: transform 0.2s;
}
.video-btn:hover {
  transform: scale(1.08);
}

/* ==== CAROUSEL (DIKECILKAN) ==== */
.exercise-carousel {
  position: relative;
  width: 100%;
  max-width: 600px; /* dari 800px jadi 600px */
  margin: 0 auto;
  overflow: hidden;
  border-radius: 16px;
  background: #000;
}

.slides {
  display: flex;
  transition: transform 0.5s ease;
}

.slide {
  min-width: 100%;
  display: none;
  justify-content: center;
  align-items: center;
}

.slide.active {
  display: flex;
}

.slide img,
.slide video {
  width: 100%;
  height: 350px; /* dari 450px jadi 350px */
  object-fit: cover;
  border-radius: 16px;
}

/* Responsif di HP */
@media (max-width: 768px) {
  .slide img,
  .slide video {
    height: 220px; /* dari 250px jadi 220px */
  }
}

/* Tombol kiri kanan di dalam gambar */
.carousel-btn {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background: rgba(255,255,255,0.6);
  color: #61132f;
  border: none;
  border-radius: 50%;
  width: 40px;
  height: 40px;
  font-size: 24px;
  cursor: pointer;
  transition: background 0.3s;
  z-index: 10;
}

.carousel-btn:hover {
  background: rgba(255,255,255,0.9);
}

.carousel-btn.prev {
  left: 10px;
}

.carousel-btn.next {
  right: 10px;
}

/* Titik bawah */
.carousel-dots {
  text-align: center;
  margin-top: 10px;
}

.carousel-dots span {
  display: inline-block;
  width: 10px;
  height: 10px;
  margin: 4px;
  background: #ccc;
  border-radius: 50%;
  cursor: pointer;
  transition: background 0.3s;
}

.carousel-dots span.active {
  background: #61132f;
}

/* Mobile tweak */
@media (max-width: 768px) {
  .carousel-btn {
    width: 32px;
    height: 32px;
    font-size: 18px;
  }

  .slide img, .slide video {
    border-radius: 12px;
  }
}

/* GUIDE */
.exercise-guide {
  background: #e64a19;
  border-radius: 16px;
  padding: 18px;
  display: flex;
  flex-direction: column;
  gap: 12px;
  color: #fff;
  font-size: 15px;
}
.exercise-guide .guide-step {
  display: flex;
  align-items: flex-start;
  gap: 10px;
  line-height: 1.5;
}
.exercise-guide i {
  font-size: 18px;
  margin-top: 2px;
}

/* LOG TABLE */
.exercise-log {
  background: rgba(179, 0, 0, 0.05);
  border-radius: 14px;
  padding: 14px;
}
.log-header, .log-row {
  display: grid;
  grid-template-columns: 1.2fr 1fr 1fr 0.5fr;
  align-items: center;
  text-align: center;
  padding: 8px 0;
}
.log-header {
  font-weight: 600;
  color: #b30000;
  border-bottom: 1px solid rgba(179, 0, 0, 0.2);
}
.log-row {
  border-bottom: 1px solid rgba(179, 0, 0, 0.1);
}
.delete-btn {
  background: transparent;
  color: #b30000;
  border: none;
  cursor: pointer;
  font-size: 16px;
}
.log-input {
  display: flex;
  gap: 10px;
  margin-top: 12px;
}
.log-input input {
  flex: 1;
  padding: 10px;
  border-radius: 8px;
  border: 1px solid rgba(179, 0, 0, 0.3);
  outline: none;
  background: #fff;
  color: #5a0d28;
  font-size: 14px;
}
.log-input button {
  background: #b30000;
  color: #fff;
  border: none;
  border-radius: 10px;
  width: 46px;
  font-size: 18px;
  cursor: pointer;
  transition: background 0.2s;
}
.log-input button:hover {
  background: #8d0000;
}

/* RESPONSIVE */
@media (min-width: 1024px) {
  .exercise-page {
    flex-direction: column;
  }
  .exercise-guide {
    flex-direction: row;
    flex-wrap: wrap;
  }
  .guide-step {
    flex: 1 1 45%;
  }
}
/* ==== RESPONSIVE FIX ==== */
.exercise-carousel {
  width: 100%;
  border-radius: 16px;
  overflow: hidden;
  background: #61132f;
}
.slides img {
  width: 100%;
  height: auto;
  object-fit: cover;
}

/* Step guide desktop only */
.desktop-guide {
  display: flex;
}
.mobile-info-btn {
  display: none;
}

/* Modal style */
.modal {
  display: none;
  position: fixed;
  z-index: 999;
  left: 0; top: 0;
  width: 100%; height: 100%;
  background-color: rgba(0,0,0,0.6);
  justify-content: center;
  align-items: center;
}
.modal-content {
  background: #fff;
  color: #5a0d28;
  padding: 20px;
  border-radius: 16px;
  width: 90%;
  max-width: 400px;
  text-align: left;
}
.modal-content h3 {
  margin-bottom: 10px;
}
.modal-content p {
  margin: 8px 0;
}
.close {
  float: right;
  font-size: 22px;
  cursor: pointer;
  color: #b30000;
}

/* Mobile optimization */
@media (max-width: 768px) {
  .app-main {
    padding: 16px 10px 80px;
  }

  .app-content {
    padding: 0;
  }

  .exercise-card {
    width: 95%;
    margin: 0 auto;
    border-radius: 18px;
    padding: 18px;
  }

  .exercise-header h2 {
    font-size: 1.3rem;
  }

  .slides img {
    height: 240px; /* tetap besar di HP */
    object-fit: cover;
  }

  /* Hide desktop guide, show modal button */
  .desktop-guide {
    display: none;
  }
  .mobile-info-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    background: #b30000;
    color: #fff;
    border: none;
    border-radius: 12px;
    padding: 10px;
    font-size: 15px;
    cursor: pointer;
    margin-top: 10px;
  }

  /* Input lebih lebar dan tidak sempit */
  .log-input {
    flex-direction: column;
    gap: 10px;
  }
  .log-input input, .log-input button {
    width: 100%;
    font-size: 16px;
  }
}
/* ==== BENAR-BENAR SEMBUNYIKAN STEP GUIDE DI MOBILE ==== */
@media only screen and (max-width: 768px) {
  .exercise-guide {
    display: none !important;
    visibility: hidden !important;
    opacity: 0 !important;
    height: 0 !important;
    padding: 0 !important;
    margin: 0 !important;
    overflow: hidden !important;
  }

  .mobile-info-btn {
    display: flex !important;
  }
}

/* ==== ANIMASI MODAL ==== */
@keyframes fadeUp {
  from {
    opacity: 0;
    transform: translateY(30px) scale(0.97);
  }
  to {
    opacity: 1;
    transform: translateY(0) scale(1);
  }
}

/* Saat modal aktif, beri animasi */
.modal.show {
  display: flex !important;
}

.modal-content {
  background: #fff;
  color: #5a0d28;
  padding: 20px;
  border-radius: 16px;
  width: 90%;
  max-width: 400px;
  text-align: left;
  animation: fadeUp 0.35s ease forwards;
  box-shadow: 0 8px 24px rgba(0,0,0,0.25);
}

.timer-container {
  display: flex;
  align-items: center;
  justify-content: flex-end;
  gap: 8px;
  background: #ffe7b3;
  border-radius: 12px;
  padding: 8px 14px;
  font-weight: 600;
  color: #5a0d28;
  margin-top: -10px;
  margin-bottom: 20px;
  width: fit-content;
  margin-left: auto;
}
.timer {
  font-size: 1.2rem;
  color: #b30000;
}
.timer.finished {
  color: gray;
}
</style>





<script>
const slides = document.querySelectorAll(".slide");
const prevBtn = document.querySelector(".carousel-btn.prev");
const nextBtn = document.querySelector(".carousel-btn.next");
const dotsContainer = document.querySelector(".carousel-dots");

let currentIndex = 0;

// Buat titik indikator
slides.forEach((_, i) => {
  const dot = document.createElement("span");
  if (i === 0) dot.classList.add("active");
  dot.addEventListener("click", () => showSlide(i));
  dotsContainer.appendChild(dot);
});

const dots = dotsContainer.querySelectorAll("span");

function showSlide(index) {
  slides[currentIndex].classList.remove("active");
  dots[currentIndex].classList.remove("active");

  currentIndex = (index + slides.length) % slides.length;

  slides[currentIndex].classList.add("active");
  dots[currentIndex].classList.add("active");
}

prevBtn.addEventListener("click", () => showSlide(currentIndex - 1));
nextBtn.addEventListener("click", () => showSlide(currentIndex + 1));
</script>



  <!--end::Body-->
</html>
