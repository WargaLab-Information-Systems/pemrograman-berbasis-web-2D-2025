<?php
$artikel = [
    1 => [
        'judul' => 'Refleksi atas Pengalaman dalam Kurikulum Merdeka',
        'tanggal' => '2025-05-10',
        'paragraf' => 'Setiap orang mempunyai pengalaman hidup khas, kadang mirip, tetapi bisa juga berbeda sama sekali. Pengalaman --berupa aktivitas fisik dan pikiran merupakan peristiwa yang terjadi dalam realitas kehidupan. Pengalaman dalam realitas terkait langsung dengan keberadaan manusia dalam interaksi sosial keseharian.',
        'gambar' => 'artikel.jpeg',
        'sumber' => 'https://news.detik.com/kolom/d-6092684/refleksi-atas-pengalaman-dalam-kurikulum-merdeka'
    ],
    2 => [
        'judul' => 'Pembelajaran bukanlah mengisi wadah, melainkan menyalakan api',
        'tanggal' => '2025-05-15',
        'paragraf' => 'Fokus pada perubahan perspektif terhadap belajar, dari kewajiban menjadi petualangan yang menarik. Menekankan kepuasan dalam memahami konsep sulit dan menikmati proses.',
        'gambar' => 'artikel2.png',
        'sumber' => 'https://www.zenius.net/blog/proses-belajar-yang-efektif/'
    ],
    3 => [
        'judul' => 'Ilmu itu bagaikan cahaya yang menerangi kegelapan',
        'tanggal' => '2025-05-18',
        'paragraf' => 'Fokus pada bagaimana setiap tahapan dalam belajar, meskipun sulit, memiliki nilai dan memberikan pelajaran berharga. Menekankan pentingnya menghargai proses daripada hanya terpaku pada hasil akhir.',
        'gambar' => 'gambar3.jpg',
        'sumber' => 'https://disdikpora.bulelengkab.go.id/informasi/detail/artikel/mengenali-tahapan-belajar-64'
    ]
];

$kutipan = [
    "“Hidup adalah tentang membuat dampak, bukan membuat uang.” - Kevin Kruse",
    "“Belajar dari kemarin, hidup untuk hari ini, harap untuk besok.” - Albert Einstein",
    "“Kegagalan hanyalah kesempatan untuk memulai lagi dengan lebih cerdas.” - Henry Ford",
    "“Kita adalah apa yang kita lakukan berulang kali. Maka keunggulan bukanlah tindakan, melainkan kebiasaan.” - Aristotle"
];

$id = $_GET['id'] ?? null; //mengambil

if (!$id || !isset($artikel[$id])) {
    echo "Artikel tidak ditemukan.";
    exit;
}

$data = $artikel[$id];
$randomKutipan = $kutipan[rand(0, count($kutipan) - 1)];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $data['judul'] ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-2"><?= $data['judul'] ?></h1>
        <p class="text-gray-500 mb-4"><?= $data['tanggal'] ?></p>
        <img src="images/<?= $data['gambar'] ?>" class="w-full h-64 object-cover rounded mb-4">
        <p class="mb-4 text-lg"><?= $data['paragraf'] ?></p>
        <blockquote class="italic text-blue-600 border-l-4 border-blue-500 pl-4 mb-4">
            <?= $randomKutipan ?>
        </blockquote>
        <?php if ($data['sumber']): ?>
            <a href="<?= $data['sumber'] ?>" target="_blank" class="text-blue-700 underline">Baca sumber referensi</a>
        <?php endif; ?>
        <div class="mt-6">
            <a href="soal3.php" class="text-sm text-gray-500 hover:underline">← Kembali ke daftar artikel</a>
        </div>
    </div>
</body>
</html>