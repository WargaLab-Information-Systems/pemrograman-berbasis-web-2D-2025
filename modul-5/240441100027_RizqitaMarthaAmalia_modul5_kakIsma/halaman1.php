<?php
function cekPengalaman($bahasa) {
    return count($bahasa) > 2 ? "Anda cukup berpengalaman dalam pemrograman!" : "";
}

$hasil = "";
$biodata = [
    'nama' => '',
    'nim' => '',
    'ttl' => '',
    'email' => '',
    'nomor_hp' => ''
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST["biodata"])) {
        $biodata = array_map('htmlspecialchars', $_POST["biodata"]);
    }
    
    
    if (!empty($_POST["bahasa"]) && !empty($_POST["pengalaman"]) &&
        !empty($_POST["software"]) && isset($_POST["sistem"]) && !empty($_POST["tingkat"])) {

        $bahasa = $_POST["bahasa"];
        $pengalaman = htmlspecialchars($_POST["pengalaman"]);
        $software = $_POST["software"];
        $sistem = $_POST["sistem"];
        $tingkat = $_POST["tingkat"];

        $hasil = "
        <h2>Hasil Input Profil Tambahan:</h2>
        <table border='1'>
            <tr><th>Bahasa</th><td>" . implode(", ", $bahasa) . "</td></tr>
            <tr><th>Pengalaman</th><td>$pengalaman</td></tr>
            <tr><th>Software</th><td>" . implode(", ", $software) . "</td></tr>
            <tr><th>Sistem Operasi</th><td>$sistem</td></tr>
            <tr><th>Tingkat PHP</th><td>$tingkat</td></tr>
        </table>
        <p>" . cekPengalaman($bahasa) . "</p>
        ";
    } else {
        $hasil = "<p style='color:red;'>Semua input wajib diisi!</p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profil Interaktif Mahasiswa</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 10px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
            text-align: left;
        }
        form {
            margin: 20px 0;
        }
        input[type="text"], textarea, select {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <h1>Profil Interaktif Mahasiswa</h1>
    <nav>
        <a href="halaman2.php">Menuju Timeline</a>
        <a href="halaman3.php">Menuju Blog</a>
        <a href="kalkulator.php">Kalkulator</a>
    </nav>

    <h2>Data Diri</h2>
    <form method="post">
        <table>
            <tr>
                <th>Nama</th>
                <td><input type="text" name="biodata[nama]" value="<?= $biodata['nama'] ?>" required></td>
            </tr>
            <tr>
                <th>NIM</th>
                <td><input type="text" name="biodata[nim]" value="<?= $biodata['nim'] ?>" required></td>
            </tr>
            <tr>
                <th>TTL</th>
                <td><input type="text" name="biodata[ttl]" value="<?= $biodata['ttl'] ?>" placeholder="Tempat, Tanggal Lahir" required></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="email" name="biodata[email]" value="<?= $biodata['email'] ?>" required></td>
            </tr>
            <tr>
                <th>Nomor HP</th>
                <td><input type="tel" name="biodata[nomor_hp]" value="<?= $biodata['nomor_hp'] ?>" required></td>
            </tr>
        </table>

        <h2>Form Profil Tambahan</h2>
        Bahasa Pemrograman:<br>
        <input type="text" name="bahasa[]" required><br>
        <input type="text" name="bahasa[]"><br>
        <input type="text" name="bahasa[]"><br><br>

        Pengalaman Proyek:<br>
        <textarea name="pengalaman" rows="4" cols="40" required></textarea><br><br>

        Software yang Digunakan:<br>
        <input type="checkbox" name="software[]" value="VS Code" required>VS Code
        <input type="checkbox" name="software[]" value="XAMPP">XAMPP
        <input type="checkbox" name="software[]" value="Git">Git<br><br>

        Sistem Operasi:<br>
        <input type="radio" name="sistem" value="Windows" required>Windows
        <input type="radio" name="sistem" value="Linux">Linux
        <input type="radio" name="sistem" value="Mac">Mac<br><br>

        Tingkat Penguasaan PHP:<br>
        <select name="tingkat" required>
            <option value="">-- Pilih --</option>
            <option value="Pemula">Pemula</option>
            <option value="Menengah">Menengah</option>
            <option value="Mahir">Mahir</option>
        </select><br><br>

        <input type="submit" value="Kirim">
    </form>

    <?php if (!empty($biodata['nama'])): ?>
        <h2>Biodata Anda:</h2>
        <table border="1">
            <?php foreach ($biodata as $key => $value): ?>
                <tr>
                    <th><?= ucfirst(str_replace('_', ' ', $key)) ?></th>
                    <td><?= $value ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <?= $hasil ?>
</body>
</html>