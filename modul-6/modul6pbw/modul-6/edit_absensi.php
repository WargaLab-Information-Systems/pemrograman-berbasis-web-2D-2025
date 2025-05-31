<?php
session_start();
require 'db.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// Ambil ID dari URL
$id = $_GET['id'] ?? null;

if (!$id) {
    echo "ID tidak ditemukan.";
    exit;
}

// Ambil data lama dari database
$result = $koneksi->query("SELECT * FROM karyawan_absensi WHERE id = $id");
if ($result->num_rows !== 1) {
    echo "Data tidak ditemukan.";
    exit;
}

$data = $result->fetch_assoc();

// Proses update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nip        = $_POST['nip'];
    $nama       = $_POST['nama'];
    $umur       = $_POST['umur'];
    $jk         = $_POST['jenis_kelamin'];
    $departemen = $_POST['departemen'];
    $jabatan    = $_POST['jabatan'];
    $kota       = $_POST['kota_asal'];
    $tanggal    = $_POST['tanggal_absensi'];
    $jam_masuk  = $_POST['jam_masuk'];
    $jam_pulang = $_POST['jam_pulang'];

    $sql = "UPDATE karyawan_absensi SET 
        nip='$nip',
        nama='$nama',
        umur='$umur',
        jenis_kelamin='$jk',
        departemen='$departemen',
        jabatan='$jabatan',
        kota_asal='$kota',
        tanggal_absensi='$tanggal',
        jam_masuk='$jam_masuk',
        jam_pulang='$jam_pulang'
        WHERE id=$id";

    if ($koneksi->query($sql)) {
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Gagal update: " . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Absensi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen py-10 px-4">
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Data Karyawan & Absensi</h2>

        <?php if (isset($error)): ?>
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4"><?= $error ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="nip" value="<?= $data['nip'] ?>" required class="form-input">
                <input type="text" name="nama" value="<?= $data['nama'] ?>" required class="form-input">
                <input type="number" name="umur" value="<?= $data['umur'] ?>" class="form-input">
                <select name="jenis_kelamin" required class="form-input">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki" <?= $data['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                    <option value="Perempuan" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                </select>
                <input type="text" name="departemen" value="<?= $data['departemen'] ?>" class="form-input">
                <input type="text" name="jabatan" value="<?= $data['jabatan'] ?>" class="form-input">
                <input type="text" name="kota_asal" value="<?= $data['kota_asal'] ?>" class="form-input">
                <input type="date" name="tanggal_absensi" value="<?= $data['tanggal_absensi'] ?>" class="form-input">
                <input type="time" name="jam_masuk" value="<?= $data['jam_masuk'] ?>" class="form-input">
                <input type="time" name="jam_pulang" value="<?= $data['jam_pulang'] ?>" class="form-input">
            </div>
            <button type="submit" class="mt-6 w-full bg-green-500 text-white py-2 rounded hover:bg-green-600">
                Simpan Perubahan
            </button>
        </form>

        <a href="dashboard.php" class="inline-block mt-4 text-sm text-blue-500 hover:underline">← Kembali ke Dashboard</a>
    </div>

    <style>
        .form-input {
            @apply w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300;
        }
    </style>
</body>
</html>
