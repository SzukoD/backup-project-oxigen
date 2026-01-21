<?php
require 'koneksi.php';

header('Content-Type: application/json');

// Ambil semua komentar terbaru
$result = $koneksi->query("SELECT * FROM komentar ORDER BY created_at DESC");
$komentar_list = [];

while($row = $result->fetch_assoc()){
    $komentar_list[] = [
        'nama' => $row['nama'], // sesuaikan dengan kolom di DB
        'foto' => $row['foto'] ?: 'default-avatar.png',
        'komentar' => $row['komentar'],
        'created_at' => $row['created_at']
    ];
}

echo json_encode($komentar_list);
