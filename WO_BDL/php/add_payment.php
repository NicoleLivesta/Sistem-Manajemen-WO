<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Daftar Acara</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header>
    <h1>Add Daftar Event</h1>
    <nav>
        <a href="../index.php">Back to Dashboard</a>
        <a href="manage_payments.php">Manage Payment</a>
    </nav>
</header>

<form action="insert_payment.php" method="POST">
    <input type="hidden" name="id_acara" value="">
    
    <?php
    $koneksi = new mysqli('localhost', 'root', '', 'WO_BDL');
    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

    // Query klien
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
        <input type="date" name="tanggal_bayar" id="tanggal_bayar" required>
    </div>

    <div>
        <label for="metode">Method:</label>
        <select name="metode" id="metode" required>
            <option value="tunai">Tunai</option>
            <option value="transfer">Transfer</option>
            <option value="kartu kredit">Kartu Kredit</option>
        </select>
    </div>

    <div>
        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="lunas">Lunas</option>
            <option value="belum lunas">Belum Lunas</option>
        </select>
    </div>

    <div>
        <button type="submit">Simpan Data</button>
    </div>
</form>
</body>
</html>
