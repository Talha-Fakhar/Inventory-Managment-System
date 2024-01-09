<?php

class Product
{
    public $Product_ID = '';
    public $Name = '';
    public $Quantity = '';
    public $dbName = 'ims';
    public $host = 'localhost';
    public $user = 'root';
    public $pass = '';
    public $dbh = '';

    public function __construct()
    {
        try {
            $this->dbh = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->user, $this->pass);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            print "Error: " . $e->getMessage() . "<br/>";
        }
    }

    public function addProduct()
    {
        if (isset($_POST['Product_ID'], $_POST['Name'], $_POST['Quantity'])) {
            $this->Product_ID = $_POST['Product_ID'];
            $this->Name = $_POST['Name'];
            $this->Quantity = $_POST['Quantity'];

            try {
                $sth = $this->dbh->prepare("INSERT INTO insert_prod (Product_ID, Name, Quantity) 
                    VALUES (:Product_ID, :Name, :Quantity)");

                $sth->bindParam(':Product_ID', $this->Product_ID);
                $sth->bindParam(':Name', $this->Name);
                $sth->bindParam(':Quantity', $this->Quantity);

                $sth->execute();
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
}

$company = new Product();
$company->addProduct();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="1.css">
    <title>Add Product</title>
</head>
<body>
    <header>
            <h1>Inventory Management System</h1>
    </header>
    <nav>
        <div class="right-section">
            <button><a href="Login.php">Home</a></button>
            <button><a href="cust_order.php">View Products</a></button>
        </div>
    </nav>

    <div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <fieldset>
            <legend><h2><B>Buy New Product</B></h2></legend>
    <label for="Product_ID">Product ID</label>
    <input type="text" id="Product_ID" name="Product_ID" required>

    <label for="Name">Name</label>
    <input type="text" id="Name" name="Name" required>

    <label for="Quantity">Quantity</label>
    <input type="number" id="Quantity" name="Quantity" required>

    <button type="submit">Buy Product</button>
    </fieldset>
</form>

</div>
</body>
</html>
