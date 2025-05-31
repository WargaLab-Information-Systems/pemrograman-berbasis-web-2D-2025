<?php
include "koneksi.php";
session_start();

$nip = $_GET['nip'];
$result = mysqli_query($conn, "SELECT * FROM karyawan WHERE nip = '$nip'");
$data = mysqli_fetch_assoc($result);

if (isset($_POST['edit'])) {
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $jenis_kelamin = $_POST['kelamin'] ?? '';
    $departemen = $_POST['departemen'];
    $jabatan = $_POST['jabatan'];
    $kota = $_POST['kota'];
    $tanggal_absensi = $_POST['tanggal_absensi'];
    $jam_masuk = $_POST['jam_masuk'];
    $jam_pulang = $_POST['jam_pulang'];
    
    $edit = mysqli_query($conn, "UPDATE karyawan SET 
        nama='$nama', 
        umur='$umur', 
        jenis_kelamin='$jenis_kelamin', 
        departemen='$departemen',
        jabatan='$jabatan', 
        kota_asal='$kota', 
        tanggal_absensi='$tanggal_absensi', 
        jam_masuk='$jam_masuk', 
        jam_pulang='$jam_pulang' 
        WHERE nip='$nip'
    ");

    if ($edit) {
        $_SESSION['edit_status'] = 'sukses';
    } else {
        $_SESSION['edit_status'] = 'gagal';
    }
    header("Location: edit.php?nip=$nip");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Absensi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gradient-to-b from-[#4300FF] to-[#EAEFEF] font-['Outfit'] min-h-screen flex items-center justify-center">

<?php if (!empty($_SESSION['edit_status'])): ?>
    <?php if ($_SESSION['edit_status'] === 'sukses'): ?>
        <div id="popup" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg text-center w-[350px]">
                <h2 class="text-xl font-bold text-green-600 mb-4">Edit Berhasil</h2>
                <p class="text-gray-700 mb-4">Data absensi berhasil diperbarui.</p>
                <button onclick="document.getElementById('popup').classList.add('hidden')" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Tutup</button>
            </div>
        </div>
    <?php elseif ($_SESSION['edit_status'] === 'gagal'): ?>
        <div id="popup" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg text-center w-[350px]">
                <h2 class="text-xl font-bold text-red-600 mb-4">Edit Gagal</h2>
                <p class="text-gray-700 mb-4">Terjadi kesalahan saat mengedit data.</p>
                <button onclick="document.getElementById('popup').classList.add('hidden')" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Tutup</button>
            </div>
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['edit_status']); ?>
<?php endif; ?>

<div class="bg-white p-10 rounded-[25px] shadow-2xl w-[700px] mt-[50px]">
    <h2 class="text-[24px] font-bold mb-6 text-center">Edit Data Absensi</h2>
    <form method="POST" class="space-y-4">
        <div>
            <label for="nip">NIP</label>
            <input type="text" name="nip" value="<?= htmlspecialchars($data['nip']) ?>" class="w-full border border-gray-300 rounded-lg p-2 mt-1 bg-gray-100" readonly>
        </div>
        <div>
            <label for="nama">Nama</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
        </div>
        <div>
            <label for="umur">Umur</label>
            <input type="number" name="umur" value="<?= htmlspecialchars($data['umur']) ?>" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
        </div>
        <div>
            <label for="kelamin">Jenis Kelamin</label>
            <select name="kelamin" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
                <option value="">Pilih</option>
                <option value="L" <?= $data['jenis_kelamin'] === 'L' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="P" <?= $data['jenis_kelamin'] === 'P' ? 'selected' : '' ?>>Perempuan</option>
            </select>
        </div>
        <div>
            <label for="departemen">Departemen</label>
            <input type="text" name="departemen" value="<?= htmlspecialchars($data['departemen']) ?>" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
        </div>
        <div>
            <label for="jabatan">Jabatan</label>
            <input type="text" name="jabatan" value="<?= htmlspecialchars($data['jabatan']) ?>" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
        </div>
        <div>
            <label for="kota">Kota Asal</label>
            <input type="text" name="kota" value="<?= htmlspecialchars($data['kota_asal']) ?>" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
        </div>
        <div>
            <label for="tanggal_absensi">Tanggal Absensi</label>
            <input type="date" name="tanggal_absensi" value="<?= $data['tanggal_absensi'] ?>" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
        </div>
        <div>
            <label for="jam_masuk">Jam Masuk</label>
            <input type="time" name="jam_masuk" value="<?= $data['jam_masuk'] ?>" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
        </div>
        <div>
            <label for="jam_pulang">Jam Pulang</label>
            <input type="time" name="jam_pulang" value="<?= $data['jam_pulang'] ?>" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
        </div>
        <div class="flex justify-between items-center mt-6">
            <button type="submit" name="edit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Edit</button>
            <a href="read.php" class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300">Lihat Data</a>
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
