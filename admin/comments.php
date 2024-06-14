<?php require_once '../inc/config.php' ?>
<?php
if (!is_admin_login()) {
    redirect("login.php");
}

$comments = get_comments();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comments</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="shortcut icon" href="../images/ws-fav.png" type="image/x-icon">
</head>
<body>
<div id="comments-page">
    
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
        <?php if(mysqli_num_rows($comments)==0){
            echo 'There are no comments to show.';
        } ?>
        <?php while ($comment = mysqli_fetch_array($comments)) {
            $product_id = $comment['product_id'];
            $product_name = mysqli_fetch_array(get_product_by_id($product_id));

            ?>
            <div class="comment-item">
                <div class="username"><span style="color: rgb(250, 202, 103);">Username: </span><?php echo $comment['username'] ?></div>
                <div class="comment-text"><span style="color: rgb(250, 202, 103);">Comment: </span><?php echo $comment['comment_text'] ?></div>
                <div class="comment-answer">
                    <form action="comments.php" method="post">
                        <textarea rows="10" cols="30" name="comment-answer" placeholder="Reply to comment..."></textarea>
                        <input type="hidden" name="comment-id" value="<?php echo $comment['id'] ?>">
                        <input type="submit" name="add-answer" value="Submit comment">
                    </form>
                </div>
                <div class="comment-buttons">
                    <span><?php echo $product_name['product_name'] ?> (<?php echo $comment['product_id'] ?>)</span>
                    <a href="?approve-id=<?php echo $comment['id'] ?>" class="approve">Approve</a>
                    <a href="?delete-id=<?php echo $comment['id'] ?>" class="delete" onclick="return confirm('Do you want to delete this product?')">Delete</a>
                </div>
            </div>
        <?php } ?>

    </div>
</div>
</body>
</html>