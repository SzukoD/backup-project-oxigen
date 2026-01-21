<?php
include '../../koneksi.php';

// === Konfigurasi Folder Upload ===
$upload_folder = "../uploads/pelatih/";
if (!file_exists($upload_folder)) mkdir($upload_folder, 0777, true);

// === Fungsi bantu untuk validasi jadwal lewat waktu ===
function jadwalSudahLewat($jadwal) {
    // Format jadwal: "Senin 08:00"
    $hariMap = [
        'Minggu' => 0,
        'Senin' => 1,
        'Selasa' => 2,
        'Rabu' => 3,
        'Kamis' => 4,
        'Jumat' => 5,
        'Sabtu' => 6
    ];

    $parts = explode(' ', trim($jadwal));
    if (count($parts) < 2) return false;

    $hari = ucfirst(strtolower($parts[0]));
    $waktu = $parts[1];

    if (!isset($hariMap[$hari])) return false;

    $hariSekarang = date('w'); // 0=minggu
    $tanggalSekarang = new DateTime();

    // Hitung jarak hari ke depan
    $selisihHari = $hariMap[$hari] - $hariSekarang;
    if ($selisihHari < 0) $selisihHari += 7; // minggu depan

    $tanggalJadwal = clone $tanggalSekarang;
    $tanggalJadwal->modify("+$selisihHari days");
    $tanggalJadwal->setTime((int)substr($waktu, 0, 2), (int)substr($waktu, 3, 2));

    // Bandingkan dengan waktu saat ini
    $now = new DateTime();
    return $tanggalJadwal < $now;
}

// --- CREATE (Tambah Data) ---
if (isset($_POST['action']) && $_POST['action'] == 'create') {
    $nama_pelatih = $_POST['nama_pelatih'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_telepon = $_POST['no_telepon'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $spesialisasi = $_POST['spesialisasi'];
    $pengalaman_tahun = $_POST['pengalaman_tahun'];
    $jadwal_available = trim($_POST['jadwal_available']);
    $status = $_POST['status'];
    $kuota = isset($_POST['kuota']) ? intval($_POST['kuota']) : 0;
    $tempat = $_POST['tempat'];

    // === CEK JADWAL DUPLIKAT + CEK JADWAL LEWAT ===
    $jadwalArray = array_map('trim', explode(',', $jadwal_available));
    foreach ($jadwalArray as $jadwal) {
        if (jadwalSudahLewat($jadwal)) {
            echo "error: Jadwal '$jadwal' sudah lewat waktu saat ini.";
            exit;
        }

        $cek = mysqli_query($conn, "SELECT * FROM pelatih WHERE jadwal_available LIKE '%$jadwal%'");
        if (mysqli_num_rows($cek) > 0) {
            echo "error: Jadwal '$jadwal' sudah digunakan oleh pelatih lain.";
            exit;
        }
    }

    // === UPLOAD FOTO ===
    $foto_pelatih = '';
    if (!empty($_FILES['foto_pelatih']['name']) && $_FILES['foto_pelatih']['error'] == 0) {
        $filename = time() . "_" . basename($_FILES["foto_pelatih"]["name"]);
        $target_file = $upload_folder . $filename;

        if (move_uploaded_file($_FILES["foto_pelatih"]["tmp_name"], $target_file)) {
            $foto_pelatih = $filename; // hanya nama file disimpan ke database
        }
    }

    // === INSERT DATA ===
    $query = "INSERT INTO pelatih 
              (nama_pelatih, jenis_kelamin, no_telepon, email, alamat, spesialisasi, pengalaman_tahun, jadwal_available, foto_pelatih, status, kuota, tempat)
              VALUES 
              ('$nama_pelatih', '$jenis_kelamin', '$no_telepon', '$email', '$alamat', '$spesialisasi', '$pengalaman_tahun', '$jadwal_available', '$foto_pelatih', '$status', '$kuota', '$tempat')";

    echo mysqli_query($conn, $query) ? "success" : "error: " . mysqli_error($conn);
    exit;
}

// --- READ (Get Data by ID) ---
if (isset($_GET['action']) && $_GET['action'] == 'read' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM pelatih WHERE id_pelatih = '$id'");
    echo json_encode(mysqli_fetch_assoc($result));
    exit;
}

// --- UPDATE (Edit Data) ---
if (isset($_POST['action']) && $_POST['action'] == 'update') {
    $id_pelatih = $_POST['id_pelatih'];
    $nama_pelatih = $_POST['nama_pelatih'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_telepon = $_POST['no_telepon'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $spesialisasi = $_POST['spesialisasi'];
    $pengalaman_tahun = $_POST['pengalaman_tahun'];
    $jadwal_available = trim($_POST['jadwal_available']);
    $status = $_POST['status'];
    $kuota = isset($_POST['kuota']) ? intval($_POST['kuota']) : 0;
    $tempat = $_POST['tempat'];

    // Ambil data lama
    $oldData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT jadwal_available, foto_pelatih FROM pelatih WHERE id_pelatih='$id_pelatih'"));
    $foto_pelatih = $oldData['foto_pelatih'];
    $oldJadwal = $oldData['jadwal_available'];

    // === CEK JADWAL DUPLIKAT (hanya jika jadwal berubah) ===
    if ($jadwal_available != $oldJadwal) {
        $jadwalArray = array_map('trim', explode(',', $jadwal_available));
        foreach ($jadwalArray as $jadwal) {
            if (jadwalSudahLewat($jadwal)) {
                echo "error: Jadwal '$jadwal' sudah lewat waktu saat ini.";
                exit;
            }

            $cek = mysqli_query($conn, "SELECT * FROM pelatih WHERE jadwal_available LIKE '%$jadwal%' AND id_pelatih != '$id_pelatih'");
            if (mysqli_num_rows($cek) > 0) {
                echo "error: Jadwal '$jadwal' sudah digunakan oleh pelatih lain.";
                exit;
            }
        }
    }

    // === UPLOAD FOTO BARU JIKA ADA ===
    if (!empty($_FILES['foto_pelatih']['name']) && $_FILES['foto_pelatih']['error'] == 0) {
        $filename = time() . "_" . basename($_FILES["foto_pelatih"]["name"]);
        $target_file = $upload_folder . $filename;

        if (move_uploaded_file($_FILES["foto_pelatih"]["tmp_name"], $target_file)) {
            if (!empty($foto_pelatih)) {
                $oldFile = $upload_folder . $foto_pelatih;
                if (file_exists($oldFile)) unlink($oldFile);
            }
            $foto_pelatih = $filename;
        }
    }

    // === UPDATE DATA ===
    $query = "UPDATE pelatih SET 
              nama_pelatih='$nama_pelatih',
              jenis_kelamin='$jenis_kelamin',
              no_telepon='$no_telepon',
              email='$email',
              alamat='$alamat',
              spesialisasi='$spesialisasi',
              pengalaman_tahun='$pengalaman_tahun',
              jadwal_available='$jadwal_available',
              foto_pelatih='$foto_pelatih',
              status='$status',
              kuota='$kuota',
              tempat='$tempat'
              WHERE id_pelatih='$id_pelatih'";

    echo mysqli_query($conn, $query) ? "success" : "error: " . mysqli_error($conn);
    exit;
}

// --- DELETE (Hapus Data) ---
if (isset($_POST['action']) && $_POST['action'] == 'delete') {
    $id = $_POST['id'];
    $foto = mysqli_fetch_assoc(mysqli_query($conn, "SELECT foto_pelatih FROM pelatih WHERE id_pelatih='$id'"));

    if (!empty($foto['foto_pelatih'])) {
        $oldFile = $upload_folder . $foto['foto_pelatih'];
        if (file_exists($oldFile)) unlink($oldFile);
    }

    $query = "DELETE FROM pelatih WHERE id_pelatih='$id'";
    echo mysqli_query($conn, $query) ? "success" : "error: " . mysqli_error($conn);
    exit;
}
?>
