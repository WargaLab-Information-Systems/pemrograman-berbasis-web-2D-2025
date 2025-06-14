<?php
session_start();
require 'karyawan.php';

// Cek login
if (!isset($_SESSION['login'])) {
    require_once 'karyawan.php';
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

    $sql = "INSERT INTO absensi 
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
