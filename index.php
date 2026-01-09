<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LKS Cloud Inventory</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <h2>LKS Nasional - Cloud Computing</h2>
        <span class="status">RDS Status: <?php echo ($conn) ? "✅ Connected" : "❌ Disconnected"; ?></span>
    </div>

    <div class="container">
        <section class="add-item">
            <h3>Add New Resource</h3>
            <form method="POST">
                <input type="text" name="item_name" placeholder="Resource Name (e.g. EC2 Instance)" required>
                <input type="text" name="item_value" placeholder="Value/IP" required>
                <button type="submit" name="submit" class="btn-primary">Add to Database</button>
            </form>
        </section>

        <?php
        // Create Logic
        if(isset($_POST['submit']) && $conn) {
            $name = $_POST['item_name'];
            $val = $_POST['item_value'];
            pg_query($conn, "INSERT INTO inventory (name, value) VALUES ('$name', '$val')");
        }

        // Initialize Table if not exists (Testing purpose)
        if($conn) {
            pg_query($conn, "CREATE TABLE IF NOT EXISTS inventory (id SERIAL PRIMARY KEY, name TEXT, value TEXT)");
        }
        ?>

        <section class="list-items">
            <h3>Inventory List</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Resource Name</th>
                        <th>Value</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($conn) {
                        $result = pg_query($conn, "SELECT * FROM inventory ORDER BY id DESC");
                        while($row = pg_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['value']}</td>
                                    <td><a href='delete.php?id={$row['id']}' class='btn-delete'>Delete</a></td>
                                  </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>
