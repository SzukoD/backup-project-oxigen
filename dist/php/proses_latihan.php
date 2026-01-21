<?php
include '../../koneksi.php';
$uploadDir = '../uploads/latihan/';

$action = $_POST['action'] ?? '';

if ($action == 'create' || $action == 'update') {
    $id_latihan = intval($_POST['id_latihan'] ?? 0);
    $id_kategori = intval($_POST['id_kategori']);
    $nama_latihan = $_POST['nama_latihan'];
    $deskripsi = $_POST['deskripsi'] ?? '';
    $step = $_POST['step'] ?? '';

    // ====== UPLOAD 4 GAMBAR ======
    $uploadFiles = [];
    for ($i = 1; $i <= 4; $i++) {
        $uploadFiles['gambar' . $i] = '';
        if (isset($_FILES['gambar' . $i]) && $_FILES['gambar' . $i]['error'] == 0) {
            $filename = time() . '_' . basename($_FILES['gambar' . $i]['name']);
            move_uploaded_file($_FILES['gambar' . $i]['tmp_name'], $uploadDir . $filename);
            $uploadFiles['gambar' . $i] = $filename;
        }
    }

    // ====== UPLOAD VIDEO ======
    $video = '';
    if (isset($_FILES['video']) && $_FILES['video']['error'] == 0) {
        $video = time() . '_' . basename($_FILES['video']['name']);
        move_uploaded_file($_FILES['video']['tmp_name'], $uploadDir . $video);
    }

    // ====== INSERT / UPDATE ======
    if ($action == 'create') {
        $sql = "INSERT INTO latihan (id_kategori, nama_latihan, gambar1, gambar2, gambar3, gambar4, video, deskripsi, step)
                VALUES ('$id_kategori', '$nama_latihan',
                '{$uploadFiles['gambar1']}', '{$uploadFiles['gambar2']}',
                '{$uploadFiles['gambar3']}', '{$uploadFiles['gambar4']}',
                '$video', '$deskripsi', '$step')";
    } else {
        $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM latihan WHERE id_latihan=$id_latihan"));
        if (!$row) {
            echo "Data latihan tidak ditemukan.";
            exit;
        }

        for ($i = 1; $i <= 4; $i++) {
            if ($uploadFiles['gambar' . $i] == '') $uploadFiles['gambar' . $i] = $row['gambar' . $i];
        }
        if ($video == '') $video = $row['video'];

        $sql = "UPDATE latihan SET
                id_kategori='$id_kategori',
                nama_latihan='$nama_latihan',
                gambar1='{$uploadFiles['gambar1']}',
                gambar2='{$uploadFiles['gambar2']}',
                gambar3='{$uploadFiles['gambar3']}',
                gambar4='{$uploadFiles['gambar4']}',
                video='$video',
                deskripsi='$deskripsi',
                step='$step'
                WHERE id_latihan=$id_latihan";
    }

    echo mysqli_query($conn, $sql) ? 'success' : mysqli_error($conn);
    exit;
}

//
// ====== DELETE ======
//
if ($action == 'delete') {
    $id_latihan = isset($_POST['id_latihan']) ? intval($_POST['id_latihan']) : 0;

    if ($id_latihan > 0) {
        // Ambil file lama
        $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT gambar1,gambar2,gambar3,gambar4,video FROM latihan WHERE id_latihan=$id_latihan"));
        if ($row) {
            for ($i = 1; $i <= 4; $i++) {
                $file = $uploadDir . $row['gambar' . $i];
                if (!empty($row['gambar' . $i]) && file_exists($file)) {
                    @unlink($file);
                }
            }

            if (!empty($row['video']) && file_exists($uploadDir . $row['video'])) {
                @unlink($uploadDir . $row['video']);
            }
        }

        // Hapus di tabel relasi dulu
        mysqli_query($conn, "DELETE FROM program_latihan WHERE id_latihan=$id_latihan");

        // Hapus dari tabel utama
        $delete = mysqli_query($conn, "DELETE FROM latihan WHERE id_latihan=$id_latihan");

        echo $delete ? 'success' : mysqli_error($conn);
    } else {
        echo "ID latihan tidak valid";
    }
    exit;
}
?>
