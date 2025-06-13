<?php include 'config.php'; ?> 
<!-- Menghubungkan ke file konfigurasi database (config.php) -->

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Responsive agar mobile-friendly -->
  <title>Formulir Pendaftaran</title>

  <!-- Menggunakan TailwindCSS via CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    /* Background form dari gambar unsplash + efek blur */
    body {
      background-image: url('https://images.unsplash.com/photo-1571260899304-425eee4c7efc');
      background-size: cover;
      background-position: center;
    }

    .bg-overlay {
      background-color: rgba(255, 255, 255, 0.95); /* semi transparan putih */
      backdrop-filter: blur(4px); /* efek kaca blur */
    }
  </style>
</head>

<!-- Body: layout form center dan padding -->
<body class="min-h-screen flex items-center justify-center px-4">

  <!--  Container Form Pendaftaran -->
  <div class="bg-overlay w-full max-w-xl mx-auto py-10 px-6 sm:px-10 rounded-xl shadow-xl">
    
    <!-- Judul Form -->
    <h2 class="text-2xl sm:text-3xl font-bold text-center text-red-700 mb-6">
      Formulir Pendaftaran Beasiswa
    </h2>
    
    <!--  Formulir dengan method POST + upload file -->
    <form action="proses_daftar.php" method="post" enctype="multipart/form-data" class="space-y-5 text-base">
      
      <!--  Nama Lengkap -->
      <div>
        <label class="block mb-1 font-medium text-gray-700">Nama Lengkap</label>
        <input type="text" name="nama" required 
               class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-red-400">
      </div>

      <!--  NIM -->
      <div>
        <label class="block mb-1 font-medium text-gray-700">NIM</label>
        <input type="text" name="nim" pattern="[0-9]+" required 
         oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
         class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-red-400">
      </div>

      <!--  Email -->
      <div>
        <label class="block mb-1 font-medium text-gray-700">Email</label>
        <input type="email" name="email" required 
               class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-red-400">
      </div>

      <!--  Password -->
      <div>
        <label class="block mb-1 font-medium text-gray-700">Password</label>
        <input type="password" name="password" required 
               class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-red-400">
      </div>

      <!-- Universitas -->
      <div>
        <label class="block mb-1 font-medium text-gray-700">Universitas</label>
        <input type="text" name="universitas" required 
               class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-red-400">
      </div>

      <!-- Upload KTP -->
      <div>
        <label class="block mb-1 font-medium text-gray-700">Upload KTP (PDF/JPG/PNG)</label>
        <input type="file" name="ktp" accept=".pdf,.jpg,.jpeg,.png" required
          class="w-full px-3 py-2 border rounded-lg 
                 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 
                 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 
                 hover:file:bg-red-100">
      </div>

      <!--  Upload Transkrip -->
      <div>
        <label class="block mb-1 font-medium text-gray-700">Upload Transkrip Nilai (PDF/JPG/PNG)</label>
        <input type="file" name="transkrip" accept=".pdf,.jpg,.jpeg,.png" required
          class="w-full px-3 py-2 border rounded-lg 
                 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 
                 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 
                 hover:file:bg-red-100">
      </div>

      <!--  Tombol Kirim -->
      <div class="text-center">
        <button type="submit"
          class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-3 
                 rounded-full transition duration-300 shadow-md">
          Kirim Pendaftaran
        </button>
      </div>
      
    </form>
  </div>

</body>
</html>
