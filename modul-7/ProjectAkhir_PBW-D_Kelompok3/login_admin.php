<?php include 'config.php'; session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Mobile friendly -->
  <title>Login Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    body {
      background-image: 
        linear-gradient(135deg, rgba(255, 204, 255, 0.6), rgba(204, 229, 255, 0.6), rgba(204, 255, 229, 0.6)),
        url('img/kampus.jpg');
      background-size: cover;
      background-position: center;
    }

    .bg-glass {
      backdrop-filter: blur(14px);
      background: rgba(255, 255, 255, 0.75);
      border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .animate-pop {
      animation: pop-in 0.6s ease-out;
    }

    @keyframes pop-in {
      0% { transform: scale(0.95); opacity: 0; }
      100% { transform: scale(1); opacity: 1; }
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center px-4"> <!-- px-4 untuk padding horizontal mobile -->

  <!--  KOTAK LOGIN ADMIN -->
  <div class="bg-glass w-full max-w-md p-6 md:p-8 rounded-3xl shadow-2xl animate-pop">
    
    <!--  HEADER ADMIN -->
    <div class="text-center mb-6">
      <img src="img/admin-icon.png" alt="Admin" class="mx-auto w-14 h-14 md:w-16 md:h-16 mb-3"> <!-- responsive icon -->
      <h2 class="text-2xl md:text-3xl font-bold text-pink-700">Login</h2>
      <p class="text-sm text-gray-600">khusus untuk administrator</p>
    </div>

    <!--  FORM LOGIN -->
    <form action="" method="post" class="space-y-4">
      
      <!--  Input Username -->
      <input type="text" name="username" placeholder="Username" required
        class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-pink-400 focus:outline-none shadow-md">

      <!--  Input Password + Toggle -->
      <div class="relative">
        <input type="password" name="password" id="password" placeholder="Password" required
          class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-pink-400 focus:outline-none shadow-md pr-10">
        <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-pink-500 text-sm">
          (S)
        </button>
      </div>

      <!-- Tombol Login -->
      <button type="submit" name="login"
        class="w-full bg-gradient-to-r from-pink-500 to-red-500 text-white font-semibold py-2 rounded-xl hover:from-pink-600 hover:to-red-600 transition duration-300 shadow-lg">
        Login
      </button>
    </form>

    <!-- PESAN LOGIN GAGAL -->
    <?php
    if (isset($_POST['login'])) {
      $u = $_POST['username'];
      $p = hash('sha256', $_POST['password']);
      $q = $conn->query("SELECT * FROM admin WHERE username='$u' AND password='$p'");
      if ($q->num_rows > 0) {
        $_SESSION['admin'] = $u;
        header("Location: dashboard.php");
        exit;
      } else {
        echo "<p class='text-red-600 mt-4 text-center font-semibold'> Login gagal! Username atau password salah.</p>";
      }
    }
    ?>
  </div>

  <!-- SCRIPT TOGGLE PASSWORD -->
  <script>
    function togglePassword() {
      const input = document.getElementById("password");
      const type = input.getAttribute("type") === "password" ? "text" : "password";
      input.setAttribute("type", type);
    }
  </script>
</body>
</html>
