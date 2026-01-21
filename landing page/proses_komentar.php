<?php
session_start();
if(!isset($_SESSION['id_member'])){
    header("Location: login.php");
    exit;
}

if(isset($_POST['komentar']) && !empty(trim($_POST['komentar']))){
    $komentar = trim($_POST['komentar']);
    $id_member = $_SESSION['id_member'];
    $nama = $_SESSION['nama_member'];
    $foto = $_SESSION['foto'] ?? 'https://i.pravatar.cc/150?img=68';

    $conn = new mysqli("localhost","root","","gym");
    if($conn->connect_error) die("Koneksi gagal: ".$conn->connect_error);

    $stmt = $conn->prepare("INSERT INTO komentar (id_member, nama, foto, komentar, created_at) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("isss", $id_member, $nama, $foto, $komentar);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

header("Location: index.php#comments");
exit;
