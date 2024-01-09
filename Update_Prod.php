<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ims";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_quantity'])) {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $productID = $_POST['product_id'];
        $newQuantity = $_POST['new_quantity'];
        $updateQuery = "UPDATE product SET Quantity = :newQuantity WHERE Product_ID = :productID";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bindParam(':newQuantity', $newQuantity, PDO::PARAM_INT);
        $stmt->bindParam(':productID', $productID, PDO::PARAM_INT);
        $stmt->execute();
        header("Location: view_prod.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        $conn = null;
    }
} else {
    header("Location: 1.html");
    exit();
}
?>
