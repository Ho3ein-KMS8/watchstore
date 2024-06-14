<?php require_once 'inc/config.php'; ?>
<?php
$products = get_products(6);
$cart_items = get_cart_items();
$cart_total = cart_total();
if (is_login()) {
    $user_data = get_userdata();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="shortcut icon" href="./images/ws-fav.png" type="image/x-icon">
</head>
<body>

<?php require_once './sections/header.php' ?>

<main id="cart">
    <h1>Cart</h1>
    <div class="content">
        <div class="cart">
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
            <?php if (!$cart_items) { ?>
                <div style="text-align: left;font-size: 1.7rem; margin-bottom: 10vh;">Your cart is empty. Please choose product from store.</div>
            <?php } else { ?>
                <h2>Cart</h2>

                <table>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Delete</th>
                    </tr>
                    <?php foreach ($cart_items as $cart_item) { ?>

                        <tr>
                            <td><?php echo $cart_item['product_name'] ?></td>
                            <td>$<?php echo $cart_item['product_price'] ?></td>
                            <td><a href="?delete-from-cart=<?php echo $cart_item['id'] ?>" onclick="return confirm('Do you want to remove this product from your cart?')">Delete</a></td>
                        </tr>
                    <?php } ?>

                </table>
                <div class="cart-total">Total: $<?php echo $cart_total ?></div>
                <hr>
                <?php if (!is_login()) { ?>
                    <div class="login-or-register" style="text-align: center;font-size: 1.2rem">For continue and buy, please <a href="users/login.php#login">login</a> or <a href="users/register.php#register">register.</a></div>
                <?php } else { ?>
                    <h2>Account information</h2>
                    <div class="user-info">
                        <table>
                            <tr>
                                <td style="color: rgb(250, 202, 103);">Your name:</td>
                                <td><?php echo $user_data['display_name'] ?></td>
                            </tr>
                            <tr>
                                <td style="color: rgb(250, 202, 103);">Email:</td>
                                <td><?php echo $user_data['email'] ?></td>
                            </tr>
                            <tr>
                                <td style="color: rgb(250, 202, 103);">Phone number:</td>
                                <td><?php echo $user_data['user_number'] ?></td>
                            </tr>
                            <tr>
                                <td style="color: rgb(250, 202, 103);">Postal address:</td>
                                <td><?php echo $user_data['user_address'] ?></td>
                            </tr>
                        </table>
                    </div>

                    <form action="cart.php" method="post">

                        <input type="hidden" name="user-email" value="<?php echo $user_data['email'] ?>">
                        <input type="hidden" name="user-number" value="<?php echo $user_data['user_number'] ?>">
                        <input type="hidden" name="cart-total" value="<?php echo $cart_total ?>">
                        <input type="hidden" name="product-ids" value="<?php
                        foreach ($cart_items as $cart_item) {
                            echo $cart_item['id'] . ',';
                        }

                        ?>">

                        <input type="hidden" name="product-names" value="<?php
                        foreach($cart_items as $cart_item) {
                            echo $cart_item['product_name'] . ',';
                        }
                        ?>">

                        <input type="hidden" name="product-prices" value="<?php 
                        foreach($cart_items as $cart_item) {
                            echo $cart_item['product_price'] . ',';
                        }
                        ?>">
                        <input type="submit" name="submit-order" value="Connect to paypal">
                    </form>
                <?php } ?>
            <?php } ?>
        </div>
    </div>


</main>

<?php require_once 'sections/footer.php' ?>


</body>
</html>