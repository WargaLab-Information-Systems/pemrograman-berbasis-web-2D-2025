<?php
$pengalaman = [
    ["tahun" => "2024", "kegiatan" => "Menjadi mahasiswa baru"],
    ["tahun" => "2025", "kegiatan" => "Membuat projek di praktikum"],
    ["tahun" => "2026", "kegiatan" => "Magang di semester 6"],
    ["tahun" => "2027", "kegiatan" => "Mengerjakan skripsi dan sidang akhir"]
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Timeline Pengalaman Kuliah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Timeline Pengalaman Kuliah</h1>
    <nav>
        <a href="halaman1.php">Kembali ke Profil</a>
        <a href="halaman3.php">Menuju Blog</a>
    </nav>

    <div class="timeline">
        <?php foreach ($pengalaman as $item): ?>
            <div class="timeline-event">
                <strong><?= $item['tahun'] ?>:</strong> <?= $item['kegiatan'] ?>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>