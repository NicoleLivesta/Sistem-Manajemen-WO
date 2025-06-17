<?php
include '../php/db.php';

if (!isset($_GET['id'])) {
    echo "Client ID is missing.";
    exit();
}

$id = $_GET['id'];

// Fetch existing client data
$stmt = $pdo->prepare("SELECT * FROM klien WHERE id_klien = :id");
$stmt->execute([':id' => $id]);
$client = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$client) {
    echo "Client not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Client</title>
    <link rel="stylesheet" href="../css/style.css" />
</head>
<body>
    <header>
        <h1>Edit Client</h1>
        <nav>
            <a href="../index.php">Back to Dashboard</a>
            <a href="manage_clients.php">Manage Clients</a>
        </nav>
    </header>
    <main>
        <form action="update_client.php" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($client['id_klien']) ?>">
            <div>
                <label for="nama">Nama :</label>
                <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($client['nama_klien']) ?>" required>
            </div>
            <div>
                <label for="notelp">No telepon :</label>
                <input type="text" id="notelp" name="notelp" value="<?= htmlspecialchars($client['no_telepon']) ?>" required>
            </div>
            <div>
                <label for="tglnikah">Tanggal Pernikahan :</label>
                <input type="date" id="tglnikah" name="tglnikah" value="<?= htmlspecialchars($client['tanggal_pernikahan']) ?>" required>
            </div>
            <div>
                <label for="alamat">Alamat :</label>
                <textarea id="alamat" name="alamat" required><?= htmlspecialchars($client['alamat_klien']) ?></textarea>
            </div>
            <div>
                <input type="submit" value="Update Client">
            </div>
        </form>
    </main>
</body>
</html>
