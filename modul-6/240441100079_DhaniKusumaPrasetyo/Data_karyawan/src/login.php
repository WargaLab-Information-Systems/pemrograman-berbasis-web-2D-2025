<?php
include 'koneksi.php';
session_start();

$err = '';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $ingataku = isset($_POST['ingataku']) ? 1 : 0;

    if ($username == '' || $password == '') {
            $_SESSION['error_login'] = "kosong";
            header("Location: login.php");
            exit();
    
    } else {
        $sql1 = "SELECT * FROM users WHERE username = '$username'";
        $q1 = mysqli_query($conn, $sql1);

        if (!$q1) {
            $err = "Query gagal: " . mysqli_error($conn);
        } else {
            $r1 = mysqli_fetch_array($q1);

            if (!$r1) {
                $_SESSION['error_login'] = "Username tidak tersedia";
                
            } elseif ($r1['password'] != md5($password)) {
                $err = "Password salah";
                $_SESSION['error_login'] = "Password salah";

            
            } else {
                $_SESSION['session_username'] = $username;
                $_SESSION['session_password'] = md5($password);

                if ($ingataku == 1) {
                    setcookie("cookie_username", $username, time() + (60 * 60 * 24 * 20), "/");
                    setcookie("cookie_password", md5($password), time() + (60 * 60 * 24 * 20), "/");
                }

                header("Location: test.php");
                exit();
            }
        }

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body id="main-body" class="bg-gradient-to-b from-[#4300FF] to-[#EAEFEF] min-h-screen flex items-center justify-center font-['Outfit'] opacity-100 transition-opacity duration-500">

<?php if (!empty($_SESSION['error_login']) && $_SESSION['error_login'] === "Password salah" ): ?>
    <div id="popup" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg text-center w-[350px]">
            <h2 class="text-xl font-bold text-red-600 mb-4">Login Gagal</h2>
            <p class="text-gray-700 mb-4">Password salah. Silakan coba lagi.</p>
            <button onclick="document.getElementById('popup').classList.add('hidden')" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Tutup</button>
        </div>
    </div>
<?php unset($_SESSION['error_login']); ?>
<?php endif; ?>

<?php if (!empty($_SESSION['error_login']) && $_SESSION['error_login'] === "Username tidak tersedia" ): ?>
    <div id="popup" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg text-center w-[350px]">
            <h2 class="text-xl font-bold text-green-600 mb-4">Username Tidak Tersedia</h2>
            <p class="text-gray-700 mb-4"> Silakan coba Daftar.</p>
            <button onclick="document.getElementById('popup').classList.add('hidden')" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Tutup</button>
        </div>
    </div>
<?php unset($_SESSION['error_login']); ?>
<?php endif; ?>

<?php if (!empty($_SESSION['error_login']) && $_SESSION['error_login'] === "kosong"): ?>
    <div id="kosong" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg text-center w-[350px]">
            <h2 class="text-xl font-bold text-red-600 mb-4">Username dan Password</h2>
            <p class="text-gray-700 mb-4">Tidak boleh kosong. Silakan coba lagi.</p>
            <button onclick="document.getElementById('kosong').classList.add('hidden')" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Tutup</button>
        </div>
    </div>
    <?php unset($_SESSION['error_login']); ?>
<?php endif; ?>

<section class="flex items-center justify-center bg-gradient-to-b from-[#4300FF] to-[#EAEFEF] h-screen w-full">
  <div class="flex justify-between mt-[100px] w-[1100px]">
    <div class="w-[500px]  bg-white rounded-[25px] shadow-2xl">
      <form method="POST" class="p-[50px]">
        <h1 class="text-[24px] font-bold font-['Outfit']">Login</h1>
        <div class="mt-[25px]">
          <label for="username"><p class="font-['Outfit']">Username</p>
            <input type="text" name="username" class="border border-gray-500 h-[40px] w-[400px] rounded-[10px] mt-[10px] p-[15px]">
          </label>
        </div>
        <div class="mt-[25px]">
          <label for="password"><p class="font-['Outfit']">Password</p>
            <input type="password" name="password" class="border border-gray-500 h-[40px] w-[400px] rounded-[10px] mt-[10px] p-[15px]">
          </label>
        </div>
        <div class="mt-[25px]">
          <label class="text-blue-600">
            <input type="checkbox" name="ingataku"> Ingat Aku
          </label>
        </div>
        <div class="mt-[25px]">
          <button type="submit" name="login" value="login" class="bg-blue-600 text-white px-4 py-2 rounded">Kirim</button>
        </div>
        <div class="mt-[25px] flex">
          <p>Belum punya akun ?? </p><a href="daftar.php" class="text-blue-600 underline">Daftar disini</a>
        </div>
      </form>
    </div>
    <div class="h-[500px] w-[500px]  text-white items-center justify-center rounded-[25px] p-[20px]">
        <div class="flex-col mt-[150px]">
            <div>
                <h1 class="text-[50px] font-bold font-['outfit'] drop-shadow-md p-[0px]">SELAMAT DATANG</h1>   
            </div>
            <div>
                <h1 class="text-[30px] font-bold py-[1px] drop-shadow-md">DI LAMAN ABSENSI KARYAWAN</h1>
            </div>
            <div>
                <h2 class="text-[12px] drop-shadow-md">PT. Dhani Sukses Selalu dan jaya selalu</h2>
            </div>   
        </div>
    </div>
</section>

<script>
  const links = document.querySelectorAll("a[href]");
  const body = document.getElementById("main-body");

    links.forEach(link => {
    link.addEventListener("click", function (e) {
      const target = link.getAttribute("href");

      // Cegah pindah halaman langsung
        if (target && !target.startsWith('#') && !target.startsWith('javascript')) {
        e.preventDefault();
        
        // Tambah efek fade out
        body.classList.remove("opacity-100");
        body.classList.add("opacity-0");

        setTimeout(() => {
          window.location.href = target;
        }, 500);
      }
    });
  });
</script>
</body>
</html>
