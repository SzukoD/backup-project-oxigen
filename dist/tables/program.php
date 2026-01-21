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
  background: linear-gradient(135deg, #1e3a8a, #3b82f6); /* gradasi biru */
  color: #000 !important; /* teks hitam agar terlihat */
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.6);
  padding: 20px;
}

/* Header tabel */
.table-gym thead {
  background: linear-gradient(90deg, #60a5fa, #2563eb); /* gradasi header */
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
  background: linear-gradient(90deg, #64748b, #1e293b);
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
  color: #3b82f6;
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
  background: #3b82f6;
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
  border: 1px solid #3b82f6;
  border-radius: 6px;
  padding: 6px 12px;
  width: 200px;
  transition: all 0.3s ease;
}

.dataTables_filter input:focus {
  outline: none;
  border-color: #2563eb;
  box-shadow: 0 0 5px rgba(37, 99, 235, 0.5);
}

/* Select "Show entries" style */
.dataTables_length select {
  background-color: #1e3a8a;
  color: #fff;
  border: 1px solid #3b82f6;
  border-radius: 5px;
  padding: 4px 8px;
}

/* Pagination */
.dataTables_wrapper .dataTables_paginate .paginate_button {
  background: linear-gradient(90deg, #3b82f6, #60a5fa);
  color: #fff !important;
  border: none !important;
  border-radius: 5px !important;
  margin: 2px;
  padding: 5px 12px;
  font-weight: 500;
  transition: 0.3s ease;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current {
  background: linear-gradient(90deg, #60a5fa, #3b82f6) !important;
  color: #fff !important;
}

/* Hover pagination */
.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
  background: linear-gradient(90deg, #60a5fa, #3b82f6);
  color: #fff !important;
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

</style>


  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      <nav class="app-header navbar navbar-expand" style="background-color: rgb(218, 212, 181);">
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
                        src="../assets/img/user1-128x128.jpg"
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
                        src="../assets/img/user8-128x128.jpg"
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
                        src="../assets/img/user3-128x128.jpg"
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
                  src="../assets/img/user2-160x160.jpg"
                  class="user-image rounded-circle shadow"
                  alt="User Image"
                />
                <span class="d-none d-md-inline">Admin</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <!--begin::User Image-->
                <li class="user-header text-bg-primary">
                  <img
                    src="../assets/img/user2-160x160.jpg"
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
<!-- Tabel Program Gym -->
<!-- Tabel Program Gym -->
<!-- Tabel Program Gym -->
<div class="container-fluid mt-4">
  <div class="header-section d-flex justify-content-between align-items-center mb-3">
    <h3>🏋️ Data Program Gym</h3>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahProgram">
      <i class="bi bi-plus-circle"></i> Tambah Program
    </button>
  </div>

  <div class="card table-gym p-4 shadow-lg border-0 text-light rounded-4">
    <h5 class="fw-bold mb-3 text-white">
      <i class="bi bi-journal-bookmark-fill me-2 text-danger"></i>Daftar Program Gym
    </h5>

    <table id="tabelProgram" class="table table-striped table-hover align-middle w-100">
  <thead class="text-center text-uppercase">
    <tr>
      <th>No</th>
      <th>Nama Program</th>
      <th>Deskripsi</th>
      <th>Durasi (Menit)</th>
      <th>Level</th>
      <th>Thumbnail</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
<?php
include '../../koneksi.php';
$no = 1;
$query = mysqli_query($conn, "SELECT * FROM program ORDER BY id_program DESC");
while ($row = mysqli_fetch_assoc($query)) {
    // Encode data sebagai JSON untuk atribut data
    $dataProgram = htmlspecialchars(json_encode($row), ENT_QUOTES, 'UTF-8');
    echo "<tr>
        <td class='text-center fw-semibold text-black'>{$no}</td>
        <td class='text-dark'>{$row['nama_program']}</td>
        <td class='text-dark'>{$row['deskripsi']}</td>
        <td class='text-center text-dark'>{$row['durasi']}</td>
        <td class='text-center text-dark'>{$row['level']}</td>
        <td class='text-center'>";
    
    $thumbPath = "../uploads/" . $row['thumbnail'];
    if (!empty($row['thumbnail']) && file_exists($thumbPath)) {
        echo "<img src='../uploads/{$row['thumbnail']}' class='rounded shadow' width='60' height='60'>";
    } else {
        echo "<span class='text-muted'>-</span>";
    }

    echo "</td>
        <td class='text-center'>
            <button class='btn btn-sm btn-warning edit-btn me-1' 
                    data-program='{$dataProgram}'
                    title='Edit Data' 
                    data-bs-toggle='tooltip' data-bs-placement='top'>
                <i class='bi bi-pencil-square'></i>
            </button>
            <button class='btn btn-sm btn-danger delete-btn' 
                    data-id='{$row['id_program']}' 
                    title='Hapus Data' 
                    data-bs-toggle='tooltip' data-bs-placement='top'>
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
<!-- ===== DAFTAR PROGRAM (RESPONSIF) ===== -->
<?php
include '../../koneksi.php';
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
            $fotoPath = "../uploads/" . basename($row['thumbnail']);
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



<!-- ====== MODAL EDIT PROGRAM ====== -->
<div class="modal fade" id="editProgramModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="formEditProgram" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Program</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id_program" id="edit_id_program">
          <input type="hidden" name="thumbnail_old" id="edit_thumbnail_old">
          <input type="hidden" name="video_old" id="edit_video_old">

          <div class="mb-2">
            <label>Nama Program</label>
            <input type="text" class="form-control" name="nama_program" id="edit_nama_program" required>
          </div>
          <div class="mb-2">
            <label>Deskripsi</label>
            <textarea class="form-control" name="deskripsi" id="edit_deskripsi" required></textarea>
          </div>
          <div class="mb-2">
            <label>Durasi (Menit)</label>
            <input type="number" class="form-control" name="durasi" id="edit_durasi" required>
          </div>
          <div class="mb-2">
            <label>Level</label>
            <select class="form-control" name="level" id="tambah_level" required>
  <option value="Pemula" selected>Pemula</option>
  <option value="Menengah">Menengah</option>
  <option value="Lanjut">Lanjutan</option>
</select>

          </div>
          <div class="mb-2">
            <label>Thumbnail</label>
            <input type="file" class="form-control" name="thumbnail" id="edit_thumbnail">
            <div id="edit_thumb_preview" class="mt-2"></div>
          </div>
          <div class="mb-3">
            <label class="form-label fw-semibold">Video Program</label>
            <input type="file" class="form-control" name="video" id="edit_video" accept="video/mp4,video/webm,video/ogg">
            <div id="edit_video_preview" class="mt-3 text-center"></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
  // Preview thumbnail baru
  document.getElementById('edit_thumbnail').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('edit_thumb_preview');
    preview.innerHTML = '';

    if (file) {
      const reader = new FileReader();
      reader.onload = e => {
        preview.innerHTML = `<img src="${e.target.result}" alt="Preview" class="img-fluid rounded shadow-sm" style="max-height:180px;">`;
      };
      reader.readAsDataURL(file);
    }
  });

  // Preview video baru
  document.getElementById('edit_video').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('edit_video_preview');
    preview.innerHTML = '';

    if (file) {
      const reader = new FileReader();
      reader.onload = e => {
        preview.innerHTML = `
          <video controls class="rounded shadow-sm" style="max-width:100%; height:auto;">
            <source src="${e.target.result}" type="${file.type}">
            Browser Anda tidak mendukung video.
          </video>`;
      };
      reader.readAsDataURL(file);
    }
  });
</script>
<!-- ====== SCRIPT EDIT PROGRAM ====== -->


<script>
  // Inisialisasi DataTable
  $(document).ready(function() {
    $("#tabelProgram").DataTable({
      responsive: true,
      pageLength: 7,
      language: {
        search: "Cari Program:",
        zeroRecords: "Tidak ada data ditemukan",
        info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
        infoEmpty: "Tidak ada data",
        paginate: { previous: "Sebelumnya", next: "Berikutnya" }
      }
    });
  });

 

  // Tombol Delete
  document.querySelectorAll(".delete-btn").forEach(btn => {
    btn.addEventListener("click", () => {
      const id = btn.dataset.id;
      Swal.fire({
        title: "Hapus Program?",
        text: "Data program akan dihapus permanen!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal"
      }).then(async (result) => {
        if(result.isConfirmed){
          const fd = new FormData();
          fd.append("action","delete");
          fd.append("id",id);
          const res = await fetch("../php/proses_program.php",{method:"POST",body:fd});
          const text = await res.text();
          if(text.trim() === "success") location.reload();
          else Swal.fire("Gagal!", text, "error");
        }
      });
    });
  });
</script>

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
 <div class="modal fade" id="modalJadwal" tabindex="-1" aria-labelledby="modalJadwalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalJadwalLabel">Jadwal Pelatih</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div id="calendarPelatih" style="max-width:900px; margin:0 auto;"></div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah Program -->
<div class="modal fade" id="modalTambahProgram" tabindex="-1" aria-labelledby="modalTambahProgramLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="modalTambahProgramLabel">Tambah Program Gym</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form id="formTambahProgram" method="POST" enctype="multipart/form-data" action="../php/proses_tambah_program.php">
        <input type="hidden" name="action" value="create">  
        <div class="modal-body">
          <div class="row g-3">

            <div class="col-md-12">
              <label class="form-label">Nama Program</label>
              <input type="text" name="nama_program" class="form-control" required>
            </div>

            <div class="col-md-12">
              <label class="form-label">Deskripsi</label>
              <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi program"></textarea>
            </div>

            <div class="col-md-6">
              <label class="form-label">Durasi (menit)</label>
              <input type="number" name="durasi" class="form-control" min="1">
            </div>

            <div class="col-md-6">
              <label class="form-label">Level</label>
               <select class="form-control" name="level" id="tambah_level" required>
  <option value="Pemula" selected>Pemula</option>
  <option value="Menengah">Menengah</option>
  <option value="Lanjut">Lanjutan</option>
</select>
            </div>

            <div class="col-md-6">
              <label class="form-label">Thumbnail Program</label>
              <input type="file" name="thumbnail" class="form-control" accept="image/*" required>
            </div>

            <div class="col-md-6">
              <label class="form-label">Video Program</label>
              <input type="file" name="video" class="form-control" accept="video/*">
            </div>

          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal Edit Program -->





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

<!-- ====== MODAL EDIT PROGRAM ====== -->
<div class="modal fade" id="editProgramModal" tabindex="-1" aria-labelledby="editProgramModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="formEditProgram" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="editProgramModalLabel">Edit Program</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id_program" id="edit_id_program">
          <div class="mb-3">
            <label for="edit_nama_program" class="form-label">Nama Program</label>
            <input type="text" class="form-control" id="edit_nama_program" name="nama_program" required>
          </div>
          <div class="mb-3">
            <label for="edit_deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label for="edit_durasi" class="form-label">Durasi (Menit)</label>
            <input type="number" class="form-control" id="edit_durasi" name="durasi" required>
          </div>
          <div class="mb-3">
            <label for="edit_level" class="form-label">Level</label>
            <select class="form-select" id="edit_level" name="level" required>
              <option value="">Pilih Level</option>
              <option value="Pemula">Pemula</option>
              <option value="Menengah">Menengah</option>
              <option value="Lanjutan">Lanjutan</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="edit_thumbnail" class="form-label">Thumbnail (Opsional)</label>
            <input type="file" class="form-control" id="edit_thumbnail" name="thumbnail">
            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti thumbnail.</small>
          </div>
          <div id="edit_thumb_preview" class="text-center my-2"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
  // 🧾 === DATATABLES ===
  $("#tabelProgram").DataTable({
    responsive: true,
    pageLength: 7,
    language: {
      search: "Cari Program:",
      zeroRecords: "Tidak ada data ditemukan",
      info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
      infoEmpty: "Tidak ada data",
      paginate: { previous: "Sebelumnya", next: "Berikutnya" }
    }
  });

  // 🖼️ === PREVIEW THUMBNAIL (TAMBAH) ===
  document.querySelector("input[name='thumbnail']").addEventListener("change", (e) => {
    const file = e.target.files[0];
    if (file) {
      const imgPreview = document.createElement("img");
      imgPreview.src = URL.createObjectURL(file);
      imgPreview.classList = "rounded shadow mt-2";
      imgPreview.width = 65;
      imgPreview.height = 65;
      const container = e.target.closest(".col-md-6");
      const existing = container.querySelector("img");
      if (existing) existing.remove();
      container.appendChild(imgPreview);
    }
  });

  // 🎥 === PREVIEW VIDEO (TAMBAH) ===
  document.querySelector("input[name='video']").addEventListener("change", (e) => {
    const file = e.target.files[0];
    const container = e.target.closest(".col-md-6");
    let preview = container.querySelector("video");
    if (preview) preview.remove();
    if (file) {
      preview = document.createElement("video");
      preview.src = URL.createObjectURL(file);
      preview.width = 150;
      preview.height = 100;
      preview.controls = true;
      preview.classList.add("mt-2");
      container.appendChild(preview);
    }
  });

  // 💾 === CREATE (TAMBAH) ===
  document.getElementById("formTambahProgram").addEventListener("submit", async (e) => {
    e.preventDefault();
    const form = e.target;
    const submitBtn = form.querySelector("button[type='submit']");
    submitBtn.disabled = true;
    submitBtn.innerHTML = "Menyimpan...";

    const fd = new FormData(form);
    fd.append("action", "create");

    try {
      const res = await fetch("../php/proses_program.php", { method: "POST", body: fd });
      const result = await res.text();
      if (result.trim() === "success") {
        Swal.fire({ icon: "success", title: "Berhasil!", text: "Program berhasil ditambahkan.", timer: 1800, showConfirmButton: false })
          .then(() => location.reload());
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

  // ✏️ === EDIT PROGRAM ===
// ✏️ === EDIT PROGRAM TANPA FETCH DATA LAGI ===
document.querySelectorAll(".edit-btn").forEach(btn => {
  btn.addEventListener("click", () => {
    const data = JSON.parse(btn.dataset.program);

    document.getElementById("edit_id_program").value = data.id_program;
    document.getElementById("edit_nama_program").value = data.nama_program;
    document.getElementById("edit_deskripsi").value = data.deskripsi;
    document.getElementById("edit_durasi").value = data.durasi;
    document.getElementById("edit_level").value = data.level; // <-- set value level

    document.getElementById("edit_thumbnail_old").value = data.thumbnail;
    document.getElementById("edit_video_old").value = data.video ?? '';

    const preview = document.getElementById("edit_thumb_preview");
    if(data.thumbnail) {
      preview.innerHTML = `<img src="../uploads/${data.thumbnail}" class="rounded shadow" width="80" height="80">`;
    } else {
      preview.innerHTML = `<span class="text-muted">Tidak ada thumbnail</span>`;
    }

    new bootstrap.Modal(document.getElementById('editProgramModal')).show();
  });
});


// 🖼️ === PREVIEW THUMBNAIL (EDIT) ===
document.getElementById("edit_thumbnail").addEventListener("change", (e) => {
  const file = e.target.files[0];
  const preview = document.getElementById("edit_thumb_preview");
  preview.innerHTML = "";
  if (file) {
    const imgPreview = document.createElement("img");
    imgPreview.src = URL.createObjectURL(file);
    imgPreview.classList = "rounded shadow mt-2";
    imgPreview.width = 80;
    imgPreview.height = 80;
    preview.appendChild(imgPreview);
  }
});

// 💾 === SUBMIT EDIT PROGRAM ===
document.getElementById("formEditProgram").addEventListener("submit", async (e) => {
  e.preventDefault();
  const form = e.target;
  const submitBtn = form.querySelector("button[type='submit']");
  submitBtn.disabled = true;
  submitBtn.innerHTML = "Menyimpan...";

  const fd = new FormData(form);
  fd.append("action", "update"); // 🔑 harus 'update', bukan 'edit'

  try {
    const res = await fetch("../php/proses_program.php", { method: "POST", body: fd });
    const result = await res.text();
    if (result.trim() === "success") {
      Swal.fire({ 
        icon: "success", 
        title: "Berhasil!", 
        text: "Program berhasil diperbarui.", 
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
    submitBtn.innerHTML = "Simpan Perubahan";
  }
});


  // ❌ === DELETE (HAPUS DATA) ===
  document.querySelectorAll(".delete-btn").forEach(btn => {
    btn.addEventListener("click", () => {
      const id = btn.dataset.id;
      Swal.fire({
        title: "Hapus Program?",
        text: "Data program akan dihapus permanen!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal"
      }).then(async (result) => {
        if (result.isConfirmed) {
          const fd = new FormData();
          fd.append("action", "delete");
          fd.append("id", id);
          const res = await fetch("../php/proses_program.php", { method: "POST", body: fd });
          const text = await res.text();
          if (text.trim() === "success") {
            Swal.fire({ icon: "success", title: "Berhasil!", text: "Program berhasil dihapus.", timer: 1500, showConfirmButton: false })
              .then(() => location.reload());
          } else {
            Swal.fire("Gagal!", text, "error");
          }
        }
      });
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

<!-- ====== SCRIPT SLIDER ====== -->
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
