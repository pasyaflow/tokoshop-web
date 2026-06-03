<?php
$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: index.php");
    exit;
}

$sql = "SELECT * FROM products WHERE id = $id";
$res = $con->query($sql);

if ($res->num_rows==0) {
    die("Product not found.");
}

$product = $res->fetch_assoc();

if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

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

header("Location: cart.php");
exit;

?>