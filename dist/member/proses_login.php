<?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "gym");

$email = $_POST['email'];
$password = $_POST['password'];

$q = mysqli_query($koneksi, "SELECT * FROM member WHERE email='$email' AND password='$password' AND status='aktif'");
if (mysqli_num_rows($q) > 0) {
    $data = mysqli_fetch_assoc($q);

    // Update waktu login terakhir
    mysqli_query($koneksi, "UPDATE member SET last_login = NOW(), streak_hari = streak_hari + 1 WHERE id_member = {$data['id_member']}");

    $_SESSION['id_member'] = $data['id_member'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['level'] = $data['level'];
    $_SESSION['login_via'] = 'manual';

    header("Location: index.php");
    exit;
} else {
    echo "<script>alert('Email atau password salah / akun nonaktif!'); window.location='index.php';</script>";
}
