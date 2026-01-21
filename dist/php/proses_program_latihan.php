<?php
include '../../koneksi.php';

header('Content-Type: application/json'); // biar response jelas JSON

$action = $_POST['action'] ?? '';

if ($action == 'create') {
    $id_program = intval($_POST['id_program']);
    $id_latihan_list = $_POST['id_latihan'] ?? [];
    $minggu = intval($_POST['minggu']);
    $hari = $_POST['hari'];
    $sets = intval($_POST['sets']);
    $rest_time = intval($_POST['rest_time']);

    if (empty($id_latihan_list)) {
        echo json_encode(['status' => 'error', 'message' => 'Harap pilih minimal satu latihan!']);
        exit;
    }

    foreach ($id_latihan_list as $i => $id_latihan) {
        $urutan = $i + 1;
        $sql = "INSERT INTO program_latihan (id_program, id_latihan, minggu, hari, urutan, sets, rest_time)
                VALUES ('$id_program', '$id_latihan', '$minggu', '$hari', '$urutan', '$sets', '$rest_time')";
        if (!mysqli_query($conn, $sql)) {
            echo json_encode(['status' => 'error', 'message' => mysqli_error($conn)]);
            exit;
        }
    }

    echo json_encode(['status' => 'success', 'message' => 'Program latihan berhasil ditambahkan.']);
    exit;
}

if ($action == 'edit') {
    $id_program_latihan = intval($_POST['id_program_latihan']);
    $id_program = intval($_POST['id_program']);
    $id_latihan = intval($_POST['id_latihan']);
    $minggu = intval($_POST['minggu']);
    $hari = $_POST['hari'];
    $sets = intval($_POST['sets']);
    $rest_time = intval($_POST['rest_time']);

    $sql = "UPDATE program_latihan SET 
            id_program='$id_program', 
            id_latihan='$id_latihan', 
            minggu='$minggu', 
            hari='$hari', 
            sets='$sets', 
            rest_time='$rest_time' 
            WHERE id_program_latihan='$id_program_latihan'";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(['status' => 'success', 'message' => 'Data berhasil diperbarui.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => mysqli_error($conn)]);
    }
    exit;
}

if ($action == 'delete') {
    $id_program_latihan = intval($_POST['id_program_latihan']);
    $sql = "DELETE FROM program_latihan WHERE id_program_latihan=$id_program_latihan";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(['status' => 'success', 'message' => 'Data berhasil dihapus.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => mysqli_error($conn)]);
    }
    exit;
}

if ($action == 'get') {
    $id_program_latihan = intval($_POST['id_program_latihan']);
    $sql = "SELECT * FROM program_latihan WHERE id_program_latihan='$id_program_latihan'";
    $res = mysqli_query($conn, $sql);
    echo json_encode(mysqli_fetch_assoc($res));
    exit;
}
?>
