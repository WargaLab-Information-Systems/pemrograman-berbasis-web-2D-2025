<?php
$artikel = [
    1 => [
        "judul" => "Cuma Main 10 Kali, Rafael Struick Dilepas Brisbane Roar", 
        "tanggal" => "2025-05-27", 
        "isi" => "Struick memang hanya dikontrak Brisbane Roar hingga musim 2024/2025 berakhir.", 
        "img" => "RafaelStruick.jpg",  
        "referensi" => "https://www.bola.com/indonesia/read/6035120/cuma-main-10-kali-rafael-struick-dilepas-brisbane-roar"
    ],
    2 => [
        "judul" => "Nonton Streaming Singapore Badminton Open 2025 di Vidio", 
        "tanggal" => "2025-05-26", 
        "isi" => "Penonton yang antusias, venue ikonik seperti Singapore Indoor Stadium, dan persaingan lintas generasi membuat event ini tak pernah kehilangan daya tarik.", 
        "img" => "Badminton.jpg",  
        "referensi" => "https://www.bola.com/ragam/read/6034170/nonton-streaming-singapore-badminton-open-2025-di-vidio"
    ]
];

$motivasi = [
    "Setiap langkah kecil adalah kemajuan.",
    "Apapun hasilnya jangan lupa bersyukur"
];

$id = $_GET['id'] ?? null;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Blog Reflektif</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; }
        img { max-width: 100%; height: auto; margin: 10px 0; }
        blockquote { font-style: italic; border-left: 3px solid #ccc; padding-left: 15px; }
    </style>
</head>
<body>
    <h1>Blog Reflektif</h1>
    <nav>
        <a href="halaman1.php">Kembali ke Profil</a>
        <a href="halaman2.php">Kembali ke Timeline</a>
    </nav>

    <?php if ($id && isset($artikel[$id])): 
        $data = $artikel[$id];
        $quote = $motivasi[array_rand($motivasi)];
    ?>
        <h2><?= htmlspecialchars($data['judul']) ?></h2>
        <p><em><?= htmlspecialchars($data['tanggal']) ?></em></p>
        <p><?= htmlspecialchars($data['isi']) ?></p>
        
        
        <?php if(file_exists($data['img'])): ?>
            <img src="<?= $data['img'] ?>" alt="<?= htmlspecialchars($data['judul']) ?>">
        <?php else: ?>
            <p style="color: red;">Gambar tidak ditemukan: <?= $data['img'] ?></p>
        <?php endif; ?>
        
        <blockquote>"<?= htmlspecialchars($quote) ?>"</blockquote>
        <?php if ($data['referensi']): ?>
            <p>Sumber: <a href="<?= htmlspecialchars($data['referensi']) ?>" target="_blank"><?= htmlspecialchars($data['referensi']) ?></a></p>
        <?php endif; ?>
    <?php else: ?>
        <ul>
            <?php foreach ($artikel as $key => $a): ?>
                <li><a href="?id=<?= $key ?>"><?= htmlspecialchars($a['judul']) ?> (<?= htmlspecialchars($a['tanggal']) ?>)</a></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>