<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Data Diri - City Light Theme</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url('https://images.unsplash.com/photo-1505761671935-60b3a7427bad?auto=format&fit=crop&w=1920&q=80') no-repeat center center fixed;
            background-size: cover;
            color: #333;
        }

        .overlay {
            background-color: rgba(0, 0, 0, 0.4);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

  
        .container {
            position: relative;
            z-index: 1;
            width: 420px;
            background: rgba(255, 255, 255, 0.85);
            margin: 80px auto;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.3);
            backdrop-filter: blur(6px);
        }

        h2 {
            text-align: center;
            color: #222;
            margin-bottom: 25px;
            font-weight: 600;
        }

        label {
            font-weight: 500;
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
            background-color: #f9f9f9;
        }

        input[type="text"]:focus,
        input[type="date"]:focus,
        select:focus {
            border-color: #5e60ce;
            box-shadow: 0 0 8px rgba(94, 96, 206, 0.5);
            outline: none;
        }

        input[type="submit"] {
            width: 100%;
            background: linear-gradient(135deg, #5e60ce, #64dfdf);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background 0.3s ease, transform 0.2s;
        }

        input[type="submit"]:hover {
            background: linear-gradient(135deg, #6930c3, #56cfe1);
            transform: scale(1.02);
        }

        .hasil {
            background: rgba(255,255,255,0.9);
            border-left: 5px solid #5e60ce;
            border-radius: 10px;
            padding: 15px 20px;
            margin-top: 25px;
            color: #222;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }

        .hasil h3 {
            margin-top: 0;
            color: #333;
        }

        .hasil b {
            color: #111;
        }

        footer {
            text-align: center;
            color: #eee;
            margin-top: 40px;
            font-size: 14px;
            position: relative;
            z-index: 1;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>

    <div class="container">
        <h2>Form Data Diri</h2>
        <form method="post">
            <label>Nama:</label>
            <input type="text" name="nama" required>

            <label>Tanggal Lahir:</label>
            <input type="date" name="tgl_lahir" required>

            <label>Pekerjaan:</label>
            <select name="pekerjaan" required>
                <option value="">-- Pilih Pekerjaan --</option>
                <option value="Programmer">Programmer</option>
                <option value="Desainer">Desainer</option>
                <option value="Guru">Guru</option>
                <option value="Dokter">Dokter</option>
                <option value="Wirausaha">Wirausaha</option>
            </select>

            <input type="submit" value="Kirim">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = $_POST['nama'];
            $tgl_lahir = $_POST['tgl_lahir'];
            $pekerjaan = $_POST['pekerjaan'];

            // Hitung umur
            $tanggal_lahir = new DateTime($tgl_lahir);
            $sekarang = new DateTime();
            $umur = $sekarang->diff($tanggal_lahir)->y;

            // Tentukan gaji berdasarkan pekerjaan
            switch ($pekerjaan) {
                case "Programmer":
                    $gaji = 8000000;
                    break;
                case "Desainer":
                    $gaji = 7000000;
                    break;
                case "Guru":
                    $gaji = 6000000;
                    break;
                case "Dokter":
                    $gaji = 15000000;
                    break;
                case "Wirausaha":
                    $gaji = 9000000;
                    break;
                default:
                    $gaji = 0;
                    break;
            }

            echo "<div class='hasil'>
                    <h3>Hasil Data</h3>
                    Nama: <b>$nama</b><br>
                    Tanggal Lahir: <b>$tgl_lahir</b><br>
                    Umur: <b>$umur tahun</b><br>
                    Pekerjaan: <b>$pekerjaan</b><br>
                    Gaji: <b>Rp " . number_format($gaji, 0, ',', '.') . "</b>
                </div>";
        }
        ?>
    </div>

    <footer>
        © 2025 
    </footer>
</body>
</html>
