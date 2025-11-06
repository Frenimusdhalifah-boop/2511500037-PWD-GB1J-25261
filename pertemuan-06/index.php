<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Arief</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Ini Header</h1>
        <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
            &#9776;
        </button>
        <nav>
            <ul>
                <li><a href="#home">Beranda</a></li>
                <li><a href="#about">Tentang</a></li>
                <li><a href="#Contact">Kontak</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="home">
            <h2>Selamat datang</h2>
            <p>Ini contoh paragraf HTML.</p>
            <?php
            echo "Hello, World!<br>";
            echo "Nama saya Freni";
            ?>
        </section>

        <section id="about">
            <?php
                $NIM = "2511500037";
                $Nama_Lengkap = "Freni Musdhalifah &#128526;";
                $Tempat_Lahir = "Way Kanan";
                $Tanggal_Lahir = "19 Desember 2004";
                $hobi = "Silat, Bulutangkis, Lari, dan Berpetualangan &#127926;";
                $Pasangan = "Ariel Brillian Samudra &#128525;";
                $Pekerjaan = "Mahasiswa &copy;";
                $Nama_orang_tua ="Ipran Zalzala & Yesi Hani";
                $Nama_kakak = "-";
                $Nama_adik = "Ahmad Hafidz Ikhwan & Ahmad Hafidz Baldan";
                ?>
            <h2>Tentang Saya</h2>
            <p>
                <strong>NIM:</strong>
                <?php echo $NIM; ?> 
            </p>
            <p>
                <strong>Nama Lengkap:</strong>
                <?php echo $Nama_Lengkap; ?>
            </p>
            <p>
                <strong>Tempat Lahir:</strong>
                <?php echo $Tempat_Lahir; ?>
            </p>
            <p>
                <strong>Tanggal Lahir:</strong>
                <?php echo $Tanggal_Lahir; ?>
            </p>
            <p>
                <strong>Hobi:</strong>
                <?php echo $Hobi; ?>
            </p>
            <p>
                <strong>Pasangan:</strong>
                <?php echo $Pasangan; ?>
            </p>
            <P>
                <strong>Pekerjaan:</strong>
                <?php echo $Pekerjaan; ?>
            </P>
            <p>
                <strong>Nama Orang Tua</strong>
                <?php echo $Nama_Orang_Tua; ?>
            </p>
            <p>
                <strong>Nama Kakak:</strong>
                <?php echo $Nama_Kakak; ?>
            </p>
            <p>
                <strong>Nama Adik:</strong>
                <?php echo $Nama_Adik; ?>
            </p>
        
            <?php
$namaMatkul1 = "Algoritma dan Struktur Data";
$sksMatkul1 = 4;
$nilaiHadir1 = 90;
$nilaiTugas1 = 60;
$nilaiUTS1 = 80;
$nilaiUAS1 = 70;

$namaMatkul2 = "Agama";
$sksMatkul2 = 2;
$nilaiHadir2 = 70;
$nilaiTugas2 = 50;
$nilaiUTS2 = 60;
$nilaiUAS2 = 80;

$namaMatkul3 = "Bahasa Inggris"; 
$sksMatkul3 = 5;
$nilaiHadir3 = 80;
$nilaiTugas3 = 75;
$nilaiUTS3 = 80;
$nilaiUAS3 = 85;

$namaMatkul4 = "Geografi";
$sksMatkul4 = 4;
$nilaiHadir4 = 80;
$nilaiTugas4 = 80;
$nilaiUTS4 = 85;
$nilaiUAS4 = 90;

$namaMatkul5 = "Pemrograman Web Dasar";
$sksMatkul5 = 3;
$nilaiHadir5 = 69;
$nilaiTugas5 = 80;
$nilaiUTS5 = 90;
$nilaiUAS5 = 100;


function hitungNilaiAkhir($hadir, $tugas, $uts, $uas) {
    return (0.1 * $hadir) + (0.2 * $tugas) + (0.3 * $uts) + (0.4 * $uas);
}

function tentukanGrade($hadir, $nilaiAkhir) {
    if ($hadir < 70) {
        return "E";
    } elseif ($nilaiAkhir >= 85) {
        return "A";
    } elseif ($nilaiAkhir >= 80) {
        return "A-";
    } elseif ($nilaiAkhir >= 75) {
        return "B+";
    } elseif ($nilaiAkhir >= 70) {
        return "B";
    } elseif ($nilaiAkhir >= 65) {
        return "B-";
    } elseif ($nilaiAkhir >= 60) {
        return "C+";
    } elseif ($nilaiAkhir >= 55) {
        return "C";
    } elseif ($nilaiAkhir >= 50) {
        return "C-";
    } elseif ($nilaiAkhir >= 45) {
        return "D";
    } else {
        return "E";
    }
}

function tentukanMutu($grade) {
    switch ($grade) {
        case "A": return 4.00;
        case "A-": return 3.70;
        case "B+": return 3.30;
        case "B": return 3.00;
        case "B-": return 2.70;
        case "C+": return 2.30;
        case "C": return 2.00;
        case "C-": return 1.70;
        case "D": return 1.00;
        case "E": return 0.00;
        default: return 0.00;
    }
}

function tentukanStatus($grade) {
    if (in_array($grade, ["A", "A-", "B+", "B", "B-", "C+", "C", "C-"])) {
        return "Lulus";
    } else {
        return "Gagal";
    }
}

for ($i = 1; $i <= 5; $i++) {
    $hadir = ${"nilaiHadir$i"};
    $tugas = ${"nilaiTugas$i"};
    $uts = ${"nilaiUTS$i"};
    $uas = ${"nilaiUAS$i"};
    $sks = ${"sksMatkul$i"};

    ${"nilaiAkhir$i"} = hitungNilaiAkhir($hadir, $tugas, $uts, $uas);
    ${"grade$i"} = tentukanGrade($hadir, ${"nilaiAkhir$i"});
    ${"mutu$i"} = tentukanMutu(${"grade$i"});
    ${"bobot$i"} = ${"mutu$i"} * $sks;
    ${"status$i"} = tentukanStatus(${"grade$i"});
}

$totalBobot = $bobot1 + $bobot2 + $bobot3 + $bobot4 + $bobot5;
$totalSKS = $sksMatkul1 + $sksMatkul2 + $sksMatkul3 + $sksMatkul4 + $sksMatkul5;
$IPK = $totalSKS > 0 ? $totalBobot / $totalSKS : 0;
?>

    <h2>Nilai Saya</h2>

    <div class="section" id="ipk">
        <div class="matkul">

            <div><span class="label">Nama Matakuliah ke-1 :</span> <span class="value"><?php echo $namaMatkul1; ?></span></div>
            <div><span class="label">SKS :</span> <span class="value"><?php echo $sksMatkul1; ?></span></div>
            <div><span class="label">Kehadiran :</span> <span class="value"><?php echo $nilaiHadir1; ?></span></div>
            <div><span class="label">Tugas :</span> <span class="value"><?php echo $nilaiTugas1; ?></span></div>
            <div><span class="label">UTS :</span> <span class="value"><?php echo $nilaiUTS1; ?></span></div>
            <div><span class="label">UAS :</span> <span class="value"><?php echo $nilaiUAS1; ?></span></div>
            <div><span class="label">Nilai Akhir :</span> <span class="value"><?php echo number_format($nilaiAkhir1, 2); ?></span></div>
            <div><span class="label">Grade :</span> <span class="value"><?php echo $grade1; ?></span></div>
            <div><span class="label">Angka Mutu :</span> <span class="value"><?php echo number_format($mutu1, 2); ?></span></div>
            <div><span class="label">Bobot :</span> <span class="value"><?php echo number_format($bobot1, 2); ?></span></div>
            <div><span class="label">Status :</span> <span class="value"><?php echo $status1; ?></span></div>

        </div>

        <div class="matkul">

            <div><span class="label">Nama Matakuliah ke-2 :</span> <span class="value"><?php echo $namaMatkul2; ?></span></div>
            <div><span class="label">SKS :</span> <span class="value"><?php echo $sksMatkul2; ?></span></div>
            <div><span class="label">Kehadiran :</span> <span class="value"><?php echo $nilaiHadir2; ?></span></div>
            <div><span class="label">Tugas :</span> <span class="value"><?php echo $nilaiTugas2; ?></span></div>
            <div><span class="label">UTS :</span> <span class="value"><?php echo $nilaiUTS2; ?></span></div>
            <div><span class="label">UAS :</span> <span class="value"><?php echo $nilaiUAS2; ?></span></div>
            <div><span class="label">Nilai Akhir :</span> <span class="value"><?php echo number_format($nilaiAkhir2, 2); ?></span></div>
            <div><span class="label">Grade :</span> <span class="value"><?php echo $grade2; ?></span></div>
            <div><span class="label">Angka Mutu :</span> <span class="value"><?php echo number_format($mutu2, 2); ?></span></div>
            <div><span class="label">Bobot :</span> <span class="value"><?php echo number_format($bobot2, 2); ?></span></div>
            <div><span class="label">Status :</span> <span class="value"><?php echo $status2; ?></span></div>

        </div>

        <div class="matkul">

            <div><span class="label">Nama Matakuliah ke-3 :</span> <span class="value"><?php echo $namaMatkul3; ?></span></div>
            <div><span class="label">SKS :</span> <span class="value"><?php echo $sksMatkul3; ?></span></div>
            <div><span class="label">Kehadiran :</span> <span class="value"><?php echo $nilaiHadir3; ?></span></div>
            <div><span class="label">Tugas :</span> <span class="value"><?php echo $nilaiTugas3; ?></span></div>
            <div><span class="label">UTS :</span> <span class="value"><?php echo $nilaiUTS3; ?></span></div>
            <div><span class="label">UAS :</span> <span class="value"><?php echo $nilaiUAS3; ?></span></div>
            <div><span class="label">Nilai Akhir :</span> <span class="value"><?php echo number_format($nilaiAkhir3, 2); ?></span></div>
            <div><span class="label">Grade :</span> <span class="value"><?php echo $grade3; ?></span></div>
            <div><span class="label">Angka Mutu :</span> <span class="value"><?php echo number_format($mutu3, 2); ?></span></div>
            <div><span class="label">Bobot :</span> <span class="value"><?php echo number_format($bobot3, 2); ?></span></div>
            <div><span class="label">Status :</span> <span class="value"><?php echo $status3; ?></span></div>

        </div>

        <div class="matkul">

            <div><span class="label">Nama Matakuliah ke-4 :</span> <span class="value"><?php echo $namaMatkul4; ?></span></div>
            <div><span class="label">SKS :</span> <span class="value"><?php echo $sksMatkul4; ?></span></div>
            <div><span class="label">Kehadiran :</span> <span class="value"><?php echo $nilaiHadir4; ?></span></div>
            <div><span class="label">Tugas :</span> <span class="value"><?php echo $nilaiTugas4; ?></span></div>
            <div><span class="label">UTS :</span> <span class="value"><?php echo $nilaiUTS4; ?></span></div>
            <div><span class="label">UAS :</span> <span class="value"><?php echo $nilaiUAS4; ?></span></div>
            <div><span class="label">Nilai Akhir :</span> <span class="value"><?php echo number_format($nilaiAkhir4, 2); ?></span></div>
            <div><span class="label">Grade :</span> <span class="value"><?php echo $grade4; ?></span></div>
            <div><span class="label">Angka Mutu :</span> <span class="value"><?php echo number_format($mutu4, 2); ?></span></div>
            <div><span class="label">Bobot :</span> <span class="value"><?php echo number_format($bobot4, 2); ?></span></div>
            <div><span class="label">Status :</span> <span class="value"><?php echo $status4; ?></span></div>

        </div>

        <div class="matkul">

            <div><span class="label">Nama Matakuliah ke-5 :</span> <span class="value"><?php echo $namaMatkul5; ?></span></div>
            <div><span class="label">SKS :</span> <span class="value"><?php echo $sksMatkul5; ?></span></div>
            <div><span class="label">Kehadiran :</span> <span class="value"><?php echo $nilaiHadir5; ?></span></div>
            <div><span class="label">Tugas :</span> <span class="value"><?php echo $nilaiTugas5; ?></span></div>
            <div><span class="label">UTS :</span> <span class="value"><?php echo $nilaiUTS5; ?></span></div>
            <div><span class="label">UAS :</span> <span class="value"><?php echo $nilaiUAS5; ?></span></div>
            <div><span class="label">Nilai Akhir :</span> <span class="value"><?php echo number_format($nilaiAkhir5, 2); ?></span></div>
            <div><span class="label">Grade :</span> <span class="value"><?php echo $grade5; ?></span></div>
            <div><span class="label">Angka Mutu :</span> <span class="value"><?php echo number_format($mutu5, 2); ?></span></div>
            <div><span class="label">Bobot :</span> <span class="value"><?php echo number_format($bobot5, 2); ?></span></div>
            <div><span class="label">Status :</span> <span class="value"><?php echo $status5; ?></span></div>
            
        </div>
    </div>

    <div class="total">
        <div><span class="label">Total Bobot :</span> <span class="value"><?php echo number_format($totalBobot, 2); ?></span></div>
        <div><span class="label">Total SKS :</span> <span class="value"><?php echo $totalSKS; ?></span></div>
        <div><span class="label">IPK :</span> <span class="value"><?php echo number_format($IPK, 2); ?></span></div>
    </div>
</body>
        </section>
        <section id="Contact">
            <section id="contact">
                <h2>Kontak Kami</h2>
                <form action="" method="GET">
                    <label for="txtNama"><span>Nama:</span>
                        <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama" required
                            autocomplete="name">
                    </label>
                    <label for="txtEmail"><span>Email:</span>
                        <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" required
                            autocomplete="email">
                    </label>
                    <label for="txtPesan"><span>Pesan Anda:</span>
                        <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..."
                            required></textarea>
                        <small id="charCount">0/200 karakter</small>
                    </label>
                    <button type="submit">Kirim</button>
                    <button type="reset">Batal</button>
                </form>
            </section>
    </main>
    <footer>
        <p>&copy; 2025 Freni Musdhalifah [2511500037]</p>
    </footer>

    <script src="script.js"></script>
</body>

</html>
