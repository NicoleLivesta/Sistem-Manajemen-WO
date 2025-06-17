<?php
include '../php/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];
    $nama_acara = $_POST['nama_acara'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_selesai = $_POST['tanggal_selesai'];
    $lokasi = $_POST['lokasi'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare("
        UPDATE acara SET 
            nama_acara = :nama_acara, 
            tanggal_mulai = :tanggal_mulai, 
            tanggal_selesai = :tanggal_selesai,
            lokasi = :lokasi, 
            status = :status 
        WHERE id_acara = :id
    ");

    $success = $stmt->execute([
        ':nama_acara' => $nama_acara,
        ':tanggal_mulai' => $tanggal_mulai,
        ':tanggal_selesai' => $tanggal_selesai,
        ':lokasi' => $lokasi,
        ':status' => $status,
        ':id' => $id
    ]);

    if ($success) {
        header("Location: manage_events.php");
        exit();
    } else {
        echo "Gagal memperbarui data acara.";
    }
} else {
    echo "Metode tidak diperbolehkan.";
}
