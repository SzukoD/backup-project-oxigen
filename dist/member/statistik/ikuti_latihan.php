<?php
include '../../../koneksi.php';
session_start();

$id_member = $_SESSION['id_member'];
$id_pelatih = $_POST['id_pelatih'];

// Cek sudah ikut atau belum
$cek = mysqli_query($conn, "SELECT * FROM latihan_offline 
                            WHERE id_member='$id_member' AND id_pelatih='$id_pelatih'");
if(mysqli_num_rows($cek) > 0){
    echo json_encode(['status'=>'error','message'=>'Kamu sudah mengikuti latihan ini.']);
    exit;
}

// Cek kuota pelatih
$qPelatih = mysqli_query($conn, "SELECT kuota FROM pelatih WHERE id_pelatih='$id_pelatih'");
$p = mysqli_fetch_assoc($qPelatih);
if($p['kuota'] <= 0){
    echo json_encode(['status'=>'error','message'=>'Kuota latihan sudah habis.']);
    exit;
}

// Tambah latihan_offline
mysqli_query($conn, "INSERT INTO latihan_offline (id_member, id_pelatih) VALUES ('$id_member','$id_pelatih')");
// Kurangi kuota
mysqli_query($conn, "UPDATE pelatih SET kuota = kuota - 1 WHERE id_pelatih='$id_pelatih'");

echo json_encode(['status'=>'success']);
?>
