<?php
require_once 'config_google.php';
session_start();

// koneksi database
$koneksi = mysqli_connect("localhost", "root", "", "gym");
if (mysqli_connect_errno()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if (!isset($token['error'])) {
        $client->setAccessToken($token['access_token']);

        // ambil data user dari Google
        $google_service = new Google\Service\Oauth2($client);
        $info = $google_service->userinfo->get();

        $google_id = mysqli_real_escape_string($koneksi, $info->id);
        $email = mysqli_real_escape_string($koneksi, $info->email);
        $nama = mysqli_real_escape_string($koneksi, $info->name);
        $foto = mysqli_real_escape_string($koneksi, $info->picture);

        // cek apakah email sudah ada
        $cek = mysqli_query($koneksi, "SELECT * FROM member WHERE email='$email'");
        if (!$cek) die("Query error: " . mysqli_error($koneksi));

        if (mysqli_num_rows($cek) > 0) {
            // update data login terakhir + streak harian + foto terbaru
            mysqli_query($koneksi, "
                UPDATE member 
                SET google_id='$google_id', 
                    foto_profile='$foto', 
                    last_login=NOW(), 
                    streak_hari = streak_hari + 1 
                WHERE email='$email'
            ");
        } else {
            // auto register user baru
            mysqli_query($koneksi, "
                INSERT INTO member (nama, email, google_id, foto_profile, status) 
                VALUES ('$nama', '$email', '$google_id', '$foto', 'aktif')
            ");
        }

        // ambil ulang data user untuk session
        $userQuery = mysqli_query($koneksi, "SELECT * FROM member WHERE email='$email'");
        if (!$userQuery) die("Query error: " . mysqli_error($koneksi));
        $user = mysqli_fetch_assoc($userQuery);

        // pastikan session selalu diupdate dengan foto terbaru
        $_SESSION['id_member'] = $user['id_member'];
        $_SESSION['nama_member'] = $user['nama'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['foto'] = !empty($user['foto_profile']) ? $user['foto_profile'] : 'https://i.pravatar.cc/150?img=68';

        // redirect ke halaman utama
        header("Location: index.php");
        exit;

    } else {
        echo "<h3 style='color:red;'>Terjadi kesalahan saat login dengan Google. Silakan coba lagi.</h3>";
        echo "<a href='login.php'>Kembali ke Login</a>";
    }
} else {
    header("Location: login.php");
    exit;
}
