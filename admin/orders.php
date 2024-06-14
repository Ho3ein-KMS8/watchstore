<?php require_once '../inc/config.php';
if (!is_admin_login()) {
    redirect("login.php");
}

$orders = get_orders();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage orders</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="shortcut icon" href="../images/ws-fav.png" type="image/x-icon">
</head>
<body>
<main id="orders-page">
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

        <?php if(empty(get_orders())) {
            echo "<span>No products found.</span>";
        }
        ?>
        <?php foreach ($orders as $order) {
            $products = get_order_items($order['order_id']);
            ?>
            <div class="order-item">
                <div class="order-id"><?php echo $order['order_id'] ?>
                    <!-- <br> -->
                    <?php if ($order['is_paid'] == 0) { ?>
                        <div class="not-paid" style="color: red;">Not paid</div>
                        <span style="font-size: 13px"><?php echo $order['user_email'] ?></span>
                    <?php } else { ?>
                        <div class="paid" style="color: green;">paid</div>
                        <span style="font-size: 13px"><?php echo $order['user_email'] ?></span>
                    <?php } ?>
                </div>
                <table>
                    <tr>
                        <th>Product name</th>
                        <th>Price</th>
                    </tr>
                    <?php for($i=0; $i<count($products); $i++) { ?>
                        <tr>
                            <td><?php echo $products[$i][1] ?></td>
                            <td><?php echo $products[$i][2] ?></td>
                        </tr>
                    <?php } ?>
                </table>
                <form actions="<?php echo PATH; ?>admin/orders.php" method="post">
                    <input type="hidden" name="order-id" value="<?php echo $order['order_id'] ?>">
                    <input type="submit" style="background-color: #cf1f1f; color:#fff; font-family: Roboto; border: 0; cursor:pointer;" name="delete-from-orders" value="Delete">
                </form>
            </div>
        <?php } ?>
    </div>
</div>
</body>
</html>