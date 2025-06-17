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
                    <th>Date</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT * FROM acara");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['client_id']}</td>
                        <td>{$row['date']}</td>
                        <td>{$row['location']}</td>
                        <td>
                            <a href='edit_event.php?id={$row['id']}'>Edit</a>
                            <a href='delete_event.php?id={$row['id']}'>Delete</a>
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
