<?php
include '../../../koneksi.php';
session_start();
$id_member = $_SESSION['id_member'];

$q = mysqli_query($conn, "
  SELECT lo.id_latihan_offline, p.nama_pelatih, p.spesialisasi, p.jadwal_available, p.tempat
  FROM latihan_offline lo
  JOIN pelatih p ON lo.id_pelatih = p.id_pelatih
  WHERE lo.id_member='$id_member'
  ORDER BY lo.tanggal_daftar DESC
");

$data = [];
while($row = mysqli_fetch_assoc($q)){
    $data[] = $row;
}
echo json_encode($data);
