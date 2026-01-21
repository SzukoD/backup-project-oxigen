<?php
include '../../../koneksi.php';
session_start();

$id_member = $_SESSION['id_member'];
$id_program = $_POST['id_program'];

$query = "INSERT INTO program_member (id_program, id_member, tanggal_mulai, progress, status)
          VALUES ('$id_program', '$id_member', NOW(), 0, 'aktif')";
mysqli_query($conn, $query);

header("Location: index.php");
exit;
?>
