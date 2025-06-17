<?php
include '../php/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM paket_layanan WHERE id_paket = :id");
    if ($stmt->execute([':id' => $id])) {
        header("Location: manage_packages.php"); // Redirect after deletion
        exit();
    } else {
        echo "Error deleting package.";
    }
} else {
    echo "Invalid package ID.";
}
?>
