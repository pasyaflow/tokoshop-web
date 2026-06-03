<?php
require_once "config.php";

$id = $_GET['id'] ?? null;

if (!$id) {
    die("Product not found.");
}

$sql = "SELECT * FROM products WHERE id = $id";
$res = $con->query($sql);

if ($res-> num_rows == 0) {
    die("Product not found.");
}

$product = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Tokoshop - <?php echo $product['prod_name']; ?></title>
</head>
<body>
    <div class="product-detail">
        <img src="assets/images/<?php echo $product['prod_img']; ?>" width="300">
        <h1><?php echo $product['prod_name']; ?></h1>
        <h3>PHP <?php echo $product['prod_price'] ?></h3>
        <p><?php echo $product['prod_desc'] ?></p>
        <button>Add to Cart</button>
        <br><br>
        <a href="index.php"> Back to Homepage</a>
    </div>
</body>
</html>