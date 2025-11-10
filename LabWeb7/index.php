<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 7 - Tugas habis uts</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        h2 { border-bottom: 2px solid #ccc; padding-bottom: 10px; }
        .data-display, .result-box { margin-top: 20px; padding: 15px; border: 1px solid #007bff; background-color: #e9f5ff; border-radius: 5px; }
        .error { color: red; }
        label { display: inline-block; width: 150px; margin-bottom: 10px; }
        input[type="text"], select { padding: 8px; width: 200px; }
    </style>
</head>
<body>

    <h2>1. Data Mahasiswa & PHP Variables</h2>
    <?php
        $nama_mhs = "Habib Fatih Zanjabilah";
        $nim_mhs = 312410135;
        $matkul = "Pemrograman Web1";
    ?>
    <p><strong>Nama:</strong> <?= $nama_mhs ?></p>
    <p><strong>NIM:</strong> <?= $nim_mhs ?></p>
    <p><strong>Matkul:</strong> <?= $matkul ?></p>
    
    <hr>

    <h2>2. Form Input Tugas Praktikum</h2>
    <form method="POST">
        <label for="nama">Nama Lengkap:</label>
        <input type="text" name="nama" required><br>

        <label for="tgl_lahir">Tanggal Lahir:</label>
        <input type="date" name="tgl_lahir" required><br>

        <label for="pekerjaan">Pilih Pekerjaan:</label>
        <select name="pekerjaan" required>
            <option value="">-- Pilih --</option>
            <option value="programmer">Programmer (Rp 10.000.000)</option>
            <option value="designer">Designer (Rp 7.500.000)</option>
            <option value="analyst">Data Analyst (Rp 8.000.000)</option>
        </select><br>

        <input type="submit" value="Hitung Hasil">
    </form>

    <?php
    // Cek apakah form sudah disubmit menggunakan metode POST
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
        $nama = $_POST['nama'];
        $tgl_lahir_str = $_POST['tgl_lahir'];
        $pekerjaan = $_POST['pekerjaan'];

        // 1. Menghitung Umur
        try {
            $tgl_lahir_obj = new DateTime($tgl_lahir_str);
            $sekarang = new DateTime();
            $umur = $sekarang->diff($tgl_lahir_obj)->y;
        } catch (Exception $e) {
            $umur = "<span class='error'>Tanggal lahir tidak valid.</span>";
        }

        // 2. Menentukan Gaji berdasarkan Pekerjaan (Menggunakan Kondisi Switch)
        $gaji = 0;
        $pekerjaan_label = "";
        
        switch ($pekerjaan) {
            case 'programmer':
                $gaji = 10000000;
                $pekerjaan_label = "Programmer";
                break;
            case 'designer':
                $gaji = 7500000;
                $pekerjaan_label = "Designer";
                break;
            case 'analyst':
                $gaji = 8000000;
                $pekerjaan_label = "Data Analyst";
                break;
            default:
                $gaji = 0;
                $pekerjaan_label = "<span class='error'>Pekerjaan tidak diketahui.</span>";
        }
        
        // Menampilkan Output
        echo '<div class="result-box">';
        echo '<h3>Hasil Perhitungan</h3>';
        echo "<p><strong>Nama:</strong> $nama</p>";
        echo "<p><strong>Tanggal Lahir:</strong> $tgl_lahir_str</p>";
        echo "<p><strong>Umur Anda:</strong> $umur tahun</p>";
        echo "<p><strong>Pekerjaan:</strong> $pekerjaan_label</p>";
        echo "<p><strong>Estimasi Gaji:</strong> Rp. " . number_format($gaji, 0, ',', '.') . "</p>";
        echo '</div>';
    }
    ?>
    
    <hr>
    
    <h2>3. Demonstrasi Konsep PHP Dasar</h2>
    
    <h3>Operator (Gaji Bersih)</h3>
    <?php
        $gaji_kotor = 1000000;
        $pajak_persen = 0.1; // 10%
        $thp = $gaji_kotor - ($gaji_kotor * $pajak_persen);
        echo "<p>Gaji Kotor (Rp 1.000.000), Pajak 10%.</p>";
        echo "GAJI SEBELUM PAJAK = Rp. " . number_format($gaji_kotor, 0, ',', '.') . "<br>";
        echo "GAJI SETELAH PAJAK = Rp. " . number_format($thp, 0, ',', '.') . "</p>";
    ?>

    <h3>Kondisi IF-ELSE (Hari)</h3>
    <?php
        $nama_hari = date("l");
        echo "<p>Hari ini (" . $nama_hari . ") dalam Bahasa Indonesia: ";
        if ($nama_hari == "Sunday") {
            echo "Minggu";
        } elseif ($nama_hari == "Monday") {
            echo "Senin";
        } elseif ($nama_hari == "Tuesday") {
            echo "Selasa";
        } elseif ($nama_hari == "Wednesday") {
            echo "Rabu";
        } elseif ($nama_hari == "Thursday") {
            echo "Kamis";
        } elseif ($nama_hari == "Friday") {
            echo "Jumat";
        } else {
            echo "Sabtu";
        }
        echo "</p>";
    ?>
    
    <h3>Perulangan FOR (1-10)</h3>
    <?php
        echo "Perulangan 1 sampai 10: <br />";
        for ($i=1; $i<=10; $i++) {
            echo "Perulangan ke: " . $i . '<br />';
        }
    ?>

    <h3>Perulangan DO-WHILE (1-10)</h3>
    <?php
        $i=1;
        echo "Perulangan 1 sampai 10: <br />";
        do {
            echo "Perulangan ke: " . $i . '<br />';
            $i++;
        } while ($i<=10);
    ?>

</body>
</html>