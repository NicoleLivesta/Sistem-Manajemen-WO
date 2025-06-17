<?php include '../php/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Event Vendors</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Manage Event Vendors</h1>
        <nav>
            <a href="../index.php">Back to Dashboard</a>
        </nav>
    </header>
    <main>
        <h2>Event Vendor List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Event ID</th>
                    <th>Vendor ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT * FROM vendor_acara");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['event_id']}</td>
                        <td>{$row['vendor_id']}</td>
                        <td>
                            <a href='edit_event_vendor.php?id={$row['id']}'>Edit</a>
                            <a href='delete_event_vendor.php?id={$row['id']}'>Delete</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="add_event_vendor.php" class="btn">Add New Event Vendor</a>
    </main>
</body>
</html>