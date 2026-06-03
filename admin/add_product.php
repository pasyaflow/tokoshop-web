<?php
require_once "../config.php";
?>

<h4>Add Product - Testing</h4>
<form action="save_product.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Product Name" required>
    <br><br>
    <input type="number" name="price" placeholder="Product Price" required>
    <br><br>
    <textarea name="description" placeholder="Add a meaningful description..." required></textarea>
    <br><br>
    <input type="file" name="image" required>

    <br><br>

    <button type="submit">Save</button>
</form>