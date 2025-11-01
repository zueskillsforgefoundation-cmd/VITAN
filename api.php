<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$host = 'localhost';
$dbname = 'vitan_fashion';
$username = 'root';
$password = ''; // Default XAMPP password is empty

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Example: Get all products
    if ($_GET['action'] == 'getProducts') {
        $stmt = $pdo->query("SELECT * FROM products WHERE is_active = 1");
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($products);
    }
    
    // Add more API endpoints here
    
} catch(PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>