<?php
session_start();
include "config.php"; // Hubungkan ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    
    // Cek ke database
    $stmt = $conn->prepare("SELECT * FROM users WHERE nim = ? AND nama = ?");
    $stmt->bind_param("ss", $nim, $nama);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $_SESSION['nim'] = $nim;
        $_SESSION['nama'] = $nama;
        $success = "Selamat, login Anda berhasil!<br>NIM: $nim<br>Nama: $nama";
    } else {
        $error = "NIM atau Nama salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php 
    if (isset($error)) echo "<p style='color:red;'>$error</p>"; 
    if (isset($success)) echo "<p style='color:green;'>$success</p>";
    ?>
    <form action="" method="post">
        <label for="nim">NIM</label><br>
        <input type="text" name="nim" id="nim" required><br><br>
        
        <label for="nama">Nama</label><br>
        <input type="text" name="nama" id="nama" required><br><br>
        
        <button type="submit">Login</button>
    </form>
</body>
</html>
