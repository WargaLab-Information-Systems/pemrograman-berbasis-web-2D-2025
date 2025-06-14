<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require 'config.php';

if(!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Create/Update
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nip = $_POST['nip'];
    
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM karyawan_absensi WHERE nip = ? AND id != ?");
    $stmt->execute([$nip, $_POST['id'] ?? 0]);
    $exists = $stmt->fetchColumn();

    if ($exists) {
        $_SESSION['error'] = 'NIP sudah terdaftar. Silakan gunakan NIP yang lain.';
    } else {
        $data = [
            $nip,
            $_POST['nama'],
            $_POST['umur'],
            $_POST['jenis_kelamin'],
            $_POST['departemen'],
            $_POST['jabatan'],
            $_POST['kota_asal'],
            $_POST['tanggal_absensi'], 
            $_POST['jam_masuk'],
            $_POST['jam_pulang']
        ];
        
        if(empty($_POST['id'])) {
            $stmt = $pdo->prepare("INSERT INTO karyawan_absensi (nip, nama, umur, jenis_kelamin, departemen, jabatan, kota_asal, tanggal_absensi, jam_masuk, jam_pulang) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        } else {
            $data[] = $_POST['id'];
            $stmt = $pdo->prepare("UPDATE karyawan_absensi SET nip=?, nama=?, umur=?, jenis_kelamin=?, departemen=?, jabatan=?, kota_asal=?, tanggal_absensi=?, jam_masuk=?, jam_pulang=? WHERE id=?");
        }
        
        if($stmt->execute($data)) {
            $_SESSION['success'] = 'Data karyawan berhasil disimpan!';
            header('Location: karyawan.php');
            exit;
        }
    }
}

// Delete
if(isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM karyawan_absensi WHERE id=?");
    if($stmt->execute([$_GET['delete']])) {
        $_SESSION['success'] = 'Data karyawan berhasil dihapus!';
        header('Location: karyawan.php');
        exit;
    }
}

// Read
$karyawan = $pdo->query("SELECT * FROM karyawan_absensi GROUP BY nip")->fetchAll();

// Edit
$edit = null;
if(isset($_GET['edit'])) {
    $stmt = $pdo->prepare("SELECT * FROM karyawan_absensi WHERE id=?");
    $stmt->execute([$_GET['edit']]);
    $edit = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="index.php">Manajemen Karyawan</a>
            <div class="navbar-nav">
                <?php if(isset($_SESSION['user_id'])): ?>
                    <a class="nav-link" href="karyawan.php">Karyawan</a>
                    <a class="nav-link" href="absensi.php">Absensi</a>
                    <a class="nav-link" href="logout.php">Logout</a>
                <?php else: ?>
                    <a class="nav-link" href="login.php">Login</a>
                    <a class="nav-link" href="register.php">Register</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        
        <div class="card mb-4">
            <div class="card-body">
                <h4 class="card-title"><?= $edit ? 'Edit' : 'Tambah' ?> Karyawan</h4>
                <?php if(isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>
                <form method="POST">
                    <input type="hidden" name="id" value="<?= $edit ? $edit['id'] : '' ?>">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">NIP</label>
                            <input type="text" name="nip" class="form-control" value="<?= $edit ? $edit['nip'] : '' ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?= $edit ? $edit['nama'] : '' ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Umur</label>
                            <input type="number" name="umur" class="form-control" value="<?= $edit ? $edit['umur'] : '' ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select" required>
                                <option value="Laki-laki" <?= $edit && $edit['jenis_kelamin']=='Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                                <option value="Perempuan" <?= $edit && $edit['jenis_kelamin']=='Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Departemen</label>
                            <input type="text" name="departemen" class="form-control" value="<?= $edit ? $edit['departemen'] : '' ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" value="<?= $edit ? $edit['jabatan'] : '' ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Kota Asal</label>
                            <input type="text" name="kota_asal" class="form-control" value="<?= $edit ? $edit['kota_asal'] : '' ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Tanggal Absensi</label>
                            <input type="date" name="tanggal_absensi" class="form-control" value="<?= $edit ? $edit['tanggal_absensi'] : date('Y-m-d') ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Jam Masuk</label>
                            <input type="time" name="jam_masuk" class="form-control" value="<?= $edit ? $edit['jam_masuk'] : '08:00' ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Jam Pulang</label>
                            <input type="time" name="jam_pulang" class="form-control" value="<?= $edit ? $edit['jam_pulang'] : '17:00' ?>" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <?php if($edit): ?>
                                <a href="karyawan.php" class="btn btn-secondary">Batal</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Karyawan</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Umur</th>
                                <th>Jenis Kelamin</th>
                                <th>Departemen</th>
                                <th>Jabatan</th>
                                <th>Tanggal Absensi</th>
                                <th>Jam Masuk</th>
                                <th>Jam Pulang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($karyawan as $k): ?>
                            <tr>
                                <td><?= htmlspecialchars($k['nip']) ?></td>
                                <td><?= htmlspecialchars($k['nama']) ?></td>
                                <td><?= htmlspecialchars($k['umur']) ?></td>
                                <td><?= htmlspecialchars($k['jenis_kelamin']) ?></td>
                                <td><?= htmlspecialchars($k['departemen']) ?></td>
                                <td><?= htmlspecialchars($k['jabatan']) ?></td>
                                <td><?= htmlspecialchars($k['tanggal_absensi']) ?></td>
                                <td><?= htmlspecialchars($k['jam_masuk']) ?></td>
                                <td><?= htmlspecialchars($k['jam_pulang']) ?></td>
                                <td>
                                    <a href="karyawan.php?edit=<?= $k['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="karyawan.php?delete=<?= $k['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                                    <a href="absensi.php?nip=<?= $k['nip'] ?>" class="btn btn-sm btn-info">Absensi</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function (e) {
            const nip = form.nip.value.trim();
            const nama = form.nama.value.trim();
            const umur = parseInt(form.umur.value.trim());
            const departemen = form.departemen.value.trim();
            const jabatan = form.jabatan.value.trim();
            const kota = form.kota_asal.value.trim();
            const tanggal = form.tanggal_absensi.value;
            const jamMasuk = form.jam_masuk.value;
            const jamPulang = form.jam_pulang.value;

            let pesanError = [];

            if (!nip) pesanError.push("NIP wajib diisi.");
            if (!nama) pesanError.push("Nama wajib diisi.");
            if (isNaN(umur) || umur <= 0) pesanError.push("Umur harus berupa angka dan lebih dari 0.");
            if (!departemen) pesanError.push("Departemen wajib diisi.");
            if (!jabatan) pesanError.push("Jabatan wajib diisi.");
            if (!kota) pesanError.push("Kota asal wajib diisi.");
            if (!tanggal) pesanError.push("Tanggal absensi wajib diisi.");
            if (!jamMasuk) pesanError.push("Jam masuk wajib diisi.");
            if (!jamPulang) pesanError.push("Jam pulang wajib diisi.");

            if (pesanError.length > 0) {
                e.preventDefault();
                alert("Terjadi kesalahan:\n" + pesanError.join("\n"));
            }
        });
    }

    // Konfirmasi sebelum hapus
    const deleteButtons = document.querySelectorAll('a.btn-danger');
    deleteButtons.forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            if (!confirm('Yakin ingin menghapus data ini?')) {
                e.preventDefault();
            }
        });
    });
});
</script>

</body>
</html>
