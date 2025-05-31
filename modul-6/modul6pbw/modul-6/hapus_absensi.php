<?php
session_start();
require 'db.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}


$id = $_GET['id'] ?? null;

if (!$id) {
    echo "ID tidak ditemukan.";
    exit;
}


$sql = "DELETE FROM karyawan_absensi WHERE id = $id";

if ($koneksi->query($sql)) {
    header("Location: dashboard.php");
    exit;
} else {
    echo "Gagal menghapus data: " . $koneksi->error;
}
?>
