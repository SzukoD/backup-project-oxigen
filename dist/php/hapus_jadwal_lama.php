<?php
include '../../koneksi.php';
date_default_timezone_set('Asia/Jakarta');

$now = date('Y-m-d H:i');
$result = mysqli_query($conn, "SELECT id_pelatih, jadwal_available FROM pelatih");

while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id_pelatih'];
    $jadwal = $row['jadwal_available'];
    if (empty($jadwal)) continue;

    $jadwalList = array_map('trim', explode(',', $jadwal));
    $jadwalBaru = [];

    foreach ($jadwalList as $item) {
        if (strtotime($item) >= strtotime($now)) {
            $jadwalBaru[] = $item;
        }
    }

    $jadwalFinal = implode(', ', $jadwalBaru);
    if ($jadwalFinal != $jadwal) {
        mysqli_query($conn, "UPDATE pelatih SET jadwal_available = '$jadwalFinal' WHERE id_pelatih = '$id'");
    }
}

echo "Jadwal lama berhasil dibersihkan pada " . date('d-m-Y H:i:s');
?>
