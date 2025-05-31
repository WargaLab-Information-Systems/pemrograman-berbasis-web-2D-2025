<?php
session_start();
require 'db.php';  // koneksi database
$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
   
        // Cek user di database
        $stmt = $koneksi->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['login'] = true;
                $_SESSION['username'] = $user['username'];
                header("Location: dashboard.php");
                exit;
            } else {
                $error = "Password salah.";
            }
        } else {
            $error = "Username tidak ditemukan.";
        }
    }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Login | Sistem Kantor</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
    <style>
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            background: url('https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1470&q=80') no-repeat center center fixed;
            background-size: cover;
        }

        /* Overlay gradient gelap supaya tulisan mudah dibaca */
        body::before {
            content: "";
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.8), rgba(59, 130, 246, 0.6));
            z-index: 0;
        }

        .login-container {
            position: relative;
            z-index: 1;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 1rem;
            padding: 3rem 2.5rem;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            animation: fadeInUp 0.8s ease forwards;
        }
       
        html, body {
        height: 120%;
        overflow-y: auto;
        }

        .login-logo {
            width: 80px;
            height: 80px;
            margin-bottom: 1rem;
            border-radius: 50%;
            background-color: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            box-shadow: 0 2px 8px rgb(0 0 0 / 0.1);
        }

        .btn-primary {
            background-color: #2563eb;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #1e40af;
        }

        .text-link {
            color: #facc15;
            transition: color 0.3s ease;
        }
        .text-link:hover {
            color: #ca8a04;
        }

        /* Fokus input */
        input:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.5);
            border-color:rgb(116, 125, 146);
        }
          body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }
        /* Background image dengan overlay gelap */
        .background {
            position: fixed;
            inset: 0;
            background-image: url('https://images.unsplash.com/photo-1598257006444-e4b9d9075b5e?auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-position: center;
            filter: brightness(0.45);
            z-index: -1;
        }
        /* Container login */
        .login-container {
            position: relative;
            background: linear-gradient(135deg, #1e3a8acc, #2563ebcc); /* biru gradien transparan */
            border-radius: 1rem;
            padding: 2.5rem;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 10px 30px rgba(0,0,0,0.4);
            color: #f8fafc; /* teks putih terang */
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }
        .login-container h1,
        .login-container p,
        .login-container label {
            color: #f8fafc;
        }
        input::placeholder {
            color: #cbd5e1;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 0.5rem 1rem;
            margin-top: 0.25rem;
            margin-bottom: 1rem;
            border-radius: 0.5rem;
            border: none;
            outline: none;
            font-size: 1rem;
            color: #111827;
        }
        input[type="text"]:focus,
        input[type="password"]:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.6);
        }
        button[type="submit"] {
            width: 100%;
            padding: 0.75rem 1rem;
            background: linear-gradient(45deg, #3b82f6, #2563eb);
            border: none;
            border-radius: 0.75rem;
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.7);
            transition: background 0.3s ease;
        }
        button[type="submit"]:hover {
            background: linear-gradient(45deg, #2563eb, #1e40af);
        }
        /* Error message */
        .error-message {
            background-color: #f87171;
            color: #7f1d1d;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            text-align: center;
            font-weight: 600;

        }
        /* Text bawah */
        .bottom-text {
            margin-top: 2rem;
            text-align: center;
            color: #f8fafc;
            font-size: 0.875rem;
        }
        .bottom-text a {
            color:rgb(0, 0, 0);
            font-weight: 700;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .bottom-text a:hover {
            color:rgb(0, 0, 0);
            text-decoration: underline;
        }
        /* reCAPTCHA wrapper to make it blend */
        .g-recaptcha {
            transform: scale(0.9);
            transform-origin: 0 0;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="flex flex-col items-center mb-6">
            <div class="login-logo">🏢</div>
            <h1 class="text-xl font-bold text-gray-800 mb-2">Sistem Login Kantornya Frasinka</h1>
            <p class="text-gray-600 text-center">Masukkan Data Anda yoww !!!</p>
        </div>

        <?php if ($error): ?>
            <div class="bg-red-100 text-red-700 px-4 py-2 mb-6 rounded-lg text-center border border-red-300">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="post" action="">
            <div class="mb-5">
                <label class="block text-gray-700 font-semibold mb-2">Username</label>
                <input type="text" name="username" placeholder="Masukkan username"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600" required />
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Password</label>
                <input type="password" name="password" placeholder="Masukkan password"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600" required />
            </div>
            <button type="submit"
                class="w-full btn-primary text-white font-semibold py-3 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                Login
            </button>
        <p class="mt-8 text-center text-gray-100 text-sm">
            Belum punya akun? 
            <a href="register.php" class="text-link font-semibold hover:underline">Daftar sekarang</a>
        </p>
    </div>

</body>
</html>
