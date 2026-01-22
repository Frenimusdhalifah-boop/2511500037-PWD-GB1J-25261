<?php
  session_start();
  require __DIR__ . '/koneksi.php';
  require_once __DIR__ . '/fungsi.php';

  #cek method form, hanya izinkan POST
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error_biodata'] = 'Akses tidak valid.';
    redirect_ke('read_biodata.php');
  }

  #validasi cid wajib angka dan > 0
  $cid = filter_input(INPUT_POST, 'cid', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
  ]);

  if (!$cid) {
    $_SESSION['flash_error_biodata'] = 'CID Tidak Valid.';
    redirect_ke('edit_biodata.php?cid='. (int)$cid);
  }

  #ambil dan bersihkan (sanitasi) nilai dari form
  $nama    = bersihkan($_POST['txtNamaBio']    ?? '');
  $alamat  = bersihkan($_POST['txtAlamatBio']  ?? '');
  $telepon = bersihkan($_POST['txtTeleponBio'] ?? '');
  $captcha = bersihkan($_POST['txtCaptchaBio'] ?? '');

  #Validasi sederhana
  $errors = []; #ini array untuk menampung semua error yang ada

  if ($nama === '') {
    $errors[] = 'Nama wajib diisi.';
  }

  if ($alamat === '') {
    $errors[] = 'Alamat wajib diisi.';
  }

  if ($telepon === '') {
    $errors[] = 'Telepon wajib diisi.';
  } elseif (!preg_match('/^[0-9+\-\s()]+$/', $telepon)) {
    $errors[] = 'Format telepon tidak valid.';
  }

  if ($captcha === '') {
    $errors[] = 'Pertanyaan wajib diisi.';
  }

  if (mb_strlen($nama) < 3) {
    $errors[] = 'Nama minimal 3 karakter.';
  }

  if (mb_strlen($alamat) < 10) {
    $errors[] = 'Alamat minimal 10 karakter.';
  }

  if (mb_strlen($telepon) < 10) {
    $errors[] = 'Telepon minimal 10 karakter.';
  }

  if ($captcha !== "6") {
    $errors[] = 'Jawaban '. $captcha.' captcha salah.';
  }

  /*
  kondisi di bawah ini hanya dikerjakan jika ada error, 
  simpan nilai lama dan pesan error, lalu redirect (konsep PRG)
  */
  if (!empty($errors)) {
    $_SESSION['old_biodata'] = [
      'nama'    => $nama,
      'alamat'  => $alamat,
      'telepon' => $telepon
    ];

    $_SESSION['flash_error_biodata'] = implode('<br>', $errors);
    redirect_ke('edit_biodata.php?cid='. (int)$cid);
  }

  /*
    Prepared statement untuk anti SQL injection.
    menyiapkan query UPDATE dengan prepared statement 
    (WAJIB WHERE cid = ?)
  */
  $stmt = mysqli_prepare($conn, "UPDATE tbl_biodata 
                                SET cnama = ?, calamat = ?, ctelepon = ? 
                                WHERE cid = ?");
  if (!$stmt) {
    #jika gagal prepare, kirim pesan error (tanpa detail sensitif)
    $_SESSION['flash_error_biodata'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('edit_biodata.php?cid='. (int)$cid);
  }

  #bind parameter dan eksekusi (s = string, i = integer)
  mysqli_stmt_bind_param($stmt, "sssi", $nama, $alamat, $telepon, $cid);

  if (mysqli_stmt_execute($stmt)) { #jika berhasil, kosongkan old value
    unset($_SESSION['old_biodata']);
    /*
      Redirect balik ke read_biodata.php dan tampilkan info sukses.
    */
    $_SESSION['flash_sukses_biodata'] = 'Terima kasih, biodata Anda sudah diperbaharui.';
    redirect_ke('read_biodata.php'); #pola PRG: kembali ke data dan exit()
  } else { #jika gagal, simpan kembali old value dan tampilkan error umum
    $_SESSION['old_biodata'] = [
      'nama'    => $nama,
      'alamat'  => $alamat,
      'telepon' => $telepon,
    ];
    $_SESSION['flash_error_biodata'] = 'Biodata gagal diperbaharui. Silakan coba lagi.';
    redirect_ke('edit_biodata.php?cid='. (int)$cid);
  }
  #tutup statement
  mysqli_stmt_close($stmt);

  redirect_ke('edit_biodata.php?cid='. (int)$cid);
?>