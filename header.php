<?php
if (!isset($_SESSION)) {
    session_start();
}

$cartCount = 0;

if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $cartCount += $item['quantity'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="navbar">
        <div class="logo">
            <a href="index.php">Tokoshop</a>
        </div>

        <nav class="nav-links">
            <a href="index.php">Home</a>
            <a href="#">About</a>
            <a href="#">Contact Us</a>
        </nav>

        <div class="nav-right">
            <a href="cart.php" class="cart">
                <i data-lucide="shopping-cart"></i>
                <span class="cart-count"><?php echo $cartCount; ?></span>
            </a>
        </div>
    </header>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>