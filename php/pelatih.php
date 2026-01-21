<?php
include '../../koneksi.php'; // sesuaikan lokasi koneksi.php kamu

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_pelatih = $_POST['nama_pelatih'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $spesialisasi = $_POST['spesialisasi'];
    $pengalaman = $_POST['pengalaman'];
    $jadwal = $_POST['jadwal'];
    $status = $_POST['status'];

    // upload foto
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $upload_dir = '../../uploads/pelatih/';
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    move_uploaded_file($tmp, $upload_dir . $foto);

    $query = "INSERT INTO pelatih (nama_pelatih, no_telp, alamat, spesialisasi, pengalaman, jadwal, foto, status) 
              VALUES ('$nama_pelatih', '$no_telp', '$alamat', '$spesialisasi', '$pengalaman', '$jadwal', '$foto', '$status')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data pelatih berhasil ditambahkan!'); window.location='pelatih.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data: " . mysqli_error($conn) . "'); window.history.back();</script>";
    }
}
?>
