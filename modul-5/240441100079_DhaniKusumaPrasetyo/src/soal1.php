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
    <footer class="p-[20px] px-[70px] shadow sticky top-0 bg-[white]">
        <nav class="items-center flex justify-between">
            <div>
                <ul class="w-[50px]"><img src="tambahkan judul.png" alt=""></ul>
            </div>
            <div class="font-bold">
                <ul class="flex gap-[30px] text-[black]">
                <li><a href="soal2.php">Timeline Kuliah</a></li>
                <li><a href="soal3.php">Blog Reflektif</a></li>
                <li><a href="kalkulator.php">Kalkulator</a></li>
                </ul>
            </div>
        </nav>
    </footer>

    <section class="p-8 ">
        <div >  
        <table class="bg-[#1764df] w-300 mx-auto rounded-3xl">
            <tr>
                <td rowspan="5" class=" p align-top w-[450px]">
                    <img src="foto1.png" alt="Foto Profil" class="w-[350px]" />
                </td>
                <td class=" p-4 text-[24px] pl-[70px] font-bold text-[white] font-['poppins'] "> DHANI KUSUMA PRASETYO</td>
            </tr>

            <tr>
                <td class=" p-4 text-[24px] pl-[70px] font-bold text-[white] font-['poppins']">NIM: 240441100079</td>
            </tr>

            <tr>
                <td class=" p-4 text-[24px] pl-[70px] font-bold text-[white] font-['poppins'] ">TTL : LAMONGAN 17 MEI 2006</td>
            </tr>

            <tr>
                <td class=" p-4 text-[24px] pl-[70px] font-bold text-[white] font-['poppins']">dhaniksmpr@gmail.com</td>
            </tr>

            <tr>
                <td class=" p-4 text-[24px] pl-[70px] font-bold text-[white] font-['poppins']">085173100927</td>
            </tr>     
            </table>
        </div>
    </section>
        <section class="p-8">
        <div class="w-300 mx-auto rounded-3xl border-2 border-[#1764df] p-10 px-[100px]">
            <form method="POST">
                <div class="flex justify-between">
                    <div>
                        <label class="font-bold text-[24px] font-['poppins']">BAHASA PEMROGRAMAN YANG DI KUASAI</label><br>
                        <input type="text" name="bahasa[]" placeholder="Java" class="bg-[#1764df] p-4 w-[400px] rounded-2xl mt-[20px] placeholder:text-[white] text-[white]"><br>
                        <input type="text" name="bahasa[]" placeholder="Python" class="bg-[#1764df] p-4 w-[400px] rounded-2xl mt-[20px] placeholder:text-[white] text-[white]"><br>
                        <input type="text" name="bahasa[]" placeholder="JavaScript" class="bg-[#1764df] p-4 w-[400px] rounded-2xl mt-[20px] placeholder:text-[white] text-[white] mb-[50px]"><br>
                    </div>
                    
                    <div>
                        <label for="pengalaman" class="font-bold text-[24px] font-['poppins']">PENGALAMAN PROYEK</label><br>
                        <textarea name="pengalaman" placeholder="jelaskan dengan singkat proyek yang pernah anda kerjakan" class="bg-[white] border border-[#1764df] hover:border-[#1764df] p-4 w-[400px] h-[200px] rounded-2xl mt-[20px] placeholder:text-[#1764df] text-[#1764df] mb-[50px]"></textarea><br>
                    </div>
                </div>

                <div class="flex justify-between">
                   <div>
                    <label class="font-bold text-[24px] font-['poppins']">Software yang Sering Digunakan:</label><br>
                    <div class="flex gap-[10px]">
                        <input type="checkbox" name="software[]" value="VS Code" class="form-checkbox h-5 w-5 rounded-md"> <p class="text-[16px] font-bold">Vs Code</p>                    
                    </div>
                    <div class="flex gap-[10px]">
                        <input type="checkbox" name="software[]" value="NeatBeans" class="form-checkbox h-5 w-5 rounded-md"> <p class="text-[16px] font-bold">NetBeans</p>
                    </div>
                    <div class="flex gap-[10px]">
                        <input type="checkbox" name="software[]" value="GitHub" class="form-checkbox h-5 w-5 rounded-md"> <p class="text-[16px] font-bold">GitHub</p>
                    </div>
                <br>
               </div>
               <div>
                    <label class="font-bold text-[24px] font-['poppins']">Sistem Operasi yang Digunakan:<br></label>
                    <div  class="flex gap-[10px] items-center">
                        <input type="radio" name="os" value="Windows" class="form-radio h-5 w-5 rounded-md"><p>Windows</p><br>
                    </div>
                    <div  class="flex gap-[10px] items-center">
                        <input type="radio" name="os" value="Linux" class="form-radio h-5 w-5 rounded-md"><p>Linux</p><br>
                    </div>
                    <div  class="flex gap-[10px] items-center">
                        <input type="radio" name="os" value="Mac" class="form-radio h-5 w-5 rounded-md"><p>Mac</p><br>
                    </div>
                <br>
               </div>
            </div>
                <label class="font-bold text-[24px] font-['poppins']" >Tingkat Penguasaan PHP:<br>
                    <select name="tingkat_php">
                        <option value="" class="text-[20px] font-semibold">-- Pilih --</option>
                        <option value="Pemula" class="text-[20px] font-semibold">Pemula</option>
                        <option value="Menengah" class="text-[20px] font-semibold">Menengah</option>
                        <option value="Mahir" class="text-[20px] font-semibold">Mahir</option>
                    </select>
                </label><br>
                <button type="submit" class="bg-[#1764df] p-2 font-bold px-[50px] font-[poppins] rounded-2xl text-white text-[20px] mt-[20px] ">Kirim</button>
            </form>
        </div>
    </section>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $bahasa = array_filter($_POST['bahasa'] ?? []);
        $pengalaman = $_POST['pengalaman'] ?? '';
        $software = $_POST['software'] ?? [];
        $os = $_POST['os'] ?? '';
        $tingkat_php = $_POST['tingkat_php'] ?? '';

        if (
            empty($bahasa) || empty($pengalaman) ||
            empty($software) || empty($os) || empty($tingkat_php)
        ) {
            echo "<p class='bg-[red] w-300 text-[24px] font-[poppins] font-bold p-[20px] text-center mx-auto rounded-2xl mb-[30px] text-amber-300'>Semua input wajib diisi!</p>";
        } else {

            echo '<section class="p-8">';
            echo '<div class="w-300 mx-auto bg-[#1764df] rounded-xl p-6 shadow font-[poppins]">';
            echo '<h3 class="text-xl font-bold mb-2 text-[white]">HASIL INPUT:</h3>';
            echo '<table class="w-full mb-4 text-[white]">';
            echo '<tr><th class="text-left w-[200px] text-[white]">Bahasa Pemrograman</th><td>' . implode(", ", $bahasa) . '</td></tr>';
            echo '<tr><th class="text-left text-[white]">Software</th><td>' . implode(", ", $software) . '</td></tr>';
            echo '<tr><th class="text-left text-[white]">Sistem Operasi</th><td>' . $os . '</td></tr>';
            echo '<tr><th class="text-left text-[white]">Tingkat PHP</th><td>' . $tingkat_php . '</td></tr>';
            echo '</table>';
            echo '<p class="text-[white]"><strong class"text-[white]">Pengalaman Proyek:</strong><br>' . nl2br(htmlspecialchars($pengalaman)) . '</p>';


            if (count(array_filter($bahasa ))> 2) {
                echo '<p class="mt-2 text-[white] font-semibold">Anda cukup berpengalaman dalam pemrograman!</p>';
            }

        }
    }
?>
</body>
</html> 

