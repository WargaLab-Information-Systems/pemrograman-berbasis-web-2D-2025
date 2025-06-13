<?php
session_start();
include 'config.php';

if (!isset($_SESSION['admin'])) {
  header('Location: login_admin.php');
  exit;
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Ambil data pendaftar berdasarkan ID
  $stmt = $conn->prepare("SELECT * FROM pendaftar WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();
  $data = $result->fetch_assoc();

  if ($data) {
    $nim = $data['nim'];
    $nama = $data['nama'];

    // Cek apakah sudah ada di tabel diterima
    $cek = $conn->prepare("SELECT * FROM diterima WHERE nim = ?");
    $cek->bind_param("s", $nim);
    $cek->execute();
    $cekResult = $cek->get_result();

    if ($cekResult->num_rows > 0) {
      // Update status jadi Tolak
      $update = $conn->prepare("UPDATE diterima SET status = 'Tolak' WHERE nim = ?");
      $update->bind_param("s", $nim);
      $update->execute();
    } else {
      // Masukkan data baru dengan status Tolak
      $insert = $conn->prepare("INSERT INTO diterima (nim, nama, status) VALUES (?, ?, 'Tolak')");
      $insert->bind_param("ss", $nim, $nama);
      $insert->execute();
    }

    header("Location: dashboard.php");
    exit;
  }
}
?>
