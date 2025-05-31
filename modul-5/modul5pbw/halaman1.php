<?php session_start(); ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Interaktif Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-relaxed text-gray-800">

<!-- Sidebar Abu-Abu -->
<div class="fixed top-0 left-0 h-full bg-gray-600 text-white px-6 py-8 rounded-r-2xl shadow-lg w-48 space-y-4">
    <a href="halaman1.php" class="block hover:underline font-bold">Profil</a>
    <a href="halaman2.php" class="block hover:underline font-bold">Timeline</a>
    <a href="halaman3.php" class="block hover:underline font-bold">Blog</a>
    <a href="halaman4.php" class="block hover:underline font-bold">Kalkulator</a>
</div>

<!-- Konten Utama -->
<div class="ml-52 max-w-3xl mx-auto p-6 bg-white shadow-md mt-10 rounded-lg mb-10">
    <h1 class="text-3xl font-bold mb-6 text-center text-blue-700">Profil Interaktif Mahasiswa</h1>

    <!-- Tabel Data Diri -->
    <table class="w-full table-auto border border-gray-300 mb-8">
        <tr class="bg-gray-100"><td class="p-2 font-semibold">Nama</td><td class="p-2">Frasinka Josa Anassya</td></tr>
        <tr><td class="p-2 font-semibold">NIM</td><td class="p-2">240441100028</td></tr>
        <tr class="bg-gray-100"><td class="p-2 font-semibold">Tempat, Tanggal Lahir</td><td class="p-2">Nganjuk, 31 Januari 2006</td></tr>
        <tr><td class="p-2 font-semibold">Email</td><td class="p-2">Josaanassya@gmail.com</td></tr>
        <tr class="bg-gray-100"><td class="p-2 font-semibold">Nomor HP</td><td class="p-2">0858166818132</td></tr>
    </table>

    <!-- Formulir Input -->
    <form method="post" class="space-y-6">
        <div>
            <label class="font-semibold mb-1">Nama Lengkap:</label>
            <input type="text" name="nama_panjang" class="w-full border rounded px-3 py-2 mb-2">
        </div>

        <div>
            <label class="font-semibold mb-1">Bahasa Pemrograman yang Dikuasai:</label>
            <input type="text" name="bahasa[]" class="w-full border rounded px-3 py-2 mb-2">
            <input type="text" name="bahasa[]" class="w-full border rounded px-3 py-2 mb-2">
            <input type="text" name="bahasa[]" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="font-semibold mb-1">Pengalaman Membuat Proyek:</label>
            <textarea name="pengalaman" rows="4" class="w-full border rounded px-3 py-2"></textarea>
        </div>

        <div>
            <label class="font-semibold mb-1">Software yang Sering Digunakan:</label><br>
            <label class="mr-4"><input type="checkbox" name="software[]" value="VS Code" class="mr-1"> VS Code</label>
            <label class="mr-4"><input type="checkbox" name="software[]" value="XAMPP" class="mr-1"> XAMPP</label>
            <label><input type="checkbox" name="software[]" value="Git" class="mr-1"> Git</label>
        </div>

        <div>
            <label class="font-semibold mb-1">Sistem Operasi:</label><br>
            <label class="mr-4"><input type="radio" name="os" value="Windows" class="mr-1"> Windows</label>
            <label class="mr-4"><input type="radio" name="os" value="Linux" class="mr-1"> Linux</label>
            <label><input type="radio" name="os" value="Mac" class="mr-1"> Mac</label>
        </div>

        <div>
            <label class="font-semibold mb-1">Tingkat Penguasaan PHP:</label>
            <select name="tingkat" class="w-full border rounded px-3 py-2">
                <option value="">--Pilih--</option>
                <option value="Pemula">Pemula</option>
                <option value="Menengah">Menengah</option>
                <option value="Mahir">Mahir</option>
            </select>
        </div>

        <div>
            <input type="submit" name="submit" value="Kirim" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 cursor-pointer">
        </div>
    </form>

    <?php
    function tampilkanInput($data, $index) {
        echo "<div class='mt-8 border-t border-gray-300 pt-4'>";
        echo "<h3 class='text-xl font-bold mb-2'>Mahasiswa ke-" . ($index + 1) . "</h3>";
        echo "<table class='w-full table-auto border border-gray-300 mb-2'>";
        echo "<tr class='bg-gray-100'><td class='p-2 font-semibold'>Nama pengguna</td><td class='p-2'>{$data['nama_panjang']}</td></tr>";
        echo "<tr><td class='p-2 font-semibold'>Bahasa yang dikuasai</td><td class='p-2'>" . implode(", ", $data['bahasa']) . "</td></tr>";
        echo "<tr class='bg-gray-100'><td class='p-2 font-semibold'>Pengalaman</td><td class='p-2'>" . nl2br(htmlspecialchars($data['pengalaman'])) . "</td></tr>";
        echo "<tr><td class='p-2 font-semibold'>Software</td><td class='p-2'>" . implode(", ", $data['software']) . "</td></tr>";
        echo "<tr class='bg-gray-100'><td class='p-2 font-semibold'>Operasi Sistem</td><td class='p-2'>{$data['os']}</td></tr>";
        echo "<tr><td class='p-2 font-semibold'>Tingkat penguasaan PHP</td><td class='p-2'>{$data['tingkat']}</td></tr>";
        echo "</table>";

        if (count($data['bahasa']) > 2) {
            echo "<p class='text-green-600 font-semibold'>Anda cukup berpengalaman dalam pemrograman!</p>";
        }
        echo "</div>";
    }

    if (isset($_POST['submit'])) {
        $nama_panjang = $_POST['nama_panjang'] ?? '';
        $bahasa = array_filter($_POST['bahasa'] ?? []);
        $pengalaman = $_POST['pengalaman'] ?? '';
        $software = $_POST['software'] ?? [];
        $os = $_POST['os'] ?? '';
        $tingkat = $_POST['tingkat'] ?? '';

        if ($nama_panjang && $bahasa && $pengalaman && $software && $os && $tingkat) {
            $data = compact('nama_panjang', 'bahasa', 'pengalaman', 'software', 'os', 'tingkat');
            if (!isset($_SESSION['hasil_input'])) {
                $_SESSION['hasil_input'] = [];
            }
            $_SESSION['hasil_input'][] = $data;
        } else {
            echo "<p class='text-red-600 mt-4'>Semua input wajib diisi!</p>";
        }
    }

    if (!empty($_SESSION['hasil_input'])) {
        foreach ($_SESSION['hasil_input'] as $index => $entry) {
            tampilkanInput($entry, $index);
        }
    }
    ?>
</div>

</body>
</html>
