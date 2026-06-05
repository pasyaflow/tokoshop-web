<?php
// echo "Welcome to Tokoshop!";

require_once "config.php";

include "header.php";
include_once "assets/components/icon_button.php";
include_once "assets/components/toast_notif.php";

$sql = "SELECT * FROM products ORDER BY created_at DESC";
$res = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <script src="https://unpkg.com/lucide@latest"></script>
    <title>Tokoshop - Make Shopping Experience Fun</title>
</head>
<body>
    <div class="container">
        <div class="product-container">
            <?php while($row = $res->fetch_assoc()): ?>
                <div class="product-card">
                    <a href="products.php?id=<?php echo $row['id']; ?>" class="product-link">
                        <img src="assets/images/<?php echo $row['prod_img']; ?>" alt="">
                        <h2><?php echo $row['prod_name']; ?></h2>
                    </a>
                    <p>PHP <?php echo number_format($row['prod_price'], 2); ?></p>
                    <div class="product-actions">
                        <a href="#" class="btn-cart-link" data-id="<?php echo $row['id']; ?>">
							<?php iconButton("Add to Cart", "shopping-cart", "#111111", "#ffffff"); ?>
						</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <?php toastNotification(); ?>

    <script>
    lucide.createIcons();
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.btn-cart-link').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault(); 
                
                const productId = this.getAttribute('data-id'); 
                if(!productId) return;

                fetch(`add_to_cart.php?id=${productId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const toastMessage = document.getElementById('toast-message');
                            if(toastMessage) {
                                toastMessage.innerText = data.message;
                            }
                            
                            const toast = document.getElementById('toast-notification');
                            if(toast) {
                                toast.classList.add('show');
                                
                                setTimeout(() => {
                                    toast.classList.remove('show');
                                }, 3000);
                            }
                            
                            const cartBadge = document.querySelector('.cart-count');
                            if(cartBadge) {
                                cartBadge.innerText = data.cartCount;
                            }
                        }
                    })
                    .catch(err => console.error("Error adding to cart:", err));
            });
        });
    });
    </script>

    <?php include "footer.php"; ?>
</body>
</html>