<?php include '../php/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Clients</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Manage Clients</h1>
        <nav>
            <a href="../index.php">Back to Dashboard</a>
        </nav>
    </header>
    <main>
        <h2>Client List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAMA</th>
                    <th>NO TELEPON</th>
                    <th>TANGGAL PERNIKAHAN</th>
                    <th>ALAMAT</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT * FROM klien");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                        <td>{$row['id_klien']}</td>
                        <td>{$row['nama_klien']}</td>
                        <td>{$row['no_telepon']}</td>
                        <td>{$row['tanggal_pernikahan']}</td>
                        <td>{$row['alamat_klien']}</td>
                        <td>
                            <a href='edit_client.php?id={$row['id_klien']}'>Edit</a> | 
                            <a href='delete_client.php?id={$row['id_klien']}'>Delete</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="add_client.php" class="btn">Add New Client</a>
    </main>
</body>
</html>
