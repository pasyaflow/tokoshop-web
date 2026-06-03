<?php
require_once "../config.php";

$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$img = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

$uploadPath = "../assets/images/" . $img;

move_uploaded_file($tmp, $uploadPath);

$sql = "INSERT INTO products (prod_name, prod_price, prod_img, prod_desc) VALUES('$name', '$price', '$img', '$description')";

if ($con->query($sql)) {
    echo "Product saved to the database.";
    echo "<br><a href='add_product.php'>Add another</a>";
} else {
    echo "ERROR! " . $con->error;
}

?>