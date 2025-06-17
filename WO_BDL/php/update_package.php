<?php
include '../php/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_paket = $_POST['id_paket'];
    $id_klien = $_POST['id_klien'];
    $nama_paket = $_POST['nama_paket'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    $stmt = $pdo->prepare("UPDATE paket_layanan SET id_klien = :id_klien, nama_paket = :nama_paket, harga = :harga, deskripsi = :deskripsi WHERE id_paket = :id");
    $berhasil = $stmt->execute([
        ':id_klien' => $id_klien,
        ':nama_paket' => $nama_paket,
        ':harga' => $harga,
        ':deskripsi' => $deskripsi,
        ':id' => $id_paket
    ]);

    if ($berhasil) {
        header("Location: manage_packages.php");
        exit();
    } else {
        $errorInfo = $stmt->errorInfo();
        echo "Gagal mengupdate data.";
    }
} else {
    echo "Akses tidak valid.";
}
?>
