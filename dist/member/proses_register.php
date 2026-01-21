<?php
include '../../koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];

$cek = mysqli_query($conn, "SELECT * FROM member WHERE email='$email'");
if (mysqli_num_rows($cek) > 0) {
  echo "<script>alert('Email sudah terdaftar!');window.location='register.php';</script>";
} else {
  $query = "INSERT INTO member (nama, email, password) VALUES ('$nama', '$email', '$password')";
  if (mysqli_query($conn, $query)) {
    echo "<script>alert('Registrasi berhasil! Silakan login.');window.location='login.php';</script>";
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
?>
