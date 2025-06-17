<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama = $_POST['nama'];
  $nim = $_POST['nim'];
  if (!ctype_digit($nim)) {
    echo "NIM hanya boleh berisi angka.";
    exit;
  }

  $email = $_POST['email'];
  $universitas = $_POST['universitas'];
  $password = $_POST['password'];
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Cek duplikasi NIM
  $cek = $conn->prepare("SELECT id FROM pendaftar WHERE nim = ?");
  $cek->bind_param("s", $nim);
  $cek->execute();
  $cek->store_result();

  if ($cek->num_rows > 0) {
    echo "Anda sudah pernah mendaftar.";
    exit;
  }

  // Upload file KTP
  $ktp_name = $_FILES['ktp']['name'];
  $ktp_tmp = $_FILES['ktp']['tmp_name'];
  $ktp_path = 'uploads/' . uniqid() . '_' . basename($ktp_name);
  if (!move_uploaded_file($ktp_tmp, $ktp_path)) {
    echo "Gagal mengupload file KTP.";
    exit;
  }

  // Upload file Transkrip
  $transkrip_name = $_FILES['transkrip']['name'];
  $transkrip_tmp = $_FILES['transkrip']['tmp_name'];
  $transkrip_path = 'uploads/transkrip_' . uniqid() . '_' . basename($transkrip_name);
  if (!move_uploaded_file($transkrip_tmp, $transkrip_path)) {
    echo "Gagal mengupload file Transkrip.";
    exit;
  }

  // Simpan ke database (termasuk password!)
  $stmt = $conn->prepare("INSERT INTO pendaftar (nama, nim, email, universitas, ktp_path, transkrip_path, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sssssss", $nama, $nim, $email, $universitas, $ktp_path, $transkrip_path, $hashed_password);
  $stmt->execute();

  header("Location: index.php");
  exit;
}
?>
