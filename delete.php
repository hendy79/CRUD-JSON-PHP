<?php

//getting id of the data from url
$id = $_GET['id'];

$file = "anggota.json";

// Mendapatkan file json
$anggota = file_get_contents($file);

// Mendecode anggota.json
$data = json_decode($anggota, true);

// Membaca data array menggunakan foreach
foreach ($data as $key => $d) {
    // Hapus data kedua
    if ($d['nama'] === $id) {
        // Menghapus data array sesuai dengan index
        // Menggantinya dengan elemen baru
        array_splice($data, $key, 1);
    }
}

// Mengencode data menjadi json
$jsonfile = json_encode($data, JSON_PRETTY_PRINT);

// Menyimpan data ke dalam anggota.json
$anggota = file_put_contents($file, $jsonfile);

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

