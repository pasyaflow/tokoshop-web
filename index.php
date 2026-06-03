<?php
echo "Welcome to Tokoshop!";

require_once "config.php";

$sql = "SELECT * FROM products ORDER BY created_at DESC";
$res = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Tokoshop - Belanja Aja di Toko Kami</title>
</head>
<body>
    <h1>Tokoshop</h1>
    <div class="product-container">
        <?php while($row = $res->fetch_assoc()): ?>
            <div class="product-card">
                <img src="assets/images/<?php echo $row['prod_img']; ?>" alt="">
                <h2><?php echo $row['prod_name']; ?></h2>
                <p>PHP <?php echo $row['prod_price']; ?></p>
                <p><?php echo $row['prod_desc']; ?></p>
                <a href="products.php?id=<?php echo $row['id']; ?>">
                    <button>View</button>
                </a>
                <button>Add to Cart</button>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>