<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Member</title>
  <style>
    body { font-family: Arial; background: #fafafa; text-align:center; padding-top:50px; }
    img { width:100px; border-radius:50%; }
  </style>
</head>
<body>
  <img src="<?= $_SESSION['foto'] ?? 'default.png' ?>" alt="Foto Profil">
  <h2>Selamat Datang, <?= $_SESSION['nama']; ?>!</h2>
  <p>Email: <?= $_SESSION['email']; ?></p>
  <p>Level: <?= $_SESSION['level']; ?></p>
  <p>Login via: <?= $_SESSION['login_via']; ?></p>

  <a href="logout.php">Logout</a>
</body>
</html>
