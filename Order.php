<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "ims"; 

try 
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->query("SELECT * FROM ordeer");
    $Orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $orderID = $_POST['order_id'];
        $deleteQuery = "DELETE FROM ordeer WHERE Order_ID = :orderID";
        $stmt = $conn->prepare($deleteQuery);
        $stmt->bindParam(':orderID', $orderID, PDO::PARAM_INT);
        $stmt->execute();
        header("Location: Order.php");
        exit();
    }
}
catch (PDOException $e) 
{
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
    <title>Customer Information</title>
</head>
<body>
    <header>
        <h1>Order Information</h1>
    </header>
    <nav>
        <div class="right-section">
            <button><a href="1.html">Home</a></button>
             <button><a href="Add_Order.php">Add Order</a></button>
        </div>
    </nav>
    <div class="container">
        <?php if (!empty($Orders)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Provider ID</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($Orders as $order): ?>
                        <tr>
                            <td><?= $order['Order_ID'] ?></td>
                            <td><?= $order['Provider_ID'] ?></td>
                            <td><?= $order['Date'] ?></td>
                            <td>
                                <form action="" method="post" style="display: inline-block;">
                                    <input type="hidden" name="order_id" value="<?= $order['Order_ID'] ?>">
                                    <button type="submit" name="delete_order" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No Provider information available.</p>
        <?php endif; ?>
    </div>
</body>
</html>
