<?php
session_start();
include '../koneksi.php';

if (!$conn) {
    die("Koneksi ke database gagal!");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $data['username'];
        header("Location: ../dist/index.php");
        exit;
    } else {
        echo "<script>alert('Username atau password salah!');</script>";
    }
}
?>

<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Access | FitForge</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: radial-gradient(circle at top, #0a0a0a 0%, #1a0000 100%);
      color: #fff;
      height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden;
      position: relative;
    }

    /* Efek cahaya merah samar di background */
    body::before {
      content: "";
      position: absolute;
      top: -20%;
      left: 50%;
      width: 400px;
      height: 400px;
      background: rgba(139, 30, 46, 0.3);
      filter: blur(150px);
      transform: translateX(-50%);
      z-index: 0;
    }

    .login-container {
      position: relative;
      z-index: 1;
      background: rgba(20, 10, 10, 0.85);
      border: 1px solid rgba(255, 255, 255, 0.05);
      border-radius: 20px;
      box-shadow: 0 0 25px rgba(139, 30, 46, 0.3);
      width: 100%;
      max-width: 380px;
      padding: 2.5rem;
      text-align: center;
      backdrop-filter: blur(10px);
      animation: fadeIn 0.6s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .login-container h1 {
      color: #ff4b4b;
      font-weight: 700;
      font-size: 1.8rem;
      letter-spacing: 2px;
      margin-bottom: 1.8rem;
      text-shadow: 0 0 8px rgba(255, 75, 75, 0.4);
    }

    .input-group {
      text-align: left;
      margin-bottom: 1.2rem;
    }

    .input-group label {
      font-weight: 500;
      color: #bbb;
      font-size: 0.9rem;
      margin-bottom: 6px;
      display: block;
    }

    .input-group input {
      width: 100%;
      padding: 10px 15px;
      border-radius: 50px;
      border: 1px solid rgba(255, 255, 255, 0.2);
      background: rgba(255, 255, 255, 0.05);
      color: #fff;
      font-size: 0.95rem;
      transition: all 0.3s ease;
    }

    .input-group input:focus {
      outline: none;
      border-color: #b32929;
      box-shadow: 0 0 10px rgba(179, 41, 41, 0.4);
    }

    button {
      width: 100%;
      padding: 10px 0;
      border-radius: 50px;
      border: none;
      background: linear-gradient(90deg, #8b1e2e, #b82e2e);
      color: #fff;
      font-weight: 600;
      font-size: 1rem;
      letter-spacing: 0.5px;
      cursor: pointer;
      transition: 0.3s;
    }

    button:hover {
      background: linear-gradient(90deg, #a12222, #c13333);
      box-shadow: 0 0 15px rgba(184, 46, 46, 0.5);
    }

    /* Efek misterius kecil */
    .login-container::after {
      content: "";
      position: absolute;
      inset: 0;
      border-radius: 20px;
      background: radial-gradient(circle at 30% 20%, rgba(139,30,46,0.1), transparent 60%);
      z-index: -1;
    }

    @media (max-width: 576px) {
      .login-container {
        padding: 1.8rem;
        margin: 0 20px;
      }
    }
  </style>
</head>

<body>
  <form action="" method="post">
    <div class="login-container">
      <h1>ADMIN LOGIN</h1>

      <div class="input-group">
        <label for="username">USERNAME</label>
        <input type="text" name="username" id="username" placeholder="Enter username" required>
      </div>

      <div class="input-group">
        <label for="password">PASSWORD</label>
        <input type="password" name="password" id="password" placeholder="••••••••" required>
      </div>

      <button type="submit">ACCESS</button>
    </div>
  </form>
</body>
</html>
