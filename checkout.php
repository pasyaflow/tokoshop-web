<?php
require_once "config.php";

$cart = $_SESSION['cart'] ?? [];

if (empty($cart)) {
    header("Location: index.php");
    exit;
}

// Calculating the total based on item's price and quantity.
$total = 0;
foreach ($cart as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tokoshop - Checkout</title>
</head>
<body>
    <h1>Checkout</h1>
    <form method="POST" action="confirm_order.php">
        <input type="text" name="name" placeholder="Your Full Name" required>
        <input type="email" name="name" placeholder="Your Email" required>
        <input type="textarea" name="name" placeholder="Your Address" required>

        // The total's output is shown.
        <h3>Total: PHP<?php echo $total; ?></h3>

        <button type="submit">Confirm</button>
    </form>
</body>
</html>