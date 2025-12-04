<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_pwd2025";

$conn = mysqli_connet($host, $use, $pss, $db);

if (!$conn) {
    die("koneksi gagal: " . mysqli_connect_error());
}