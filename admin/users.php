<?php require_once '../inc/config.php' ?>
<?php
if (!is_admin_login()) {
    redirect("login.php");
}

$users = get_users();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users list</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="shortcut icon" href="../images/ws-fav.png" type="image/x-icon">
</head>
<body>
<main id="users-page">
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
                <th>Display name</th>
                <th>Email</th>
                <th>Delete</th>
            </tr>
            </thead>
            <?php while ($user = mysqli_fetch_array($users)) { ?>
                <tr>
                    <td><?php echo $user['display_name'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    <td><a href="?delete-user-id=<?php echo $user['id'] ?>" onclick="return confirm('Do you want to delte this user?')">Delete</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</main>
</body>
</html>