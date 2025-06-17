<?php include '../php/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Events</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Manage Events</h1>
        <nav>
            <a href="../index.php">Back to Dashboard</a>
        </nav>
    </header>
    <main>
        <h2>Event List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Client ID</th>
                    <th>Name Client</th>
                    <th>Name Event</th>
                    <th>Start Date</th>
                    <th>Finish Date</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
$stmt = $pdo->query("
    SELECT acara.*, klien.nama_klien 
    FROM acara 
    JOIN klien ON acara.id_klien = klien.id_klien
");

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
        <td>{$row['id_acara']}</td>
        <td>{$row['id_klien']}</td>
        <td>{$row['nama_klien']}</td> 
        <td>{$row['nama_acara']}</td>
        <td>{$row['tanggal_mulai']}</td>
        <td>{$row['tanggal_selesai']}</td>
        <td>{$row['lokasi']}</td>
        <td>{$row['status']}</td>
        <td>
            <a href='edit_event.php?id={$row['id_acara']}'>Edit</a>
            <a href='delete_event.php?id={$row['id_acara']}'>Delete</a>
        </td>
    </tr>";
}
?>

            </tbody>
        </table>
        <a href="add_event.php" class="btn">Add New Event</a>
    </main>
</body>
</html>
