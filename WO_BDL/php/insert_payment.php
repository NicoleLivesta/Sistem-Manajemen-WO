<?php
// insert_payment.php

$koneksi = new mysqli('localhost', 'root', '', 'WO_BDL');

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil data dari form
$id_klien       = $_POST['id_klien'];
$tanggal_bayar  = $_POST['tanggal_bayar'];
$metode         = $_POST['metode'];
$status         = $_POST['status'];

// Validasi foreign key (pastikan klien dan acara valid)
$cek_klien = $koneksi->prepare("SELECT id_klien FROM klien WHERE id_klien = ?");
$cek_klien->bind_param("i", $id_klien);
$cek_klien->execute();
$cek_klien->store_result();

if ($cek_klien->num_rows == 0) {
    die("Error: Klien tidak ditemukan.");
}

// Proses insert pembayaran
$stmt = $koneksi->prepare("INSERT INTO pembayaran (id_klien, tanggal, metode, status)
                           VALUES (?, ?, ?, ?)");
$stmt->bind_param("isss", $id_klien, $tanggal_bayar, $metode, $status);

if ($stmt->execute()) {
    echo "Pembayaran berhasil ditambahkan.";
    header("Location: manage_payments.php"); // Redirect jika sukses
    exit();
} else {
    echo "Terjadi kesalahan saat menyimpan data: " . $stmt->error;
}

$stmt->close();
$koneksi->close();
?>
