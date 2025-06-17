<?php 
include 'config.php'; 
session_start(); 
if (!isset($_SESSION['admin'])) header('Location: login_admin.php'); 
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pendaftar Diterima</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="min-h-screen p-8 bg-gray-100">
  <div class="max-w-6xl mx-auto bg-white p-6 rounded-xl shadow-xl">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-2xl font-bold text-green-700">✅ Pendaftar yang Diterima</h2>
      <a href="dashboard.php" class="text-blue-600 hover:underline">← Kembali ke Dashboard</a>
    </div>

    <div class="overflow-x-auto">
      <table class="min-w-full text-sm text-left border">
        <thead class="bg-green-600 text-white">
          <tr>
            <th class="p-3">No</th>
            <th class="p-3">Nama</th>
            <th class="p-3">NIM</th>
            <th class="p-3">Email</th>
            <th class="p-3">Universitas</th>
          </tr>
        </thead>
        <tbody class="bg-white">
          <?php
          $res = $conn->query("SELECT * FROM diterima");
          $no = 1;
          while ($row = $res->fetch_assoc()) {
            echo "<tr class='border-t'>
              <td class='p-3'>{$no}</td>
              <td class='p-3'>{$row['nama']}</td>
              <td class='p-3'>{$row['nim']}</td>
              <td class='p-3'>{$row['email']}</td>
              <td class='p-3'>{$row['universitas']}</td>
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
