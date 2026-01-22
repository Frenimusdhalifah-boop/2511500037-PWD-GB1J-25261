<?php
session_start();
require __DIR__ . './koneksi.php';
require_once __DIR__ . '/fungsi.php';

#cek method form, hanya izinkan POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  $_SESSION['flash_error_data'] = 'Akses tidak valid.';
  redirect_ke('index.php#biodata');
}

#ambil dan bersihkan nilai dari form
$nim       = bersihkan($_POST['txtNim']       ?? '');
$nama      = bersihkan($_POST['txtNmLengkap'] ?? '');
$tempat    = bersihkan($_POST['txtT4Lhr']     ?? '');
$tanggal   = bersihkan($_POST['txtTglLhr']    ?? '');
$hobi      = bersihkan($_POST['txtHobi']      ?? '');
$pasangan  = bersihkan($_POST['txtPasangan']  ?? '');
$pekerjaan = bersihkan($_POST['txtKerja']     ?? '');
$ortu      = bersihkan($_POST['txtNmOrtu']    ?? '');
$kakak     = bersihkan($_POST['txtNmKakak']   ?? '');
$adik      = bersihkan($_POST['txtNmAdik']    ?? '');

#Validasi sederhana
$errors = []; #ini array untuk menampung semua error yang ada

if ($nim === '') {
  $errors[] = 'NIM wajib diisi.';
}

if ($nama === '') {
  $errors[] = 'Nama lengkap wajib diisi.';
}

if ($tempat === '') {
  $errors[] = 'Tempat lahir wajib diisi.';
}

if ($tanggal === '') {
  $errors[] = 'Tanggal lahir wajib diisi.';
} elseif (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $tanggal)) {
  $errors[] = 'Format tanggal lahir tidak valid (gunakan YYYY-MM-DD).';
}

if ($hobi === '') {
  $errors[] = 'Hobi wajib diisi.';
}

if ($pekerjaan === '') {
  $errors[] = 'Pekerjaan wajib diisi.';
}

if ($ortu === '') {
  $errors[] = 'Nama orang tua wajib diisi.';
}

# Validasi panjang minimal untuk beberapa field
if (mb_strlen($nama) < 3) {
  $errors[] = 'Nama lengkap minimal 3 karakter.';
}

if (mb_strlen($hobi) < 3) {
  $errors[] = 'Hobi minimal 3 karakter.';
}

if (mb_strlen($pekerjaan) < 3) {
  $errors[] = 'Pekerjaan minimal 3 karakter.';
}

/*
kondisi di bawah ini hanya dikerjakan jika ada error, 
simpan nilai lama dan pesan error, lalu redirect (konsep PRG)
*/
if (!empty($errors)) {
  $_SESSION['old_data'] = [
    'nim'       => $nim,
    'nama'      => $nama,
    'tempat'    => $tempat,
    'tanggal'   => $tanggal,
    'hobi'      => $hobi,
    'pasangan'  => $pasangan,
    'pekerjaan' => $pekerjaan,
    'ortu'      => $ortu,
    'kakak'     => $kakak,
    'adik'      => $adik,
  ];

  $_SESSION['flash_error_data'] = implode('<br>', $errors);
  redirect_ke('index.php#biodata');
}

# Jika validasi lolos, simpan biodata ke session
$arrBiodata = [
  "nim"       => $nim,
  "nama"      => $nama,
  "tempat"    => $tempat,
  "tanggal"   => $tanggal,
  "hobi"      => $hobi,
  "pasangan"  => $pasangan,
  "pekerjaan" => $pekerjaan,
  "ortu"      => $ortu,
  "kakak"     => $kakak,
  "adik"      => $adik,
];
$_SESSION["biodata"] = $arrBiodata;

# Kosongkan old value dan beri pesan sukses
unset($_SESSION['old_data']);
$_SESSION['flash_sukses_data'] = 'Biodata berhasil disimpan.';

# Redirect kembali ke halaman about (pola PRG)
redirect_ke('index.php#biodata');
?>