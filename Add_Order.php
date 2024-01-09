<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ims";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_order'])) {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $productID = $_POST['product_id'];
        $orderQuantity = $_POST['order_quantity'];
        $expectedDate = $_POST['expected_date'];
        $insertQuery = "INSERT INTO ordeer (Order_Id, Provider_ID, Date) VALUES (:productID, :orderQuantity, :expectedDate)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bindParam(':productID', $productID, PDO::PARAM_INT);
        $stmt->bindParam(':orderQuantity', $orderQuantity, PDO::PARAM_INT);
        $stmt->bindParam(':expectedDate', $expectedDate, PDO::PARAM_STR);
        $stmt->execute();

        header("Location: Add_Order.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        $conn = null;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="1.css">
    <title>Add Order</title>
</head>
<body>
    <header>
        <h1>Add New Order</h1>
    </header>
    <nav>
        <div class="right-section">
            <button><a href="1.html">Home</a></button>
            <button><a href="Order.php">View Orders</a></button>
        </div>
    </nav>
    <div class="container">
        <form action="" method="post">
            <fieldset>
                <legend><h2><B>Add New Order</B></h2></legend>
                <b>Order ID: </b><input type="text" name="product_id" required><br>
                <b>Provider Id: </b><input type="text" name="order_quantity" required><br>
                <b>Date: </b><input type=date name="expected_date" required><br>
                <button type="submit" name="add_order">Add Order</button>
            </fieldset>
        </form>
    </div>
</body>
</html>
