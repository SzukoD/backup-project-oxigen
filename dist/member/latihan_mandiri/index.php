<?php
include '../../../koneksi.php';
session_start();

// === CEK LOGIN MEMBER ===
if (!isset($_SESSION['id_member'])) {
  header("Location: login.php");
  exit();
}

$id_member = $_SESSION['id_member'];
$query_user = mysqli_query($conn, "
  SELECT nama, level, foto_profile 
  FROM member 
  WHERE id_member = '$id_member'
");
$user = mysqli_fetch_assoc($query_user);

?>
<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <title>FitForge | Kategori Latihan Mandiri</title>
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

<style>
  /* === Saat mode mobile, pastikan background solid === */
  @media (max-width: 991px) {
    #navbarContent {
      background: linear-gradient(180deg, #6a142e 0%, #3c0b1b 100%) !important;
      box-shadow: 0 5px 15px rgba(0,0,0,0.5);
      border-radius: 10px;
      margin-top: 12px;
      padding: 12px;
    }
  }
</style>
      
      <!--end::Header-->
      <!--begin::Sidebar-->
     
      <!--end::Sidebar-->
      <!--begin::App Main-->
<?php
 // koneksi ke DB

// Query menghitung total latihan per kategori
$query = "
  SELECT k.*, COUNT(l.id_latihan) AS total_latihan
  FROM kategori_latihan k
  LEFT JOIN latihan l ON k.id_kategori = l.id_kategori
  GROUP BY k.id_kategori
";
$result = mysqli_query($conn, $query);
?>
      <main class="app-main" style="padding-top:70px;">
  <div class="app-content">
   <!-- DASHBOARD CARDS -->
<div class="exercise-section">
  <h1 class="section-title">Latihan Mandiri</h1>

  <div class="exercise-list">
          <?php while($row = mysqli_fetch_assoc($result)): ?>
          <a href="latihan.php?id_kategori=<?php echo $row['id_kategori']; ?>" style="text-decoration:none;">
            <div class="exercise-card">
              <img src="../../uploads/kategori/<?php echo htmlspecialchars($row['gambar']); ?>" 
                   alt="<?php echo htmlspecialchars($row['nama_kategori']); ?>">
              <div class="exercise-info">
                <h2><?php echo htmlspecialchars($row['nama_kategori']); ?></h2>
                

                <!-- Aman walau tabel latihan kosong -->
                <span class="exercise-count">
                 Tersedia <?php echo $row['total_latihan']; ?> latihan
                </span>
                 
              </div>
              <span class="arrow">›</span>
            </div>
          </a>
          
        <?php endwhile; ?>
  </div>
</div>





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

  <a href="../index.php" class="nav-item">
    <div class="icon-wrap"><i class="bi bi-speedometer2"></i></div>
    <span class="nav-label">Beranda</span>
  </a>
  <a href="index.php" class="nav-item active">
    <div class="icon-wrap"><i class="bi bi-calendar2-check-fill"></i></div>
    <span class="nav-label">Latihan Mandiri</span>
  </a>
  <!-- <a href="video.html" class="nav-item">
    <div class="icon-wrap"><i class="bi bi-play-btn-fill"></i></div>
    <span class="nav-label">Video</span>
  </a> -->
    <a href="../program_latihan/index.php" class="nav-item">
    <div class="icon-wrap"><i class="bi bi-calendar2-check-fill"></i></div>
    <span class="nav-label">Latihan Program</span>
  </a>
  <a href="../nutrisi/index.php" class="nav-item">
    <div class="icon-wrap"><i class="bi bi-basket-fill"></i></div>
    <span class="nav-label">Nutrisi</span>
  </a>
   <a href="../statistik/index.php" class="nav-item">
    <div class="icon-wrap"><i class="bi bi-calendar2-check-fill"></i></div>
    <span class="nav-label">Latihan Pribadi</span>
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
  padding: 40px 60px 100px;
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


.exercise-section {
  width: 100%;
  padding: 24px 20px 100px;
  color: #fff;
}

.section-title {
  font-size: 34px;
  font-weight: 800;
  margin-bottom: 20px;
  color: #fff;
  letter-spacing: 0.5px;
}

/* LIST CARD */
.exercise-list {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

/* CARD */
.exercise-card {
  display: flex;
  align-items: center;
  background: rgb(248, 230, 230);
  border-radius: 20px;
  padding: 12px 16px;
  box-shadow: 0 3px 10px rgba(0, 0, 0, 0.25);
  transition: all 0.4s ease;
  cursor: pointer;
  opacity: 0;
  transform: translateY(30px);
  animation: fadeInUp 0.8s ease forwards;
}

/* Animasi muncul */
@keyframes fadeInUp {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Tambah delay agar muncul satu per satu */
.exercise-card:nth-child(1) { animation-delay: 0.1s; }
.exercise-card:nth-child(2) { animation-delay: 0.2s; }
.exercise-card:nth-child(3) { animation-delay: 0.3s; }
.exercise-card:nth-child(4) { animation-delay: 0.4s; }
.exercise-card:nth-child(5) { animation-delay: 0.5s; }

.exercise-card:hover {
  transform: translateY(-5px) scale(1.02);
  box-shadow: 0 8px 18px rgba(0, 0, 0, 0.35);
}

/* Gambar */
.exercise-card img {
  width: 60px;
  height: 60px;
  border-radius: 14px;
  margin-right: 16px;
  object-fit: cover;
  background: #f3f3f3;
  padding: 4px;
  transition: 0.3s ease;
}

.exercise-card:hover img {
  transform: scale(1.1) rotate(4deg);
}

/* Info */
.exercise-info {
  flex: 1;
}

.exercise-info h2 {
  font-size: 20px;
  font-weight: 800;
  color: #111;
  margin: 0;
}

.exercise-count {
  display: inline-block;
  background: #222;
  color: #fff;
  font-size: 13px;
  padding: 4px 10px;
  border-radius: 20px;
  margin-top: 4px;
}

/* Arrow */
.arrow {
  font-size: 28px;
  color: #aaa;
  font-weight: bold;
  transition: 0.3s;
}

.exercise-card:hover .arrow {
  color: #333;
  transform: translateX(6px);
}

/* RESPONSIVE */
@media (max-width: 768px) {
  .exercise-section {
    padding: 16px 12px 90px;
  }

  .section-title {
    font-size: 28px;
  }

  .exercise-card {
    padding: 10px 14px;
  }

  .exercise-card img {
    width: 50px;
    height: 50px;
  }

  .exercise-info h2 {
    font-size: 18px;
  }

  .exercise-count {
    font-size: 12px;
  }
}

@media (max-width: 480px) {
  .section-title {
    font-size: 24px;
  }

  .exercise-card img {
    width: 46px;
    height: 46px;
  }

  .exercise-info h2 {
    font-size: 16px;
  }

  .arrow {
    font-size: 22px;
  }
}

</style>




  <!--end::Body-->
</html>
