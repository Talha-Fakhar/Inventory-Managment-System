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
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_delivery'])) {
        $saleDate = $_POST['sale_date'];
        $deliveryID = $_POST['delivery_id'];
        $customerID = $_POST['customer_id'];
        $productID = $_POST['product_id'];
        $warehouseID = $_POST['warehouse_id'];
        $quantity = $_POST['quantity'];
        $insertQuery = "INSERT INTO delievery (Deliever_ID,Sale_Date, Customer_ID, Product_ID, Warehouse_ID, quantity) 
                        VALUES ('$deliveryID','$saleDate', '$customerID', '$productID', '$warehouseID', '$quantity')";
        $conn->exec($insertQuery);
        header("Location: delivery.php");
        exit();
    } 
    
}
$conn = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="1.css">
    <title>Delivery Management</title>
</head>
<body>
     <header>
        <h1>Delivery Information</h1>
    </header>
    <nav>
        <div class="right-section">
            <button><a href="1.html">Home</a></button>
             <button><a href="View_Delivery.php">View Delivery</a></button>
         </div>
    </nav>
    <div class="container">
        <form action="" method="post">
            <fieldset>
                <legend><h2><B>Add New Delivery</B></h2></legend>
                <!-- Input fields for adding a new delivery -->
                <!-- Modify the input types and names based on your needs -->
                <B>Delivery ID: </B><input type="text" name="delivery_id" required><br>
                <b>Sale Date: </b><input type=date name="sale_date" required><br>
                <B>Customer ID: </B><input type="text" name="customer_id" required><br>
                <B>Product ID: </B><input type="text" name="product_id" required><br>
                <B>Warehouse ID: </B><input type="text" name="warehouse_id" required><br>
                <B>Quantity: </B><input type="text" name="quantity" required><br>
                <button type="submit" name="add_delivery">Add Delivery</button>
            </fieldset>
        </form>
    </div>
</body>
</html>