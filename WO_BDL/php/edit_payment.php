<?php
include '../php/db.php';

if (!isset($_GET['id'])) {
    echo "ID acara tidak ditemukan.";
    exit();
}

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM pembayaran WHERE id_pembayaran = :id");
$stmt->execute([':id' => $id]);
$pembayaran = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$pembayaran) {
    echo "Pembayaran tidak ditemukan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Edit Event</title>
    <link rel="stylesheet" href="../css/style.css" />
</head>
<body>
    <header>
        <h1>Edit Event</h1>
        <nav>
            <a href="../index.php">Back to Dashboard</a>
            <a href="manage_payments.php">Manage Payments</a>
        </nav>
    </header>
    <main>
        <form action="update_payment.php" method="POST">
            <input type="hidden" name="id" value="<?= $acara['id_pembayaran'] ?>">

            <?php
            $koneksi = new mysqli('localhost', 'root', '', 'WO_BDL');
            if ($koneksi->connect_error) {
                die("Koneksi gagal: " . $koneksi->connect_error);
            }

            $query_klien = "SELECT id_klien, nama_klien FROM klien ORDER BY nama_klien";
            $result_klien = $koneksi->query($query_klien);

            ?>

            <label for="id_klien">Client:</label>
            <select name="id_klien" id="id_klien" required>
                <option value="">-- Choose Client --</option>
                <?php while ($row = $result_klien->fetch_assoc()): ?>
                <option value="<?= $row['id_klien'] ?>"><?= $row['nama_klien'] ?></option>
             <?php endwhile; ?>
            </select>

    <?php $koneksi->close(); ?>
            <div>
                <label for="tanggal_bayar">Payment Date:</label>
                <input type="date" name="tanggal_bayar" id="tanggal_bayar" required value="<?= $acara['tanggal_bayar'] ?>">
            </div>

            <div>
                <label for="status">Status:</label>
                <select name="status" id="status" required>
                    <option value="Tunas" <?= $pembayaran['status'] == 'Tunai' ? 'selected' : '' ?>>Tunai</option>
                    <option value="Transfer" <?= $pembayaran['status'] == 'Transfer' ? 'selected' : '' ?>>Transfer</option>
                    <option value="Kartu Kredit" <?= $pembayaran['status'] == 'Kartu Kredit' ? 'selected' : '' ?>>Kartu Kredit</option>

                </select>
            </div>

            <div>
                <label for="status">Status:</label>
                <select name="status" id="status" required>
                    <option value="Lunas" <?= $pembayaran['status'] == 'lunas' ? 'selected' : '' ?>>Lunas</option>
                    <option value="Belum lunas" <?= $pembayaran['status'] == 'Belum Lunas' ? 'selected' : '' ?>>Belum Lunas</option>
                </select>
            </div>

            <div>
                <button type="submit">Update Acara</button>
            </div>
        </form>
    </main>
</body>
</html>
