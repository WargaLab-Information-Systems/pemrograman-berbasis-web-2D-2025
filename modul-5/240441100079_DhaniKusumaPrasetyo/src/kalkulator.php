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
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md font-sans">
        <h2 class="text-2xl font-bold mb-6 text-center text-blue-700">Kalkulator Sederhana</h2>

        <form method="post" class="space-y-4">
            <input type="number" name="angka1" placeholder="Angka pertama" required
                   class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">

            <input type="number" name="angka2" placeholder="Angka kedua" required
                   class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">

            <select name="operator" required
                    class="w-full p-3 border rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="">Pilih Operasi</option>
                <option value="tambah">Tambah (+)</option>
                <option value="kurang">Kurang (-)</option>
                <option value="kali">Kali (x)</option>
                <option value="bagi">Bagi (÷)</option>
            </select>

            <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition">
                Hitung
            </button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $angka1 = $_POST['angka1'];
            $angka2 = $_POST['angka2'];
            $operator = $_POST['operator'];
            $hasil = '';

            switch ($operator) {
                case 'tambah':
                    $hasil = $angka1 + $angka2;
                    break;
                case 'kurang':
                    $hasil = $angka1 - $angka2;
                    break;
                case 'kali':
                    $hasil = $angka1 * $angka2;
                    break;
                case 'bagi':
                    if ($angka2 != 0) {
                        $hasil = $angka1 / $angka2;
                    } else {
                        $hasil = "Tidak bisa dibagi 0";
                    }
                    break;
                default:
                    $hasil = "Operasi tidak valid";
            }

            echo "<div class='mt-6 text-center text-green-600 text-xl font-semibold'>Hasil: $hasil</div>";
        }
        ?>
    </div>

</body>
</html>
