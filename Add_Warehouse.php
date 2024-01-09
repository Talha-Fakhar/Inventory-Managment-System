<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ims";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $Warehouse_id = isset($_POST['warehouse_id']) ? $_POST['warehouse_id'] : '';
    $Warehouse_name = isset($_POST['warehouse_name']) ? $_POST['warehouse_name'] : '';
    $Location_ID = isset($_POST['location']) ? $_POST['location'] : '';

    $insertQuery = "INSERT INTO warehouse (Warehouse_ID, Warehouse_name, Location) VALUES (:Warehouse_id, :Warehouse_name, :Location_ID)";
    
    $stmt = $conn->prepare($insertQuery);
    $stmt->bindParam(':Warehouse_id', $Warehouse_id, PDO::PARAM_STR);
    $stmt->bindParam(':Warehouse_name', $Warehouse_name, PDO::PARAM_STR);
    $stmt->bindParam(':Location_ID', $Location_ID, PDO::PARAM_STR);
    $stmt->execute();

    header("Location: Warehouse.php");
    exit();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $conn = null;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="1.css">
    <title>Add Warehouse</title>
</head>
<body>
    <header>
        <h1>Add New Warehouse</h1>
    </header>
    <nav>
        <div class="right-section">
            <button><a href="1.html">Home</a></button>
            <button><a href="Warehouse.php">View Warehouses</a></button>
        </div>
    </nav>
    <div class="container">
        <form action="" method="post">
            <fieldset>
                <legend><h2><B>Add New Warehouse</B></h2></legend>
                <B>Warehouse ID: </B><input type="text" name="warehouse_id" required><br>
                <b>Warehouse Name: </b><input type="text" name="warehouse_name" required><br>
                <b>Location: </b><input type="text" name="location" required><br>
                <button type="submit" name="add_warehouse">Add Warehouse</button>
            </fieldset>
        </form>
    </div>
</body>
</html>
