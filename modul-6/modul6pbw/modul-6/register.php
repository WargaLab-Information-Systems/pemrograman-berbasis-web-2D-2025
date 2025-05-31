<?php
session_start();
require 'db.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';

    if (empty($username) || empty($password) || empty($password_confirm)) {
        $error = "Semua field harus diisi.";
    } elseif ($password !== $password_confirm) {
        $error = "Password dan konfirmasi password tidak sama.";
    } else {
        $stmt = $koneksi->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error = "Username sudah digunakan.";
        } else {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt_insert = $koneksi->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt_insert->bind_param("ss", $username, $password_hash);
            if ($stmt_insert->execute()) {
                $success = "Registrasi berhasil! <a href='login.php' class='text-link font-semibold hover:underline'>Login sekarang</a>.";
            } else {
                $error = "Terjadi kesalahan saat registrasi.";
            }
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Register | Sistem Kantor</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
    <style>
        @keyframes fadeInUp {
            0% {opacity: 0; transform: translateY(20px);}
            100% {opacity: 1; transform: translateY(0);}
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
        body::before {
            content: "";
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.85), rgba(59, 130, 246, 0.75));
            z-index: 0;
        }
        html, body {
            height: 120%;
            overflow-y: auto;
        }
        .register-container {
            position: relative;
            z-index: 1;
            background: linear-gradient(135deg, #1e3a8acc, #2563ebcc);
            border-radius: 1rem;
            padding: 2.5rem;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 10px 30px rgba(0,0,0,0.4);
            color: #f8fafc;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            animation: fadeInUp 0.8s ease forwards;
        }
        .register-container h1,
        .register-container p,
        .register-container label {
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
        .error-message {
            background-color: #f87171;
            color: #7f1d1d;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            text-align: center;
            font-weight: 600;
        }
        .success-message {
            background-color: #4ade80;
            color: #064e3b;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            text-align: center;
            font-weight: 600;
        }
        .bottom-text {
            margin-top: 2rem;
            text-align: center;
            color: #f8fafc;
            font-size: 0.9rem;
        }
        .bottom-text a {
            display: inline-block;
            background: transparent;
            border: 2px solid #facc15;
            color: #facc15;
            padding: 0.4rem 1rem;
            border-radius: 1rem;
            font-weight: 700;
            text-decoration: none;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .bottom-text a:hover,
        .bottom-text a:focus {
            background-color: #facc15;
            color: #1a1a1a;
            outline: none;
        }
        .register-logo {
            width: 80px;
            height: 80px;
            margin-bottom: 1rem;
            border-radius: 50%;
            background-color: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            box-shadow: 0 2px 8px rgb(0 0 0 / 0.1);
            color: #2563eb;
            user-select: none;
        }
    </style>
</head>
<body>

<main class="register-container" role="main" aria-label="Form Registrasi Sistem Kantor">
    <div class="flex flex-col items-center mb-8">
        <div class="register-logo" aria-hidden="true">🏢</div>
        <h1 class="text-3xl font-bold mb-2">Registrasi Akun Baru</h1>
        <p class="text-center">Buat akun untuk mulai menggunakan web kantor</p>
    </div>

    <?php if ($error): ?>
        <div class="error-message" role="alert" aria-live="assertive">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="success-message" role="alert" aria-live="polite">
            <?= $success ?>
        </div>
    <?php endif; ?>

    <form method="post" action="" novalidate>
        <label for="username">Username</label>
        <input id="username" name="username" type="text" placeholder="Masukkan username" required autocomplete="username" />

        <label for="password">Password</label>
        <input id="password" name="password" type="password" placeholder="Masukkan password" required autocomplete="new-password" />

        <label for="password_confirm">Konfirmasi Password</label>
        <input id="password_confirm" name="password_confirm" type="password" placeholder="Ulangi password" required autocomplete="new-password" />

        <button type="submit" aria-label="Daftar akun baru">Daftar</button>
    </form>

    <p class="bottom-text">
        Sudah punya akun? 
        <a href="login.php" aria-label="Login ke sistem" class="text-link font-semibold">Login sekarang</a>
    </p>
</main>

</body>
