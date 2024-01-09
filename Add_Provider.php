<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ims";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_provider'])) {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $providerName = isset($_POST['provider_name']) ? $_POST['provider_name'] : '';
        $providerAddress = isset($_POST['provider_address']) ? $_POST['provider_address'] : '';

        $insertQuery = "INSERT INTO provider (Name, Address) VALUES (:providerName, :providerAddress)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bindParam(':providerName', $providerName, PDO::PARAM_STR);
        $stmt->bindParam(':providerAddress', $providerAddress, PDO::PARAM_STR);
        $stmt->execute();

        header("Location: View_Provider.php");
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
    <title>Add Provider</title>
</head>
<body>
    <header>
        <h1>Add Provider</h1>
    </header>
    <nav>
        <div class="right-section">
            <button><a href="1.html">Home</a></button>
            <button><a href="Provider.php">View Providers</a></button>
        </div>
    </nav>
    <div class="container">
        <form action="" method="post">
            <fieldset>
                <legend><h2><B>Add New Provider</B></h2></legend>
                <B>Provider Name: </B><input type="text" name="provider_name" required><br>
                <B>Address: </B><input type="text" name="provider_address" required><br>
                <button type="submit" name="add_provider">Add Provider</button>
            </fieldset>
        </form>
    </div>
</body>
</html>
