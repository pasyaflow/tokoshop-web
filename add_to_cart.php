<?php
session_start();

header('Content-Type: application/json');

ini_set('display_errors', 0);
error_reporting(E_ALL);

require_once "config.php";

$id = $_GET['id'] ?? null;

if (!$id) {
    echo json_encode([
        "success" => false,
        "message" => "Missing product ID."
    ]);
    exit;
}

// This will fetch the product from the db.
if (!isset($con) || $con->connect_error) {
    echo json_encode([
        "success" => false,
        "message" => "Database connection failed."
    ]);
    exit;
}

$id = intval($id);
$sql = "SELECT prod_name, prod_price, prod_img FROM products WHERE id = $id";
$res = $con->query($sql);

if (!$res || $res->num_rows == 0) {
    echo json_encode([
        "success" => false,
        "message" => "Product not found in database."
    ]);
    exit;
}

$product = $res->fetch_assoc();

// Checking if it's not exist
if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Then, this one will increase the quantity if the product is already inside cart.
if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]['quantity']++;
} else {
    $_SESSION['cart'][$id] = [
        "name" => $product['prod_name'],
        "price" => $product['prod_price'],
        "image" => $product['prod_img'],
        "quantity" => 1
    ];
}

$totalItems = 0;
foreach ($_SESSION['cart'] as $item) {
    $totalItems += $item['quantity'];
}

echo json_encode([
    "success" => true,
    "message" => $product['prod_name'] . " added to cart!",
    "cartCount" => $totalItems
]);

exit;
?>