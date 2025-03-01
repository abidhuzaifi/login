<?php
$host = "localhost";
$user = "root";  // Default username MySQL
$pass = "";      // Default password (kosong)
$dbname = "login_system"; // Sesuaikan dengan nama database Anda

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
