<?php
include '../../../koneksi.php';
session_start();

$id_member  = intval($_SESSION['id_member'] ?? $_POST['id_member'] ?? 0);
$id_latihan = intval($_POST['id_latihan']);
$action     = $_POST['action'];

if ($action === 'tambah') {
  $berat = floatval($_POST['berat']);
  $reps  = intval($_POST['reps']);
  mysqli_query($conn, "
    INSERT INTO log_latihan (id_member, id_latihan, tanggal, berat, reps)
    VALUES ($id_member, $id_latihan, CURDATE(), $berat, $reps)
  ");
}

if ($action === 'hapus') {
  $id_log = intval($_POST['id_log']);
  mysqli_query($conn, "
    DELETE FROM log_latihan 
    WHERE id_log = $id_log AND id_member = $id_member
  ");
}

// tampil ulang data log user ini
$result = mysqli_query($conn, "
  SELECT * FROM log_latihan 
  WHERE id_latihan = $id_latihan AND id_member = $id_member 
  ORDER BY tanggal DESC
");

while ($log = mysqli_fetch_assoc($result)) {
  echo '<div class="log-row" data-id="'.$log['id_log'].'">
          <span>'.date('d M Y', strtotime($log['tanggal'])).'</span>
          <span>'.htmlspecialchars($log['berat']).'</span>
          <span>'.htmlspecialchars($log['reps']).'</span>
          <button class="delete-btn"><i class="fas fa-trash"></i></button>
        </div>';
}
?>
