<?php require_once '../inc/config.php' ?>
<?php
if (!is_admin_login()) {
    redirect("login.php");
}

$cats = get_cats();
$product_id = $_GET['edit-product-id'];
$get_product = get_product_by_id($product_id);
$product = mysqli_fetch_array($get_product);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit: <?php echo $product['product_name'] ?></title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="shortcut icon" href="../images/ws-fav.png" type="image/x-icon">
</head>
<body>
<main id="edit-product-page">
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
        <form action="edit-product.php?edit-product-id=<?php echo $product['id'] ?>" method="post" enctype="multipart/form-data">
            <input type="text" name="product-name" placeholder="Product name" value="<?php echo $product['product_name'] ?>">
            <input type="text" name="product-price" placeholder="Price" value="<?php echo $product['product_price'] ?>">
            <input type="hidden" name="product-id" value="<?php echo $product['id'] ?>">

            <span style="font-size: 11px;margin-right: 5px">Category: <?php echo $product['product_cat'] ?></span>
            <select name="product-cat">
                <option value="<?php echo $product['product_cat'] ?>"><?php echo $product['product_cat'] ?></option>
                <?php while ($cat = mysqli_fetch_array($cats)) { ?>
                    <option value="<?php echo $cat['cat_name'] ?>"><?php echo $cat['cat_name'] ?></option>
                <?php } ?>
            </select>
            <img src="../images/<?php echo $product['product_image'] ?>" alt="<?php echo $product['product_name'] ?>" width="120" style="margin-right: 5px">
            <span style="font-size: 11px;margin-right: 5px">Product image: </span>
            <input type="file" name="new-product-image">
            <input type="hidden" name="product-image" value="<?php echo $product['product_image'] ?>">


            <textarea name="product-desc" placeholder="Product description..."><?php echo $product['product_desc'] ?></textarea>
            <input type="submit" name="update-product" value="Update product">
        </form>
    </div>
</main>
</body>
</html>





