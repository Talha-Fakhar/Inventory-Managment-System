<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "ims"; 

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->query("SELECT * FROM warehouse");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
     if (isset($_POST['delete_warehouse']) ) {
        $WarehouseID = $_POST['Warehouse_ID'];
        $deleteQuery = "DELETE FROM warehouse WHERE Warehouse_ID = '$WarehouseID'";
        $conn->exec($deleteQuery);
        header("Location: warehouse.php");
        exit();
    }

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="1.css">
    <title>Warehouse Information</title>
</head>
<body>
    <header>
        <h1>Warehouse Information</h1>
    </header>
    <nav>
           <div class="right-section">
            <button><a href="1.html">Home</a></button>
            <button><a href="Add_Warehouse.php">Add Warehouse</a></button>
        </div>
    </nav>
    <div class="container">
        <?php if (!empty($products)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Warehouse_ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>    Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $customer): ?>
                        <tr>
                            <td><?= $customer['Warehouse_ID'] ?></td>
                            <td><?= $customer['Warehouse_name'] ?></td>
                            <td><?= $customer['Location'] ?></td>
                            <td>
                            <form action="" method="post" style="display: inline-block;">
                                <input type="hidden" name="Warehouse_ID" value="<?= $customer['Warehouse_ID'] ?>">
                                <button type="submit" name="delete_warehouse" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No product information available.</p>
        <?php endif; ?>
    </div>
</body>
</html>
