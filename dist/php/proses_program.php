<?php
include '../../koneksi.php';

$action = $_POST['action'] ?? '';
$uploadDir = '../uploads/';

// ====== UPLOAD CHUNK ======
if ($action == 'upload_chunk') {
    $chunkIndex = $_POST['chunk_index'];
    $totalChunks = $_POST['total_chunks'];
    $fileName = $_POST['file_name'];

    if (!empty($_FILES['file']['tmp_name'])) {
        $tmp = $_FILES['file']['tmp_name'];
        $target = $uploadDir . $fileName;
        file_put_contents($target, file_get_contents($tmp), FILE_APPEND);
        echo "Chunk $chunkIndex uploaded\n";
    }
    exit;
}

// ====== CREATE PROGRAM ======
if ($action == 'create') {
    $nama_program = $_POST['nama_program'] ?? '';
    $deskripsi = $_POST['deskripsi'] ?? '';
    $durasi = $_POST['durasi'] ?? '';
    $level = $_POST['level'] ?? 'Pemula';
    $video = $_POST['video_name'] ?? '';

    // Upload video langsung (jika bukan chunk)
    if (empty($video) && isset($_FILES['video']) && $_FILES['video']['error'] == 0) {
        $fileName = time() . '_' . basename($_FILES['video']['name']);
        move_uploaded_file($_FILES['video']['tmp_name'], $uploadDir . $fileName);
        $video = $fileName;
    }

    // Upload thumbnail
    $thumbnail = '';
    if (!empty($_FILES['thumbnail']['name'])) {
        $thumbnail = time() . '_' . basename($_FILES['thumbnail']['name']);
        move_uploaded_file($_FILES['thumbnail']['tmp_name'], $uploadDir . $thumbnail);
    }

    $sql = "INSERT INTO program (nama_program, deskripsi, durasi, level, thumbnail, video)
            VALUES ('$nama_program','$deskripsi','$durasi','$level','$thumbnail','$video')";
    echo mysqli_query($conn, $sql) ? "success" : "Error: " . mysqli_error($conn);
    exit;
}

// ====== UPDATE PROGRAM ======
if ($action == 'update') {
    $id = intval($_POST['id_program'] ?? 0);
    if ($id <= 0) { echo "Error: ID Program tidak valid"; exit; }

    // Ambil data lama program
    $query = mysqli_query($conn, "SELECT * FROM program WHERE id_program=$id");
    $row = mysqli_fetch_assoc($query);
    if (!$row) { echo "Error: Program tidak ditemukan"; exit; }

    $nama_program = $_POST['nama_program'] ?? $row['nama_program'];
    $deskripsi    = $_POST['deskripsi'] ?? $row['deskripsi'];
    $durasi       = $_POST['durasi'] ?? $row['durasi'];
    $level        = $_POST['level'] ?? $row['level'];
    $video        = $row['video'];
    $thumbnail    = $row['thumbnail'];

    // ====== THUMBNAIL BARU ======
    if (!empty($_FILES['thumbnail']['name'])) {
        if (!empty($row['thumbnail']) && file_exists($uploadDir . $row['thumbnail'])) {
            unlink($uploadDir . $row['thumbnail']);
        }
        $thumbnail = time() . '_' . basename($_FILES['thumbnail']['name']);
        move_uploaded_file($_FILES['thumbnail']['tmp_name'], $uploadDir . $thumbnail);
    }

    // ====== VIDEO BARU ======
    if (!empty($_POST['video_name'])) {
        if (!empty($row['video']) && file_exists($uploadDir . $row['video'])) {
            unlink($uploadDir . $row['video']);
        }
        $video = $_POST['video_name'];
    } elseif (isset($_FILES['video']) && $_FILES['video']['error'] == 0) {
        if (!empty($row['video']) && file_exists($uploadDir . $row['video'])) {
            unlink($uploadDir . $row['video']);
        }
        $video = time() . '_' . basename($_FILES['video']['name']);
        move_uploaded_file($_FILES['video']['tmp_name'], $uploadDir . $video);
    }

    // ====== UPDATE DATA PROGRAM ======
    $sql = "UPDATE program SET 
            nama_program='$nama_program',
            deskripsi='$deskripsi',
            durasi='$durasi',
            level='$level',
            thumbnail='$thumbnail',
            video='$video'
            WHERE id_program=$id";

    $res = mysqli_query($conn, $sql);
    if (!$res) {
        echo "Error: " . mysqli_error($conn);
        exit;
    }

    // ====== UPDATE JADWAL (jika ada) ======
    if (isset($_POST['jadwal']) && !empty($_POST['jadwal'])) {
        foreach ($_POST['jadwal'] as $jadwal) {
            // contoh update jadwal, cek dulu apakah id_jadwal valid
            $id_jadwal = intval($jadwal['id_jadwal'] ?? 0);
            if ($id_jadwal > 0) {
                $hari = $jadwal['hari'] ?? '';
                $waktu = $jadwal['waktu'] ?? '';
                mysqli_query($conn, "UPDATE jadwal SET hari='$hari', waktu='$waktu' WHERE id_jadwal=$id_jadwal");
            }
        }
    }
    
    echo "success";
    exit;
}



// ====== DELETE PROGRAM ======
if ($action == 'delete' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $query = mysqli_query($conn, "SELECT thumbnail, video FROM program WHERE id_program=$id");
    if ($row = mysqli_fetch_assoc($query)) {
        if (!empty($row['thumbnail']) && file_exists($uploadDir . $row['thumbnail'])) unlink($uploadDir . $row['thumbnail']);
        if (!empty($row['video']) && file_exists($uploadDir . $row['video'])) unlink($uploadDir . $row['video']);
    }
    $sql = "DELETE FROM program WHERE id_program=$id";
    echo mysqli_query($conn, $sql) ? "success" : "Error: " . mysqli_error($conn);
    exit;
}


?>
