<?php
session_start();
require 'db.php';

// Cek login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$data = $koneksi->query("SELECT * FROM karyawan_absensi");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Dashboard | Sistem Kantor</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            margin: 0;
            position: relative;
            overflow-x: hidden;
            background: url('https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1470&q=80') no-repeat center center fixed;
            background-size: cover;
        }

        .background-blur {
            position: fixed;
            inset: 0;
            background: inherit;
            filter: blur(10px);
            z-index: -1;
        }

        .container {
            position: relative;
            max-width: 900px;
            margin: 3rem auto;
            background: rgba(30, 41, 59, 0.5); /* biru gelap transparan */
            border-radius: 1rem;
            padding: 2.5rem 2rem;
            color: #ffffff;
            box-shadow: 0 10px 30px rgba(0,0,0,0.6);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        h2 {
            font-weight: 700;
            font-size: 1.75rem;
            margin-bottom: 1.5rem;
            color: #ffffff;
            text-shadow: 0 2px 6px rgba(0,0,0,0.8);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
        }

        thead tr {
            background: rgba(255, 255, 255, 0.2);
        }

        thead tr th {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            color: #f0f9ff;
            text-align: left;
            font-weight: 600;
            text-shadow: 0 1px 4px rgba(0,0,0,0.7);
            white-space: nowrap;
        }

        tbody tr {
            transition: background-color 0.2s ease;
        }

        tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        html, body {
        height: 120%;
        overflow-y: auto;
        }

        tbody tr td {
            padding: 0.6rem 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
            color: #ffffff;
            text-shadow: 0 1px 4px rgba(0,0,0,0.5);
            white-space: nowrap;
        }

        .table-wrapper {
            overflow-x: auto;
            border-radius: 0.75rem;
            box-shadow: 0 0 20px rgba(0,0,0,0.4);
        }

        .btn {
            display: inline-block;
            padding: 0.5rem 1.25rem;
            font-weight: 600;
            border-radius: 0.5rem;
            text-decoration: none;
            transition: background-color 0.3s ease;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.3);
            font-size: 0.875rem;
            white-space: nowrap;
        }

        .btn-tambah {
            background: #3b82f6;
            color: white;
        }
        .btn-tambah:hover {
            background: #2563eb;
        }

        .btn-logout {
            background: #ef4444;
            color: white;
        }
        .btn-logout:hover {
            background: #b91c1c;
        }

        .btn-edit {
            background: #facc15;
            color: #1e293b;
            padding: 0.3rem 0.8rem;
            font-size: 0.8rem;
        }

        .btn-edit:hover {
            background: #eab308;
        }

        .btn-hapus {
            background: #dc2626;
            color: white;
            padding: 0.3rem 0.8rem;
            font-size: 0.8rem;
        }

        .btn-hapus:hover {
            background: #b91c1c;
        }

        @media (max-width: 768px) {
            .btn-edit, .btn-hapus {
                display: block;
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="background-blur"></div>

    <div class="container">
        <div class="flex justify-between items-center mb-8 flex-wrap gap-4">
            <h2>Data Karyawan & Absensi</h2>
            <div class="flex gap-3">
                <a href="tambah_absensi.php" class="btn btn-tambah">+ Tambah</a>
                <a href="logout.php" class="btn btn-logout">Logout</a>
            </div>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>JK</th>
                        <th>Departemen</th>
                        <th>Jabatan</th>
                        <th>Kota</th>
                        <th>Tanggal</th>
                        <th>Masuk</th>
                        <th>Pulang</th>
                        <th style="min-width:110px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($data->num_rows > 0): ?>
                        <?php while ($row = $data->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['nip']) ?></td>
                                <td><?= htmlspecialchars($row['nama']) ?></td>
                                <td><?= (int)$row['umur'] ?></td>
                                <td><?= htmlspecialchars($row['jenis_kelamin']) ?></td>
                                <td><?= htmlspecialchars($row['departemen']) ?></td>
                                <td><?= htmlspecialchars($row['jabatan']) ?></td>
                                <td><?= htmlspecialchars($row['kota_asal']) ?></td>
                                <td><?= htmlspecialchars($row['tanggal_absensi']) ?></td>
                                <td><?= htmlspecialchars($row['jam_masuk']) ?></td>
                                <td><?= htmlspecialchars($row['jam_pulang']) ?></td>
                                <td style="white-space: nowrap;">
                                    <div class="flex gap-2 flex-wrap">
                                        <a href="edit_absensi.php?id=<?= urlencode($row['id']) ?>" class="btn btn-edit">Edit</a>
                                        <a href="hapus_absensi.php?id=<?= urlencode($row['id']) ?>" onclick="return confirm('Yakin hapus data ini?')" class="btn btn-hapus">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="11" style="text-align:center; padding:1.5rem; color:#e0e7ff; font-style:italic;">
                                Belum ada data
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
