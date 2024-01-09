<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "ims"; 

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch all customers from the database
    $stmt = $conn->query("SELECT Product_ID,Name,Category FROM user_prod");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Close the database connection
$conn = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="1.css">
    <title>Product Information</title>
</head>
<body>
    <header>
        <h1>Product Information</h1>
    </header>
    <nav>
        <div class="left-section">
            <button><a href="Login.php">Home</a></button>
        </div>
        <div class="right-section">
            <button><a href="insert_prod.php">Buy Item</a></button>
        </div>
    </nav>
    <div class="container">
        <?php if (!empty($products)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Product_ID</th>
                        <th>Name</th>
                        <th>Category</th>
                     </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= $product['Product_ID'] ?></td>
                            <td><?= $product['Name'] ?></td>
                            <td><?= $product['Category'] ?></td>
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
