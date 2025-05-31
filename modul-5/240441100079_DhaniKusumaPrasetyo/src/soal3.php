<?php
$artikel = [
    ['id' => 1, 'judul' => 'Refleksi atas Pengalaman dalam Kurikulum Merdeka', 'tanggal' => '2025-05-10'],
    ['id' => 2, 'judul' => 'Pembelajaran bukanlah mengisi wadah, melainkan menyalakan api', 'tanggal' => '2025-05-15'],
    ['id' => 3, 'judul' => 'Ilmu itu bagaikan cahaya yang menerangi kegelapan', 'tanggal' => '2025-05-18']
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">  
    <title>Profil Interaktif Mahasiswa</title>
</head>
    <header class="p-[20px] px-[70px] shadow sticky top-0 bg-[white] z-10">
        <nav class="items-center flex justify-between">
            <div>
                <ul class="w-[50px]"><img src="tambahkan judul.png" alt=""></ul>
            </div>
            <div class="font-bold">
                <ul class="flex gap-[30px] text-[black]">
                <li><a href="soal1.php">Profil Interaktif  </a></li>
                <li><a href="soal2.php">Pengalaman Kuliah</a></li>
                <li><a href="kalkulator.php">Kalkulator</a></li>
                </ul>
            </div>
        </nav>
    </header>
    
    <div class="bg-[#1764df] mt-[60px] w-300 mx-auto p-5 rounded-lg">
        <p class="text-[white] font-bold text-[32px]">DAFTAR ARTIKEL </p>
        <?php foreach ($artikel as $a): ?>
            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-md transition duration-300 mt-[50px]">
                <h2 class="text-xl font-semibold text-blue-700 mb-2">
                    <a href="artikel.php?id=<?= $a['id'] ?>" class="hover:underline">
                        <?= $a['judul'] ?>
                    </a>
                </h2>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>