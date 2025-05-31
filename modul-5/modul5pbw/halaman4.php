<?php session_start(); ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana - Halaman Keempat</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 font-sans leading-relaxed text-gray-800">

    <!-- Menu Navigasi -->
    <!-- Menu Navigasi -->
    <div class="fixed top-0 left-0 h-full bg-gray-600 text-white px-6 py-8 rounded-r-2xl space-y-4 shadow-lg w-44">
    <a href="halaman1.php" class="block hover:underline font-bold">Profil</a>
    <a href="halaman2.php" class="block hover:underline font-bold">Menuju Timeline</a>
    <a href="halaman3.php" class="block hover:underline font-bold">Menuju Blog</a>
    <a href="halaman4.php" class="block hover:underline font-bold">Kalkulator</a>
    </div>


    <!-- Kalkulator -->
    <div class="max-w-3xl mx-auto p-6 bg-white shadow-md mt-24 rounded-lg mb-10">
        <h1 class="text-3xl font-bold mb-6 text-center text-blue-700">Kalkulator Sederhana</h1>

        <!-- Formulir Kalkulator -->
        <form id="calculator-form" class="space-y-6">
            <div>
                <label class="font-semibold mb-1">Angka Pertama:</label>
                <input type="number" id="num1" class="w-full border rounded px-3 py-2 mb-2" required>
            </div>

            <div>
                <label class="font-semibold mb-1">Angka Kedua:</label>
                <input type="number" id="num2" class="w-full border rounded px-3 py-2 mb-2" required>
            </div>

            <div>
                <label class="font-semibold mb-1">Operasi:</label>
                <select id="operation" class="w-full border rounded px-3 py-2 mb-2">
                    <option value="add">Penjumlahan (+)</option>
                    <option value="subtract">Pengurangan (-)</option>
                    <option value="multiply">Perkalian (×)</option>
                    <option value="divide">Pembagian (÷)</option>
                </select>
            </div>

            <div>
                <button type="button" onclick="calculate()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 cursor-pointer">Hitung</button>
            </div>
        </form>

        <!-- Hasil Kalkulasi -->
        <div id="result" class="mt-6 text-center text-xl font-semibold"></div>
    </div>

    <script>
        function calculate() {
            // Ambil nilai input
            const num1 = parseFloat(document.getElementById('num1').value);
            const num2 = parseFloat(document.getElementById('num2').value);
            const operation = document.getElementById('operation').value;

            let result;

            // Periksa operasi yang dipilih dan hitung hasilnya
            if (isNaN(num1) || isNaN(num2)) {
                alert("Harap masukkan angka yang valid!");
                return;
            }

            switch (operation) {
                case 'add':
                    result = num1 + num2;
                    break;
                case 'subtract':
                    result = num1 - num2;
                    break;
                case 'multiply':
                    result = num1 * num2;
                    break;
                case 'divide':
                    if (num2 === 0) {
                        alert("Pembagian dengan nol tidak dapat dilakukan!");
                        return;
                    }
                    result = num1 / num2;
                    break;
                default:
                    alert("Operasi tidak valid!");
                    return;
            }

            // Tampilkan hasil
            document.getElementById('result').innerText = `Hasil: ${result}`;
        }
    </script>

</body>
</html>
