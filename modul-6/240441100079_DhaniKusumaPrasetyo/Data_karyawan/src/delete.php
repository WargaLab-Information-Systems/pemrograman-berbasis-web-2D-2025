<?php
include "koneksi.php";

$nip = $_GET['nip'];
mysqli_query($conn, "DELETE FROM karyawan WHERE nip = $nip");
header("Location: read.php");
?>