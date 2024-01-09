<?php

// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'ims');

// Start a session
session_start();

// Include necessary functions or classes
require_once('functions.php');  // You need to create this file with your own functions

// Autoload classes (if you're using classes)
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.class.php';  // Adjust the path based on your project structure
});

// Connect to the database
try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Include other important configurations or settings

?>
