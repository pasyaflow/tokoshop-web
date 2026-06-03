<?php
require_once "config.php";

$cart = $_SESSION['cart'] ?? [];
$total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Tokoshop - My Cart</title>
</head>
<body>
    <h1>My Cart</h1>
    <?php if(empty($cart)): ?>
        <p>The cart is empty.</p>
    <?php else: ?>
    <table border="1" cellpadding="10">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Subtotal</th>
            <th>Action</th>
        </tr>

        <?php foreach($cart as $id => $item): ?>
            <?php $subtotal = $item['price'] * $item['quantity']; ?>
            <tr>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo $item['price']; ?></td>
                <td><?php echo $item['quantity']; ?></td>
                <td>PHP <?php echo $subtotal; ?></td>
                <td>
                    <a href="remove_from_cart.php?id=<?php echo $id; ?>">-</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    
    <h2>Total: PHP <?php echo $total; ?></h2>

    <br>

    <a href="checkout.php">
        <button>Next</button>
    </a>

    <?php endif; ?>
</body>
</html>