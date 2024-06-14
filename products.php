<?php require_once 'inc/config.php';
$products = get_products();
require_once 'sections/header.php';
?>
<main id="products">
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
</main>

<?php require_once 'sections/footer.php' ?>

</body>
</html>
