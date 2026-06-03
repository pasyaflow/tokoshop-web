<?php
$cart = $_SESSION['cart'] ?? [];

if (empty($cart)) {
    header("Location: index.php");
    exit;
}

// This will get the form data of the customer.
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];

// Calculating the total based on item's price and quantity.
$total = 0;
foreach ($cart as $item) {
    $total += $item['price'] * $item['quantity'];
}

// The customer records inserted into the database.
$sql = "INSERT INTO orders (customer_name, email, address, total_price) VALUES ('$name', '$email', '$address', '$total')";
$con->query($sql);

// Getting the inserted order id
$order_id = $con->insert_id;

// This will insert the added orders items to the database.
foreach($cart as $product_id => $item) {
    $price = $item['price'];
    $qty = $item['quantity'];

    $sql = "INSERT INTO order_items(order_id, product_id, quantity, price) VALUES('$order_id', '$product_id', '$qty', '$price')";

    $con->query($sql);
}

// Cart all cleared after the order has been confirmed or placed.
unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tokoshop - Order Success!</title>
</head>
<body>
    <h1>Order has successfully confirmed!</h1>
    <a href="index.php">Back to Homepage</a>
</body>
</html>