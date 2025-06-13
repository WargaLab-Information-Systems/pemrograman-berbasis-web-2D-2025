<?php
include 'config.php'; 
//  Menghubungkan ke database melalui file config.php

session_start(); 
// Memulai session untuk mengecek status login

if (!isset($_SESSION['admin'])) 
  header('Location: login_admin.php'); 
//  Jika admin belum login, langsung alihkan ke halaman login

$id = $_GET['id']; 
//  Ambil ID pendaftar dari URL (yang ingin dihapus)

$res = $conn->query("SELECT ktp_path, transkrip_path FROM pendaftar WHERE id = $id"); 
//  Ambil nama file KTP dan transkrip dari database berdasarkan ID

if ($data = $res->fetch_assoc()) {
  //  Jika data ditemukan

  if (file_exists($data['ktp_path'])) 
    unlink($data['ktp_path']); 
  //  Jika file KTP ada di folder, hapus dari server

  if (file_exists($data['transkrip_path'])) 
    unlink($data['transkrip_path']); 
  //  Jika file transkrip ada, hapus  dari server
}

$conn->query("DELETE FROM pendaftar WHERE id = $id"); 
//  Hapus data pendaftar dari tabel database

header("Location: dashboard.php"); 
//  Kembalikan ke halaman dashboard setelah penghapusan
?>
