<?php
session_start();
include 'config.php';

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Ambil data pendaftar berdasarkan email
  $stmt = $conn->prepare("SELECT * FROM pendaftar WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();
  $data = $result->fetch_assoc();

  // Verifikasi password
  if ($data && password_verify($password, $data['password'])) {
    $_SESSION['user'] = $data;
    header("Location: pengumuman.php");
    exit;
  } else {
    echo "<script>alert('Email atau password salah.');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" /> <!-- 📱 Mobile Responsive -->
  <title>Login Pendaftar</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <style>
    body {
      background-image: linear-gradient(to bottom right, #fce4ec, #f3e5f5, #e1bee7);
      background-size: cover;
      background-position: center;
    }
    .bg-glass {
      backdrop-filter: blur(10px);
      background-color: rgba(255, 255, 255, 0.75);
      border: 1px solid rgba(255, 255, 255, 0.3);
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen px-4"> <!-- 📱 px-4 untuk padding kanan kiri mobile -->

  <!--  CARD LOGIN -->
  <div class="bg-glass w-full max-w-sm p-6 md:p-8 rounded-2xl shadow-2xl text-center">

    <!--  LOGO LOGIN -->
    <img src="img/scholarship.png" alt="Beasiswa" class="w-16 h-16 md:w-20 md:h-20 mx-auto mb-4"> <!-- ✅ Gambar responsif -->

    <!--  JUDUL -->
    <h2 class="text-xl md:text-2xl font-bold mb-4 text-pink-700">Login Pendaftar</h2>

    <!--  FORM LOGIN -->
    <form method="POST" class="space-y-4 text-left">
      
      <!--  INPUT EMAIL -->
      <input
        type="email"
        name="email"
        placeholder="Email"
        required
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400 shadow-sm"
      />

      <!--  INPUT PASSWORD -->
      <input
        type="password"
        name="password"
        placeholder="Password"
        required
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400 shadow-sm"
      />

      <!--  TOMBOL LOGIN -->
      <button
        type="submit"
        name="login"
        class="w-full bg-pink-600 text-white py-2 rounded-lg hover:bg-pink-700 transition duration-300 shadow-md"
      >
        Login
      </button>
    </form>
  </div>

</body>
</html>
