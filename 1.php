<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "ims"; 

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->query("SELECT * FROM customer");
    $customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    <title>Customer Information</title>
</head>
<body>
    <header>
        <h1>Customer Information</h1>
    </header>
    <nav>
        <div class="right-section">
            <button><a href="1.html">Home</a></button>
            <button><a href="Add_Customer.php">Add Customer</a></button>
        </div>
    </nav>
    <div class="container">
        <?php if (!empty($customers)): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($customers as $customer): ?>
                        <tr>
                            <td><?= $customer['Customer_ID'] ?></td>
                            <td><?= $customer['Name'] ?></td>
                            <td><?= $customer['Adress'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No customer information available.</p>
        <?php endif; ?>
    </div>
</body>
</html>
