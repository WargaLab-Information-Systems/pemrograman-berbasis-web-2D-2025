<?php
include "koneksi.php";

$sql = "SELECT * FROM karyawan";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Absensi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gradient-to-b from-[#4300FF] to-[#EAEFEF] font-['Outfit'] min-h-screen p-10">

<div class="max-w-7xl mx-auto bg-white p-8 rounded-[25px] shadow-2xl">
    <h2 class="text-2xl font-bold mb-6 text-center">Data Absensi Karyawan</h2>

    <?php if (mysqli_num_rows($result) > 0): ?>
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 text-sm text-center">
                <thead class="bg-gray-200 text-gray-700 uppercase font-semibold">
                    <tr>
                        <th class="p-3 border">No</th>
                        <th class="p-3 border">NIP</th>
                        <th class="p-3 border">Nama</th>
                        <th class="p-3 border">Umur</th>
                        <th class="p-3 border">Jenis Kelamin</th>
                        <th class="p-3 border">Departemen</th>
                        <th class="p-3 border">Jabatan</th>
                        <th class="p-3 border">Kota Asal</th>
                        <th class="p-3 border">Tanggal</th>
                        <th class="p-3 border">Masuk</th>
                        <th class="p-3 border">Pulang</th>
                        <th class="p-3 border">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    <?php $no = 1; ?>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 border"><?= $no++ ?></td>
                            <td class="p-3 border"><?= $row['nip'] ?></td>
                            <td class="p-3 border"><?= $row['nama'] ?></td>
                            <td class="p-3 border"><?= $row['umur'] ?></td>
                            <td class="p-3 border"><?= $row['jenis_kelamin'] ?></td>
                            <td class="p-3 border"><?= $row['departemen'] ?></td>
                            <td class="p-3 border"><?= $row['jabatan'] ?></td>
                            <td class="p-3 border"><?= $row['kota_asal'] ?></td>
                            <td class="p-3 border"><?= $row['tanggal_absensi'] ?></td>
                            <td class="p-3 border"><?= $row['jam_masuk'] ?></td>
                            <td class="p-3 border"><?= $row['jam_pulang'] ?></td>
                            <td class="p-3 border">
                                <a href="edit.php?nip=<?= $row['nip'] ?>" class="text-blue-600 hover:underline">Edit</a> |
                                <a href="delete.php?nip=<?= $row['nip'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="text-red-600 hover:underline">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="text-center text-gray-600 mt-4">Belum ada data absensi.</p>
    <?php endif; ?>
    <div class="flex mt-[20px]">
        <div class="mt-6 gap-5 text-center">
            <a href="logout.php" class="text-sm bg-red-600 text-white px-5 py-2  rounded hover:underline">Logout</a>
        </div>
    </div>
</div>

</body>
</html>
