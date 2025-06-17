<?php include '../php/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Vendor Contracts</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Manage Vendor Contracts</h1>
        <nav>
            <a href="../index.php">Back to Dashboard</a>
        </nav>
    </header>
    <main>
        <h2>Vendor Contract List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Vendor ID</th>
                    <th>Event ID</th>
                    <th>Contract Details</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT * FROM kontrak_vendor");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['vendor_id']}</td>
                        <td>{$row['event_id']}</td>
                        <td>{$row['contract_details']}</td>
                        <td>
                            <a href='edit_contract.php?id={$row['id']}'>Edit</a>
                            <a href='delete_contract.php?id={$row['id']}'>Delete</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="add_contract.php" class="btn">Add New Contract</a>
    </main>
</body>
</html>
