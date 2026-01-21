<?php
include "../koneksi.php";
$query = "SELECT COUNT(*) AS total FROM pelatih";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
$pelatih = $data['total'];
$query = "SELECT COUNT(*) AS total FROM program";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
$program = $data['total'];

?>

<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AdminLTE v4 | Dashboard</title>
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
    <link rel="preload" href="./css/adminlte.css" as="style" />
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
    <link rel="stylesheet" href="./css/adminlte.css" />
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
  </head>
<style>
  .task-card {
    transition: transform 0.2s;
  }
  .task-card:hover {
    transform: translateY(-5px);
  }

  /* membuat 3 kartu terlihat sekaligus (responsive) */
  .task-slider-wrapper .task-card {
    flex: 0 0 calc((100% - 2rem) / 3); /* 3 kartu + ruang antar (2 * 1rem) */
    max-width: calc((100% - 2rem) / 3);
  }
  .task-slider-wrapper .task-card:last-child {
    margin-right: 0;
  }
  #taskSlider {
    transition: transform 0.45s cubic-bezier(.22,.8,.28,1);
  }
  .team-avatars img {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    border: 2px solid #fff;
    margin-left: -8px;
  }
  .team-avatars img:first-child { margin-left: 0; }
  /* optional: nonaktifkan tombol saat disabled */
  button[disabled] { opacity: 0.45; pointer-events: none; }
  /* Responsif untuk Mobile */
@media (max-width: 768px) {
  .btn {
    font-size: 0.85rem;
    padding: 6px 10px;
  }

  .dataTables_wrapper .dataTables_filter input {
    width: 100% !important;
    margin-top: 5px;
  }

  .table-gym table {
    font-size: 0.85rem;
    display: block;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
  }
}

@media (max-width: 480px) {
  .header-section h3 {
    font-size: 1.1rem;
  }

  .btn {
    font-size: 0.75rem;
    padding: 4px 8px;
  }

  .table-gym th, .table-gym td {
    font-size: 0.75rem;
    padding: 6px 5px;
  }
  
}
.task-slider-wrapper {
  overflow-x: hidden;
  scroll-behavior: smooth;
}

.task-card {
  flex: 0 0 auto;
}

.team-avatars img {
  width: 26px;
  height: 26px;
  border-radius: 50%;
  border: 2px solid #fff;
  margin-left: -8px;
  box-shadow: 0 0 4px rgba(0,0,0,0.1);
}

/* Responsif */
@media (max-width: 768px) {
  .task-card { width: 75%; }
  #taskSlider { gap: 1rem; }
}
.task-slider-wrapper {
  scroll-behavior: smooth;
}

#taskSlider::-webkit-scrollbar {
  height: 8px;
}
#taskSlider::-webkit-scrollbar-thumb {
  background: #c5c5c5;
  border-radius: 4px;
}
#taskSlider::-webkit-scrollbar-thumb:hover {
  background: #888;
}

.task-card {
  flex: 0 0 auto;
  transition: transform 0.2s ease;
}
.task-card:hover {
  transform: translateY(-4px);
}
.team-avatars img {
  width: 26px;
  height: 26px;
  border-radius: 50%;
  border: 2px solid #fff;
  margin-left: -8px;
  box-shadow: 0 0 4px rgba(0,0,0,0.1);
}

/* Responsif Grid Behavior */
@media (max-width: 992px) {
  .task-card { min-width: 240px; }
}
@media (max-width: 768px) {
  .task-card { min-width: 210px; }
}
.task-slider-wrapper {
  scroll-behavior: smooth;
}

#taskSlider {
  scrollbar-width: thin;
  scrollbar-color: #ccc transparent;
}

#taskSlider::-webkit-scrollbar {
  height: 8px;
}
#taskSlider::-webkit-scrollbar-thumb {
  background-color: #bdbdbd;
  border-radius: 5px;
}
#taskSlider::-webkit-scrollbar-thumb:hover {
  background-color: #888;
}

.task-card {
  flex: 0 0 auto;
  transition: transform 0.2s ease;
}
.task-card:hover {
  transform: translateY(-4px);
}

.team-avatars img {
  width: 26px;
  height: 26px;
  border-radius: 50%;
  border: 2px solid #fff;
  margin-left: -8px;
  box-shadow: 0 0 4px rgba(0,0,0,0.1);
}

/* ✅ Responsif */
@media (max-width: 992px) {
  .task-card { width: 240px; }
}
@media (max-width: 768px) {
  .task-card { width: 200px; }
}
@media (max-width: 576px) {
  .task-card { width: 85%; margin: auto; }
  #taskSlider { justify-content: center !important; }
}
/* 🎨 Tema Gym */
  /* #calendar {
    min-height: 600px;
    background: #111827;
    border-radius: 15px;
    padding: 20px;
    color: #f8fafc;
    box-shadow: 0 0 15px rgba(255, 102, 0, 0.3);
  }
  .fc .fc-toolbar-title {
    color: #f97316;
    font-weight: 700;
    font-size: 1.4rem;
    text-transform: uppercase;
    letter-spacing: 1px;
  }
  .fc .fc-button-primary {
    background-color: #f97316;
    border: none;
  }
  .fc .fc-button-primary:hover {
    background-color: #fb923c;
  }
  .card-header.bg-primary {
    background: linear-gradient(135deg, #f97316, #ef4444);
    border-radius: 10px 10px 0 0;
  } */
</style>

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
      <nav class="app-header navbar navbar-expand " style="background-color: rgb(218, 212, 181);">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Start Navbar Links-->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list"></i>
              </a>
            </li>
            <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Home</a></li>
            <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Contact</a></li>
          </ul>
          
          <!--end::Start Navbar Links-->
          <!--begin::End Navbar Links-->
          <ul class="navbar-nav ms-auto">
            <!--begin::Navbar Search-->
            <li class="nav-item">
              <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="bi bi-search"></i>
              </a>
            </li>
            <!--end::Navbar Search-->
            <!--begin::Messages Dropdown Menu-->
            <li class="nav-item dropdown">
              <a class="nav-link" data-bs-toggle="dropdown" href="#">
                <i class="bi bi-chat-text"></i>
                <span class="navbar-badge badge text-bg-danger">3</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <a href="#" class="dropdown-item">
                  <!--begin::Message-->
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <img
                        src="./assets/img/user1-128x128.jpg"
                        alt="User Avatar"
                        class="img-size-50 rounded-circle me-3"
                      />
                    </div>
                    <div class="flex-grow-1">
                      <h3 class="dropdown-item-title">
                        Brad Diesel
                        <span class="float-end fs-7 text-danger"
                          ><i class="bi bi-star-fill"></i
                        ></span>
                      </h3>
                      <p class="fs-7">Call me whenever you can...</p>
                      <p class="fs-7 text-secondary">
                        <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                      </p>
                    </div>
                  </div>
                  <!--end::Message-->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <!--begin::Message-->
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <img
                        src="./assets/img/user8-128x128.jpg"
                        alt="User Avatar"
                        class="img-size-50 rounded-circle me-3"
                      />
                    </div>
                    <div class="flex-grow-1">
                      <h3 class="dropdown-item-title">
                        John Pierce
                        <span class="float-end fs-7 text-secondary">
                          <i class="bi bi-star-fill"></i>
                        </span>
                      </h3>
                      <p class="fs-7">I got your message bro</p>
                      <p class="fs-7 text-secondary">
                        <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                      </p>
                    </div>
                  </div>
                  <!--end::Message-->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <!--begin::Message-->
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <img
                        src="./assets/img/user3-128x128.jpg"
                        alt="User Avatar"
                        class="img-size-50 rounded-circle me-3"
                      />
                    </div>
                    <div class="flex-grow-1">
                      <h3 class="dropdown-item-title">
                        Nora Silvester
                        <span class="float-end fs-7 text-warning">
                          <i class="bi bi-star-fill"></i>
                        </span>
                      </h3>
                      <p class="fs-7">The subject goes here</p>
                      <p class="fs-7 text-secondary">
                        <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                      </p>
                    </div>
                  </div>
                  <!--end::Message-->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
              </div>
            </li>
            <!--end::Messages Dropdown Menu-->
            <!--begin::Notifications Dropdown Menu-->
            <li class="nav-item dropdown">
              <a class="nav-link" data-bs-toggle="dropdown" href="#">
                <i class="bi bi-bell-fill"></i>
                <span class="navbar-badge badge text-bg-warning">15</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="bi bi-envelope me-2"></i> 4 new messages
                  <span class="float-end text-secondary fs-7">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="bi bi-people-fill me-2"></i> 8 friend requests
                  <span class="float-end text-secondary fs-7">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="bi bi-file-earmark-fill me-2"></i> 3 new reports
                  <span class="float-end text-secondary fs-7">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer"> See All Notifications </a>
              </div>
            </li>
            <!--end::Notifications Dropdown Menu-->
            <!--begin::Fullscreen Toggle-->
            <li class="nav-item">
              <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
              </a>
            </li>
            <!--end::Fullscreen Toggle-->
            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img
                  src="./assets/img/user2-160x160.jpg"
                  class="user-image rounded-circle shadow"
                  alt="User Image"
                />
                <span class="d-none d-md-inline">admin </span>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <!--begin::User Image-->
                <li class="user-header text-bg-primary">
                  <img
                    src="./assets/img/user2-160x160.jpg"
                    class="rounded-circle shadow"
                    alt="User Image"
                  />
                  <p>
                    Alexander Pierce - Web Developer
                    <small>Member since Nov. 2023</small>
                  </p>
                </li>
                
                <!--end::User Image-->
                <!--begin::Menu Body-->
                <li class="user-body">
                  <!--begin::Row-->
                  <div class="row">
                    <div class="col-4 text-center"><a href="#">Followers</a></div>
                    <div class="col-4 text-center"><a href="#">Sales</a></div>
                    <div class="col-4 text-center"><a href="#">Friends</a></div>
                  </div>
                  <!--end::Row-->
                </li>
                <!--end::Menu Body-->
                <!--begin::Menu Footer-->
                <li class="user-footer">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                  <a href="#" class="btn btn-default btn-flat float-end">Sign out</a>
                </li>
                <!--end::Menu Footer-->
              </ul>
            </li>
            <!--end::User Menu Dropdown-->
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <button
                class="btn btn-link nav-link py-2 px-0 px-lg-2 dropdown-toggle d-flex align-items-center"
                id="bd-theme"
                type="button"
                aria-expanded="false"
                data-bs-toggle="dropdown"
                data-bs-display="static"
              >
                <span class="theme-icon-active">
                  <i class="my-1"></i>
                </span>
                <span class="d-lg-none ms-2" id="bd-theme-text"></span>
              </button>
              <ul
                class="dropdown-menu dropdown-menu-end"
                aria-labelledby="bd-theme-text"
                style="--bs-dropdown-min-width: 8rem;"
              >
                <li>
                  <button
                    type="button"
                    class="dropdown-item d-flex align-items-center active"
                    data-bs-theme-value="light"
                    aria-pressed="false"
                  >
                    <i class="bi bi-sun-fill me-2"></i>
                    Light
                    <i class="bi bi-check-lg ms-auto d-none"></i>
                  </button>
                </li>
                <li>
                  <button
                    type="button"
                    class="dropdown-item d-flex align-items-center"
                    data-bs-theme-value="dark"
                    aria-pressed="false"
                  >
                    <i class="bi bi-moon-fill me-2"></i>
                    Dark
                    <i class="bi bi-check-lg ms-auto d-none"></i>
                  </button>
                </li>
                <li>
                  <button
                    type="button"
                    class="dropdown-item d-flex align-items-center"
                    data-bs-theme-value="auto"
                    aria-pressed="true"
                  >
                    <i class="bi bi-circle-fill-half-stroke me-2"></i>
                    Auto
                    <i class="bi bi-check-lg ms-auto d-none"></i>
                  </button>
                </li>
              </ul>
            </li>
          </ul>
          <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
      </nav>

      
      <!--end::Header-->
      <!--begin::Sidebar-->
      <aside class="app-sidebar  shadow" data-bs-theme="dark" style="background-color: rgb(116, 9, 56);">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="./index.php" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="./assets/img/AdminLTELogo.png"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">GYM ZAL ZUL</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="navigation"
              aria-label="Main navigation"
              data-accordion="false"
              id="navigation"
            >
            <li class="nav-header">HALAMAN UTAMA</li>
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    Dashboard
                   
                  </p>
                </a>
                
              </li>
              
              
              <!-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-tree-fill"></i>
                  <p>
                    UI Elements
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  
                  <li class="nav-item">
                    <a href="./UI/timeline.php" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Timeline</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-pencil-square"></i>
                  <p>
                    Forms
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./forms/general.php" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>General Elements</p>
                    </a>
                  </li>
                </ul>
              </li> -->
              <li class="nav-header">KUMPULAN DATA</li>
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="nav-icon bi bi-clipboard2-data"></i>
                  <p>
                    Data User
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview ms-3"> <!-- Tambahkan ms-3 -->
                  <li class="nav-item">
                    <a href="./tables/member.php" class="nav-link">
                      <i class="nav-icon bi bi-people-fill"></i>
                      <p>Data member</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-header"> MANAJEMEN</li>
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="nav-icon bi bi-clipboard2-data"></i>
                  <p>
                    KELOLA DATA
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview ms-3"> <!-- Tambahkan ms-3 -->
                  <li class="nav-item">
                    <a href="./tables/pelatih.php" class="nav-link">
                     <i class="nav-icon bi bi-person-vcard"></i>
                      <p>Data Pelatih</p>
                    </a>
                  </li>
                  <!-- <li class="nav-item">
                    <a href="./tables/jadwal.php" class="nav-link">
                     <i class="nav-icon bi bi-alarm-fill"></i>
                      <p>Data Jadwal</p>
                    </a>
                  </li> -->
                  <li class="nav-item">
                    <a href="./tables/kategori.php" class="nav-link">
                     <i class="nav-icon bi bi-person-arms-up"></i>
                      <p>Data Kategori Latihan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./tables/program.php" class="nav-link">
                     <i class="nav-icon bi bi-activity"></i>
                      <p>Daftar program</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./tables/program_latihan.php" class="nav-link">
                     <i class="nav-icon bi bi-cash-stack"></i>
                      <p>Data Program Latihan</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->
      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Dashboard</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content" >
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
           <div class="row">
          <!-- Box 1 -->
          <div class="col-lg-3 col-6" >
            <div class="small-box text-bg-primary">
              <div class="inner">
                <h3>150</h3>
                <p>Data Member</p>
              </div>
              <div class="small-box-icon">
                <i class="nav-icon bi bi-people-fill"></i>
              </div>
              <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                More info <i class="bi bi-link-45deg"></i>
              </a>
            </div>
          </div>

            <!-- Box 2 -->
            <div class="col-lg-3 col-6">
              <div class="small-box text-bg-success">
                <div class="inner">
                  <h3><?php echo $program ?><sup class="fs-5"></sup></h3>
                  <p>Data program</p>
                </div>
                <div class="small-box-icon">
                  <i class="nav-icon bi bi-alarm-fill"></i>
                </div>
                <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                  More info <i class="bi bi-link-45deg"></i>
                </a>
              </div>
            </div>

            <!-- Box 3 -->
            <div class="col-lg-3 col-6">
              <div class="small-box text-bg-warning">
                <div class="inner">
                  <h3><?php echo $pelatih ?></h3>
                  <p>Data Pelatih</p>
                </div>
                <div class="small-box-icon">
                  <i class="bi bi-person-vcard"></i>
                </div>
                <a href="#" class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
                  More info <i class="bi bi-link-45deg"></i>
                </a>
              </div>
            </div>

            <!-- Box 4 -->
            <div class="col-lg-3 col-6">
              <div class="small-box text-bg-danger">
                <div class="inner">
                  <h3>65</h3>
                  <p>Data kelas</p>
                </div>
                <div class="small-box-icon">
                  <i class="nav-icon bi bi-person-arms-up"></i>
                </div>
                <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                  More info <i class="bi bi-link-45deg"></i>
                </a>
              </div>
            </div>
          </div>

            <!--end::Row-->
            <!--begin::Row-->
            <div class="row g-4">
  <!-- ===================== KOLOM KIRI ===================== -->
  <div class="col-lg-8 connectedSortable">
    
    <!-- ===== Grafik Nutrisi ===== -->
    <div class="card mb-4 shadow-sm border-0">
      <div class="card-header bg-white border-0">
        <h4 class="fw-bold mb-0 text-primary">
          <i class="bi bi-bar-chart-line me-2"></i> Perkembangan Kalori & Gula Harian
        </h4>
      </div>
      <div class="card-body">
        <div id="nutrition-chart" style="min-height: 320px;"></div>
        <small class="text-muted d-block mt-2">
          📉 Rata-rata kadar gula minggu ini menurun <strong>5%</strong> dibanding minggu lalu.
        </small>
      </div>
    </div>

    <!-- ===== Daftar Program (Slider) ===== -->
    <?php
include '../koneksi.php';
$queryProgram = mysqli_query($conn, "SELECT * FROM program ORDER BY id_program DESC");
$totalProgram = mysqli_num_rows($queryProgram);
?>

<div class="card mb-4 border-0 shadow-sm">
  <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center flex-wrap">
    <h4 class="fw-bold mb-0">
      <i class="bi bi-grid text-primary me-2"></i> Daftar Program
    </h4>
    <div class="mt-2 mt-sm-0">
      <button id="prevBtn" class="btn btn-outline-primary rounded-circle me-2" aria-label="Previous">
        <i class="bi bi-chevron-left"></i>
      </button>
      <button id="nextBtn" class="btn btn-outline-primary rounded-circle" aria-label="Next">
        <i class="bi bi-chevron-right"></i>
      </button>
    </div>
  </div>

  <div class="card-body px-3">
    <div class="task-slider-wrapper position-relative">
      <div id="taskSlider" class="d-flex align-items-stretch gap-3 flex-nowrap overflow-auto px-2 pb-2 justify-content-<?= $totalProgram <= 3 ? 'center' : 'start' ?>">

        <?php while ($row = mysqli_fetch_assoc($queryProgram)): ?>
          <?php 
            $fotoPath = "./uploads/" . basename($row['thumbnail']);
            if (empty($row['thumbnail']) || !file_exists($fotoPath)) {
                $fotoPath = "../uploads/default.jpg";
            }
          ?>
          <div class="task-card flex-shrink-0" style="width: 260px;">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
              <img src="<?= $fotoPath ?>" 
                   class="card-img-top" 
                   style="height: 160px; object-fit: cover;" 
                   alt="<?= htmlspecialchars($row['nama_program']) ?>">

              <div class="card-body">
                <h6 class="fw-semibold text-primary text-capitalize mb-1">
                  <?= htmlspecialchars($row['level'] ?? '-') ?>
                </h6>
                <p class="text-dark fw-medium mb-2"><?= htmlspecialchars($row['nama_program']) ?></p>

                <div class="d-flex justify-content-between align-items-center mb-2">
                  <small class="text-muted fw-semibold">Progress</small>
                  <small class="text-primary fw-semibold"><?= $row['progress'] ?? 0 ?>%</small>
                </div>

                <div class="progress mb-3" style="height: 6px;">
                  <div class="progress-bar bg-primary" style="width: <?= $row['progress'] ?? 0 ?>%;"></div>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                  <div class="text-secondary small d-flex align-items-center">
                    <i class="bi bi-clock me-2"></i><?= htmlspecialchars($row['waktu_sisa'] ?? '-') ?>
                  </div>
                  <div class="team-avatars d-flex">
                    <img src="https://randomuser.me/api/portraits/men/11.jpg" alt="">
                    <img src="https://randomuser.me/api/portraits/women/12.jpg" alt="">
                    <img src="https://randomuser.me/api/portraits/men/13.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>

      </div>
    </div>
  </div>
</div>
  </div>

  <!-- ===================== KOLOM KANAN ===================== -->
  <div class="col-lg-4 connectedSortable">

    <!-- ===== Peta Lokasi Gym ===== -->
    <div class="card text-white bg-danger bg-gradient border-0 shadow-sm mb-4">
      <div class="card-header border-0 d-flex justify-content-between align-items-center">
        <h4 class="card-title mb-0">📍 Peta Lokasi Cabang Gym</h4>
        <button type="button" class="btn btn-light btn-sm" data-lte-toggle="card-collapse">
          <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
          <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
        </button>
      </div>
      <div class="card-body">
        <div id="gym-map" style="height: 300px; border-radius: 10px;"></div>
      </div>
      <div class="card-footer border-0 text-center text-white-50">
        Klik marker untuk melihat detail cabang gym 💪
      </div>
    </div>

    <!-- ===== Kalender Jadwal ===== -->
    <div class="card shadow-lg border-0">
  <div class="card-header bg-danger text-white text-center py-3">
    <h4 class="mb-0 fw-bold">📅 Kalender Jadwal Latihan</h4>
    <small class="text-light">Jadwal latihan semua pelatih & kelas</small>
  </div>
  <div class="card-body p-4 bg-light">
    <div id="calendar" style="min-height: 500px;"></div>
  </div>
</div>

<!-- Modal Detail Jadwal -->
<div class="modal fade" id="modalJadwal" tabindex="-1" aria-labelledby="modalJadwalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-white" 
     style="background: linear-gradient(135deg, #0d6efd, #6f42c1);">

      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold" id="modalJadwalLabel">🧾 Detail Jadwal Latihan</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p><strong>Pelatih:</strong> <span id="pelatihModal"></span></p>
        <p><strong>Tanggal:</strong> <span id="tanggalModal"></span></p>
        <p><strong>Jam:</strong> <span id="jamModal"></span></p>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>


  </div>
</div>


          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
      <!--begin::Footer-->
      <footer class="app-footer">
        <!--begin::To the end-->
        <div class="float-end d-none d-sm-inline">Anything you want</div>
        <!--end::To the end-->
        <!--begin::Copyright-->
        <strong>
          Copyright &copy; 2014-2025&nbsp;
          <a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
        </strong>
        All rights reserved.
        <!--end::Copyright-->
      </footer>
      <!--end::Footer-->
    </div>
    <!-- FullCalendar -->
 <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const calendarEl = document.getElementById('calendar');
  if (!calendarEl) {
    console.error('Elemen kalender tidak ditemukan!');
    return;
  }

  const calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,listWeek'
    },
    events: './php/jadwal.php', // arahkan ke lokasi file kamu
    themeSystem: 'bootstrap5',
    eventClick: function(info) {
      const props = info.event.extendedProps;
      document.getElementById('pelatihModal').textContent = props.pelatih;
      document.getElementById('tanggalModal').textContent = props.tanggal;
      document.getElementById('jamModal').textContent = props.jam;

      const modal = new bootstrap.Modal(document.getElementById('modalJadwal'));
      modal.show();
    },
    eventDisplay: 'block',
    eventTimeFormat: { hour: '2-digit', minute: '2-digit', hour12: false },
    height: 650
  });

  calendar.render();
});
</script>
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
    
    <script>
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
    </script>
    <!--end::OverlayScrollbars Configure-->
    <!-- OPTIONAL SCRIPTS -->
    <!-- sortablejs -->
    <script
      src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"
      crossorigin="anonymous"
    ></script>
    <!-- sortablejs -->
    <script>
      new Sortable(document.querySelector('.connectedSortable'), {
        group: 'shared',
        handle: '.card-header',
      });

      const cardHeaders = document.querySelectorAll('.connectedSortable .card-header');
      cardHeaders.forEach((cardHeader) => {
        cardHeader.style.cursor = 'move';
      });
    </script>
    <!-- apexcharts -->
    <script
      src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
      integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
      crossorigin="anonymous"
    ></script>
    <!-- ChartJS -->
    <script>
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
    </script>
    <!-- ✅ Load ApexCharts dari CDN -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.45.2"></script>

<!-- ✅ Pastikan chart dibuat setelah seluruh halaman selesai dimuat -->
<script>
  window.addEventListener("load", function() {
    var options = {
      chart: {
        type: "line",
        height: 320,
        toolbar: { show: false },
        dropShadow: {
          enabled: true,
          color: "#000",
          top: 5,
          left: 5,
          blur: 3,
          opacity: 0.1
        }
      },
      colors: ["#2ecc71", "#e74c3c"], // hijau: kalori sehat, merah: gula
      series: [
        {
          name: "Kalori Masuk (kcal)",
          data: [1800, 1750, 1900, 2000, 1850, 1700, 1600]
        },
        {
          name: "Kadar Gula (mg/dL)",
          data: [130, 125, 128, 120, 118, 115, 110]
        }
      ],
      xaxis: {
        categories: ["Sen", "Sel", "Rab", "Kam", "Jum", "Sab", "Min"],
        title: { text: "Hari" }
      },
      yaxis: [
        {
          title: { text: "Kalori (kcal)" },
          min: 1000,
          max: 2500
        },
        {
          opposite: true,
          title: { text: "Gula Darah (mg/dL)" },
          min: 90,
          max: 150
        }
      ],
      stroke: { width: 3, curve: "smooth" },
      markers: { size: 5 },
      legend: {
        position: "top",
        horizontalAlign: "left",
        fontSize: "14px"
      },
      grid: { borderColor: "#eee", row: { colors: ["#fafafa", "transparent"] } }
    };

    // Pastikan id-nya benar
    var chartContainer = document.querySelector("#nutrition-chart");
    if (chartContainer) {
      var chart = new ApexCharts(chartContainer, options);
      chart.render();
    } else {
      console.error("⚠️ Elemen #nutrition-chart tidak ditemukan!");
    }
  });
</script>
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
    <script>
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
    </script>
    <!--end::Script-->
    <script>
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
    </script>
    <!-- ✅ Tambahkan di bawah semua elemen HTML -->
<link
  rel="stylesheet"
  href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    // ✅ Koordinat lokasi pusat (misal: Gym Pusat Bandung)
    var map = L.map("gym-map").setView([-6.9175, 107.6191], 11);

    // ✅ Tambahkan layer peta (OpenStreetMap)
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
      attribution:
        '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
    }).addTo(map);

    // ✅ Daftar cabang gym
    var gymBranches = [
      {
        name: "Gym Pusat Bandung",
        coords: [-6.9175, 107.6191],
        info: "Jl. Merdeka No. 88, Bandung",
      },
      {
        name: "Gym Cabang Jakarta",
        coords: [-6.2000, 106.8167],
        info: "Jl. Sudirman No. 55, Jakarta",
      },
      {
        name: "Gym Cabang Surabaya",
        coords: [-7.2575, 112.7521],
        info: "Jl. Darmo No. 12, Surabaya",
      },
      {
        name: "Gym Cabang Cimahi",
        coords: [-6.872, 107.542],
        info: "Jl. Raya Cimahi No. 77, Cimahi",
      },
    ];

    // ✅ Tambahkan marker untuk tiap cabang
    gymBranches.forEach(function (branch) {
      L.marker(branch.coords)
        .addTo(map)
        .bindPopup(
          `<b>${branch.name}</b><br>${branch.info}<br><span style='color:green;'>🟢 Aktif</span>`
        );
    });

    // ✅ Sesuaikan tampilan agar semua marker terlihat
    var group = new L.featureGroup(
      gymBranches.map((b) => L.marker(b.coords))
    );
    map.fitBounds(group.getBounds().pad(0.3));
  });
</script>

    
 <script>

  const slider = document.getElementById('taskSlider');
  const prevBtn = document.getElementById('prevBtn');
  const nextBtn = document.getElementById('nextBtn');
  const cards = Array.from(slider.querySelectorAll('.task-card'));

  if (!slider || cards.length === 0) {
    if(prevBtn) prevBtn.disabled = true;
    if(nextBtn) nextBtn.disabled = true;
    return;
  }

  let currentIndex = 0;
  const visibleCount = 3; // tampilkan minimal 3 sekaligus (jika cards < 3, otomatis menyesuaikan)
  const maxIndex = () => Math.max(0, cards.length - Math.min(visibleCount, cards.length));

  function computeCardStep() {
    // lebar kartu + margin-right
    const c = cards[0];
    const rect = c.getBoundingClientRect();
    const style = getComputedStyle(c);
    const marginRight = parseFloat(style.marginRight) || 0;
    return rect.width + marginRight;
  }

  function update() {
    const step = computeCardStep();
    const translateX = - currentIndex * step;
    slider.style.transform = `translateX(${translateX}px)`;
    updateButtons();
  }

  function updateButtons() {
    const max = maxIndex();
    prevBtn.disabled = currentIndex <= 0;
    nextBtn.disabled = currentIndex >= max;
  }

  nextBtn.addEventListener('click', () => {
    const m = maxIndex();
    currentIndex = Math.min(m, currentIndex + 1);
    update();
  });

  prevBtn.addEventListener('click', () => {
    currentIndex = Math.max(0, currentIndex - 1);
    update();
  });

  // jika window diubah ukuran, hitung ulang dan pastikan index valid
  window.addEventListener('resize', () => {
    const m = maxIndex();
    if (currentIndex > m) currentIndex = m;
    update();
  });

  // inisialisasi
  // tampilkan sebanyak minimum 3 kartu ketika tersedia lebih dari 3
  update()
</script>
<script>
const slider = document.getElementById("taskSlider");
const nextBtn = document.getElementById("nextBtn");
const prevBtn = document.getElementById("prevBtn");

let cardWidth = 290;

nextBtn.addEventListener("click", () => {
  slider.scrollBy({ left: cardWidth, behavior: "smooth" });
});
prevBtn.addEventListener("click", () => {
  slider.scrollBy({ left: -cardWidth, behavior: "smooth" });
});

// Geser pakai sentuhan (mobile-friendly)
let startX = 0;
slider.addEventListener("touchstart", e => startX = e.touches[0].clientX);
slider.addEventListener("touchmove", e => {
  const diff = startX - e.touches[0].clientX;
  slider.scrollLeft += diff;
  startX = e.touches[0].clientX;
});
</script>
  
  </body>
  <!--end::Body-->
</html>
