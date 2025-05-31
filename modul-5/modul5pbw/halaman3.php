<?php
// Data artikel
$artikel = [
    1 => [
        "judul" => "Belajar PHP di Semester 2",
        "tanggal" => "10 Mei 2025",
        "refleksi" => "Belajar PHP mengajarkan saya pentingnya logika,dan menata statement dengan baik",
        "gambar" => "https://ids.ac.id/wp-content/uploads/2022/02/pemrograman-php.jpeg",
        "kutipan" => "",
        "referensi" => "https://www.php.net"
    ],
    2 => [
        "judul" => "Pengalaman Praktikum Web",
        "tanggal" => "1 Mei 2025",
        "refleksi" => "Praktikum web membuat saya lebih memahami interaksi frontend dan backend.",
        "gambar" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQAJc0xjtZ6tA-UWlSdn6WxCGfZj8qeNYpjTg&s",
        "kutipan" => "",
        "referensi" => ""
    ],
    3 => [
        "judul" => "Refleksi Awal Kuliah",
        "tanggal" => "20 April 2025",
        "refleksi" => "Awal masuk kuliah membawa banyak pengalaman baru dan pertemanan lintas daerah.",
        "gambar" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQLTkKclkO083fzVSNj1jmRB6yOufSpst2NyA&s",
        "kutipan" => "",
        "referensi" => "https://www.dikti.go.id"
    ]
];

// Array kutipan motivasi
$kutipan = [
"Langkah kecil yang terus berjalan lebih berarti daripada lari cepat yang berhenti di tengah jalan.",
"Kesalahan bukan akhir, tapi batu loncatan menuju pemahaman yang lebih dalam.",
"Proses mungkin lambat, tapi setiap hari kamu tumbuh tanpa sadar.",
"Keberhasilan datang dari kebiasaan kecil yang dilakukan dengan setia setiap hari.",
];

// Ambil kutipan secara acak
$randomQuote = $kutipan[rand(0, count($kutipan) - 1)];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Blog Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 20px;
            color: #2c3e50;
        }

        h1 {
            text-align: center;
            color: #0d47a1;
        }

        .artikel-list, .artikel-detail {
            max-width: 800px;
            margin: 30px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .artikel-list ul {
            list-style: none;
            padding: 0;
        }

        .artikel-list li {
            margin: 10px 0;
            padding: 10px;
            background: #e3f2fd;
            border-left: 5px solid #1976d2;
        }

        .artikel-list a {
            text-decoration: none;
            color: #0d47a1;
            font-weight: bold;
        }

        .artikel-detail img {
            max-width: 100%;
            height: auto;
            border-radius: 6px;
            margin: 20px 0;
        }

        .kutipan {
            font-style: italic;
            color: #555;
            margin-top: 20px;
        }

        .kembali {
            display: inline-block;
            margin-top: 30px;
            padding: 10px 20px;
            background-color: #0d47a1;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        .kembali:hover {
            background-color: #1565c0;
        }
    </style>
</head>
<body>

<h1>Blog Refleksi Mahasiswa</h1>

<?php
if (isset($_GET['id']) && isset($artikel[$_GET['id']])) {
    $id = $_GET['id'];
    $data = $artikel[$id];
    echo "<div class='artikel-detail'>";
    echo "<h2>{$data['judul']}</h2>";
    echo "<small><em>Tanggal: {$data['tanggal']}</em></small>";
    echo "<p>{$data['refleksi']}</p>";
    echo "<img src='{$data['gambar']}' alt='Gambar {$data['judul']}'>";
    echo "<p class='kutipan'>\"$randomQuote\"</p>";

    if (!empty($data['referensi'])) {
        echo "<p>Referensi: <a href='{$data['referensi']}' target='_blank'>{$data['referensi']}</a></p>";
    }

    // Perbaiki link kembali ke daftar artikel
    echo "<a href='halaman2.php' class='kembali'>← Kembali ke Daftar Artikel</a>";
    echo "</div>";
} else {
    // Tampilan daftar artikel jika ID tidak ditemukan
    echo "<div class='artikel-list'>";
    echo "<h3>Daftar Artikel</h3><ul>";
    foreach ($artikel as $id => $data) {
        echo "<li><a href='?id=$id'>{$data['judul']}</a> <br><small><em>{$data['tanggal']}</em></small></li>";
    }
    echo "</ul></div>";
}
?>

</body>
</html>