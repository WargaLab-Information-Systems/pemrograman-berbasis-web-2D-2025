<?php 
include "koneksi.php";
session_start();

if(isset($_POST["kirim"])){
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $kelamin = $_POST['kelamin'] ?? '';
    $departemen = $_POST['departemen'];
    $jabatan = $_POST['jabatan'];
    $kota = $_POST['kota'];
    $tanggal_absensi = $_POST['tanggal_absensi'];
    $jam_masuk = $_POST['jam_masuk'];
    $jam_pulang = $_POST['jam_pulang'];


    if(empty($nip) || empty($nama) || empty($umur) || empty($kelamin) || 
       empty($departemen) || empty($jabatan) || empty($kota) ||
       empty($tanggal_absensi) || empty($jam_masuk) || empty($jam_pulang)){
        $_SESSION['absen_status'] = 'gagal';
        $_SESSION['error_message'] = 'Semua field harus diisi!';
    } else {
        $cek_absen = mysqli_query($conn, "SELECT * FROM karyawan WHERE nip='$nip'");
        
        if (!$cek_absen) {
            $_SESSION['absen_status'] = 'gagal';
            $_SESSION['error_message'] = 'Error: ' . mysqli_error($conn);
        } elseif (mysqli_num_rows($cek_absen) > 0) {
            $_SESSION['absen_status'] = 'sudah_absen';
        } else {
            $iq = "INSERT INTO karyawan (nip, nama, umur, jenis_kelamin, departemen, jabatan, kota_asal, tanggal_absensi, jam_masuk, jam_pulang)
                  VALUES('$nip','$nama','$umur', '$kelamin','$departemen','$jabatan', '$kota','$tanggal_absensi','$jam_masuk','$jam_pulang')";
            
            $insert = mysqli_query($conn, $iq);
            
            if ($insert) {
                $_SESSION['absen_status'] = 'sukses';
            } else {
                $_SESSION['absen_status'] = 'gagal';
                $_SESSION['error_message'] = 'Error: ' . mysqli_error($conn);
            }
        }
    }
    
    header("Location: test.php");
    exit();    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Absensi Karyawan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<?php if (!empty($_SESSION['absen_status'])): ?>
    <?php if ($_SESSION['absen_status'] === 'sudah_absen'): ?>
        <div id="popup" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg text-center w-[350px]">
                <h2 class="text-xl font-bold text-yellow-600 mb-4">Sudah Absen</h2>
                <p class="text-gray-700 mb-4">NIP ini sudah melakukan absensi hari ini.</p>
                <button onclick="document.getElementById('popup').classList.add('hidden')" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">Tutup</button>
            </div>
        </div>

    <?php elseif ($_SESSION['absen_status'] === 'sukses'): ?>
        <div id="popup" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg text-center w-[350px]">
                <h2 class="text-xl font-bold text-green-600 mb-4">Absensi Berhasil</h2>
                <p class="text-gray-700 mb-4">Data absensi berhasil dicatat.</p>
                <button onclick="document.getElementById('popup').classList.add('hidden')" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Tutup</button>
            </div>
        </div>

    <?php elseif ($_SESSION['absen_status'] === 'gagal'): ?>
        <div id="popup" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg text-center w-[350px]">
                <h2 class="text-xl font-bold text-red-600 mb-4">Absensi Gagal</h2>
                <p class="text-gray-700 mb-4">Terjadi kesalahan saat menyimpan data absensi.</p>
                <button onclick="document.getElementById('popup').classList.add('hidden')" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Tutup</button>
            </div>
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['absen_status']); ?>
<?php endif; ?>
<body class="bg-gradient-to-b from-[#4300FF] to-[#EAEFEF] font-['Outfit'] min-h-screen flex items-center justify-center">

<div class="bg-white p-10 rounded-[25px] shadow-2xl w-[700px] mt-[50px]">
    <h2 class="text-[24px] font-bold mb-6 text-center">Form Absensi Karyawan</h2>

    <form method="POST" class="space-y-4">
        <div>
            <label for="nip">NIP</label>
            <input type="text" name="nip" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
        </div>
        <div>
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
        </div>
        <div>
            <label for="umur">Umur</label>
            <input type="number" name="umur" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
        </div>
        <div>
            <label for="kelamin">Jenis Kelamin</label>
            <select name="kelamin" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
                <option value="">Pilih</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
        <div>
            <label for="departemen">Departemen</label>
            <input type="text" name="departemen" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
        </div>
        <div>
            <label for="jabatan">Jabatan</label>
            <input type="text" name="jabatan" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
        </div>
        <div>
            <label for="kota">Kota Asal</label>
            <input type="text" name="kota" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
        </div>
        <div>
            <label for="tanggal_absensi">Tanggal Absensi</label>
            <input type="date" name="tanggal_absensi" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
        </div>
        <div>
            <label for="jam_masuk">Jam Masuk</label>
            <input type="time" name="jam_masuk" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
        </div>
        <div>
            <label for="jam_pulang">Jam Pulang</label>
            <input type="time" name="jam_pulang" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
        </div>
        <div class="flex justify-between items-center mt-6">
            <button type="submit" name="kirim" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Kirim</button>
    
            <a href="read.php" class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition">
        Lihat Data
    </a>
</div>

    </form>
</div>
<script>
  setTimeout(() => {
    const popup = document.getElementById('popup');
    if (popup) popup.classList.add('hidden');
  }, 4000); 
</script>
</body>
</html>
