<?php
header('Content-Type: application/json');

// ====== CEK FILE KONEKSI ======
$koneksiPath = '../../koneksi.php';
if (!file_exists($koneksiPath)) {
    echo json_encode(["success" => false, "message" => "File koneksi.php tidak ditemukan di $koneksiPath"]);
    exit;
}
include $koneksiPath;

// ====== CEK PARAMETER ======
$id = $_GET['id'] ?? '';
if (empty($id)) {
    echo json_encode(["success" => false, "message" => "Parameter ID pelatih tidak dikirim."]);
    exit;
}

// ====== QUERY DATABASE ======
$query = mysqli_query($conn, "SELECT jadwal_available FROM pelatih WHERE id_pelatih = '$id'");
if (!$query) {
    echo json_encode(["success" => false, "message" => "Query gagal: " . mysqli_error($conn)]);
    exit;
}

$data = mysqli_fetch_assoc($query);
if (!$data) {
    echo json_encode(["success" => false, "message" => "Data pelatih tidak ditemukan."]);
    exit;
}

// ====== PROSES DATA JADWAL ======
$jadwal_available = trim($data['jadwal_available'] ?? '');

if (empty($jadwal_available)) {
    echo json_encode(["success" => true, "jadwal" => []]);
    exit;
}

$jadwalList = explode(',', $jadwal_available);
$result = [];

foreach ($jadwalList as $item) {
    $item = trim($item);
    if (!empty($item)) {
        // Format data: YYYY-MM-DD HH:MM
        $parts = explode(' ', $item);
        $tanggal = date('d M Y', strtotime($parts[0]));
        $waktu = $parts[1] ?? '-';
        $result[] = [
            "tanggal" => $tanggal,
            "waktu" => $waktu
        ];
    }
}

// ====== OUTPUT JSON ======
echo json_encode([
    "success" => true,
    "jadwal" => $result
]);
?>
