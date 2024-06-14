<?php require_once 'inc/config.php'; ?>
<?php
if ($_GET['product-id']) {
    $product_id = $_GET['product-id'];
    $product_info = mysqli_fetch_array(get_product_by_id($product_id));
}


$pcomments = get_comments_by_product_id($product_id);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $product_info['product_name'] ?></title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="shortcut icon" href="./images/ws-fav.png" type="image/x-icon">
</head>
<body>

<?php require_once 'sections/header.php' ?>


<main id="product">
    <div class="product-page">
        <section class="prodsection">
            <div class="single-product">
                <img src="images/watches/<?php echo $product_info['product_image'] ?>" alt="Product Image">
                <div>
                    <h1><?php echo $product_info['product_name'] ?></h1>
                    <p><?php echo $product_info['product_cat'] ?></p>
                    <p>
                    <?php echo $product_info['product_desc'] ?>
                    </p>
                    <p>$<?php echo $product_info['product_price'] ?></p>
                    <a href="?add-to-cart=<?php echo $product_info['id'] ?>#cart">Add to cart</a>
                </div>
            </div>
        </section>

        <div class="comments">
            <div class="comments-list">
                <?php while ($pcomment = mysqli_fetch_array($pcomments)) { ?>
                    <div class="comment">
                        <div class="user-image"><img src="images/coat1.jpg" alt=""></div>
                        <div class="comment-username"><?php echo $pcomment['username'] ?></div>
                        <div class="comment-text"><p><?php echo $pcomment['comment_text'] ?></p></div>
                        <?php if ($pcomment['comment_answer']) { ?>
                            <div class="comment-answer">- <?php echo $pcomment['comment_answer'] ?></div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
            <?php
            if ($message) {
                ?>
                <div style="color: white" class="success-message"><?php echo $message ?></div>
                <?php
            }
            if ($error) {
                ?>
                <div style="color: white" class="error-message"><?php echo $error ?></div>
                <?php
            }
            ?>
            <section>
                <form action="product.php?product-id=<?php echo $product_id ?>" method="post">
                    <div class="contact-form">
                        <h1>Comment</h1>
                        <input required placeholder="Name" class="inp" type="name" name="name">
                        <input required placeholder="Email" class="inp" type="email" name="email">
                        <textarea required name="message" placeholder="Message ..." rows="14" class="text_area"></textarea>
                        <input type="hidden" name="product-id" value="<?php echo $product_id ?>">
                        <input class="submit-btn" type="submit" name="add-comment" value="Send">
                    </div>
                </form>
            </section>
        </div>
    </div>

</main>

<?php require_once 'sections/footer.php' ?>


</body>
</html>