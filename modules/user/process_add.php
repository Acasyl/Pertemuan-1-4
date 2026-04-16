<?php
// modules/user/process_add.php - proses simpan mahasiswa
require __DIR__.'/../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim    = isset($_POST['txtnim']) ? $_POST['txtnim'] : '';
    $nama   = isset($_POST['txtnama']) ? $_POST['txtnama'] : '';
    $alamat = isset($_POST['txtalamat']) ? $_POST['txtalamat'] : '';

    $db = new Database();
    // cek dulu apakah NIM sudah terdaftar
    $nim_safe = $db->query("SELECT '".$nim."'"); // hanya untuk memastikan koneksi, bukan escape penuh
    $cek = $db->query("SELECT nim FROM mahasiswa WHERE nim = '".$nim."'");

    if ($cek && $cek->num_rows > 0) {
        echo "NIM sudah terdaftar, silakan gunakan NIM lain. <a href='add.php'>Kembali ke Form</a>";
    } else {
        $data = [
            'nim'    => $nim,
            'nama'   => $nama,
            'alamat' => $alamat
        ];

        $insert = $db->insert('mahasiswa', $data);

        if ($insert) {
            echo "Data berhasil disimpan. <a href='add.php'>Kembali ke Form</a>";
        } else {
            echo "Gagal menyimpan data. <a href='add.php'>Kembali ke Form</a>";
        }
    }
} else {
    header('Location: add.php');
    exit;
}
