<?php
// proses.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Username = $_POST['username'];
    $Password = $_POST['password']; 

    if ($Username === 'user123' && $Password === '123') {
        echo "Login berhasil!";
    } else {
        echo "Username atau sandi salah";
        // Tambahkan tombol "Coba Lagi" yang mengarahkan ke halaman form
        echo '<br><br><a href="form.php">Coba Lagi</a>';
    }
} else {
    echo "Akses langsung ke halaman ini tidak diizinkan.";
}
?>
