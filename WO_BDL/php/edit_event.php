<?php
include '../php/db.php';

if (!isset($_GET['id'])) {
    echo "ID acara tidak ditemukan.";
    exit();
}

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM acara WHERE id_acara = :id");
$stmt->execute([':id' => $id]);
$acara = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$acara) {
    echo "Acara tidak ditemukan.";
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
            <a href="manage_events.php">Manage Events</a>
        </nav>
    </header>
    <main>
        <form action="update_event.php" method="POST">
            <input type="hidden" name="id" value="<?= $acara['id_acara'] ?>">

            <div>
                <label for="nama_acara">Nama Acara:</label>
                <input type="text" name="nama_acara" id="nama_acara" required value="<?= htmlspecialchars($acara['nama_acara']) ?>">
            </div>

            <div>
                <label for="tanggal_mulai">Tanggal Mulai:</label>
                <input type="date" name="tanggal_mulai" id="tanggal_mulai" required value="<?= $acara['tanggal_mulai'] ?>">
            </div>

            <div>
                <label for="tanggal_selesai">Tanggal Selesai:</label>
                <input type="date" name="tanggal_selesai" id="tanggal_selesai" required value="<?= $acara['tanggal_selesai'] ?>">
            </div>

            <div>
                <label for="lokasi">Lokasi:</label>
                <input type="text" name="lokasi" id="lokasi" required value="<?= htmlspecialchars($acara['lokasi']) ?>">
            </div>

            <div>
                <label for="status">Status:</label>
                <select name="status" id="status" required>
                    <option value="selesai" <?= $acara['status'] == 'selesai' ? 'selected' : '' ?>>Selesai</option>
                    <option value="belum selesai" <?= $acara['status'] == 'belum selesai' ? 'selected' : '' ?>>Belum Selesai</option>
                </select>
            </div>

            <div>
                <button type="submit">Update Acara</button>
            </div>
        </form>
    </main>
</body>
</html>
