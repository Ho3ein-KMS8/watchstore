<?php require_once 'inc/config.php';
$products = get_products(3);
require_once 'sections/header.php';
?>

<main>
    <div class="our-store">
        <div class="description2">
            <h1>Watch Store</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab quod laborum omnis, suscipit dolore aliquid voluptatibus earum. Soluta itaque odio vel est perspiciatis ipsam reiciendis nesciunt quae aspernatur consequuntur! Porro.</p>
        </div>
    </div>
    <h2>Watches</h2>
    <section>
        <?php while ($product = mysqli_fetch_array($products)) { ?>
            <div class="card">
                <img src="images/watches/<?php echo $product['product_image'] ?>" alt="">
                <div>
                    <p><?php echo $product['product_name'] ?></p>
                    <p>$<?php echo $product['product_price'] ?></p>
                    <a href="product.php?product-id=<?php echo $product['id'] ?>#product">Go to page</a>
                </div>
            </div>
        <?php } ?>

    </section>
    <a href="./products.php">All Watches</a>
</main>
<?php require_once 'sections/footer.php' ?>
</body>
</html>