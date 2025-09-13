<!DOCTYPE html>
<html lang="en">
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
<body>
    <header class="p-[20px] px-[70px] shadow sticky top-0 bg-[white] z-10">
        <nav class="items-center flex justify-between">
            <div>
                <ul class="w-[50px]"><img src="tambahkan judul.png" alt=""></ul>
            </div>
            <div class="font-bold">
                <ul class="flex gap-[30px] text-[black]">
                <li><a href="soal1.php">Profil Interaktif  </a></li>
                <li><a href="soal3.php">Blog Reflektif</a></li>
                <li><a href="kalkulator.php">Kalkulator</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container mx-auto px-6 py-10">
        <h1 class="text-3xl font-bold text-center mb-8 text-blue-600">Timeline Pengalaman Kuliah</h1>

        <div class="relative border-blue-500 space-y-8">
            <?php
            
            $pengalaman = [

                [   "no" => "1",
                    "bulan" => "Agustus",
                    "deskripsi" => "Awal masuk kuliah dimana harus mengikuti 3 Ospek."],

                [   "no" => "2",
                    "bulan" => "september",
                    "deskripsi" => "Mulai aktif perkuliahan dan juga awal belajar coding"],

                [   "no" => "3",
                    "bulan" => "oktober",
                    "deskripsi" => "Awal mengikuti praktikum"],

                [   "no" => "4",
                    "bulan" => "november",
                    "deskripsi" => "mengikuti kegiatan X-Camp."],

                [   "no" => "5",
                    "bulan" => "Desember",
                    "deskripsi" => "Akhir dari semester satu yang cukup melelahkan"],

                [   "no" => "6",
                    "bulan" => "januari",
                    "deskripsi" => "Libur semester dan disela selai oleh belajar mata kuliah di semester dua"],

                [   "no" => "7",
                    "bulan" => "februari",
                    "deskripsi" => "Mulai aktif kuliah dan mengikuti kepengurusan Himpunan"],

                [   "no" => "8",
                    "bulan" => "maret",
                    "deskripsi" => "first time Puasa di kota orang dengan suasana berbeda dari sebelumnya"],

                [   "no" => "9",
                    "bulan" => "april",
                    "deskripsi" => "Praktikum PBW dan PBO dimulai"],

                [   "no" => "10",
                    "bulan" => "mei",
                    "deskripsi" => "Mengikuti Kepanitiaan Himpunan"],
            ];

                        
            foreach ($pengalaman as $item) {
                echo "
                <div class='relative ml-[350px] flex gap-5 items-center'>
                    <div class='bg-green-600 w-24 h-24 rounded-lg flex items-center justify-center'>
                        <p class='text-3xl font-semibold font-[\"Poppins\"] text-white'>{$item['no']}</p>
                    </div>
                    <div class='bg-blue-600 shadow-md rounded-lg p-4 w-full max-w-2xl  h-24'>
                        <div class='text-white font-semibold capitalize'>{$item['bulan']}</div>
                        <div class='text-white mt-1'>{$item['deskripsi']}</div>
                    </div>
                </div>
                ";
            }

            ?>
        </div>
    </div>
</body>
</html> 
