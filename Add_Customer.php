<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ims";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $customerID = $_POST['customer_id'];
        $customerName = $_POST['name'];
        $customerAddress = $_POST['address'];

        $insertQuery = "INSERT INTO customer (Customer_ID,Name, Adress) VALUES (:customer_id,:name, :address)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bindParam(':customer_id', $customerID, PDO::PARAM_STR);
        $stmt->bindParam(':name', $customerName, PDO::PARAM_STR);
        $stmt->bindParam(':address', $customerAddress, PDO::PARAM_STR);
        $stmt->execute();
     
        header("location: Add_Customer.php");
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
    <title>Add Customer</title>
</head>
<body>
    <header>
        <h1>Add New Customer</h1>
    </header>
    <nav>
        <div class="right-section">
            <button><a href="1.html">Home</a></button>
            <button><a href="1.php">View Customer</a></button>
        </div>
    </nav>
    <div class="container">
        <form action="" method="post">
            <fieldset>
                <legend><h2><B>Add New Customer</B></h2></legend>
                <B>Customer ID:</B> <input type="text" name="customer_id" required><br>
                <B>Name:</B> <input type="text" name="name" required><br>
                <B>Address:</B><input type="text" name="address" required><br>
                <button type="submit">Add Customer</button>
            </fieldset>
        </form>
    </div>
</body>
</html>
