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
            <a href="manage_events.php">Manage Events</a>
        </nav>
    </header>
    
    <form action="insert_event.php" method="POST">
        <input type="hidden" name="id_acara" value="">
        
        <?php
        $koneksi = new mysqli('localhost', 'root', '', 'WO_BDL');
        if ($koneksi->connect_error) {
            die("Koneksi gagal: " . $koneksi->connect_error);
        }

        $query = "SELECT id_klien, nama_klien FROM klien ORDER BY nama_klien";
        $result = $koneksi->query($query);
        ?>

        <label for="id_klien">Klien:</label>
        <select name="id_klien" id="id_klien" required>
            <option value="">-- Pilih Klien --</option>
            <?php while ($row = $result->fetch_assoc()): ?>
                <option value="<?= $row['id_klien'] ?>"><?= $row['nama_klien'] ?></option>
            <?php endwhile; ?>
        </select>

        <?php $koneksi->close(); ?>

        
        <div>
            <label for="nama_acara">Nama Acara:</label>
            <input type="text" name="nama_acara" id="nama_acara" required>
        </div>
        
        <div>
            <label for="tanggal_mulai">Tanggal Mulai:</label>
            <input type="date" name="tanggal_mulai" id="tanggal_mulai" required>
        </div>
        
        <div>
            <label for="tanggal_selesai">Tanggal Selesai:</label>
            <input type="date" name="tanggal_selesai" id="tanggal_selesai" required>
        </div>
        
        <div>
            <label for="lokasi">Lokasi:</label>
            <input type="text" name="lokasi" id="lokasi" required>
        </div>
        
        <div>
            <label for="status">Status:</label>
            <select name="status" id="status" required>
                <option value="selesai">Selesai</option>
                <option value="belum selesai">Belum Selesai</option>
            </select>
        </div>
        
        <div>
            <button type="submit">Simpan Acara</button>
        </div>
    </form>
</body>
</html>