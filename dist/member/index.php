<?php
// === KONEKSI DATABASE ===
include '../../koneksi.php';
session_start();

// === CEK LOGIN MEMBER ===
if (!isset($_SESSION['id_member'])) {
  header("Location: login.php");
  exit();
}

$id_member = $_SESSION['id_member'];

// === AMBIL DATA MEMBER DARI DATABASE ===
$query = mysqli_query($conn, "SELECT nama, level, foto_profile FROM member WHERE id_member = '$id_member'");
$user = mysqli_fetch_assoc($query);
?>
<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>FitForge | Dashboard Member</title>
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
    <link rel="preload" href="../css/adminlte.css" as="style" />
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
    <link rel="stylesheet" href="../css/adminlte.css" />
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

        <!-- Progress Level -->
        <?php
        $userQuery = mysqli_query($conn, "
          SELECT nama, level, streak_hari 
          FROM member 
          WHERE id_member = '$id_member'
        ");
        $user = mysqli_fetch_assoc($userQuery);

        $levelUpThreshold = 100;
        $streakPercent = min(100, round(($user['streak_hari'] / $levelUpThreshold) * 100, 0));
        ?>

        <div class="d-flex flex-column align-items-center align-items-lg-start text-center text-lg-start">
          <span class="fw-bold m-0">
            Level <?= htmlspecialchars($user['level']); ?>
          </span>

          <!-- Progress Bar -->
          <div class="progress"
            style="
              width: 150px;
              height: 8px;
              background: rgba(255,255,255,0.15);
              border-radius: 10px;
              overflow: hidden;
              box-shadow: inset 0 0 4px rgba(0,0,0,0.4);
            ">
            <div class="progress-bar"
              style="
                width: <?= $streakPercent; ?>%;
                height: 100%;
                background: linear-gradient(90deg, #00ff99, #00e676, #00c853);
                box-shadow: 0 0 10px rgba(0,255,163,0.8), 0 0 20px rgba(0,255,163,0.3);
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
             <li><a class="dropdown-item" href="../../landing page/index.php">Landing Page</a></li>
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
      <main class="app-main" style="padding-top:70px;">
  <div class="app-content">
   <!-- DASHBOARD CARDS -->

<div class="gym-dashboard">
  <div class="dashboard-grid">

    <!-- Kiri -->
   <div class="left-side">
  <?php
  $q = mysqli_query($conn, "
    SELECT p.nama_program, p.durasi, p.thumbnail, pm.progress
    FROM program_member pm
    JOIN program p ON p.id_program = pm.id_program
    WHERE pm.id_member = '$id_member' AND pm.status = 'aktif'
    LIMIT 1
  ");
  $data = mysqli_fetch_assoc($q);
  ?>

  <?php if ($data): ?>
    <!-- Jika ADA program aktif -->
    <div class="card white program-card" 
      style="position: relative; overflow: hidden; 
      background: url('../uploads/<?php echo htmlspecialchars($data['thumbnail']); ?>') center/cover no-repeat; border-radius: 14px;">
      
      <!-- Overlay gelap -->
      <div style="position: absolute; inset: 0; background: rgba(0, 0, 0, 0.55);"></div>

      <!-- Isi konten -->
      <div style="position: relative; z-index: 1; color: white; padding: 20px;">
        <h4 class="fw-bold mb-1"><?= htmlspecialchars($data['nama_program']); ?></h4>
        <p class="muted mb-2" style="color: #ddd;"><?= intval($data['durasi']); ?> hari • Aktif</p>
        <div class="progress-bar" style="background: rgba(255,255,255,0.3); height: 8px; border-radius: 4px;">
          <div class="fill" style="width: <?= intval($data['progress']); ?>%;"></div>
        </div>
        <small style="color:#ccc;">Progress <?= intval($data['progress']); ?>%</small>
      </div>
    </div>

  <?php else: ?>
    <!-- Jika BELUM mengikuti program apapun -->
    <div class="card white text-center d-flex flex-column align-items-center justify-content-center p-4" style="border-radius: 14px;">
      <img src="../assets/empty.svg" alt="empty" style="width: 80px; opacity: 0.6; margin-bottom: 10px;">
      <h5 class="text-dark mb-2">Belum Mengikuti Program</h5>
      <p class="text-muted small mb-3">Kamu belum memulai program latihan apapun. Yuk mulai sekarang!</p>
      <a href="program.php" class="btn primary">
        <i class="bi bi-plus-circle"></i> Pilih Program
      </a>
    </div>
  <?php endif; ?>





<!-- Latihan Selanjutnya -->
<div class="card white">
  <h5>Latihan Selanjutnya</h5>
  <?php
  include "../../koneksi.php";
  $id_member = $_SESSION['id_member'] ?? 0;

  // Ambil maksimal 2 program aktif yang belum selesai
  $q = mysqli_query($conn, "
    SELECT p.id_program, p.nama_program, p.durasi, p.thumbnail, pm.progress, pm.id_program_member
    FROM program_member pm
    JOIN program p ON p.id_program = pm.id_program
    WHERE pm.id_member = '$id_member' 
      AND pm.status = 'aktif'
      AND pm.progress < 100
    ORDER BY pm.tanggal_mulai ASC
    LIMIT 2
  ");

  if (mysqli_num_rows($q) > 0):
    while ($data = mysqli_fetch_assoc($q)):
      // ambil 2 latihan pertama dari program ini
      $qLatihan = mysqli_query($conn, "
        SELECT l.nama_latihan, l.video, pl.sets, pl.reps
        FROM program_latihan pl
        JOIN latihan l ON l.id_latihan = pl.id_latihan
        WHERE pl.id_program = '{$data['id_program']}'
        ORDER BY pl.urutan ASC
        LIMIT 2
      ");
  ?>
  <div class="program-block mb-3">
    <div class="program-header mb-2">
      <h6 class="mb-1"><?= htmlspecialchars($data['nama_program']); ?></h6>
      
      <!-- Progress Bar -->
      <div class="progress" style="height: 10px; border-radius: 8px; background: #e0e0e0;">
        <div class="progress-bar" 
             role="progressbar" 
             style="width: <?= $data['progress']; ?>%; background: #007bff; border-radius: 8px;" 
             aria-valuenow="<?= $data['progress']; ?>" 
             aria-valuemin="0" 
             aria-valuemax="100">
        </div>
      </div>
      <small class="muted d-block text-end mt-1"><?= $data['progress']; ?>%</small>
    </div>

    <?php if (mysqli_num_rows($qLatihan) > 0): ?>
      <?php while($lat = mysqli_fetch_assoc($qLatihan)): ?>
        <div class="work-list">
          <div class="work d-flex justify-content-between align-items-center mb-2 p-2 border rounded" style="background:#f9f9f9;">
            <div class="work-info">
              <h6 class="mb-1"><?= htmlspecialchars($lat['nama_latihan']); ?></h6>
              <span class="muted small">
                <?= "{$lat['sets']} sets × {$lat['reps']} reps"; ?>
              </span>
            </div>
            <form method="GET" action="program_detail.php" style="margin:0;">
              <input type="hidden" name="id" value="<?= $data['id_program']; ?>">
              <button type="submit" class="btn btn-primary btn-sm">Mulai</button>
            </form>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p class="small text-muted">Belum ada latihan di program ini.</p>
    <?php endif; ?>
  </div>
  <?php endwhile; ?>
  
  <?php else: ?>
    <p class="text-muted">Tidak ada latihan terjadwal saat ini.</p>
  <?php endif; ?>
</div>


      <?php

      // Ambil tanggal latihan dari riwayat_latihan
$dates = [];
if ($id_member) {
  $query = mysqli_query($conn, "SELECT tanggal FROM riwayat_latihan WHERE id_member='$id_member'");
  while ($row = mysqli_fetch_assoc($query)) {
    $dates[] = $row['tanggal'];
  }
}
?>
      <!-- Kalender -->
<?php
include "../../koneksi.php";
$id_member = $_SESSION['id_member'] ?? 0;

// Ambil jadwal latihan offline dari database
$jadwal = [];
if ($id_member) {
  $sql = "
    SELECT lo.tanggal_daftar AS tanggal, p.nama_pelatih, p.tempat, p.spesialisasi, p.no_telepon
    FROM latihan_offline lo
    JOIN pelatih p ON lo.id_pelatih = p.id_pelatih
    WHERE lo.id_member = '$id_member'
    ORDER BY lo.tanggal_daftar ASC
  ";
  $res = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($res)) {
    $jadwal[] = $row;
  }
}
?>

<!-- ==== KALENDER LATIHAN ==== -->
<div class="card white mt-3 shadow-sm" style="border-radius: 16px; overflow: hidden;">
  <div class="card-body">
    <h4 class="text-center mb-3 fw-bold text-dark">📅 Jadwal Latihan Offline</h4>

    <!-- Header Navigasi -->
    <div class="calendar-header">
      <button id="prevMonth" class="btn-nav"><i class="bi bi-chevron-left"></i> Sebelumnya</button>
      <h5 id="monthTitle" class="fw-bold text-dark m-0"></h5>
      <div>
        <button id="todayBtn" class="btn-nav">Bulan Ini</button>
        <button id="nextMonth" class="btn-nav">Selanjutnya <i class="bi bi-chevron-right"></i></button>
      </div>
    </div>

    <!-- Grid Kalender -->
    <div id="calendar" class="calendar-grid"></div>

    <!-- Pesan jika kosong -->
    <?php if (empty($jadwal)): ?>
      <p class="text-muted text-center mt-3">Belum ada jadwal latihan offline.</p>
    <?php endif; ?>
  </div>
</div>

<!-- ==== MODAL DETAIL ==== -->
<div class="modal fade" id="jadwalModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius: 14px;">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title">Detail Latihan Offline</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="jadwalModalBody"></div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- ==== SCRIPT ==== -->
<script>
const jadwalData = <?= json_encode($jadwal); ?>;
const cal = document.getElementById("calendar");
let current = new Date();

function renderCalendar() {
  cal.innerHTML = "";
  const year = current.getFullYear();
  const month = current.getMonth();

  document.getElementById("monthTitle").innerText =
    current.toLocaleString('id-ID', { month: 'long', year: 'numeric' });

  const first = new Date(year, month, 1);
  const days = new Date(year, month + 1, 0).getDate();
  const offset = first.getDay();

  // Kosong di awal
  for (let i = 0; i < offset; i++) {
    const empty = document.createElement("div");
    empty.className = "calendar-cell empty";
    cal.appendChild(empty);
  }

  // Render hari
  for (let d = 1; d <= days; d++) {
    const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(d).padStart(2, '0')}`;
    const cell = document.createElement("div");
    cell.className = "calendar-cell";
    cell.innerText = d;

    // Sorot hari ini
    const today = new Date();
    if (d === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
      cell.classList.add("today");
    }

    // Cek jadwal latihan
    const events = jadwalData.filter(j => j.tanggal === dateStr);
    if (events.length > 0) {
      cell.classList.add("event");
      cell.title = `${events.length} latihan offline`;
      cell.addEventListener("click", () => showEvents(events, dateStr));
    }

    cal.appendChild(cell);
  }
}

function showEvents(events, tanggal) {
  const modalBody = document.getElementById("jadwalModalBody");
  modalBody.innerHTML = `
    <p><strong>Tanggal:</strong> ${new Date(tanggal).toLocaleDateString("id-ID")}</p>
    <hr>
    ${events.map(e => `
      <div class="mb-3">
        <p><strong>Pelatih:</strong> ${e.nama_pelatih}</p>
        <p><strong>Spesialisasi:</strong> ${e.spesialisasi}</p>
        <p><strong>Tempat:</strong> ${e.tempat}</p>
        <p><strong>No Telepon:</strong> ${e.no_telepon}</p>
      </div>
      <hr>
    `).join('')}
  `;
  new bootstrap.Modal(document.getElementById("jadwalModal")).show();
}

// Navigasi
document.getElementById("prevMonth").onclick = () => { current.setMonth(current.getMonth() - 1); renderCalendar(); };
document.getElementById("nextMonth").onclick = () => { current.setMonth(current.getMonth() + 1); renderCalendar(); };
document.getElementById("todayBtn").onclick = () => { current = new Date(); renderCalendar(); };

renderCalendar();
</script>

<!-- ==== STYLE ==== -->
<style>
.calendar-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 12px;
  flex-wrap: wrap;
  gap: 10px;
}
.btn-nav {
  background: #8b1e2e;
  color: #fff;
  border: none;
  border-radius: 8px;
  padding: 5px 12px;
  font-size: 14px;
  transition: all 0.3s;
}
.btn-nav:hover {
  background: #a0153e;
}
.calendar-grid {
  display: grid;
  grid-template-columns: repeat(7, 1fr);
  gap: 6px;
}
.calendar-cell {
  background: #fff;
  border: 1px solid #eee;
  border-radius: 8px;
  text-align: center;
  padding: 8px 0;
  min-height: 55px;
  font-size: 13px;
  font-weight: 600;
  color: #333;
  transition: all 0.25s ease;
}
.calendar-cell.empty {
  background: transparent;
  border: none;
}
.calendar-cell.event {
  background: #ffe5ea;
  border: 1px solid #8b1e2e;
  box-shadow: 0 2px 6px rgba(139, 30, 46, 0.15);
  color: #8b1e2e;
  cursor: pointer;
}
.calendar-cell.event:hover {
  background: #ffccd2;
  transform: scale(1.05);
}
.calendar-cell.today {
  background: #fff9d6 !important;
  border: 1px solid #ffd633;
  box-shadow: 0 0 6px rgba(255, 214, 51, 0.5);
}

/* RESPONSIVE */
@media (max-width: 768px) {
  .calendar-grid { gap: 4px; }
  .calendar-cell { font-size: 11px; padding: 6px 0; min-height: 45px; }
  .btn-nav { font-size: 12px; padding: 4px 8px; }
}
@media (max-width: 480px) {
  .calendar-grid { gap: 3px; }
  .calendar-cell { font-size: 10px; min-height: 35px; }
  .calendar-header h5 { font-size: 14px; }
}
</style>




    </div>

  

    <!-- Kanan -->
    <div class="right-side">

       <!-- Rekomendasi -->
      <div class="card white">
        <h4>Rekomendasi</h4>
        <p class="muted">Latihan kekuatan dan stamina disarankan minggu ini.</p>
        <div class="btn-row">
          <button class="btn primary">Mulai</button>
          <button class="btn outline">Lihat Semua</button>
        </div>
      </div>
    
<!-- Berat saya -->
     <?php
// session_start();
// include '../../../koneksi.php';

$id_member = intval($_SESSION['id_member'] ?? 0);
if ($id_member <= 0) {
  echo "<div class='alert alert-danger text-center'>Silakan login terlebih dahulu.</div>";
  exit;
}

// Ambil data log berat dari log_latihan
// Kalau kamu mau ambil semua latihan, hilangkan WHERE id_latihan=...
$query = "
  SELECT tanggal, berat 
  FROM log_latihan 
  WHERE id_member = $id_member 
  ORDER BY tanggal ASC
";
$result = mysqli_query($conn, $query);

$labels = [];
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
  $labels[] = date('d M', strtotime($row['tanggal']));
  $data[] = floatval($row['berat']);
}

// konversi ke format JS
$labels_json = json_encode($labels);
$data_json   = json_encode($data);

// ambil berat terakhir untuk ditampilkan besar di atas
$berat_terakhir = end($data) ?: 0;
$tanggal_terakhir = end($labels) ?: "-";
?>

<!-- Berat saya -->
<div class="card white">
  <h5>Berat Saya</h5>
  <div class="stat">
    <span class="big-number"><?= htmlspecialchars($berat_terakhir) ?> kg</span>
    <span class="muted small">Update: <?= htmlspecialchars($tanggal_terakhir) ?></span>
  </div>
  <canvas id="weightChart" height="130"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const labels = <?= $labels_json ?>;
const dataValues = <?= $data_json ?>;

new Chart(document.getElementById("weightChart"), {
  type: "line",
  data: {
    labels: labels,
    datasets: [{
      label: "Berat (kg)",
      data: dataValues,
      borderColor: "#8b1e2e",
      backgroundColor: "rgba(139,30,46,0.1)",
      tension: 0.3,
      fill: true,
      pointRadius: 3
    }]
  },
  options: {
    plugins: { legend: { display: false }},
    scales: {
      x: { grid: { display: false }},
      y: { grid: { color: "#eee" }}
    }
  }
});
</script>

      
          <!-- Kalori -->
      <div class="card white">
        <h5>Kalori terbakar</h5>
        <div class="stat">
          <span class="big-number">560 kcal</span>
          <span class="muted small">Hari ini</span>
        </div>
        <canvas id="calorieChart" height="130"></canvas>
      </div>
    </div>

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

  <a href="index.php" class="nav-item active">
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
    <a href="program_latihan/index.php" class="nav-item">
    <div class="icon-wrap"><i class="bi bi-calendar2-check-fill"></i></div>
    <span class="nav-label">Latihan Program</span>
  </a>
  <a href="nutrisi/index.php" class="nav-item">
    <div class="icon-wrap"><i class="bi bi-basket-fill"></i></div>
    <span class="nav-label">Nutrisi</span>
  </a>
   <a href="statistik/index.php" class="nav-item">
    <div class="icon-wrap"><i class="bi bi-calendar2-check-fill"></i></div>
    <span class="nav-label">Latihan Offline</span>
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
    <!-- <script
      src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
      integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
      crossorigin="anonymous"
    ></script> -->
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

  /* ==== GYM DASHBOARD ==== */
  .gym-dashboard {
    font-family: "Poppins", sans-serif;
    color: #fff;
  }

  /* === GRID LAYOUT === */
  .dashboard-grid {
    display: grid;
    grid-template-columns: 1.1fr 0.9fr;
    gap: 30px;
  }

  .left-side, .right-side {
    display: flex;
    flex-direction: column;
    gap: 22px;
  }

  /* === KARTU "BELUM MENGIKUTI PROGRAM" === */
.card.empty {
  text-align: center;
  background: #fff5f5;
  border: 2px dashed #ff4b6e;
  border-radius: 18px;
  padding: 26px 20px;
  color: #8b1e2e;
  box-shadow: inset 0 0 10px rgba(255, 75, 110, 0.1);
}

.card.empty h5 {
  margin-bottom: 6px;
  font-weight: 600;
}

.card.empty p {
  font-size: 14px;
  color: #555;
}

/* RESPONSIVE FIX UNTUK CARD */
@media (max-width: 768px) {
  .program-card {
    flex-direction: column;
    align-items: flex-start;
    text-align: left;
    padding: 16px;
  }
  .card.empty {
    padding: 20px;
  }
  .card.empty img {
    width: 60px;
  }
  .card.white {
    padding: 18px 16px;
  }
  .program-card h4 {
    font-size: 16px;
  }
  .progress-bar {
    height: 6px;
  }
}

@media (max-width: 480px) {
  .btn.primary {
    font-size: 13px;
    padding: 7px 10px;
  }
  .program-card h4 {
    font-size: 15px;
  }
  .muted {
    font-size: 13px;
  }
}

  /* === RESPONSIVE === */
  @media (max-width: 1024px) {
    .dashboard-grid {
      grid-template-columns: 1fr;
    }
    .app-content {
      max-width: 90%;
      padding: 24px 20px;
      margin-left: 20px;
    }
  }

  @media (max-width: 600px) {
    .app-main {
      padding: 5px 5px 5px;
    }

    .app-content {
      /* padding: 18px 14px; */
      border-radius: 18px;
    }

    .dashboard-grid {
      gap: 18px;
    }

    .card.white {
      padding: 14px 12px;
    }

    h4, h5 {
      font-size: 15px;
    }
    .btn {
      font-size: 13px;
      padding: 6px 10px;
    }
    .big-number {
      font-size: 20px;
    }
    .work-list {
      gap: 8px;
    }
    .calendar-cell {
      min-height: 38px;
      font-size: 12px;
    }
  }

  /* RESPONSIVE TABLET */
  /* @media (max-width: 1024px) {
    .dashboard-grid {
      grid-template-columns: 1fr;
    }
  } */

  /* RESPONSIVE MOBILE */
  /* @media (max-width: 600px) {
    .gym-dashboard {
      padding: 14px;
    }
    .card.white {
      padding: 16px;
    }
    h4, h5 {
      font-size: 15px;
    }
    .big-number {
      font-size: 18px;
    }
    .btn {
      padding: 6px 10px;
      font-size: 13px;
    }
    .work-list {
      gap: 8px;
    }
    .calendar-cell {
      min-height: 38px;
      font-size: 12px;
    }
  } */


  /* === CARD STYLE === */
  .card.white {
    background: rgb(248, 230, 230);
    border-radius: 20px;
    padding: 22px 20px;
    backdrop-filter: blur(10px);
    box-shadow:
      0 5px 16px rgba(0, 0, 0, 0.3),
      inset 0 1px 2px rgba(255, 255, 255, 0.15);
    transition: all 0.3s ease;
  }

  .card.white:hover {
    transform: translateY(-4px) scale(1.01);
    box-shadow:
      0 8px 20px rgba(0, 0, 0, 0.4),
      inset 0 1px 3px rgba(255, 255, 255, 0.2);
  }

  /* === TEKS & DETAIL === */
  h4, h5, h6 {
    margin: 0 0 8px;
    font-weight: 600;
    
  }
  .muted { color: #777; }
  .small { font-size: 13px; }
  .big-number { font-size: 22px; font-weight: 700; }
  .stat { display:flex; flex-direction:column; gap:4px; margin-bottom:10px; }

  /* === BUTTON === */
  .btn {
    border: none;
    padding: 8px 14px;
    border-radius: 10px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
  }
  .btn.primary {
    background: linear-gradient(90deg, #b30000, #ff4b6e);
    color: #fff;
  }
  .btn.primary:hover {
    filter: brightness(1.1);
  }
  .btn.outline {
    background: transparent;
    color: #ff4b6e;
    border: 1px solid #ff4b6e;
  }
  .btn.small {
    padding: 6px 10px;
    font-size: 13px;
  }
  .btn-row { display: flex; gap: 10px; margin-top: 10px; }

  /* === PROGRAM CARD === */
  .program-card {
    display:flex;
    justify-content:space-between;
    align-items:center;
  }
  .progress-bar {
    height: 8px;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 10px;
    margin-top: 8px;
    overflow: hidden;
  }
  .progress-bar .fill {
    height: 100%;
    background: linear-gradient(90deg, #ff3d6a, #8b1e2e);
    border-radius: 10px;
    transition: width 0.4s ease;
  }

  /* === WORKOUT LIST === */
  .work-list {
    display:flex;
    flex-direction:column;
    gap:10px;
    margin-top:10px;
  }
  .work {
    display:flex;
    justify-content:space-between;
    align-items:center;
    border:1px solid #eee;
    padding:10px;
    border-radius:10px;
    flex-wrap: wrap;
  }
  .work.locked { opacity:0.6; }
  .work-info h6 { margin:0; font-size:14px; }

  /* === CALENDAR ===
  .calendar-header {
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:10px;
  }
  .calendar-header button {
    background:transparent;
    border:none;
    font-size:20px;
    cursor:pointer;
    color:#8b1e2e;
  }
  .calendar-grid {
    display:grid;
    grid-template-columns: repeat(7, 1fr);
    gap:6px;
  }
  .calendar-cell {
    background:#fff;
    border:1px solid #eee;
    border-radius:8px;
    text-align:center;
    padding:6px 0;
    min-height:50px;
    font-size:13px;
  }
  .calendar-cell.event {
    border:1px solid #8b1e2e;
    box-shadow:0 2px 6px rgba(139,30,46,0.1);
  } */
  .icon-right { color:#8b1e2e; }

  /* === FIX CANVAS RESPONSIVE === */
  canvas {
    width: 100% !important;
    height: auto !important;
  }

  /* === SPACING DAN JAGA JARAK DARI NAVBAR === */


  .app-main {
    padding-bottom: 100px;
  }

  </style>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
  /* Chart.js Demo */
    // new Chart(document.getElementById("weightChart"), {
    //   type: "line",
    //   data: {
    //     labels: ["10 Okt","11 Okt","12 Okt","13 Okt","14 Okt","15 Okt"],
    //     datasets: [{
    //       label: "Berat (kg)",
    //       data: [77,76.5,76,75.5,75.2,75],
    //       borderColor: "#8b1e2e",
    //       backgroundColor: "rgba(139,30,46,0.1)",
    //       tension:0.3,
    //       fill:true,
    //       pointRadius:3
    //     }]
    //   },
    //   options:{plugins:{legend:{display:false}}, scales:{x:{grid:{display:false}},y:{grid:{color:"#eee"}}}}
    // });
  new Chart(document.getElementById("calorieChart"), {
    type: "bar",
    data: {
      labels: ["Sen","Sel","Rab","Kam","Jum","Sab","Min"],
      datasets:[{data:[400,500,450,560,420,610,300], backgroundColor:"#8b1e2e", borderRadius:6}]
    },
    options:{plugins:{legend:{display:false}}, scales:{x:{grid:{display:false}},y:{grid:{color:"#eee"}}}}
  });

  // /* Calendar */
  // const cal = document.getElementById("calendar");
  // let current = new Date(2025,9,1);
  // const events = ["2025-10-05","2025-10-10","2025-10-20"];
  // function renderCalendar(){
  //   cal.innerHTML = "";
  //   const year = current.getFullYear();
  //   const month = current.getMonth();
  //   document.getElementById("monthTitle").innerText = current.toLocaleString('id-ID',{month:'long',year:'numeric'});
  //   const first = new Date(year,month,1);
  //   const days = new Date(year,month+1,0).getDate();
  //   const offset = first.getDay();
  //   for(let i=0;i<offset;i++){
  //     const e=document.createElement("div");e.className="calendar-cell";e.style.visibility="hidden";cal.appendChild(e);
  //   }
  //   for(let d=1;d<=days;d++){
  //     const dateStr=`${year}-${String(month+1).padStart(2,'0')}-${String(d).padStart(2,'0')}`;
  //     const cell=document.createElement("div");
  //     cell.className="calendar-cell";
  //     cell.innerText=d;
  //     if(events.includes(dateStr))cell.classList.add("event");
  //     cal.appendChild(cell);
  //   }
  // }
  // document.getElementById("prevMonth").onclick=()=>{current.setMonth(current.getMonth()-1);renderCalendar()};
  // document.getElementById("nextMonth").onclick=()=>{current.setMonth(current.getMonth()+1);renderCalendar()};
  // renderCalendar();
  </script>





  <!--end::Body-->
</html>
