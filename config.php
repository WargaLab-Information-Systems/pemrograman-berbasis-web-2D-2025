<?php
$host = 'localhost';
$user = 'root'; // sesuaikan dengan user MySQL 
$pass = '';     // sesuaikan dengan password MySQL
$db   = 'beasiswa_db';

$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>