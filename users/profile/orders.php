<?php require_once '../../inc/config.php'; ?>
<?php
if (!is_login()) {
    redirect('../login.php');
}

$user_data = get_userdata();
$user_orders = get_user_orders();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Orders</title>
    <link rel="stylesheet" href="../../styles/styles.css">
</head>
<body>

<?php require_once('../../sections/header.php') ?>


<main class="order-page" id="orders">
    <div id="sidebar">
        <div class="sidebar-item">
            <ul>
                <li><a href="index.php#profile">Profile</a></li>
                <li><a href="orders.php#orders">Orders</a></li>
                <li><a href="edit-profile.php#editprofile">Edit</a></li>
                <li><a href="?logout=1">Logout</a></li>
            </ul>
        </div>
    </div>

    <div class="box" style="padding: 10px;box-sizing: border-box">
        <?php if(empty(get_user_orders())) {
            echo "<span>No product found.</span>";
        }
        ?>
        <?php if ($message) {
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
        <?php foreach ($user_orders as $user_order) {
            $products = get_order_items($user_order['order_id']);
            ?>
            <div class="order-item">
                <?php if ($user_order['is_paid'] == 0) { ?>
                    <div class="order-id-not-paid"><?php echo $user_order['order_id'] ?>
                        <br>
                        <div class="not-paid" style="color: #cf1f1f;">Not paid</div>
                    </div>
                <?php } else { ?>
                    <div class="order-id-paid"><?php echo $user_order['order_id'] ?>
                        <br>
                        <div class="paid" style="color: green">Paid</div>
                    </div>
                <?php } ?>
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
                <form actions="<?php echo PATH; ?>/profile/orders.php" method="post">
                    <input type="hidden" name="order-id" value="<?php echo $user_order['order_id'] ?>">
                    <input type="submit" style="background-color: #cf1f1f; color:#fff; font-family: iSans; border: 0; cursor:pointer;" name="delete-from-orders" value="Delete">
                </form>
            </div>
        <?php } ?>
    </div>

</div>

<?php require_once('../../sections/footer.php') ?>


</body>
</html>