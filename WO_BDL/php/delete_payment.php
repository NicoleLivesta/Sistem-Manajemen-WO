<?php
include '../php/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM pembayaran WHERE id_pembayaran = :id");
    if ($stmt->execute([':id' => $id])) {
        header("Location: manage_payments.php"); // Redirect after deletion
        exit();
    } else {
        echo "Error deleting client.";
    }
} else {
    echo "Invalid client ID.";
}
?>
