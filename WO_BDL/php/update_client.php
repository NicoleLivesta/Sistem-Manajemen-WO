<?php
include '../php/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $notelp = $_POST['notelp'];
    $tglnikah = $_POST['tglnikah'];
    $alamat = $_POST['alamat'];

    $updateStmt = $pdo->prepare("UPDATE klien SET nama_klien = :nama, no_telepon = :notelp, tanggal_pernikahan = :tglnikah, alamat_klien = :alamat WHERE id_klien = :id");
    $success = $updateStmt->execute([
        ':nama' => $nama,
        ':notelp' => $notelp,
        ':tglnikah' => $tglnikah,
        ':alamat' => $alamat,
        ':id' => $id
    ]);

    if ($success) {
        header("Location: manage_clients.php"); // Redirect back to clients list
        exit();
    } else {
        echo "Error updating client.";
    }
} else {
    echo "Invalid request method.";
}
?>
