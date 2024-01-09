<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ims";
$providers = [];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->query("SELECT * FROM provider");
    $providers = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <title>Provider Information</title>
</head>
<body>
    <header>
        <h1>Provider Information</h1>
    </header>
    <nav>
        <div class="left-section">
            <button><a href="1.html">Home</a></button>
        </div>
        <div class="right-section">
            <button><a href="Add_Provider.php">Add Provider</a></button>
        </div>
    </nav>
    <div class="container">
        <?php if (!empty($providers)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Provider ID</th>
                        <th>Name</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($providers as $provider): ?>
                        <tr>
                            <td><?= $provider['Provider_ID'] ?></td>
                            <td><?= $provider['Name'] ?></td>
                            <td><?= $provider['Address'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No provider information available.</p>
        <?php endif; ?>
    </div>
</body>
</html>
