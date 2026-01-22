<?php
// Konfigurasi koneksi database
$host = "localhost";
$user = "root";
$pass = "";  // Pastikan password sesuai dengan pengaturan server Anda
$db   = "db_pwd2025";  // Ganti dengan nama database yang benar jika berbeda

// Membuat koneksi
$conn = mysqli_connect($host, $user, $pass, $db);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Jika koneksi berhasil, Anda bisa menambahkan kode query di sini
// Contoh: $result = mysqli_query($conn, "SELECT * FROM nama_tabel");

// Jangan lupa menutup koneksi setelah selesai
// mysqli_close($conn);
?>