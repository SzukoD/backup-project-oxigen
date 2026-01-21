<?php
header('Content-Type: application/json; charset=utf-8');
include "../../../koneksi.php";
session_start();

$response = ['ok' => false, 'message' => 'Unknown error'];

// Validasi metode request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  $response['message'] = 'Invalid request method';
  echo json_encode($response);
  exit;
}

// Ambil parameter dari POST dan session
$id_program_member = isset($_POST['id_program_member']) ? intval($_POST['id_program_member']) : 0;
$id_latihan = isset($_POST['id_latihan']) ? intval($_POST['id_latihan']) : 0;
$id_member = isset($_SESSION['id_member']) ? intval($_SESSION['id_member']) : 0;

// Jika session kosong → ambil dari program_member
if ($id_member === 0 && $id_program_member > 0) {
  $q = mysqli_query($conn, "
    SELECT id_member FROM program_member 
    WHERE id_program_member = {$id_program_member} LIMIT 1
  ");
  if ($q && mysqli_num_rows($q) > 0) {
    $r = mysqli_fetch_assoc($q);
    $id_member = intval($r['id_member']);
  }
}

// Validasi parameter
if ($id_member <= 0 || $id_program_member <= 0 || $id_latihan <= 0) {
  $response['message'] = '⚠️ Parameter tidak valid!';
  echo json_encode($response);
  exit;
}

// Cek apakah latihan sudah pernah dicatat di riwayat_latihan
$cek = mysqli_query($conn, "
  SELECT 1 FROM riwayat_latihan
  WHERE id_member = {$id_member}
    AND id_latihan = {$id_latihan}
    AND id_program_member = {$id_program_member}
  LIMIT 1
");
if (!$cek) {
  $response['message'] = 'DB error saat cek riwayat: ' . mysqli_error($conn);
  echo json_encode($response);
  exit;
}

// Jika belum ada → tambahkan data ke riwayat_latihan
if (mysqli_num_rows($cek) == 0) {
  $ins = mysqli_query($conn, "
    INSERT INTO riwayat_latihan (id_member, id_latihan, id_program_member, tanggal)
    VALUES ({$id_member}, {$id_latihan}, {$id_program_member}, NOW())
  ");
  if (!$ins) {
    $response['message'] = 'DB error saat insert riwayat: ' . mysqli_error($conn);
    echo json_encode($response);
    exit;
  }
}

// Hitung jumlah latihan selesai dan total latihan dalam program
$prog_sql = "
  SELECT
    (SELECT COUNT(DISTINCT rl.id_latihan)
     FROM riwayat_latihan rl
     WHERE rl.id_member = {$id_member}
       AND rl.id_program_member = {$id_program_member}
    ) AS selesai,
    (SELECT COUNT(DISTINCT pl.id_latihan)
     FROM program_latihan pl
     WHERE pl.id_program = (
       SELECT id_program FROM program_member WHERE id_program_member = {$id_program_member} LIMIT 1
     )
    ) AS total
";
$prog_q = mysqli_query($conn, $prog_sql);
if (!$prog_q) {
  $response['message'] = 'DB error saat hitung progress: ' . mysqli_error($conn);
  echo json_encode($response);
  exit;
}
$prog = mysqli_fetch_assoc($prog_q);
$selesai = intval($prog['selesai']);
$total = intval($prog['total']);
$progress = ($total > 0) ? round(($selesai / $total) * 100, 0) : 0;

// Update progress di tabel program_member
mysqli_query($conn, "
  UPDATE program_member
  SET progress = {$progress}
  WHERE id_program_member = {$id_program_member}
");

// Ambil id_program untuk redirect
$getProgram = mysqli_query($conn, "
  SELECT id_program 
  FROM program_member 
  WHERE id_program_member = {$id_program_member}
  LIMIT 1
");
$id_program = 0;
if ($getProgram && mysqli_num_rows($getProgram) > 0) {
  $id_program = intval(mysqli_fetch_assoc($getProgram)['id_program']);
}

// =========================================================
// 🔹 SISTEM LEVEL BERDASARKAN PERSENTASE PROGRESS (ANGKA)
// =========================================================

// Ambil data level saat ini (numerik)
$userQ = mysqli_query($conn, "SELECT level FROM member WHERE id_member = {$id_member}");
$userData = mysqli_fetch_assoc($userQ);
$currentLevel = intval($userData['level']); // Default level = 1 jika belum ada

if ($currentLevel <= 0) {
  $currentLevel = 1;
  mysqli_query($conn, "UPDATE member SET level = 1 WHERE id_member = {$id_member}");
}

// streak_hari disamakan dengan progress persen
$newStreak = $progress;

// Update streak_hari di tabel member
mysqli_query($conn, "
  UPDATE member 
  SET streak_hari = {$newStreak}
  WHERE id_member = {$id_member}
");

// Jika progress 100% → naik level (angka) dan reset streak
if ($progress >= 100) {
  $nextLevel = $currentLevel + 1;

  mysqli_query($conn, "
    UPDATE member 
    SET level = {$nextLevel}, streak_hari = 0
    WHERE id_member = {$id_member}
  ");

  // Tandai program selesai
  mysqli_query($conn, "
    UPDATE program_member 
    SET status = 'selesai', tanggal_selesai = NOW()
    WHERE id_program_member = {$id_program_member}
  ");
}

// =========================================================
// 🔹 Kirim respon JSON ke frontend
// =========================================================
$response['ok'] = true;
$response['message'] = 'OK';
$response['progress'] = $progress;
$response['selesai'] = $selesai;
$response['total'] = $total;
$response['program_id'] = $id_program;
$response['streak_hari'] = $newStreak;
$response['streak_progress'] = $newStreak; // sama dengan progress
$response['level'] = ($progress >= 100) ? $nextLevel : $currentLevel;

echo json_encode($response);
exit;
?>
