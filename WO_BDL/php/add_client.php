<?php include '../php/db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Client</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Add New Client</h1>
        <nav>
            <a href="../index.php">Back to Dashboard</a>
            <a href="manage_clients.php">Manage Clients</a>
        </nav>
    </header>
    <main>
        <h2>Client Information</h2>
        <form action="insert_client.php" method="POST">
            <div>
                <label for="nama_klien">Nama :</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div>
                <label for="no_telepon">No telepon:</label>
                <input type="text" id="notelp" name="notelp" required>
            </div>
            <div>
                <label for="tanggal_pernikahan">tgl pernikahan :</label>
                <input type="date" id="tglnikah" name="tglnikah" required>
            </div>
            <div>
                <label for="alamat_klien">Alamat :</label>
                <textarea id="alamat" name="alamat" required></textarea>
            </div>
            <div>
                <input type="submit" value="Add Client">
            </div>
        </form>
    </main>
</body>
</html>