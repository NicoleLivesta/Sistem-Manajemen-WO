<?php
include '../php/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idklien = $_POST['idklien'];
    $namapaket = $_POST['namapaket'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    $stmt = $pdo->prepare("INSERT INTO paket_layanan (id_klien, nama_paket, harga, deskripsi) 
        VALUES (:idklien, :namapaket, :harga, :deskripsi)");
    $success = $stmt->execute([
        ':idklien' => $idklien,
        ':namapaket' => $namapaket,
        ':harga' => $harga,
        ':deskripsi' => $deskripsi
    ]);

    if ($success) {
        header("Location: manage_packages.php"); // Redirect to manage packages page
        exit();
    } else {
        echo "Error adding package.";
    }
}
?>
