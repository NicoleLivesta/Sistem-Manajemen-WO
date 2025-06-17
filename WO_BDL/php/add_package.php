<?php include '../php/db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Add Package</title>
    <link rel="stylesheet" href="../css/style.css" />
</head>
<body>
    <header>
        <h1>Add New Package</h1>
        <nav>
            <a href="../index.php">Back to Dashboard</a>
            <a href="manage_packages.php">Manage Packages</a>
        </nav>
    </header>
    <main>
        <form action="insert_package.php" method="POST">
            <div>
                <label for="id_Klien">Id Klien : </label>
                <input type="text" id="idklien" name="idklien" required />
            </div>    
            <div>
                <label for="nama_paket">Nama Paket : </label>
                <input type="text" id="namapaket" name="namapaket" required />
            </div>
            <div>
                <label for="harga">Harga : </label>
                <input type="number" step="0.01" id="harga" name="harga" required />
            </div>
            <div>
                <label for="deskripsi">Deskripsi : </label>
                <textarea id="deskripsi" name="deskripsi" required></textarea>
            </div>
            <div>
                <input type="submit" value="Add Package" />
            </div>
        </form>
    </main>
</body>
</html>

