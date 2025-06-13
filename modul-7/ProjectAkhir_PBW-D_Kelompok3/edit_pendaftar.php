<?php
include 'config.php';              // Koneksi database
session_start();                   // Mulai sesi login
if (!isset($_SESSION['admin']))    // Cek apakah admin sudah login
  header('Location: login_admin.php'); // Jika tidak, redirect ke halaman login

$id = $_GET['id'];                 // Ambil ID pendaftar dari URL
$res = $conn->query("SELECT * FROM pendaftar WHERE id = $id"); // Ambil data pendaftar berdasarkan ID
$data = $res->fetch_assoc();      // Simpan data hasil query dalam array asosiatif
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Pendaftar</title>
  
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<!-- Background body abu-abu muda -->
<body class="bg-gray-100">
  <!-- Container edit form -->
  <div class="max-w-xl mx-auto py-10 px-4">
    <h2 class="text-2xl font-bold mb-4">Edit Data Pendaftar</h2>
    
    <!-- Form edit data pendaftar -->
    <form action="edit_pendaftar.php?id=<?= $id ?>" method="post" class="space-y-4">

      <!--  Nama -->
      <input type="text" name="nama" value="<?= $data['nama'] ?>" required class="w-full border px-3 py-2">

      <!--  NIM -->
      <input type="text" name="nim" value="<?= $data['nim'] ?>" required class="w-full border px-3 py-2">

      <!--  Email -->
      <input type="email" name="email" value="<?= $data['email'] ?>" required class="w-full border px-3 py-2">

      <!--  Universitas -->
      <input type="text" name="universitas" value="<?= $data['universitas'] ?>" required class="w-full border px-3 py-2">

      <!--  Tombol update -->
      <button type="submit" name="update"
        class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">
        Update
      </button>
    </form>

    <!--  Link kembali ke dashboard -->
    <a href="dashboard.php" class="text-blue-600 mt-4 inline-block">← Kembali</a>
  </div>
</body>
</html>

<?php
//  Proses update setelah form dikirim
if (isset($_POST['update'])) {
  $nama = $_POST['nama'];                    //  Ambil input nama
  $nim = $_POST['nim'];                      //  Ambil input NIM
  $email = $_POST['email'];                  //  Ambil input email
  $universitas = $_POST['universitas'];      //  Ambil input universitas

  // 🛠️ Siapkan query UPDATE dengan prepared statement (aman dari SQL injection)
  $stmt = $conn->prepare("UPDATE pendaftar SET nama=?, nim=?, email=?, universitas=? WHERE id=?");
  $stmt->bind_param("ssssi", $nama, $nim, $email, $universitas, $id);
  $stmt->execute();                          //  Jalankan query
  header("Location: dashboard.php");         //  Redirect kembali ke dashboard setelah update
}
?>
