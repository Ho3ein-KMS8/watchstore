<?php require_once '../inc/config.php';
if (!is_admin_login()) {
    redirect("login.php");
}

$cats = get_cats();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New product</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="shortcut icon" href="../images/ws-fav.png" type="image/x-icon">
</head>
<body>
<div id="add-product-page">
    <div>
        <h1 class="title">Admin panel</h1>
        <ul>
            <li><a href="products.php">Store</a></li>
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
        <form action="add-product.php" method="post" enctype="multipart/form-data">
            <input type="text" name="product-name" placeholder="Product name"><br>
            <input type="text" name="product-price" placeholder="Product price"><br>

            <span style="font-size: 11px;margin-right: 5px">Product category</span>
            <select name="product-cat">
                <option value="0">Select ...</option>
                <?php while ($cat = mysqli_fetch_array($cats)) { ?>
                    <option value="<?php echo $cat['cat_name'] ?>"><?php echo $cat['cat_name'] ?></option>
                <?php } ?>
            </select>
            <br>

            <span style="font-size: 11px;margin-right: 5px">Product image: </span>
            <input type="file" name="product-image">


            <textarea rows="8" name="product-desc" placeholder="Product description"></textarea><br>
            <input type="submit" name="add-product" value="Add product">
        </form>
    </div>
</div>
</body>
</html>





