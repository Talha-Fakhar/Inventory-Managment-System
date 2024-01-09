<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "ims"; 
$deliveries = [];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->query("SELECT * FROM delievery");
    $deliveries = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (isset($_POST['delete_delivery'])) {
        $deliveryID = $_POST['delivery_id'];
        $deleteQuery = "DELETE FROM delievery WHERE Deliever_ID = '$deliveryID'";
        $conn->exec($deleteQuery);
        header("Location: View_Delivery.php");
        exit();
    }
} catch (PDOException $e) {
    // Handle the exception, e.g., echo "Connection failed: " . $e->getMessage();
}

$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="1.css">
    <title>Delivery Information</title>
</head>
<body>
    <header>
        <h1>Delivery Information</h1>
    </header>
    <nav>
        <div class="right-section">
            <button><a href="1.html">Home</a></button>
            <button><a href="delivery.php">Add Delivery</a></button>
        </div>
    </nav>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Delivery ID</th>
                    <th>Sale Date</th>
                    <th>Customer ID</th>
                    <th>Product ID</th>
                    <th>Warehouse ID</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($deliveries as $delivery): ?>
                    <tr>
                        <td><?= $delivery['Deliever_ID'] ?></td>
                        <td><?= isset($delivery['Sale_Date']) ? $delivery['Sale_Date'] : '' ?></td>
                        <td><?= isset($delivery['Customer_ID']) ? $delivery['Customer_ID'] : '' ?></td>
                        <td><?= isset($delivery['Product_ID']) ? $delivery['Product_ID'] : '' ?></td>
                        <td><?= isset($delivery['Warehouse_ID']) ? $delivery['Warehouse_ID'] : '' ?></td>
                        <td><?= isset($delivery['quantity']) ? $delivery['quantity'] : '' ?></td>
                        <td>
                            <form action="" method="post" style="display: inline-block;">
                                <input type="hidden" name="delivery_id" value="<?= $delivery['Deliever_ID'] ?>">
                                <button type="submit" name="delete_delivery" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
