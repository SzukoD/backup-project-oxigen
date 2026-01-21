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
    <h3>🏋️ Data Latihan Gym</h3>
    <button class="btn btn-primary" id="btnAdd" data-bs-toggle="modal" data-bs-target="#latihanModal">
      <i class="bi bi-plus-circle"></i> Tambah Latihan
    </button>
  </div>

  <div class="card table-gym p-4 shadow-lg border-0 text-light rounded-4">
    <h5 class="fw-bold mb-3 text-white">
      <i class="bi bi-journal-bookmark-fill me-2 text-danger"></i>Daftar Latihan
    </h5>

    <div class="table-responsive">
      <table id="tabelLatihan" class="table table-striped table-hover align-middle w-100">
        <thead class="text-center text-uppercase">
          <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Nama Latihan</th>
            <th>Gambar Slider</th>
            <th>Gambar Lain</th>
            <th>Video</th>
            <th>Deskripsi</th>
            <th>Step</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $query = mysqli_query($conn, "
            SELECT l.*, k.nama_kategori 
            FROM latihan l 
            LEFT JOIN kategori_latihan k ON l.id_kategori = k.id_kategori 
            ORDER BY l.id_latihan DESC
          ");
          $no = 1;
          while($row = mysqli_fetch_assoc($query)) {
        ?>
          <tr>
            <td class="text-center"><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['nama_kategori']) ?></td>
            <td><?= htmlspecialchars($row['nama_latihan']) ?></td>
            <td class="text-center">
              <?php for($i=1;$i<=3;$i++){ if(!empty($row["gambar$i"])) echo '<img src="../uploads/latihan/'.$row["gambar$i"].'" width="50" class="rounded shadow me-1">'; } ?>
            </td>
            <td class="text-center">
              <?= !empty($row['gambar4']) ? '<img src="../uploads/latihan/'.$row['gambar4'].'" width="50" class="rounded shadow">' : '-' ?>
            </td>
            <td class="text-center">
              <?= !empty($row['video']) ? '<a href="../uploads/latihan/'.$row['video'].'" target="_blank">Video</a>' : '-' ?>
            </td>
            <td><?= htmlspecialchars($row['deskripsi']) ?></td>
            <td><?= htmlspecialchars($row['step']) ?></td>
            <td class="text-center">
              <button class="btn btn-warning btn-sm btnEdit me-1"
                data-id="<?= $row['id_latihan'] ?>"
                data-kategori="<?= $row['id_kategori'] ?>"
                data-nama="<?= htmlspecialchars($row['nama_latihan']) ?>"
                data-deskripsi="<?= htmlspecialchars($row['deskripsi']) ?>"
                data-step="<?= htmlspecialchars($row['step']) ?>"
                data-gambar1="<?= $row['gambar1'] ?>"
                data-gambar2="<?= $row['gambar2'] ?>"
                data-gambar3="<?= $row['gambar3'] ?>"
                data-gambar4="<?= $row['gambar4'] ?>"
                data-video="<?= $row['video'] ?>">
                <i class="bi bi-pencil-square"></i>
              </button>
              <button class="btn btn-danger btn-sm btnDelete" data-id="<?= $row['id_latihan'] ?>">
                <i class="bi bi-trash"></i>
              </button>
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- ===== Modal Tambah/Edit Latihan ===== -->
<div class="modal fade" id="latihanModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <form id="latihanForm" enctype="multipart/form-data">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="modalTitle">Tambah Latihan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <input type="hidden" name="id_latihan" id="id_latihan">

          <!-- Kategori -->
          <div class="mb-3">
            <label>Kategori</label>
            <select name="id_kategori" id="id_kategori" class="form-select" required>
              <option value="">-- Pilih Kategori --</option>
              <?php
              $kategori = mysqli_query($conn, "SELECT * FROM kategori_latihan ORDER BY nama_kategori ASC");
              while($k = mysqli_fetch_assoc($kategori)) {
                echo "<option value='{$k['id_kategori']}'>{$k['nama_kategori']}</option>";
              }
              ?>
            </select>
          </div>

          <!-- Nama -->
          <div class="mb-3">
            <label>Nama Latihan</label>
            <input type="text" name="nama_latihan" id="nama_latihan" class="form-control" required>
          </div>

          <!-- Gambar 1-4 -->
          <?php for($i=1;$i<=4;$i++){ ?>
          <div class="mb-3">
            <label>Gambar <?= $i ?> <?= $i<=3 ? '(Slider)' : '(Lain)' ?></label>
            <input type="file" name="gambar<?= $i ?>" id="gambar<?= $i ?>" class="form-control" accept="image/*">
            <div id="preview_gambar<?= $i ?>" class="mt-2"></div>
          </div>
          <?php } ?>

          <!-- Video -->
          <div class="mb-3">
            <label>Video</label>
            <input type="file" name="video" id="video" class="form-control" accept="video/*">
            <div id="preview_video" class="mt-2"></div>
          </div>

          <!-- Deskripsi -->
          <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"></textarea>
          </div>

          <!-- Step -->
          <div class="mb-3">
            <label>Step</label>
            <textarea name="step" id="step" class="form-control" rows="3"></textarea>
          </div>
        </div>

        <div class="modal-footer bg-light sticky-bottom">
          <button type="submit" class="btn btn-success">
            <i class="bi bi-check-circle me-1"></i> Simpan
          </button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="bi bi-x-circle me-1"></i> Batal
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<style>
  .modal-dialog-scrollable .modal-body {
    max-height: 70vh;
    overflow-y: auto;
  }
  .modal-footer.sticky-bottom {
    position: sticky;
    bottom: 0;
    background: #f8f9fa;
    z-index: 10;
  }
  .img-preview {
    border-radius: 10px;
    box-shadow: 0 0 5px rgba(0,0,0,0.2);
    margin-right: 5px;
  }
</style>

<!-- pastikan jquery sudah terload di atas script ini -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function(){

  // === Fungsi Preview Gambar ===
  function previewImage(input, targetId) {
    const preview = $('#' + targetId);
    preview.empty();
    if (input.files && input.files.length > 0) {
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.html(`<img src="${e.target.result}" width="120" class="img-preview mt-1 border rounded shadow-sm">`);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  // === Event: Preview Gambar 1–4 ===
  $(document).on('change', '#gambar1, #gambar2, #gambar3, #gambar4', function() {
    const id = $(this).attr('id');
    previewImage(this, 'preview_' + id);
  });

  // === Event: Preview Video ===
  $(document).on('change', '#video', function(){
    const preview = $('#preview_video');
    preview.empty();
    if (this.files && this.files[0]) {
      const fileURL = URL.createObjectURL(this.files[0]);
      preview.html(`
        <video width="200" controls class="rounded shadow-sm mt-2">
          <source src="${fileURL}" type="${this.files[0].type}">
        </video>
      `);
    }
  });

  // === Tambah ===
  $('#btnAdd').click(function(){
    $('#latihanForm')[0].reset();
    $('#id_latihan').val('');
    $('#modalTitle').text('Tambah Latihan');
    for(let i=1;i<=4;i++) $('#preview_gambar'+i).html('');
    $('#preview_video').html('');
  });

  // === Edit ===
  $('.btnEdit').click(function(){
    let data = $(this).data();
    $('#id_latihan').val(data.id);
    $('#id_kategori').val(data.kategori);
    $('#nama_latihan').val(data.nama);
    $('#deskripsi').val(data.deskripsi);
    $('#step').val(data.step);
    $('#modalTitle').text('Edit Latihan');

    for(let i=1;i<=4;i++){
      $('#preview_gambar'+i).html(
        data['gambar'+i]
          ? `<img src="../uploads/latihan/${data['gambar'+i]}" width="120" class="img-preview mt-1 border rounded shadow-sm">`
          : ''
      );
    }
    $('#preview_video').html(
      data.video
        ? `<a href="../uploads/latihan/${data.video}" target="_blank" class="btn btn-sm btn-outline-info mt-1">Lihat Video</a>`
        : ''
    );

    $('#latihanModal').modal('show');
  });

  // === Submit Form ===
  $('#latihanForm').submit(function(e){
    e.preventDefault();
    let formData = new FormData(this);
    formData.append('action', $('#id_latihan').val() == '' ? 'create' : 'update');

    $.ajax({
      url: '../php/proses_latihan.php',
      type: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      success: function(resp){
        Swal.fire({
          icon: 'success',
          title: 'Berhasil!',
          text: resp,
          showConfirmButton: false,
          timer: 1500
        }).then(() => location.reload());
      },
      error: function(){
        Swal.fire('Error', 'Terjadi kesalahan saat menyimpan data', 'error');
      }
    });
  });

  // === Delete ===
  $('.btnDelete').click(function(){
    let id = $(this).data('id');
    Swal.fire({
      title: 'Yakin ingin menghapus?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if(result.isConfirmed){
        $.post('../php/proses_latihan.php', {action:'delete', id_latihan:id}, function(resp){
          Swal.fire({
            icon: 'success',
            title: 'Dihapus!',
            text: resp,
            showConfirmButton: false,
            timer: 1500
          }).then(() => location.reload());
        });
      }
    });
  });

});
</script>





<!-- ====== SCRIPT EDIT PROGRAM ====== -->

<!-- 
<script>
$(document).ready(function() {
  // ====== Datatables ======
  $("#tabelLatihan").DataTable({
    responsive:true,
    pageLength:7,
    language: {
      search: "Cari Latihan:",
      zeroRecords: "Tidak ada data ditemukan",
      info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
      infoEmpty: "Tidak ada data",
      paginate: { previous: "Sebelumnya", next: "Berikutnya" }
    }
  });

  // ====== Tombol Edit ======
  $(".edit-btn").click(function() {
    const data = JSON.parse($(this).attr("data-latihan"));

    // Ubah judul modal
    $("#editModalLabel").text("Edit Latihan");

    // Isi field modal edit
    $("#edit_id_latihan").val(data.id_latihan);
    $("#edit_id_kategori").val(data.id_kategori);
    $("#edit_nama_latihan").val(data.nama_latihan);
    $("#edit_deskripsi").val(data.deskripsi);
    $("#edit_step").val(data.step);

    // Preview gambar slider 1-3
    $("#edit_previewSlider").html('');
    for(let i=1; i<=3; i++){
      if(data['gambar'+i]){
        $("#edit_previewSlider").append(`<img src="../uploads/latihan/${data['gambar'+i]}" class="rounded shadow" width="50">`);
      }
    }

    // Preview gambar4
    $("#edit_previewGambar4").html(data.gambar4 ? `<img src="../uploads/latihan/${data.gambar4}" class="rounded shadow" width="50">` : '');

    // Preview video
    $("#edit_previewVideo").html(data.video ? `<video src="../uploads/latihan/${data.video}" width="150" height="100" controls></video>` : '');

    // Tampilkan modal
    new bootstrap.Modal(document.getElementById('editModal')).show();
  });

  // ====== Preview gambar input baru (edit) ======
  $(".edit-gambar-input").change(function(){
    const id = $(this).attr('id');
    const file = this.files[0];
    let container;
    if(id==='edit_gambar4') container = $("#edit_previewGambar4");
    else container = $("#edit_previewSlider");

    if(file){
      const img = document.createElement("img");
      img.src = URL.createObjectURL(file);
      img.className = "rounded shadow";
      img.width = 50;
      container.append(img);
    }
  });

  // ====== Preview video input baru (edit) ======
  $("#edit_video").change(function(){
    const file = this.files[0];
    $("#edit_previewVideo").html('');
    if(file){
      const vid = document.createElement("video");
      vid.src = URL.createObjectURL(file);
      vid.width = 150;
      vid.height = 100;
      vid.controls = true;
      $("#edit_previewVideo").append(vid);
    }
  });

  // ====== Reset modal edit saat ditutup ======
  $('#editModal').on('hidden.bs.modal', function () {
    $("#formEdit")[0].reset();
    $("#editModalLabel").text("Edit Latihan");
    $("#edit_previewSlider, #edit_previewGambar4, #edit_previewVideo").html('');
  });

  // ====== Submit form Edit ======
  $("#formEdit").submit(async function(e){
    e.preventDefault();
    const form = this;
    const btn = $(form).find("button[type='submit']");
    btn.prop("disabled", true).text("Menyimpan...");
    const fd = new FormData(form);

    // Action 'update'
    fd.append("action", "update");

    try{
      const res = await fetch("../php/proses_latihan.php",{method:"POST",body:fd});
      const text = await res.text();
      if(text.trim()==="success"){
        Swal.fire({
          icon:"success",
          title:"Berhasil",
          text:"Data latihan berhasil diperbarui",
          timer:1500,
          showConfirmButton:false
        }).then(()=>location.reload());
      }else{
        Swal.fire("Gagal", text, "error");
      }
    }catch(err){
      Swal.fire("Error", err.message, "error");
    }finally{
      btn.prop("disabled",false).text("Simpan");
    }
  });
});
</script> -->



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
 <!-- <div class="modal fade" id="modalJadwal" tabindex="-1" aria-labelledby="modalJadwalLabel" aria-hidden="true">
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
</div> -->

<!-- Modal Tambah Program -->



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



<!-- <script>
$(document).ready(function() {
  // 🧾 === DATATABLES ===
  $("#tabelLatihan").DataTable({
    responsive: true,
    pageLength: 7,
    language: {
      search: "Cari Latihan:",
      zeroRecords: "Tidak ada data ditemukan",
      info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
      infoEmpty: "Tidak ada data",
      paginate: { previous: "Sebelumnya", next: "Berikutnya" }
    }
  });

  // 🖼️ === PREVIEW GAMBAR SLIDER & GAMBAR LAIN (TAMBAH/EDIT) ===
  ['gambar1','gambar2','gambar3','gambar4'].forEach(id => {
    document.getElementById(id).addEventListener("change", (e) => {
      const file = e.target.files[0];
      const container = e.target.closest(".mb-3");
      let preview = container.querySelector("img");
      if (preview) preview.remove();
      if (file) {
        const imgPreview = document.createElement("img");
        imgPreview.src = URL.createObjectURL(file);
        imgPreview.classList = "rounded shadow mt-2";
        imgPreview.width = 65;
        imgPreview.height = 65;
        container.appendChild(imgPreview);
      }
    });
  });

  // 🎥 === PREVIEW VIDEO (TAMBAH/EDIT) ===
  document.getElementById("video").addEventListener("change", (e) => {
    const file = e.target.files[0];
    const container = e.target.closest(".mb-3");
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

  // 💾 === CREATE LATIHAN ===
  $("#formLatihan").on("submit", async function(e) {
    e.preventDefault();
    const form = this;
    const submitBtn = $(form).find("button[type='submit']");
    submitBtn.prop("disabled", true).text("Menyimpan...");

    const fd = new FormData(form);
    fd.append("action", "create");

    try {
      const res = await fetch("../php/proses_latihan.php", { method: "POST", body: fd });
      const result = await res.text();
      if(result.trim() === "success"){
        Swal.fire({icon:"success",title:"Berhasil!",text:"Latihan berhasil disimpan.",timer:1800,showConfirmButton:false})
          .then(()=>location.reload());
      } else {
        Swal.fire("Gagal!", result, "error");
      }
    } catch(err) {
      Swal.fire("Error!", err.message, "error");
    } finally {
      submitBtn.prop("disabled", false).text("Simpan");
    }
  });

  // ✏️ === EDIT LATIHAN ===
  $(".edit-btn").each(function(){
    $(this).on("click", function(){
      const data = JSON.parse($(this).data("latihan"));

      $("#latihanModalLabel").text("Edit Latihan");
      $("#id_latihan").val(data.id_latihan);
      $("#id_kategori").val(data.id_kategori);
      $("#nama_latihan").val(data.nama_latihan);
      $("#deskripsi").val(data.deskripsi);
      $("#step").val(data.step);

      // Reset preview file
      ['gambar1','gambar2','gambar3','gambar4','video'].forEach(id => $(`#${id}`).val(''));

      // Preview gambar lama (opsional)
      // Bisa tambahkan thumbnail jika mau menampilkan yang lama

      new bootstrap.Modal(document.getElementById('latihanModal')).show();
    });
  });

  // ❌ === DELETE LATIHAN ===
  $(".delete-btn").each(function(){
    $(this).on("click", function(){
      const id = $(this).data("id");
      Swal.fire({
        title: "Hapus Latihan?",
        text: "Data latihan akan dihapus permanen!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal"
      }).then(async (result)=>{
        if(result.isConfirmed){
          const fd = new FormData();
          fd.append("action","delete");
          fd.append("id", id);
          try {
            const res = await fetch("../php/proses_latihan.php", { method: "POST", body: fd });
            const text = await res.text();
            if(text.trim() === "success"){
              Swal.fire({icon:"success",title:"Berhasil!",text:"Latihan berhasil dihapus.",timer:1500,showConfirmButton:false})
                .then(()=>location.reload());
            } else {
              Swal.fire("Gagal!", text, "error");
            }
          } catch(err){
            Swal.fire("Error!", err.message, "error");
          }
        }
      });
    });
  });

  // Reset modal ketika ditutup
  $('#latihanModal').on('hidden.bs.modal', function () {
    $("#formLatihan")[0].reset();
    $("#latihanModalLabel").text("Tambah Latihan");
    // Hapus preview gambar/video jika ada
    $(this).find("img, video").remove();
  });

});
</script> -->




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
