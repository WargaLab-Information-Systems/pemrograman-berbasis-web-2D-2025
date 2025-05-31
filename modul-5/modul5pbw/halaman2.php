<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Timeline Pengalaman Kuliah</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 20px;
            color: #1c2833;
        }

        h1 {
            text-align: center;
            color: #0a1d37;
            margin-bottom: 40px;
        }

        .timeline {
            position: relative;
            margin: 0 auto;
            padding: 20px 0;
            max-width: 600px;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 30px;
            top: 0;
            bottom: 0;
            width: 4px;
            background: #0a1d37;
        }

        .timeline-item {
            margin-left: 60px;
            margin-bottom: 30px;
            position: relative;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -33px;
            top: 5px;
            width: 16px;
            height: 16px;
            background-color: #0a1d37;
            border: 3px solid #ecf0f1;
            border-radius: 50%;
            z-index: 1;
        }

        .timeline-item h3 {
            margin: 0;
            color: #0a1d37;
        }

        .timeline-item p {
            margin: 5px 0 0;
            color: #34495e;
        }

        .buttons {
            text-align: center;
            margin-top: 40px;
        }

        .buttons a {
            text-decoration: none;
            color: white;
            background-color: #0a1d37;
            padding: 12px 22px;
            margin: 0 10px;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        .buttons a:hover {
            background-color: #1f2e4d;
        }
    </style>
</head>
<body>

<h1>Timeline Pengalaman Kuliah</h1>

<div class="timeline">
    <?php
    $pengalaman = [
        ["tahun" => "2024", "judul" => "Masuk Universitas", "deskripsi" => "Mengikuti ospek dan bertemu teman baru dari berbagai daerah."],
        ["tahun" => "2024", "judul" => "Praktikum Pertama", "deskripsi" => "Awalnya takut, tapi ternyata menyenangkan dan penuh tantangan."],
        ["tahun" => "2025", "judul" => "Mengerjakan Proyek PHP", "deskripsi" => "Belajar membuat halaman interaktif menggunakan form dan validasi."],
        ["tahun" => "2025", "judul" => "Membuat Blog", "deskripsi" => "Mulai membagikan pengalaman kuliah melalui blog pribadi."]
    ];

    foreach ($pengalaman as $item) {
        echo "<div class='timeline-item'>";
        echo "<h3>{$item['tahun']} - {$item['judul']}</h3>";
        echo "<p>{$item['deskripsi']}</p>";
        echo "</div>";
    }
    ?>
</div>

<div class="buttons">
    <a href="halaman1.php">Kembali ke Profil</a>
    <a href="halaman3.php">Menuju Blog</a>
</div>

</body>
</html>