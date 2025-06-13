<?php 
//  Autentikasi Admin
include 'config.php'; 
session_start(); 
if (!isset($_SESSION['admin'])) header('Location: login_admin.php'); 
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Penting untuk mobile -->
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    /* Background dan efek kaca */
    body {
      background-image:
        linear-gradient(135deg, rgba(255, 204, 229, 0.7), rgba(204, 229, 255, 0.7), rgba(204, 255, 229, 0.7)),
        url('img/kampus.jpg');
      background-size: cover;
      background-position: center;
    }

    .bg-glass {
      backdrop-filter: blur(12px);
      background: rgba(255, 255, 255, 0.85);
      border-radius: 20px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
      padding: 2rem;
    }

    /* Tombol custom pakai Tailwind */
    .btn {
      @apply bg-gradient-to-r from-pink-500 to-red-500 px-4 py-2 rounded text-white font-semibold hover:from-pink-600 hover:to-red-600 transition;
    }
  </style>
</head>
<body class="min-h-screen p-4 md:p-8 flex flex-col items-center text-gray-800">

  <!--  Container utama dashboard -->
  <div class="bg-glass w-full max-w-6xl">
    
    <!--  Header dashboard -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
      <h2 class="text-2xl sm:text-3xl font-bold text-pink-600">Dashboard Pendaftar Beasiswa</h2>
      
      <!-- Tombol navigasi -->
      <div class="flex gap-2 flex-wrap">
        <a href="pendaftar_diterima.php" class="btn">Diterima</a>
        <a href="logout.php" class="btn bg-red-500 hover:bg-red-600">Logout</a>
      </div>
    </div>

    <!-- Tabel daftar pendaftar -->
    <div class="overflow-x-auto rounded-xl shadow">
      <table class="min-w-full text-sm text-gray-800 bg-white rounded-xl overflow-hidden">
        <thead class="bg-gradient-to-r from-pink-500 to-blue-500 text-white">
          <tr>
            <th class="p-3 text-left">No</th>
            <th class="p-3 text-left">Nama</th>
            <th class="p-3 text-left">NIM</th>
            <th class="p-3 text-left">Email</th>
            <th class="p-3 text-left">Universitas</th>
            <th class="p-3 text-left">KTP</th>
            <th class="p-3 text-left">Transkrip</th>
            <th class="p-3 text-left">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Ambil semua data dari tabel pendaftar
          $res = $conn->query("SELECT * FROM pendaftar");
          $no = 1;
          while ($row = $res->fetch_assoc()) {
            echo "<tr class='border-t hover:bg-pink-50 transition'>
              <td class='p-3'>{$no}</td>
              <td class='p-3'>{$row['nama']}</td>
              <td class='p-3'>{$row['nim']}</td>
              <td class='p-3'>{$row['email']}</td>
              <td class='p-3'>{$row['universitas']}</td>
              <td class='p-3'><a href='{$row['ktp_path']}' target='_blank' class='text-blue-600 underline'>Lihat</a></td>
              <td class='p-3'><a href='{$row['transkrip_path']}' target='_blank' class='text-blue-600 underline'>Lihat</a></td>
              <td class='p-3 space-y-1 text-sm'>
                <a href='edit_pendaftar.php?id={$row['id']}' class='text-yellow-600 hover:underline block'>Edit</a>
                <a href='hapus_pendaftar.php?id={$row['id']}' onclick='return confirm(\"Yakin hapus?\")' class='text-red-600 hover:underline block'>Hapus</a>
                <a href='terima_pendaftar.php?id={$row['id']}' onclick='return confirm(\"Terima pendaftar ini?\")' class='text-green-600 hover:underline block'>Terima</a>
                <a href='tolak_pendaftar.php?id={$row['id']}' onclick='return confirm(\"Tolak pendaftar ini?\")' class='text-gray-600 hover:underline block'>Tolak</a>
              </td>
            </tr>";
            $no++;
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>
