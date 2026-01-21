<?php
include '../../koneksi.php';

if (isset($_POST['id_member'])) {
  $id_member = intval($_POST['id_member']);

  // Pastikan data ada
  $cek = mysqli_query($conn, "SELECT * FROM member WHERE id_member = $id_member");
  if (mysqli_num_rows($cek) > 0) {
    $delete = mysqli_query($conn, "DELETE FROM member WHERE id_member = $id_member");

    if ($delete) {
      echo "✅ Member berhasil dihapus!";
    } else {
      echo "❌ Gagal menghapus member!";
    }
  } else {
    echo "⚠️ Data member tidak ditemukan!";
  }
} else {
  echo "⚠️ ID member tidak dikirim!";
}
?>
