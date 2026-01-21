<?php
include '../../koneksi.php'; 
// include '../php/proses_tambah_pelatih.php'; 

?>
<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AdminLTE 4 | Simple Tables</title>
    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->
    <!--begin::Primary Meta Tags-->
    <meta name="title" content="AdminLTE 4 | Simple Tables" />
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
    <!--end::Accessibility Features-->
    <!--begin::Fonts-->
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
    <!-- FullCalendar -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>

    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="../css/adminlte.css" />
    
    <!--end::Required Plugin(AdminLTE)-->
  </head>
  <style>
/* 🌌 Tema Gym Gelap + Gradasi Biru */
body {
  background-color: #0f172a; /* gelap navy */
  color: #e2e8f0;
  font-family: 'Poppins', sans-serif;
  margin: 0;
  padding: 0;
}

/* Container Card Tabel */
.table-gym {
  background: linear-gradient(135deg, rgb(116, 9, 56), rgb(218, 212, 181)); /* gradasi gelap ke terang */
  color: #000 !important; /* teks hitam agar kontras dengan warna terang */
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.6);
  padding: 20px;
}


/* Header tabel */
.table-gym thead {
   /* gradasi header */
  color: #fff !important;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  font-weight: 600;
}

/* Sel tabel */
.table-gym th, .table-gym td {
  vertical-align: middle;
  color: #000 !important; /* teks hitam */
  font-size: 0.95rem;
  white-space: nowrap;
}

/* Hover baris */
.table-gym tbody tr:hover {
  background: linear-gradient(90deg, #2563eb66, #3b82f666); /* hover gradasi biru transparan */
  transition: 0.3s ease-in-out;
}

/* Badge status */
.badge.bg-success {
  background: linear-gradient(90deg, #22d3ee, #3b82f6);
  color: #fff;
  font-weight: 500;
}

.badge.bg-secondary {
 background: linear-gradient(90deg, #f44336, #e63946, #b71c1c);

  color: #fff;
  font-weight: 500;
}

/* Tombol Tambah / Aksi */
.btn-primary {
  background: linear-gradient(90deg, #3b82f6, #60a5fa);
  border: none;
  color: #fff;
  font-weight: 500;
  box-shadow: 0 4px 15px rgba(59, 130, 246, 0.4);
  transition: all 0.3s ease;
}

.btn-primary:hover {
  background: linear-gradient(90deg, #60a5fa, #3b82f6);
  box-shadow: 0 6px 20px rgba(37, 99, 235, 0.6);
}

.btn-warning {
  background: linear-gradient(90deg, #facc15, #f59e0b);
  color: #1e293b;
}

.btn-warning:hover {
  background: linear-gradient(90deg, #f59e0b, #facc15);
}

.btn-danger {
  background: linear-gradient(90deg, #ef4444, #b91c1c);
}

.btn-danger:hover {
  background: linear-gradient(90deg, #b91c1c, #ef4444);
}

/* Header Section */
.header-section {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  margin-bottom: 20px;
  gap: 10px;
}

.header-section h3 {
  font-weight: 700;
  
  text-shadow: 0 0 10px rgba(59, 130, 246, 0.5);
}

/* Foto Pelatih */
.table-gym img {
  object-fit: cover;
  border: 2px solid #3b82f6;
  transition: transform 0.3s ease;
}

.table-gym img:hover {
  transform: scale(1.1);
  box-shadow: 0 0 15px rgba(59, 130, 246, 0.5);
}

/* Scroll bar tabel */
.table-gym::-webkit-scrollbar {
  height: 6px;
}

.table-gym::-webkit-scrollbar-thumb {
  
  border-radius: 3px;
}

/* DataTables Search bar & Show entries */
.dataTables_wrapper .dataTables_filter {
  text-align: right;
  float: right;
  margin-bottom: 10px;
}
.dataTables_wrapper .dataTables_info {
  color: #fff !important;
  font-weight: 500;
}
.dataTables_wrapper .dataTables_filter label {
  color: #fff !important;
  font-weight: 500;
}

.dataTables_wrapper .dataTables_length label {
  color: #fff !important;
  font-weight: 500;
}

/* Input search */
.dataTables_filter input {
  background-color: #e5e7eb;
  color: #000;
 
  border-radius: 6px;
  padding: 6px 12px;
  width: 200px;
  transition: all 0.3s ease;
}

.dataTables_filter input:focus {
  outline: none;
 
  box-shadow: 0 0 5px rgba(37, 99, 235, 0.5);
}

/* Select "Show entries" style */
.dataTables_length select {
  background-color: #1e3a8a;
  color: #fff;
  
  border-radius: 5px;
  padding: 4px 8px;
}

/* Container pagination */
.dataTables_wrapper .dataTables_paginate {
  margin-top: 15px;
  display: flex;
  justify-content: center;
  gap: 5px;
  font-family: Arial, sans-serif;
}

/* Container pagination */
.dataTables_wrapper .dataTables_paginate {
  margin-top: 20px;
  display: flex;
  justify-content: flex-end; /* mentok kanan */
  gap: 8px; /* jarak antar tombol */
  font-family: Arial, sans-serif;
}

/* Semua tombol pagination */
.dataTables_wrapper .dataTables_paginate .paginate_button {
  background: linear-gradient(135deg, #e63946, #d90429) !important;
  color: #fff !important;
  border: none !important;
  border-radius: 50%; /* bulat */
  width: 36px;
  height: 36px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: transform 0.2s, background 0.2s;
  font-size: 14px;
  padding: 0;
  text-align: center;
}

/* Tombol navigasi sebelumnya / berikutnya */
.dataTables_wrapper .dataTables_paginate .previous,
.dataTables_wrapper .dataTables_paginate .next {
  border-radius: 6px; /* agak bulat */
  width: auto; /* menyesuaikan teks */
  padding: 6px 12px;
  font-weight: 500;
}

/* Hover tombol */
.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
  transform: scale(1.1);
  background: linear-gradient(135deg, #d90429, #e63946) !important;
}

/* Halaman aktif / nomor 1 */
.dataTables_wrapper .dataTables_paginate .paginate_button.current,
.dataTables_wrapper .dataTables_paginate .paginate_button.active {
  background: #b71c1c !important;
  color: #fff !important;
  font-weight: 600;
  transform: scale(1.15);
}

/* Tombol disabled */
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
  background: #eee !important;
  color: #aaa !important;
  cursor: not-allowed;
}



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
.btn-gradasi-merah {
  background: linear-gradient(135deg, #e63946, #d90429); /* gradasi merah */
  color: #fff; /* teks putih agar kontras */
  border: none; /* hapus border default */
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
  transition: 0.3s; /* animasi halus saat hover */
}

.btn-gradasi-merah:hover {
  background: linear-gradient(135deg, #d90429, #e63946); /* arah gradasi dibalik saat hover */
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
}
.gradasi-merah {
  background: linear-gradient(135deg, #e63946, #d90429); /* gradasi merah */
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  font-weight: bold;
}
.header-gradasi h3 {
  background: linear-gradient(135deg, #e63946, #d90429); /* gradasi merah */
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  font-weight: bold;
}

</style>


  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
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
              src="../assets/img/AdminLTELogo.png"
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
                    <a href="member.php" class="nav-link">
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
                    <a href="pelatih.php" class="nav-link">
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
                    <a href="kategori.php" class="nav-link">
                     <i class="nav-icon bi bi-person-arms-up"></i>
                      <p>Data Kategori Latihan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="program.php" class="nav-link">
                     <i class="nav-icon bi bi-activity"></i>
                      <p>Data Program</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="program_latihan.php" class="nav-link">
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
              
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-start">
                  <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data Pelatih</li>
                </ol>
              </div>
            </div>
            
            <div class="card-body">
                
        <div class="table-responsive">
            
          <!-- Tabel Pelatih -->
 <div class="container-fluid mt-4">
  <<div class="header-section header-gradasi">
    <h3>🏋️ Data Pelatih Gym</h3>


    <button class="btn btn-gradasi-merah" data-bs-toggle="modal" data-bs-target="#modalTambahPelatih">
  <i class="bi bi-plus-circle"></i> Tambah Pelatih
</button>

  </div>

  <div class="card table-gym p-4 shadow-lg border-0  text-light rounded-4">
  <h5 class="mb-3 gradasi-merah">
  <i class="bi bi-person-badge me-2"></i>Daftar Pelatih Gym
</h5>


<?php
include '../../koneksi.php';
date_default_timezone_set('Asia/Jakarta');

// 🕒 Ambil waktu saat ini
$now = date('Y-m-d H:i');

// 🔁 Hapus jadwal lama di setiap pelatih
$cekPelatih = mysqli_query($conn, "SELECT id_pelatih, jadwal_available FROM pelatih");
while ($row = mysqli_fetch_assoc($cekPelatih)) {
    $id = $row['id_pelatih'];
    $jadwalText = trim($row['jadwal_available']);
    if (empty($jadwalText)) continue;

    // Pisahkan jadwal jadi array
    $jadwalList = array_map('trim', explode(',', $jadwalText));
    $jadwalBaru = [];

    // Cek satu per satu tanggal
    foreach ($jadwalList as $item) {
        if (strtotime($item) >= strtotime($now)) {
            $jadwalBaru[] = $item; // simpan jadwal yang masih akan datang
        }
    }

    // Gabungkan kembali jadwal yang valid
    $jadwalFinal = implode(', ', $jadwalBaru);

    // Update ke database hanya jika ada perubahan
    if ($jadwalFinal != $jadwalText) {
        mysqli_query($conn, "UPDATE pelatih SET jadwal_available = '$jadwalFinal' WHERE id_pelatih = '$id'");
    }
}
?>

<!-- ===== TABEL PELATIH ===== -->
<table id="tabelPelatih" class="table table-striped table-hover align-middle w-100">
    <thead class="text-center text-uppercase">
        <tr>
            <th>No</th>
            <th>Nama Pelatih</th>
            <th>Jenis Kelamin</th>
            <th>No. Telepon</th>
            <th>Email</th>
            <th>Spesialisasi</th>
            <th>Pengalaman</th>
            <th>Jadwal</th>
            <th>Status</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $query = mysqli_query($conn, "SELECT * FROM pelatih ORDER BY id_pelatih DESC");

        while ($row = mysqli_fetch_assoc($query)) {

            echo "<tr>
                    <td class='text-center fw-semibold text-black'>{$no}</td>
                    <td class='text-dark'>{$row['nama_pelatih']}</td>
                    <td class='text-center text-dark'>{$row['jenis_kelamin']}</td>
                    <td class='text-center text-dark'>{$row['no_telepon']}</td>
                    <td class='text-dark'>{$row['email']}</td>
                    <td class='text-dark'>{$row['spesialisasi']}</td>
                    <td class='text-center text-dark'>{$row['pengalaman_tahun']} th</td>
                    <td class='text-center'>";

            // 🔹 Tombol Lihat Jadwal
            if (!empty($row['jadwal_available'])) {
                echo "<button class='btn btn-sm btn-info view-calendar-btn' 
                             data-id='{$row['id_pelatih']}' 
                             data-bs-toggle='modal' 
                             data-bs-target='#modalJadwal'>
                        Lihat Jadwal
                      </button>";
            } else {
                echo "<span class='text-muted'>-</span>";
            }

            echo "</td>
                    <td class='text-center'>
                        <span class='badge " . ($row['status'] == 'Aktif' ? 'bg-success' : 'bg-secondary') . " px-3 py-2 rounded-pill shadow-sm'>
                            {$row['status']}
                        </span>
                    </td>
                    <td class='text-center'>";

            // 🔹 Path foto (karena di DB hanya nama file)
            $fotoPath = "../../dist/uploads/pelatih/" . $row['foto_pelatih'];

            if (!empty($row['foto_pelatih']) && file_exists($fotoPath)) {
                echo "<img src='{$fotoPath}' class='rounded-circle border border-danger shadow-sm' width='55' height='55' style='object-fit:cover;'>";
            } else {
                echo "<div class='d-flex justify-content-center align-items-center' style='width:55px;height:55px;border-radius:50%;background:#f0f0f0;border:1px solid #ccc;'>
                        <i class='bi bi-person text-muted fs-4'></i>
                      </div>";
            }

            echo "</td>
                  <td class='text-center'>
                    <button class='btn btn-sm btn-warning edit-btn me-1' 
                            data-id='{$row['id_pelatih']}' 
                            title='Edit Data'>
                      <i class='bi bi-pencil-square'></i>
                    </button>
                    <button class='btn btn-sm btn-danger delete-btn' 
                            data-id='{$row['id_pelatih']}' 
                            title='Hapus Data'>
                      <i class='bi bi-trash'></i>
                    </button>
                  </td>
                </tr>";

            $no++;
        }
        ?>
    </tbody>
</table>




  
</div>


</div>
        </div>
      </div>
      
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              
              <!-- /.col -->
            </div>
            <!--end::Row-->
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
    <script src="../js/adminlte.js"></script>
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
      <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

  <!-- Bootstrap Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- ====== MODAL TAMBAH PELATIH ====== -->
 <!-- ===== MODAL TAMBAH DATA PELATIH ===== -->
<div class="modal fade" id="modalTambahPelatih" tabindex="-1" aria-labelledby="modalTambahPelatihLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content shadow-lg border-0 rounded-4">
      <div class="modal-header bg-gradient bg-danger text-white">
        <h5 class="modal-title fw-semibold" id="modalTambahPelatihLabel">
          <i class="bi bi-person-plus me-2"></i> Tambah Data Pelatih
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <form id="formTambahPelatih" enctype="multipart/form-data">
        <div class="modal-body px-4 py-3">
          <div class="row g-3">
            <!-- Nama Pelatih -->
            <div class="col-md-6">
              <label class="form-label fw-semibold">Nama Pelatih</label>
              <input type="text" name="nama_pelatih" class="form-control" placeholder="Masukkan nama pelatih" required>
            </div>

            <!-- Jenis Kelamin -->
            <div class="col-md-6">
              <label class="form-label fw-semibold">Jenis Kelamin</label>
              <select name="jenis_kelamin" class="form-select" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>

            <!-- No Telepon -->
            <div class="col-md-6">
              <label class="form-label fw-semibold">No. Telepon</label>
              <input type="text" name="no_telepon" class="form-control" placeholder="Contoh: 08123456789" required>
            </div>

            <!-- Email -->
            <div class="col-md-6">
              <label class="form-label fw-semibold">Email</label>
              <input type="email" name="email" class="form-control" placeholder="Masukkan email aktif" required>
            </div>

            <!-- Alamat -->
            <div class="col-12">
              <label class="form-label fw-semibold">Alamat</label>
              <textarea name="alamat" class="form-control" rows="2" placeholder="Masukkan alamat lengkap" required></textarea>
            </div>

            <!-- Spesialisasi -->
            <div class="col-md-6">
              <label class="form-label fw-semibold">Spesialisasi</label>
              <select name="spesialisasi" class="form-select" required>
                <option value="">-- Pilih Spesialisasi --</option>
                <?php
                include '../../koneksi.php';
                $query = mysqli_query($conn, "SELECT * FROM program ORDER BY nama_program ASC");
                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<option value='{$row['nama_program']}'>{$row['nama_program']}</option>";
                }
                ?>
              </select>
            </div>

            <!-- Pengalaman -->
            <div class="col-md-6">
              <label class="form-label fw-semibold">Pengalaman (Tahun)</label>
              <input type="number" name="pengalaman_tahun" class="form-control" min="0" placeholder="Contoh: 5" required>
            </div>

            <!-- Kuota -->
            <div class="col-md-6">
              <label class="form-label fw-semibold">Kuota</label>
              <input type="number" name="kuota" class="form-control" min="0" placeholder="Masukkan jumlah peserta" required>
            </div>

            <!-- Tempat -->
            <div class="col-md-6">
              <label class="form-label fw-semibold">Tempat Latihan</label>
              <input type="text" name="tempat" class="form-control" placeholder="Masukkan lokasi latihan" required>
            </div>

            <!-- Jadwal -->
            <div class="col-12">
              <label class="form-label fw-semibold">Jadwal Tersedia</label>
              <input type="text" id="jadwal_available" name="jadwal_available" class="form-control" placeholder="Pilih tanggal & waktu tersedia" required>
              <small class="text-muted">Gunakan multi-pilih (klik beberapa tanggal).</small>
            </div>

            <!-- Foto -->
            <div class="col-md-6">
              <label class="form-label fw-semibold">Foto Pelatih</label>
              <input type="file" name="foto_pelatih" class="form-control" accept="image/*">
            </div>

            <!-- Status -->
            <div class="col-md-6">
              <label class="form-label fw-semibold">Status</label>
              <select name="status" class="form-select">
                <option value="Aktif">Aktif</option>
                <option value="Nonaktif">Nonaktif</option>
              </select>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="bi bi-x-circle me-1"></i> Batal
          </button>
          <button type="submit" class="btn btn-danger">
            <i class="bi bi-save2 me-1"></i> Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>


 <!-- ===== MODAL LIHAT JADWAL ===== -->
<div class="modal fade" id="modalJadwal" tabindex="-1" aria-labelledby="modalJadwalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content shadow-lg border-0">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalJadwalLabel">
          <i class="bi bi-calendar-week me-2"></i> Jadwal Pelatih
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="jadwalContainer" class="text-center py-3 text-muted">
          Memuat data jadwal...
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".view-calendar-btn").forEach(btn => {
    btn.addEventListener("click", async () => {
      const idPelatih = btn.getAttribute("data-id");
      const container = document.getElementById("jadwalContainer");
      container.innerHTML = "<div class='py-3 text-muted'>Memuat data jadwal...</div>";

      try {
        const res = await fetch(`../php/get_jadwal.php?id=${idPelatih}`);
        const data = await res.json();

        if (data.success && data.jadwal.length > 0) {
          let html = `
            <div class="table-responsive">
              <table class="table table-bordered align-middle text-center">
                <thead class="table-light">
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                  </tr>
                </thead>
                <tbody>
          `;

          data.jadwal.forEach((j, i) => {
            html += `
              <tr>
                <td>${i + 1}</td>
                <td>${j.tanggal}</td>
                <td>${j.waktu}</td>
              </tr>
            `;
          });

          html += `</tbody></table></div>`;
          container.innerHTML = html;
        } else {
          container.innerHTML = "<p class='text-danger'>Tidak ada jadwal tersedia untuk pelatih ini.</p>";
        }
      } catch (err) {
        container.innerHTML = "<p class='text-danger'>Gagal memuat jadwal.</p>";
        console.error(err);
      }
    });
  });
});
</script>

<!-- Modal Tambah Pelatih -->
<!-- Modal Tambah Program -->
<div class="modal fade" id="modalTambahProgram" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Tambah Program Gym</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form id="formProgram" enctype="multipart/form-data">
        <input type="hidden" name="action" value="create">
        <div class="modal-body">
          <div class="mb-3">
            <label>Nama Program</label>
            <input type="text" name="nama_program" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
          </div>
          <div class="mb-3">
            <label>Durasi</label>
            <input type="text" name="durasi" class="form-control">
          </div>
          <div class="mb-3">
            <label>Level</label>
            <select name="level" class="form-select">
              <option value="Pemula">Pemula</option>
              <option value="Menengah">Menengah</option>
              <option value="Lanjutan">Lanjutan</option>
            </select>
          </div>
          <div class="mb-3">
            <label>Thumbnail</label>
            <input type="file" name="thumbnail" accept="image/*" class="form-control">
          </div>
          <div class="mb-3">
            <label>Video</label>
            <input type="file" name="video" id="videoFile" class="form-control">
          </div>
          <div class="mb-3">
            <progress id="progressBar" value="0" max="100" style="width:100%;"></progress>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Tambah Program</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal Edit Pelatih -->
<div class="modal fade" id="modalEditPelatih" tabindex="-1" aria-labelledby="modalEditPelatihLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header bg-warning text-dark">
        <h5 class="modal-title" id="modalEditPelatihLabel">Edit Data Pelatih</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form id="formEditPelatih" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="id_pelatih" id="edit_id_pelatih">

        <div class="modal-body">
          <div class="row g-3">

            <div class="col-md-6">
              <label class="form-label">Nama Pelatih</label>
              <input type="text" name="nama_pelatih" id="edit_nama_pelatih" class="form-control" required>
            </div>

            <div class="col-md-6">
              <label class="form-label">Jenis Kelamin</label>
              <select name="jenis_kelamin" id="edit_jenis_kelamin" class="form-select" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label">No. Telepon</label>
              <input type="text" name="no_telepon" id="edit_no_telepon" class="form-control">
            </div>

            <div class="col-md-6">
              <label class="form-label">Email</label>
              <input type="email" name="email" id="edit_email" class="form-control">
            </div>

            <div class="col-md-12">
              <label class="form-label">Alamat</label>
              <textarea name="alamat" id="edit_alamat" class="form-control" rows="2"></textarea>
            </div>

            <div class="col-md-6">
              <label class="form-label">Spesialisasi</label>
              <input type="text" name="spesialisasi" id="edit_spesialisasi" class="form-control" placeholder="Contoh: Yoga, Fitness, Cardio">
            </div>

            <div class="col-md-6">
              <label class="form-label">Pengalaman (Tahun)</label>
              <input type="number" name="pengalaman_tahun" id="edit_pengalaman_tahun" class="form-control" min="0">
            </div>

            <!-- Kuota -->
            <div class="col-md-6">
              <label class="form-label">Kuota</label>
              <input type="number" name="kuota" id="edit_kuota" class="form-control" min="0" placeholder="Masukkan jumlah peserta">
            </div>

            <!-- Tempat -->
            <div class="col-md-6">
              <label class="form-label">Tempat Latihan</label>
              <input type="text" name="tempat" id="edit_tempat" class="form-control" placeholder="Masukkan lokasi latihan">
            </div>

            <div class="col-md-12">
              <label class="form-label">Jadwal Tersedia</label>
              <input type="text" name="jadwal_available" id="edit_jadwal_available" class="form-control" placeholder="Pilih tanggal / waktu tersedia">
            </div>

            <div class="col-md-12">
              <label class="form-label">Foto Pelatih</label>
              <div class="d-flex align-items-center gap-3">
                <img id="preview_foto_pelatih" src="" alt="Foto Lama" class="rounded-circle border border-danger" width="65" height="65">
                <input type="file" name="foto_pelatih" class="form-control" accept="image/*" onchange="previewFotoEdit(event)">
              </div>
              <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
            </div>

            <div class="col-md-6">
              <label class="form-label">Status</label>
              <select name="status" id="edit_status" class="form-select">
                <option value="Aktif">Aktif</option>
                <option value="Nonaktif">Nonaktif</option>
              </select>
            </div>

          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-warning text-dark">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  const form = document.getElementById("formProgram");
const videoInput = document.getElementById("videoFile");
const progressBar = document.getElementById("progressBar");

form.addEventListener("submit", async (e) => {
  e.preventDefault();

  const videoFile = videoInput.files[0];
  if (!videoFile) {
    alert("Pilih file video!");
    return;
  }

  const chunkSize = 5 * 1024 * 1024; // 5 MB per chunk
  const totalChunks = Math.ceil(videoFile.size / chunkSize);
  const fileName = Date.now() + "_" + videoFile.name;

  // Upload per chunk
  for (let i = 0; i < totalChunks; i++) {
    const start = i * chunkSize;
    const end = Math.min(start + chunkSize, videoFile.size);
    const chunk = videoFile.slice(start, end);

    const chunkData = new FormData();
    chunkData.append("action", "upload_chunk");
    chunkData.append("file", chunk);
    chunkData.append("file_name", fileName);
    chunkData.append("chunk_index", i);
    chunkData.append("total_chunks", totalChunks);

    await fetch("../php/proses_program.php", { method: "POST", body: chunkData });

    progressBar.value = ((i + 1) / totalChunks) * 100;
  }

  // Setelah semua chunk selesai, submit form data lain
  const formData = new FormData(form);
  formData.append("video_name", fileName);

  const res = await fetch("../php/proses_program.php", { method: "POST", body: formData });
  const result = await res.text();
  if (result.trim() === "success") {
    alert("Program berhasil ditambahkan!");
    location.reload();
  } else {
    alert("Gagal: " + result);
  }
});

</script>

<!-- ====== SCRIPT PREVIEW FOTO & DATE PICKER ====== -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/id.js"></script>
<script>
  // Jadwal: Flatpickr di form edit
  flatpickr("#edit_jadwal_available", {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    mode: "multiple",
    altInput: true,
    altFormat: "j F Y (H:i)",
    locale: "id"
  });

  // Preview foto sebelum upload
  function previewFotoEdit(event) {
    const file = event.target.files[0];
    const preview = document.getElementById("preview_foto_pelatih");
    if (file) {
      preview.src = URL.createObjectURL(file);
    }
  }
</script>

<!-- ====== LIBRARY ====== -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/id.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<!-- <script>
  $(document).ready(function () {
    // ✅ Pastikan DataTable hanya diinisialisasi sekali
    if (!$.fn.DataTable.isDataTable('#tabelPelatih')) {
      $('#tabelPelatih').DataTable({
        responsive: true,
        autoWidth: false,
        language: {
          search: "",
          searchPlaceholder: "Cari pelatih...",
          lengthMenu: "Tampilkan _MENU_ data",
          zeroRecords: "Tidak ada data ditemukan",
          info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
          paginate: { next: "›", previous: "‹" }
        },
        initComplete: function () {
          let searchBox = $('#tabelPelatih_filter');
          searchBox.addClass('d-flex justify-content-end mt-3');
          searchBox.find('label').addClass('mb-0');
        }
      });
    }
  });
</script> -->

<!-- ====== SCRIPT CRUD PELATIH ====== -->
<script>
  // 🎯 === FLATPICKR (Tambah & Edit) ===
  flatpickr("#jadwal_available", {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    mode: "multiple",
    altInput: true,
    altFormat: "j F Y (H:i)",
    locale: "id"
  });

  flatpickr("#edit_jadwal_available", {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    mode: "multiple",
    altInput: true,
    altFormat: "j F Y (H:i)",
    locale: "id"
  });

  // 🧾 === DATATABLES ===
  $(document).ready(function() {
    $("#tabelPelatih").DataTable({
      responsive: true,
      pageLength: 5,
      language: {
        search: "Cari Pelatih:",
        zeroRecords: "Tidak ada data ditemukan",
        info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
        infoEmpty: "Tidak ada data",
        paginate: { previous: "Sebelumnya", next: "Berikutnya" }
      }
    });
  });

  // 🧍 === PREVIEW FOTO (TAMBAH) ===
  document.querySelector("input[name='foto_pelatih']").addEventListener("change", (e) => {
    const file = e.target.files[0];
    if (file) {
      const imgPreview = document.createElement("img");
      imgPreview.src = URL.createObjectURL(file);
      imgPreview.classList = "rounded-circle border border-danger mt-2 shadow-sm";
      imgPreview.width = 65;
      imgPreview.height = 65;
      const container = e.target.closest(".col-md-12, .col-md-6");
      const existing = container.querySelector("img");
      if (existing) existing.remove();
      container.appendChild(imgPreview);
    }
  });

  // 🧍 === PREVIEW FOTO (EDIT) ===
  function previewFotoEdit(event) {
    const file = event.target.files[0];
    const preview = document.getElementById("preview_foto_pelatih");
    if (file) {
      preview.src = URL.createObjectURL(file);
      preview.classList.add("shadow-lg");
    }
  }

  // 💾 === CREATE (TAMBAH) ===
  document.getElementById("formTambahPelatih").addEventListener("submit", async (e) => {
    e.preventDefault();
    const form = e.target;
    const submitBtn = form.querySelector("button[type='submit']");
    submitBtn.disabled = true;
    submitBtn.innerHTML = "Menyimpan...";

    const fd = new FormData(form);
    fd.append("action", "create");

    try {
      const res = await fetch("../php/proses_pelatih.php", { method: "POST", body: fd });
      const result = await res.text();
      if (result.trim() === "success") {
        Swal.fire({
          icon: "success",
          title: "Berhasil!",
          text: "Data pelatih berhasil ditambahkan.",
          timer: 1800,
          showConfirmButton: false
        }).then(() => location.reload());
      } else {
        Swal.fire("Gagal!", result, "error");
      }
    } catch (err) {
      Swal.fire("Error!", err.message, "error");
    } finally {
      submitBtn.disabled = false;
      submitBtn.innerHTML = "Tambah";
    }
  });

  // ✏️ === READ (AMBIL DATA EDIT) ===
  document.querySelectorAll(".edit-btn").forEach(btn => {
    btn.addEventListener("click", async () => {
      const id = btn.dataset.id;
      const res = await fetch(`../php/proses_pelatih.php?action=read&id=${id}`);
      const data = await res.json();

      document.getElementById("edit_id_pelatih").value = data.id_pelatih;
      document.getElementById("edit_nama_pelatih").value = data.nama_pelatih;
      document.getElementById("edit_jenis_kelamin").value = data.jenis_kelamin;
      document.getElementById("edit_no_telepon").value = data.no_telepon;
      document.getElementById("edit_email").value = data.email;
      document.getElementById("edit_alamat").value = data.alamat;
      document.getElementById("edit_spesialisasi").value = data.spesialisasi;
      document.getElementById("edit_pengalaman_tahun").value = data.pengalaman_tahun;
      document.getElementById("edit_jadwal_available").value = data.jadwal_available;
      document.getElementById("edit_status").value = data.status;

      // ✅ Tambahan: isi kuota & tempat
      document.getElementById("edit_kuota").value = data.kuota ?? "";
      document.getElementById("edit_tempat").value = data.tempat ?? "";

      // tampilkan foto lama
      const preview = document.getElementById("preview_foto_pelatih");
      preview.src = data.foto_pelatih ? "../" + data.foto_pelatih : "";
      new bootstrap.Modal(document.getElementById("modalEditPelatih")).show();
    });
  });

  // 🔄 === UPDATE (SIMPAN EDIT) ===
  document.getElementById("formEditPelatih").addEventListener("submit", async (e) => {
    e.preventDefault();
    const form = e.target;
    const btn = form.querySelector("button[type='submit']");
    btn.disabled = true;
    btn.innerHTML = "Menyimpan...";

    const fd = new FormData(form);
    fd.append("action", "update");

    try {
      const res = await fetch("../php/proses_pelatih.php", { method: "POST", body: fd });
      const result = await res.text();
      if (result.trim() === "success") {
        Swal.fire({
          icon: "success",
          title: "Berhasil!",
          text: "Data pelatih berhasil diperbarui.",
          timer: 1800,
          showConfirmButton: false
        }).then(() => location.reload());
      } else {
        Swal.fire("Gagal!", result, "error");
      }
    } catch (err) {
      Swal.fire("Error!", err.message, "error");
    } finally {
      btn.disabled = false;
      btn.innerHTML = "Simpan Perubahan";
    }
  });

  // ❌ === DELETE (HAPUS DATA) ===
  document.querySelectorAll(".delete-btn").forEach(btn => {
    btn.addEventListener("click", () => {
      const id = btn.dataset.id;
      Swal.fire({
        title: "Hapus Data?",
        text: "Data pelatih akan dihapus permanen!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal"
      }).then(async (result) => {
        if (result.isConfirmed) {
          const fd = new FormData();
          fd.append("action", "delete");
          fd.append("id", id);
          const res = await fetch("../php/proses_pelatih.php", { method: "POST", body: fd });
          const text = await res.text();
          if (text.trim() === "success") {
            Swal.fire({
              icon: "success",
              title: "Berhasil!",
              text: "Data pelatih berhasil dihapus.",
              timer: 1500,
              showConfirmButton: false
            }).then(() => location.reload());
          } else {
            Swal.fire("Gagal!", text, "error");
          }
        }
      });
    });
  });
</script>


<script>
const tableCard = document.querySelector('.table-gym');

tableCard.addEventListener('mouseenter', () => {
  tableCard.style.transition = 'all 0.4s ease-in-out';
  tableCard.style.transform = 'translateY(-5px) scale(1.01)';
  tableCard.style.boxShadow = '0 12px 30px rgba(59, 130, 246, 0.4)';
});

tableCard.addEventListener('mouseleave', () => {
  tableCard.style.transition = 'all 0.4s ease-in-out';
  tableCard.style.transform = 'translateY(0) scale(1)';
  tableCard.style.boxShadow = '0 8px 25px rgba(0, 0, 0, 0.6)'; // default shadow
});
</script>
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendarPelatih');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        height: 600,
        events: [] // awal kosong
    });
    calendar.render();

    // Tombol Lihat Jadwal per pelatih
    document.querySelectorAll('.view-calendar-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            var pelatihId = this.getAttribute('data-id');
            fetch(`../php/get_jadwal.php?pelatih_id=${pelatihId}`)
                .then(res => res.json())
                .then(data => {
                    calendar.removeAllEvents();
                    calendar.addEventSource(data);
                });
        });
    });
});
</script>



<!-- ====== LIBRARY TAMBAHAN ====== -->
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<!-- Flatpickr (Kalender) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<!-- Locale Indonesia -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/id.js"></script>





    <!--end::OverlayScrollbars Configure-->
    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>
