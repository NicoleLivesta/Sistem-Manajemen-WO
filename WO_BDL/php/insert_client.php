<?php
include '../php/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $nama = $_POST['nama'];
    $notelp = $_POST['notelp'];
    $tglnikah = $_POST['tglnikah'];
    $alamat = $_POST['alamat'];

    // Prepare SQL statement
    $stmt = $pdo->prepare("INSERT INTO klien (nama_klien, no_telepon, tanggal_pernikahan, alamat_klien) 
                        VALUES (:nama, :notelp, :tglnikah, :alamat)");
    // Execute the statement
    if ($stmt->execute([':nama' => $nama, ':notelp' => $notelp, ':tglnikah' => $tglnikah, ':alamat' => $alamat])) {
        echo "New client added successfully.";
        header("Location: manage_clients.php"); // Redirect to manage clients page
        exit();
    } else {
        echo "Error adding client.";
    }
}
?>