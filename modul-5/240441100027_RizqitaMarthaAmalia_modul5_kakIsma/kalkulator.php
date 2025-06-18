<?php
function hitung($a, $b, $op) {
    switch ($op) {
        case "+": return $a + $b;
        case "-": return $a - $b;
        case "*": return $a * $b;
        case "/": return $b != 0 ? $a / $b : "Tidak bisa dibagi nol";
        default: return "Operator tidak valid";
    }
}

$hasil = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = (float)$_POST["angka1"];
    $b = (float)$_POST["angka2"];
    $op = $_POST["operator"];
    $hasil = "Hasil: " . hitung($a, $b, $op);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Kalkulator Sederhana</h1>
    <nav>
        <a href="halaman1.php">Kembali ke Profil</a>
        <a href="halaman2.php">Kembali ke Timeline</a>
    </nav>

    <form method="post">
        <input type="number" name="angka1" step="any" required>
        <select name="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="number" name="angka2" step="any" required>
        <input type="submit" value="Hitung">
    </form>

    <p><?= $hasil ?></p>
</body>
</html>