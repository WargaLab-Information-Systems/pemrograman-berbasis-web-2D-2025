<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit;
}

$nim = $_SESSION['user']['nim']; // atau bisa pakai email

// Ambil data user dari tabel 'diterima'
$stmt = $conn->prepare("SELECT nama, status FROM diterima WHERE nim = ?");
$stmt->bind_param("s", $nim);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
  $status = 'diproses'; // default jika belum masuk tabel diterima
  $nama = $_SESSION['user']['nama']; // fallback
} else {
  $status = $data['status'];
  $nama = $data['nama'];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Mobile friendly -->
  <title>Pengumuman</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="min-h-screen flex items-center justify-center px-4 bg-gradient-to-br from-pink-100 to-rose-200">
  <!--  Kartu Utama -->
  <div class="bg-white w-full max-w-md p-6 sm:p-10 rounded-2xl shadow-xl text-center space-y-4">
    
    <!--  Sapaan -->
    <h1 class="text-xl sm:text-2xl font-bold text-red-700">
      Halo, <?= htmlspecialchars($nama) ?>!
    </h1>

    <!-- Status Pengumuman -->
    <?php if ($status == 'Terima'): ?>
      <p class="text-green-600 text-base sm:text-lg font-semibold">
        Selamat! Anda dinyatakan <strong>DITERIMA</strong> sebagai penerima beasiswa.
      </p>
    <?php elseif ($status == 'diproses'): ?>
      <p class="text-yellow-600 text-base sm:text-lg font-semibold">
        Data Anda masih dalam proses verifikasi. Silakan cek secara berkala.
      </p>
    <?php elseif ($status == 'Tolak'): ?>
      <p class="text-red-600 text-base sm:text-lg font-semibold">
        Maaf, Anda <strong>TIDAK LULUS</strong>. Tetap semangat dan terus berprestasi!
      </p>
    <?php else: ?>
      <p class="text-gray-600 text-base">Status tidak ditemukan.</p>
    <?php endif; ?>
    
  </div>
</body>
</html>
