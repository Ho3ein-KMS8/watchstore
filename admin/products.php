<?php require_once '../inc/config.php';
if (!is_admin_login()) {
    redirect("login.php");
}

$products = get_products();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products list</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="shortcut icon" href="../images/ws-fav.png" type="image/x-icon">
</head>
<body>
<div id="products-page">
    
    <div>
        <h1 class="title">Admin panel</h1>
        <ul>
            <li><a href="<?php echo PATH ?>">Store</a></li>
            <li><a href="products.php">Products list</a></li>
            <li><a href="add-product.php">Add Product</a></li>
            <li><a href="users.php">Users list</a></li>
            <li><a href="cats.php">Categories</a></li>
            <li><a href="comments.php">Comments</a></li>
            <li><a href="orders.php">Orders</a></li>
            <li><a href="?admin-logout=1">Logout</a></li>
        </ul>
    </div>
    <div class="content">
        <?php
        if ($message) {
            ?>
            <div class="success-message"><?php echo $message ?></div>
            <?php
        }
        if ($error) {
            ?>
            <div class="error-message"><?php echo $error ?></div>
            <?php
        }
        ?>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <?php
            while ($product = mysqli_fetch_array($products)) {
                ?>
                <tr>
                    <td><?php echo $product['product_name'] ?></td>
                    <td>$<?php echo $product['product_price'] ?></td>
                    <td><?php echo $product['product_cat'] ?></td>
                    <td><a href="edit-product.php?edit-product-id=<?php echo $product['id'] ?>">Edit</a></td>
                    <td><a href="?delete-product-id=<?php echo $product['id'] ?>" onclick="return confirm('Do you want delete this product?')">Delete</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
</body>
</html>