<?php

class Product
{
    public $Product_ID = '';
    public $Product_code = '';
    public $Name = '';
    public $Category = '';
    public $Quantity = '';
    public $Weight = '';
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
        if (isset($_POST['Product_ID'], $_POST['Product_code'], $_POST['Name'], $_POST['Category'], $_POST['Quantity'], $_POST['Weight'])) {
            $this->Product_ID = $_POST['Product_ID'];
            $this->Product_code = $_POST['Product_code'];
            $this->Name = $_POST['Name'];
            $this->Category = $_POST['Category'];
            $this->Quantity = $_POST['Quantity'];
            $this->Weight = $_POST['Weight'];

            try {
                $sth = $this->dbh->prepare("INSERT INTO product (Product_ID, Product_code, Name, Category, Quantity, Weight) 
                    VALUES (:Product_ID, :Product_code, :Name, :Category, :Quantity, :Weight)");

                $sth->bindParam(':Product_ID', $this->Product_ID);
                $sth->bindParam(':Product_code', $this->Product_code);
                $sth->bindParam(':Name', $this->Name);
                $sth->bindParam(':Category', $this->Category);
                $sth->bindParam(':Quantity', $this->Quantity);
                $sth->bindParam(':Weight', $this->Weight);

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
            <button><a href="1.html">Home</a></button>
            <button><a href="view_prod.php">View Products</a></button>
        </div>
    </nav>

    <div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <fieldset>
            <legend><h2><B>Add New Product</B></h2></legend>
    <label for="Product_ID">Product ID</label>
    <input type="text" id="Product_ID" name="Product_ID" required>

    <label for="Product_code">Product code</label>
    <input type="text" id="Product_code" name="Product_code" required>

    <label for="Name">Name</label>
    <input type="text" id="Name" name="Name" required>

    <label for="category">Category</label>
    <input type="text" id="category" name="Category" required>

    <label for="Quantity">Quantity</label>
    <input type="number" id="Quantity" name="Quantity" required>

    <label for="weight">Weight</label>
    <input type="number" step="0.1" id="weight" name="Weight" required>

    <button type="submit">Add Product</button>
    </fieldset>
</form>

</div>
</body>
</html>
