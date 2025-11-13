<?php 
    session_start();
    $sesnama = $_POST["txtNama"];
    $sesemail = $_POST["txtEmail"];
    $sespesan = $_POST["txtPesan"];
    $_SESSION["sesnama"] = $sesnama;
    $_SESSION["sesemail"] = $sesemail;
    $_SESSION["sespesan"] = $sespesan;
    
    $sesnim = $_POST["txtNim"];
    $sesnama = $_POST["txtNama1"];
    $sesTempat_lahir = $_POST["txtTempat_lahir"];
    $sesTanggal_lahir = $_POST["txtTanggal_lahir"];
    $sesHobi = $_POST["txtHobi"];
    $sesPasangan = $_POST["txtPasangan"];
    $sesPekerjaan = $_POST["txtPekerjaan"];
    $sesNama_ortu = $_POST["txtNama_ortu"];
    $sesNama_kakak = $_POST["txtNama_kakak"];
    $sesNama_adik = $_POST["txtNama_adik"];
    $_SESSION["sesnim"] = $sesnim;
    $_SESSION["sesnama"] = $sesnama;
    $_SESSION["sesTempat_lahir"] = $sesTempat_lahir;
    $_SESSION["sesTanggal_lahir"] = $sesTanggal_lahir;
    $_SESSION["sesHobi"] = $sesHobi;
    $_SESSION["sesPasangan"] = $sesPasangan;
    $_SESSION["sesPekerjaan"] = $sesPekerjaan;
    $_SESSION["sesNama_ortu"] = $sesNama_ortu;
    $_SESSION["sesNama_kakak"] = $sesNama_kakak;
    $_SESSION["sesNama_adik"] = $sesNama_adik;
    header("Location: index.php");
?>
