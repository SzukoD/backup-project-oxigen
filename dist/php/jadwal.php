<?php
header('Content-Type: application/json');
include '../../koneksi.php';

$query = mysqli_query($conn, "SELECT id_pelatih, nama_pelatih, jadwal_available FROM pelatih");
if (!$query) {
    echo json_encode(["success" => false, "message" => mysqli_error($conn)]);
    exit;
}

$events = [];

while ($row = mysqli_fetch_assoc($query)) {
    $jadwalStr = trim($row['jadwal_available']);
    if (!empty($jadwalStr)) {
        $jadwalList = explode(',', $jadwalStr);
        foreach ($jadwalList as $item) {
            $item = trim($item);
            if (!empty($item)) {
                $parts = explode(' ', $item);
                $tanggal = $parts[0];
                $jam = $parts[1] ?? '00:00';
                $start = date('Y-m-d\TH:i:s', strtotime("$tanggal $jam"));
                $end   = date('Y-m-d\TH:i:s', strtotime("$tanggal $jam +1 hour"));

                $events[] = [
                    "id" => $row['id_pelatih'],
                    "title" => $row['nama_pelatih'],
                    "start" => $start,
                    "end" => $end,
                    "pelatih" => $row['nama_pelatih'],
                    "tanggal" => $tanggal,
                    "jam" => $jam,
                    "color" => "#0d6efd" // tema gym
                ];
            }
        }
    }
}

echo json_encode($events);
?>
