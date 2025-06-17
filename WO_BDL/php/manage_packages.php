<?php include '../php/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Packages</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Manage Service Packages</h1>
        <nav>
            <a href="../index.php">Back to Dashboard</a>
        </nav>
    </header>
    <main>
        <h2>Service Package List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID PAKET</th>
                    <th>NAMA KLIEN</th>
                    <th>NAMA PAKET</th>
                    <th>HARGA</th>
                    <th>DESKRIPSI</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT p.id_paket, k.nama_klien, p.nama_paket
                        , p.harga, p.deskripsi FROM paket_layanan p INNER JOIN klien k WHERE p.id_klien = k.id_klien");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                        <td>{$row['id_paket']}</td>
                        <td>{$row['nama_klien']}</td>
                        <td>{$row['nama_paket']}</td>
                        <td>{$row['harga']}</td>
                        <td>{$row['deskripsi']}</td>
                        <td>
                            <a href='edit_package.php?id={$row['id_paket']}'>Edit</a>
                            <a href='delete_package.php?id={$row['id_paket']}'>Delete</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="add_package.php" class="btn">Add New Package</a>
    </main>
</body>
</html>
