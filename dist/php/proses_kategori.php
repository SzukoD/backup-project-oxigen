<?php
include '../../koneksi.php';

$action = $_POST['action'] ?? '';
$uploadDir = '../uploads/kategori/';

// Pastikan folder upload ada
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// ====== CREATE KATEGORI ======
if ($action == 'create') {
    $nama_kategori = mysqli_real_escape_string($conn, $_POST['nama_kategori'] ?? '');
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi'] ?? '');
    $gambar = '';

    // Upload gambar (jika ada)
    if (!empty($_FILES['gambar']['name'])) {
        $gambar = time() . '_' . basename($_FILES['gambar']['name']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadDir . $gambar);
    }

    $sql = "INSERT INTO kategori_latihan (nama_kategori, deskripsi, gambar)
            VALUES ('$nama_kategori', '$deskripsi', '$gambar')";
    echo mysqli_query($conn, $sql) ? "success" : "Error: " . mysqli_error($conn);
    exit;
}

// ====== UPDATE KATEGORI ======
if ($action == 'update') {
    $id = intval($_POST['id_kategori'] ?? 0);
    if ($id <= 0) { echo "Error: ID tidak valid"; exit; }

    // Ambil data lama kategori
    $query = mysqli_query($conn, "SELECT * FROM kategori_latihan WHERE id_kategori=$id");
    $row = mysqli_fetch_assoc($query);
    if (!$row) { echo "Error: Kategori tidak ditemukan"; exit; }

    $nama_kategori = mysqli_real_escape_string($conn, $_POST['nama_kategori'] ?? $row['nama_kategori']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi'] ?? $row['deskripsi']);
    $gambar = $row['gambar'];

    // Gambar baru (jika diupload)
    if (!empty($_FILES['gambar']['name'])) {
        // Hapus gambar lama
        if (!empty($row['gambar']) && file_exists($uploadDir . $row['gambar'])) {
            unlink($uploadDir . $row['gambar']);
        }

        $gambar = time() . '_' . basename($_FILES['gambar']['name']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadDir . $gambar);
    }

    $sql = "UPDATE kategori_latihan SET 
            nama_kategori='$nama_kategori',
            deskripsi='$deskripsi',
            gambar='$gambar'
            WHERE id_kategori=$id";

    echo mysqli_query($conn, $sql) ? "success" : "Error: " . mysqli_error($conn);
    exit;
}

$uploadDir = '../uploads/kategori/';

$action = $_POST['action'] ?? '';

if ($action == 'delete' && isset($_POST['id_kategori'])) {
    $id = intval($_POST['id_kategori']); // sesuaikan dengan data-id_kategori
    $query = mysqli_query($conn, "SELECT gambar FROM kategori_latihan WHERE id_kategori=$id");
    if ($row = mysqli_fetch_assoc($query)) {
        if (!empty($row['gambar']) && file_exists($uploadDir . $row['gambar'])) {
            unlink($uploadDir . $row['gambar']);
        }
    }

    $sql = "DELETE FROM kategori_latihan WHERE id_kategori=$id";
    echo mysqli_query($conn, $sql) ? "success" : "Error: " . mysqli_error($conn);
    exit;
}

echo "Error: aksi tidak dikenali";
?>
