<?php
header('Content-Type: application/json');
require '../../koneksi.php';

// ====== Koneksi Database ======
$servername = "localhost";
$username = "root";
$password = "";
$database = "gym";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// ====== Ambil Data Jadwal dari Database ======
$query = "SELECT id, nama_pelatih, program, hari, jam_mulai, jam_selesai, lokasi FROM pelatih";
$result = mysqli_query($conn, $query);

$events = [];
while ($row = mysqli_fetch_assoc($result)) {
    // Pastikan format waktu lengkap (ISO 8601)
    $start = date('Y-m-d\TH:i:s', strtotime($row['hari'] . ' ' . $row['jam_mulai']));
    $end   = date('Y-m-d\TH:i:s', strtotime($row['hari'] . ' ' . $row['jam_selesai']));

    $events[] = [
        'id' => $row['id'],
        'title' => $row['program'] . ' - ' . $row['nama_pelatih'],
        'start' => $start,
        'end' => $end,
        'extendedProps' => [
            'pelatih' => $row['nama_pelatih'],
            'program' => $row['program'],
            'tanggal' => date('d M Y', strtotime($row['hari'])),
            'jam' => date('H:i', strtotime($row['jam_mulai'])) . " - " . date('H:i', strtotime($row['jam_selesai'])),
            'lokasi' => $row['lokasi']
        ]
    ];
}

mysqli_close($conn);
?>