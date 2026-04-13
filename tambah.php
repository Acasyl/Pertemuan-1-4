<?php 
error_reporting(E_ALL); 
include_once 'koneksi.php'; 
 
if (isset($_POST['submit'])) 
{ 
    $nama = $_POST['nama']; 
    $kategori = $_POST['kategori']; 
    $harga_jual = $_POST['harga_jual']; 
    $harga_beli = $_POST['harga_beli']; 
    $stok = $_POST['stok']; 
    $file_gambar = $_FILES['file_gambar']; 
    $gambar = null; 

    if ($file_gambar['error'] == 0) 
    { 
        $filename = str_replace(' ', '_', $file_gambar['name']); 
        $destination = dirname(__FILE__) . '/gambar/' . $filename; 
        if (move_uploaded_file($file_gambar['tmp_name'], $destination)) 
        { 
            $gambar = 'gambar/' . $filename; 
        } 
    } 

    $sql = "INSERT INTO data_barang (nama, kategori, harga_jual, harga_beli, stok, gambar)
            VALUES ('{$nama}', '{$kategori}', '{$harga_jual}', '{$harga_beli}', '{$stok}', '{$gambar}')";

    $result = mysqli_query($conn, $sql); 
    header('location: index.php'); 
}
?> 

<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <link href="style.css" rel="stylesheet" type="text/css" /> 
    <title>Tambah Barang</title> 

    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 700px;
            margin: 20px auto;
        }
        h1 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .input {
            margin-bottom: 12px;
        }
        .input label {
            display: inline-block;
            width: 150px;
            font-size: 16px;
            vertical-align: top;
        }
        .input input, 
        .input select {
            width: 250px;
            padding: 5px;
            font-size: 14px;
        }
        .submit input {
            padding: 7px 18px;
            background: #0066FF;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .submit input:hover {
            background: #004ECC;
        }
    </style>
</head> 

<body> 
<div class="container"> 
    <h1>Tambah Barang</h1> 

    <div class="main"> 
        <form method="post" action="tambah.php" enctype="multipart/form-data"> 

            <div class="input"> 
                <label>Nama Barang</label> 
                <input type="text" name="nama" required/> 
            </div> 

            <div class="input"> 
                <label>Kategori</label> 
                <select name="kategori">
                    <option value="Komputer">Komputer</option> 
                    <option value="Elektronik">Elektronik</option> 
                    <option value="Hand Phone">Hand Phone</option> 
                </select>  
            </div> 

            <div class="input"> 
                <label>Harga Jual</label> 
                <input type="text" name="harga_jual" required/> 
            </div> 

            <div class="input"> 
                <label>Harga Beli</label> 
                <input type="text" name="harga_beli" required/> 
            </div> 

            <div class="input"> 
                <label>Stok</label> 
                <input type="text" name="stok" required/> 
            </div> 

            <div class="input"> 
                <label>File Gambar</label> 
                <input type="file" name="file_gambar"/> 
            </div> 

            <div class="submit"> 
                <input type="submit" name="submit" value="Simpan" /> 
            </div> 

        </form> 
    </div>
</div> 
</body> 
</html>
