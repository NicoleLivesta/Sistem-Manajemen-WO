<?php include '../php/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Staff Tasks</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Manage Staff Tasks</h1>
        <nav>
            <a href="../index.php">Back to Dashboard</a>
        </nav>
    </header>
    <main>
        <h2>Staff Task List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Staff ID</th>
                    <th>Task Description</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT * FROM tugas_staff");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['staff_id']}</td>
                        <td>{$row['task_description']}</td>
                        <td>{$row['due_date']}</td>
                        <td>
                            <a href='edit_task.php?id={$row['id']}'>Edit</a>
                            <a href='delete_task.php?id={$row['id']}'>Delete</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="add_task.php" class="btn">Add New Task</a>
    </main>
</body>
</html>
