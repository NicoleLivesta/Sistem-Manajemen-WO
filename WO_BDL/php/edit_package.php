<?php
include '../php/db.php';

if (!isset($_GET['id'])) {
    echo "Client ID is missing.";
    exit();
}

$id = $_GET['id'];

// Fetch existing client data
$stmt = $pdo->prepare("SELECT p.id_paket, k.id_klien, k.nama_klien, p.nama_paket
        , p.harga, p.deskripsi FROM paket_layanan p INNER JOIN klien k 
        WHERE p.id_klien = k.id_klien AND p.id_paket = :id");
$stmt->execute([':id' => $id]);
$package = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$package) {
    echo "Client not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Package</title>
    <link rel="stylesheet" href="../css/style.css" />
</head>
<body>
    <header>
        <h1>Edit Package</h1>
        <nav>
            <a href="../index.php">Back to Dashboard</a>
            <a href="manage_packages.php">Manage Clients</a>
        </nav>
    </header>
    <main>
        <form action="update_package.php" method="POST">
        <input type="hidden" id="id_paket" name="id_paket" value="<?= htmlspecialchars($package['id_paket']) ?>" required>    
        <div>
                <label for="id_klien">Id Klien :</label>
                <input type="text" id="id_klien" name="id_klien" value="<?= htmlspecialchars($package['id_klien']) ?>" required>
            </div>
            <div>
                <label for="nama_paket">Nama Paket :</label>
                <input type="text" id="nama_paket" name="nama_paket" value="<?= htmlspecialchars($package['nama_paket']) ?>" required>
            </div>
            <div>
                <label for="harga">Harga :</label>
                <input type="number" id="harga" name="harga" value="<?= htmlspecialchars($package['harga']) ?>" required>
            </div>
            <div>
                <label for="deskripsi">Deskripsi :</label>
                <textarea id="deskripsi" name="deskripsi" required><?= htmlspecialchars($package['deskripsi']) ?></textarea>
            </div>
            <div>
                <input type="submit" value="Update Package">
            </div>
        </form>
    </main>
</body>
</html>
