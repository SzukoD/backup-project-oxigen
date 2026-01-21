<?php
require_once 'config_google.php';
session_start();

$login_url = $client->createAuthUrl();
include '../../koneksi.php';
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Register | FitForge</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a2d9d5f5c1.js" crossorigin="anonymous"></script>

  <style>
    body {
      background: linear-gradient(160deg, #1b0b0b, #3a0a0a, #1b0b0b);
      font-family: 'Poppins', sans-serif;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #f5f5f5;
    }

    .register-container {
      background: rgba(60, 20, 20, 0.9); /* 🌟 Lebih terang dari sebelumnya */
      border-radius: 22px;
      box-shadow: 0 10px 35px rgba(0, 0, 0, 0.6);
      overflow: hidden;
      max-width: 420px;
      width: 100%;
      padding: 2.3rem;
      animation: fadeIn 0.5s ease;
      backdrop-filter: blur(8px);
      border: 1px solid rgba(255,255,255,0.08);
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .register-container h2 {
      text-align: center;
      font-weight: 700;
      color: #ff4b4b;
      margin-bottom: 0.5rem;
      letter-spacing: 0.5px;
    }

    .register-container p {
      text-align: center;
      color: #e6e6e6;
      font-size: 0.9rem;
      margin-bottom: 1.5rem;
    }

    label {
      color: #fff;
      font-weight: 500;
    }

    .form-control {
      border-radius: 50px;
      padding: 10px 20px;
      border: 1px solid rgba(255, 255, 255, 0.25);
      background: rgba(255, 255, 255, 0.1);
      color: #f5f5f5;
      transition: 0.3s;
    }

    .form-control::placeholder {
      color: #ccc;
    }

    .form-control:focus {
      border-color: #b32929;
      box-shadow: 0 0 8px rgba(179, 41, 41, 0.5);
      background: rgba(255, 255, 255, 0.15);
    }

    .btn-primary {
      background-color: #8b1e2e;
      border: none;
      border-radius: 50px;
      padding: 10px 20px;
      font-weight: 600;
      transition: 0.3s;
    }

    .btn-primary:hover {
      background-color: #b82e2e;
    }

    .google-btn {
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #fff;
      color: #333;
      border-radius: 50px;
      padding: 10px;
      font-weight: 500;
      text-decoration: none;
      transition: all 0.3s;
      border: none;
    }

    .google-btn:hover {
      background-color: #f5f5f5;
      transform: translateY(-2px);
    }

    .google-btn img {
      width: 22px;
      height: 22px;
      margin-right: 10px;
    }

    .divider {
      display: flex;
      align-items: center;
      text-align: center;
      color: #bbb;
      margin: 1.5rem 0;
      font-size: 0.9rem;
    }

    .divider::before,
    .divider::after {
      content: "";
      flex: 1;
      border-bottom: 1px solid #666;
    }

    .divider:not(:empty)::before { margin-right: .75em; }
    .divider:not(:empty)::after { margin-left: .75em; }

    a {
      color: #ff4b4b;
      text-decoration: none;
    }

    a:hover {
      color: #ff6666;
      text-decoration: underline;
    }

    @media (max-width: 576px) {
      .register-container {
        margin: 20px;
        padding: 1.8rem;
        background: rgba(75, 25, 25, 0.95);
      }
    }
  </style>
</head>

<body>
  <div class="register-container">
    <h2>FitForge Member</h2>
    <p>Buat akun baru dan mulai perjalanan kebugaranmu 💪</p>

    <form action="proses_register.php" method="POST">
      <div class="mb-3">
        <label class="form-label">Nama Lengkap</label>
        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Daftar Manual</button>
    </form>

    <div class="divider">atau</div>

    <a href="<?= htmlspecialchars($login_url) ?>" class="google-btn w-100">
      <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google Icon">
      <span>Daftar dengan Google</span>
    </a>

    <p class="text-center mt-3 mb-0">
      Sudah punya akun? <a href="login.php">Login Sekarang</a>
    </p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
