<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ims";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_transfer'])) {
        $Transfer_ID= $_POST['Transfer_ID'];
        $transferQuantity = $_POST['transfer_quantity'];
        $sendDate = $_POST['send_date'];
        $receiveDate = $_POST['receive_date'];
        $productID = $_POST['product_id'];
        $insertQuery = "INSERT INTO transfer (Transfer_ID, Transfer_quantity, Send_date, Recieve_date, Product_ID) 
                        VALUES ('$Transfer_ID', '$transferQuantity', '$sendDate', '$receiveDate', '$productID')";


        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec($insertQuery);
            header("Location: Transfer.php");
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

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
    <title>Add Transfer</title>
</head>
<body>
    <header>
        <h1>Add New Transfer</h1>
    </header>
    <nav>
        <div class="right-section">
            <button><a href="1.html">Home</a></button>
            <button><a href="View_Transfer.php">View Detail</a></button>
        </div>
    </nav>
    <div class="container">
        <form action="" method="post">
            <fieldset>
                <legend><h2><B>Add New Transfer</B></h2></legend>
                <B>Transfer ID: </B><input type="text" name="Transfer_ID" required><br>
                <B>Transfer Quantity: </B><input type="text" name="transfer_quantity" required><br>
                <B>Send Date: </B><input type="Date" name="send_date" required><br>
                <B>Receive Date: </B><input type="Date" name="receive_date" required><br>
                <B>Product ID: </B><input type="text" name="product_id" required><br>
                <button type="submit" name="add_transfer">Add Transfer</button>
            </fieldset>
        </form>
    </div>
</body>
</html>
