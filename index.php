<<<<<<< HEAD
<?php 
include("koneksi.php"); 

// query untuk menampilkan data 
$sql = 'SELECT * FROM data_barang'; 
$result = mysqli_query($conn, $sql); 

?> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <link href="style.css" rel="stylesheet" type="text/css" /> 
    <title>Data Barang</title> 
</head> 
<body> 
    <div class="container"> 
        <h1>Data Barang</h1> 
        <div class="main"> 
            <p><a href="tambah.php">Tambah Barang</a></p> 
            <table> 
            <tr> 
                <th>Gambar</th> 
                <th>Nama Barang</th> 
                <th>Katagori</th> 
                <th>Harga Jual</th> 
                <th>Harga Beli</th> 
                <th>Stok</th> 
                <th>Aksi</th> 
            </tr> 
            <?php if($result): ?> 
            <?php while($row = mysqli_fetch_array($result)): ?> 
            <tr> 
                <td><img src="<?= $row['gambar'];?>" alt="<?= $row['nama'];?>"></td> 
                <td><?= $row['nama'];?></td> 
                <td><?= $row['kategori'];?></td> 
                <td><?= $row['harga_jual'];?></td> 
                <td><?= $row['harga_beli'];?></td> 
                <td><?= $row['stok'];?></td> 
                <td>
                    <a href="ubah.php?id=<?= $row['id_barang'];?>">Ubah</a>
                    <a href="hapus.php?id=<?= $row['id_barang'];?>">Hapus</a>
                </td> 
            </tr> 
            <?php endwhile; else: ?> 
            <tr> 
                <td colspan="7">Belum ada data</td> 
            </tr> 
            <?php endif; ?> 
            </table> 
        </div> 
    </div> 
</body> 
</html> 
=======
<?php
// Front controller + routing
$base = __DIR__;
require_once $base . '/config/database.php';
if (session_status() === PHP_SESSION_NONE) session_start();

include $base . '/views/header.php';

$page = isset($_GET['page']) ? trim($_GET['page']) : '';
// Default: kalau belum login tampilkan login, kalau sudah login tampilkan dashboard
$view = empty($_SESSION['auth'])
    ? ($base . '/modules/auth/login.php')
    : ($base . '/views/dashboard.php');

if ($page !== '') {
    $clean = str_replace(['..', '\\'], '', $page);
    $candidate = $base . '/modules/' . $clean . '.php';
    // Require login for user/* pages
    if (str_starts_with($clean, 'user/') && empty($_SESSION['auth'])) {
        $candidate = $base . '/modules/auth/login.php';
    }
    if (is_file($candidate)) {
        $view = $candidate;
    } else {
        http_response_code(404);
        echo '<main><h2>404 - Halaman tidak ditemukan</h2></main>';
        $view = null;
    }
}

if ($view) include $view;

include $base . '/views/footer.php';
>>>>>>> fff3c6c332d77b482cddbf5dc5924d1b0d273caf
