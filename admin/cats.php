<?php require_once '../inc/config.php' ?>
<?php
if (!is_admin_login()) {
    redirect("login.php");
}
$cats = get_cats();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Categories</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="shortcut icon" href="../images/ws-fav.png" type="image/x-icon">
</head>
<body>
<main id="cats-page">
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
        <div>
            <form action="cats.php" method="post">
                <input type="text" name="cat-name" placeholder="Category name" style="width: 50%">
                <input type="submit" name="add-cat" value="Add new category">
            </form>
        </div>
        <table>
            <thead>
            <tr>
                <th>Category</th>
                <th>Delete</th>
            </tr>
            </thead>
            <?php while($cat = mysqli_fetch_array($cats)){ ?>
            <tr>
                <td><?php echo $cat['cat_name'] ?></td>
                <td><a href="?delete-cat-id=<?php echo $cat['id'] ?>" onclick="return confirm('Do you want to delete this category?')">Delete</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</main>
</body>
</html>