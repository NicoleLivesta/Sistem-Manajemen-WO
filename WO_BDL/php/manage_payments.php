<?php include '../php/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Payments</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Manage Payments</h1>
        <nav>
            <a href="../index.php">Back to Dashboard</a>
        </nav>
    </header>
    <main>
        <h2>Payment List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Client</th>
                    <th>Payment Date</th>
                    <th>Method</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("
                    SELECT pembayaran.*, klien.nama_klien
                    FROM pembayaran
                    JOIN klien ON pembayaran.id_klien = klien.id_klien
                ");

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                        <td>{$row['id_pembayaran']}</td>
                        <td>{$row['nama_klien']}</td>
                        <td>{$row['tanggal']}</td>
                        <td>{$row['metode']}</td>
                        <td>{$row['status']}</td>
                        <td>
                            <a href='edit_payment.php?id={$row['id_pembayaran']}'>Edit</a>
                            <a href='delete_payment.php?id={$row['id_pembayaran']}'>Delete</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="add_payment.php" class="btn">Add New Payment</a>
    </main>
</body>
</html>
