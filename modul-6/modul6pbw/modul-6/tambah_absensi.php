<?php
session_start();
require 'db.php';

// Cek login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nip            = $_POST['nip'];
    $nama           = $_POST['nama'];
    $umur           = $_POST['umur'];
    $jk             = $_POST['jenis_kelamin'];
    $departemen     = $_POST['departemen'];
    $jabatan        = $_POST['jabatan'];
    $kota           = $_POST['kota_asal'];
    $tanggal        = $_POST['tanggal_absensi'];
    $jam_masuk      = $_POST['jam_masuk'];
    $jam_pulang     = $_POST['jam_pulang'];

    $sql = "INSERT INTO karyawan_absensi 
        (nip, nama, umur, jenis_kelamin, departemen, jabatan, kota_asal, tanggal_absensi, jam_masuk, jam_pulang) 
        VALUES 
        ('$nip', '$nama', '$umur', '$jk', '$departemen', '$jabatan', '$kota', '$tanggal', '$jam_masuk', '$jam_pulang')";

    if ($koneksi->query($sql)) {
        $success = "Data berhasil ditambahkan.";
    } else {
        $error = "Gagal: " . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Absensi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen py-10 px-4">
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Data Karyawan & Absensi</h2>

        <?php if (isset($success)): ?>
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4"><?= $success ?></div>
        <?php elseif (isset($error)): ?>
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4"><?= $error ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="nip" placeholder="NIP" required class="form-input">
                <input type="text" name="nama" placeholder="Nama" required class="form-input">
                <input type="number" name="umur" placeholder="Umur" class="form-input">
                <select name="jenis_kelamin" required class="form-input">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <input type="text" name="departemen" placeholder="Departemen" class="form-input">
                <input type="text" name="jabatan" placeholder="Jabatan" class="form-input">
                <input type="text" name="kota_asal" placeholder="Kota Asal" class="form-input">
                <input type="date" name="tanggal_absensi" class="form-input">
                <input type="time" name="jam_masuk" class="form-input">
                <input type="time" name="jam_pulang" class="form-input">
            </div>
            <button type="submit" class="mt-6 w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">
                Simpan Data
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
