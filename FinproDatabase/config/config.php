<?php
$servername = "localhost";
$username = "leonel";  // Ganti dengan username MySQL Anda
$password = "";      // Ganti dengan password MySQL Anda
$dbname = "finpro";

// Koneksi ke database
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
