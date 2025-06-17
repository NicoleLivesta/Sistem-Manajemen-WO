<?php
// proses_tambah_acara.php
$koneksi = new mysqli('localhost', 'root', '', 'WO_BDL');

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$id_klien = $_POST['id_klien'];
$nama_acara = $_POST['nama_acara'];
$tanggal_mulai = $_POST['tanggal_mulai'];
$tanggal_selesai = $_POST['tanggal_selesai'];
$lokasi = $_POST['lokasi'];
$status = $_POST['status'];

// Validasi foreign key
$check = $koneksi->prepare("SELECT id_klien FROM klien WHERE id_klien = ?");
$check->bind_param("i", $id_klien);
$check->execute();
$check->store_result();

if ($check->num_rows == 0) {
    die("Error: Klien tidak valid");
}

$stmt = $koneksi->prepare("INSERT INTO acara (id_klien, nama_acara, tanggal_mulai, tanggal_selesai, lokasi, status) 
                          VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isssss", $id_klien, $nama_acara, $tanggal_mulai, $tanggal_selesai, $lokasi, $status);

if ($stmt->execute()) {
    echo "New client added successfully.";
        header("Location: manage_events.php"); // Redirect to manage clients page
        exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$koneksi->close();
?>