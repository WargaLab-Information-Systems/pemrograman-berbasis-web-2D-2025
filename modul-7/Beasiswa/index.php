<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beasiswa Nusantara Cemerlang</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-pink-50 via-rose-100 to-pink-100 text-gray-800 min-h-screen">

<!-- ======================= NAVBAR ======================= -->
<header class="bg-gradient-to-r from-red-700 via-pink-600 to-red-500 shadow-lg sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between text-white">

    <!-- Logo & Judul -->
    <div class="flex items-center space-x-4">
      <div class="bg-white p-1 rounded-full shadow-md">
        <img src="logo.png" alt="Logo" class="h-12 w-12 rounded-full object-contain">
      </div>
      <span class="text-2xl font-extrabold tracking-wider drop-shadow-md">Beasiswa Nusantara</span>
    </div>

    <!-- Menu Desktop -->
    <nav id="nav-menu" class="hidden md:flex flex-col md:flex-row md:space-x-6 space-y-2 md:space-y-0 mt-4 md:mt-0 text-sm font-medium">
      <a href="#gelombang" class="group relative hover:text-yellow-200">Gelombang</a>
      <a href="#syarat" class="group relative hover:text-yellow-200">Persyaratan</a>
      <a href="#about" class="group relative hover:text-yellow-200">Tentang</a>
      <a href="#contact" class="group relative hover:text-yellow-200">Kontak</a>
      <a href="login.php" class="bg-white text-red-600 font-semibold px-4 py-2 rounded-full shadow hover:bg-yellow-100 hover:text-red-800 transition">Login</a>
    </nav>

    <!-- Tombol Hamburger (Mobile) -->
    <button id="nav-toggle" class="md:hidden text-white focus:outline-none">
      <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>
  </div>
</header>

<!-- ======================= HERO ======================= -->
<section class="py-16 relative z-10 bg-gray-50">
  <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center gap-10 bg-gradient-to-br from-red-600 via-pink-500 to-red-400 text-white rounded-xl shadow-xl overflow-hidden relative">

    <!-- Text Hero -->
    <div class="md:w-1/2 py-12 z-20">
      <h1 class="text-4xl font-bold mb-6 drop-shadow-lg">
        BEASISWA NUSANTARA CEMERLANG
      </h1>
      <p class="text-lg mb-6 leading-relaxed drop-shadow-sm">
        Program ini memberikan bantuan dana pendidikan bagi mahasiswa berprestasi dari seluruh Indonesia. Kami mencari calon penerima yang memiliki semangat belajar tinggi, aktif dalam organisasi, dan menunjukkan nilai akademik yang baik.
      </p>
      <a href="daftar.php" class="inline-block bg-white text-red-700 font-semibold px-6 py-3 rounded-full shadow-md hover:scale-105 hover:bg-yellow-100 hover:text-red-800 transition">
        Daftar Sekarang
      </a>
    </div>

    <!-- Gambar Hero ala Luxe -->
    <div class="md:w-1/2 relative flex justify-center items-center">
      <!-- Blob Background -->
      <div class="absolute w-80 h-80 md:w-[380px] md:h-[380px] z-0">
        <svg viewBox="0 0 200 200" class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
          <path fill="#f9e0f9" d="M29.9,-52.4C38.6,-46.7,45.5,-38.5,50.3,-29.3C55.1,-20.2,57.8,-10.1,63.4,3.2C69,16.6,77.6,33.2,72.1,41.1C66.6,49,47,48.2,32.6,53.9C18.2,59.6,9.1,71.8,-0.2,72.2C-9.6,72.6,-19.1,61.1,-33.1,55.2C-47.1,49.3,-65.5,48.9,-75.2,40.6C-85,32.3,-86,16.1,-83.5,1.4C-81,-13.3,-75,-26.5,-68.5,-40.5C-62,-54.4,-55.2,-69,-43.7,-73.1C-32.2,-77.2,-16.1,-70.8,-2.8,-66C10.6,-61.2,21.1,-58,29.9,-52.4Z" transform="translate(100 100)" />
        </svg>
      </div>

      <!-- Foto di atas blob -->
      <div class="relative z-10 w-60 md:w-72 drop-shadow-2xl">
        <img src="feti-removebg-preview.png" alt="Foto Mahasiswa" class="object-contain w-full h-auto">
      </div>
    </div>
  </div>
</section>


<!-- Gelombang Pendaftaran -->
<section id="gelombang" class="py-16 bg-gradient-to-b from-red-50 via-pink-100 to-rose-100">
  <div class="max-w-6xl mx-auto px-6 bg-white rounded-xl shadow-lg">
    <h2 class="text-3xl font-bold text-center text-red-700 mb-10 pt-10">Jadwal Pendaftaran Beasiswa</h2>
    <div class="grid md:grid-cols-2 gap-10 pb-10 px-4">
      <div class="bg-gradient-to-r from-red-100 via-pink-100 to-rose-100 p-6 rounded-xl shadow-md hover:shadow-xl transition duration-300 border border-red-200">
        <h3 class="text-xl font-semibold text-red-700 mb-2 flex items-center gap-2">
          <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3M3 11h18M5 19h14M5 15h14" />
          </svg>
          Gelombang 1
        </h3>
        <p class="text-gray-800"> 1 Juni 2025 - 30 Juni 2025</p>
        <p class="text-gray-700 mt-2">Terbuka untuk mahasiswa semester 2–6 dengan IPK minimal 3.25.</p>
      </div>
      <div class="bg-gradient-to-r from-red-100 via-pink-100 to-rose-100 p-6 rounded-xl shadow-md hover:shadow-xl transition duration-300 border border-red-200">
        <h3 class="text-xl font-semibold text-red-700 mb-2 flex items-center gap-2">
          <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3M3 11h18M5 19h14M5 15h14" />
          </svg>
          Gelombang 2
        </h3>
        <p class="text-gray-800"> 15 Juli 2025 - 15 Agustus 2025</p>
        <p class="text-gray-700 mt-2">Untuk mahasiswa baru & aktif yang belum mendaftar di gelombang 1.</p>
      </div>
    </div>
  </div>
</section>

<!-- Persyaratan Beasiswa -->
<section id="syarat" class="py-16 bg-gradient-to-br from-rose-100 via-pink-200 to-red-100">
  <div class="max-w-5xl mx-auto px-6 py-12 bg-white rounded-3xl shadow-xl border border-red-100">
    <h2 class="text-3xl font-bold text-center text-red-700 mb-12">Persyaratan Penerimaan Beasiswa</h2>
    
    <div class="grid md:grid-cols-2 gap-6">
      <div class="flex items-start gap-4 p-5 bg-gradient-to-r from-rose-50 to-red-50 rounded-xl shadow hover:shadow-md transition border border-rose-200">
        <div class="text-2xl text-red-600"></div>
        <p class="text-gray-800 font-medium">Mahasiswa aktif minimal semester 2 dari perguruan tinggi di Indonesia.</p>
      </div>
      <div class="flex items-start gap-4 p-5 bg-gradient-to-r from-pink-50 to-rose-100 rounded-xl shadow hover:shadow-md transition border border-pink-200">
        <div class="text-2xl text-pink-600"></div>
        <p class="text-gray-800 font-medium">IPK minimal 3.25 (skala 4.00) dibuktikan dengan transkrip nilai.</p>
      </div>
      <div class="flex items-start gap-4 p-5 bg-gradient-to-r from-rose-50 to-red-50 rounded-xl shadow hover:shadow-md transition border border-rose-200">
        <div class="text-2xl text-rose-600"></div>
        <p class="text-gray-800 font-medium">Scan KTP dan Kartu Tanda Mahasiswa (KTM).</p>
      </div>
      <div class="flex items-start gap-4 p-5 bg-gradient-to-r from-pink-50 to-red-100 rounded-xl shadow hover:shadow-md transition border border-pink-200">
        <div class="text-2xl text-pink-600"></div>
        <p class="text-gray-800 font-medium">Surat rekomendasi dari dosen atau pihak kampus (opsional).</p>
      </div>
      <div class="flex items-start gap-4 p-5 bg-gradient-to-r from-rose-50 to-red-50 rounded-xl shadow hover:shadow-md transition border border-rose-200">
        <div class="text-2xl text-red-600"></div>
        <p class="text-gray-800 font-medium">Aktif dalam organisasi, kepanitiaan, atau kegiatan sosial menjadi nilai tambah.</p>
      </div>
      <div class="flex items-start gap-4 p-5 bg-gradient-to-r from-pink-50 to-rose-100 rounded-xl shadow hover:shadow-md transition border border-pink-200">
        <div class="text-2xl text-rose-600"></div>
        <p class="text-gray-800 font-medium">Belum pernah menerima beasiswa lain pada periode yang sama.</p>
      </div>
    </div>
  </div>
</section>

<!-- ======================= FOOTER ======================= -->
<footer class="bg-gradient-to-r from-red-600 via-pink-500 to-red-400 text-white mt-20" id="about">
  <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-2 gap-10">
    <!-- Tentang -->
    <div>
      <h2 class="text-2xl font-semibold mb-3">Tentang Kami</h2>
      <p class="text-sm leading-relaxed">
        Beasiswa Nusantara Cemerlang adalah program pendanaan pendidikan bagi mahasiswa Indonesia yang berprestasi.
      </p>
    </div>
    <!-- Kontak -->
    <div id="contact">
      <h2 class="text-2xl font-semibold mb-3">Kontak</h2>
      <ul class="text-sm space-y-1">
        <li><strong>Email:</strong> info@beasiswanusantara.ac.id</li>
        <li><strong>Telepon:</strong> +62 812-3456-7890</li>
        <li><strong>Alamat:</strong> Jl. Pendidikan No. 123, Jakarta</li>
      </ul>
    </div>
  </div>
  <div class="border-t border-white/30 text-center text-sm py-4 bg-white/10">
    &copy; 2025 <span class="font-semibold">Beasiswa Nusantara Cemerlang</span>. All rights reserved.
  </div>
</footer>

<!-- ======================= SCRIPT ======================= -->
<script>
  const toggleBtn = document.getElementById('nav-toggle');
  const navMenu = document.getElementById('nav-menu');
  toggleBtn.addEventListener('click', () => {
    navMenu.classList.toggle('hidden');
  });
</script>

</body>
</html>
