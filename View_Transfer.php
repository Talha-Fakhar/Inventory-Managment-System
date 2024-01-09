<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ims";
$transfers = [];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['delete_transfer'])) {
        $transferID = $_POST['transfer_id'];
        $deleteQuery = "DELETE FROM transfer WHERE Transfer_ID = '$transferID'";
        $conn->exec($deleteQuery);
        header("Location: view_Transfer.php");
        exit();
    }

    $stmt = $conn->query("SELECT * FROM transfer");
    $transfers = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <title>Transfer Information</title>
</head>
<body>
    <header>
        <h1>Transfer Information</h1>
    </header>
    <nav>
        <div class="right-section">
            <button><a href="1.html">Home</a></button>
            <button><a href="Transfer.php">Add Detail</a></button>
        </div>
    </nav>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Transfer ID</th>
                    <th>Transfer Quantity</th>
                    <th>Send Date</th>
                    <th>Receive Date</th>
                    <th>Product ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transfers as $transfer): ?>
                    <tr>
                        <td><?= $transfer['Transfer_ID'] ?></td>
                        <td><?= $transfer['Transfer_quantity'] ?></td>
                        <td><?= $transfer['Send_date'] ?></td>
                        <td><?= $transfer['Recieve_date'] ?></td>
                        <td><?= $transfer['Product_ID'] ?></td>
                        <td>
                            <form action="" method="post" style="display: inline-block;">
                                <input type="hidden" name="transfer_id" value="<?= $transfer['Transfer_ID'] ?>">
                                <button type="submit" name="delete_transfer" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
