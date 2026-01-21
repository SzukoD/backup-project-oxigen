<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
error_reporting(0);

include '../../koneksi.php';

$response = ['success' => false, 'message' => '', 'jadwal' => []];

if (!isset($_GET['id']) || empty($_GET['id'])) {
    $response['message'] = "Parameter 'id' tidak ditemukan.";
    echo json_encode($response);
    exit;
}

$id = intval($_GET['id']);

$query = "SELECT nama_pelatih, spesialisasi, jadwal_available FROM pelatih WHERE id_pelatih = ? AND status = 'Aktif'";
$stmt = $conn->prepare($query);

if (!$stmt) {
    $response['message'] = "Query tidak valid: " . $conn->error;
    echo json_encode($response);
    exit;
}

$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    $response['message'] = "Data pelatih tidak ditemukan atau tidak aktif.";
    echo json_encode($response);
    exit;
}

$row = $result->fetch_assoc();
$nama_pelatih = $row['nama_pelatih'];
$spesialisasi = $row['spesialisasi'];
$jadwal_available = trim($row['jadwal_available'] ?? '');

// Jika jadwal kosong
if (empty($jadwal_available)) {
    $response['success'] = true;
    $response['message'] = "Pelatih ditemukan, tapi belum memiliki jadwal.";
    $response['nama_pelatih'] = $nama_pelatih;
    $response['spesialisasi'] = $spesialisasi;
    $response['jadwal'] = []; // tetap kosong tapi tetap kirim spesialisasi di luar
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
    exit;
}

// Parse jadwal
$jadwalList = explode(',', $jadwal_available);
foreach ($jadwalList as $item) {
    $item = trim($item);
    if (!empty($item)) {
        $timestamp = strtotime($item);
        if ($timestamp !== false) {
            $response['jadwal'][] = [
                'tanggal' => date('Y-m-d', $timestamp),
                'waktu' => date('H:i', $timestamp),
                'title' => $nama_pelatih,
                'spesialisasi' => $spesialisasi,
                'pelatih' => $nama_pelatih
            ];
        }
    }
}

$response['success'] = true;
$response['message'] = "Data jadwal pelatih berhasil dimuat.";
$response['nama_pelatih'] = $nama_pelatih;
$response['spesialisasi'] = $spesialisasi; // pastikan selalu dikirim
echo json_encode($response, JSON_UNESCAPED_UNICODE);

$stmt->close();
$conn->close();
?>
